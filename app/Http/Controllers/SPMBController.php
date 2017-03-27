<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

use File;
use Gate;
use App\Http\Requests;

use App\Company;
use App\Division;
use App\ItemCategory;
use App\PaymentType;
use App\Rating;
use App\Rule;
use App\SPMB;
use App\SPMBDetail;
use App\SPMBDetailPayment;
use App\SPMBDetailReceipt;
use App\SPMBDetailVendor;
use App\SPMBHistory;
use App\SPMBType;
use App\User;
use App\Vendor;

use App\Ibrol\Libraries\FlowLibrary;
use App\Ibrol\Libraries\NotificationLibrary;
use App\Ibrol\Libraries\UserLibrary;

class SPMBController extends Controller
{
    private $flows;
    private $flow_group_id;
    private $uri = '/spmb';
    private $notif;

    public function __construct() {
        $flow = new FlowLibrary;
        $this->flows = $flow->getCurrentFlows($this->uri);
        $this->flow_group_id = $this->flows[0]->flow_group_id;

        $this->notif = new NotificationLibrary;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('SPMB-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        return view('vendor.material.spmb.list', $data);
    }

    public function create(Request $request)
    {
		if(Gate::denies('SPMB-Create')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        $data['spmb_types'] = SPMBType::where('active', '1')->orderBy('spmb_type_name')->get();
        $data['companies'] = Company::where('active', '1')->orderBy('company_name')->get();

     	return view('vendor.material.spmb.create', $data);   
    }

    public function apiList($listtype, Request $request)
    {
        $u = new UserLibrary;
        $subordinate = $u->getSubOrdinateArrayID($request->user()->user_id);

        $current = $request->input('current') or 1;
        $rowCount = $request->input('rowCount') or 10;
        $skip = ($current==1) ? 0 : (($current - 1) * $rowCount);
        $searchPhrase = $request->input('searchPhrase') or '';
        
        $sort_column = 'spmb_id';
        $sort_type = 'asc';

        if(is_array($request->input('sort'))) {
            foreach($request->input('sort') as $key => $value)
            {
                $sort_column = $key;
                $sort_type = $value;
            }
        }

        $data = array();
        $data['current'] = intval($current);
        $data['rowCount'] = $rowCount;
        $data['searchPhrase'] = $searchPhrase;

        if($listtype == 'onprocess') {
            $data['rows'] = SPMB::select(
                                            'spmb.spmb_id',
                                            'spmb_types.spmb_type_name',
                                            'spmb.spmb_no',
                                            'divisions.division_name',
                                            'spmb.spmb_applicant_name',
                                            'spmb.flow_no',
                                            'users.user_firstname'
                                        )
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_id')
                                ->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
                                ->join('users','users.user_id', '=', 'spmb.current_user')
                                ->where('spmb.flow_no','<>','98')
                                ->where('spmb.active', '=', '1')
                                ->where('spmb.current_user', '<>' , $request->user()->user_id)
                                ->where(function($query) use($request, $subordinate){
                                    $query->where('spmb.created_by', '=' , $request->user()->user_id)
                                            ->orWhereIn('spmb.created_by', $subordinate)
                                            ->orWhereIn('spmb.pic', $subordinate);
                                })
                                ->where(function($query) use($searchPhrase) {
                                    $query->orWhere('spmb_type_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_no','like','%' . $searchPhrase . '%')
                                            ->orWhere('division_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_applicant_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                                })
                                ->skip($skip)->take($rowCount)
                                ->orderBy($sort_column, $sort_type)->get();
            $data['total'] = SPMB::select(
                                            'spmb.spmb_id',
                                            'spmb_types.spmb_type_name',
                                            'spmb.spmb_no',
                                            'divisions.division_name',
                                            'spmb.spmb_applicant_name',
                                            'spmb.flow_no',
                                            'users.user_firstname'
                                        )
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_id')
                                ->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
                                ->join('users','users.user_id', '=', 'spmb.current_user')
                                ->where('spmb.flow_no','<>','98')
                                ->where('spmb.active', '=', '1')
                                ->where('spmb.current_user', '<>' , $request->user()->user_id)
                                ->where(function($query) use($request, $subordinate){
                                    $query->where('spmb.created_by', '=' , $request->user()->user_id)
                                            ->orWhereIn('spmb.created_by', $subordinate)
                                            ->orWhereIn('spmb.pic', $subordinate);
                                })
                                ->where(function($query) use($searchPhrase) {
                                    $query->orWhere('spmb_type_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_no','like','%' . $searchPhrase . '%')
                                            ->orWhere('division_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_applicant_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                                })->count();    
        }elseif($listtype == 'needchecking') {
            $data['rows'] = SPMB::select(
                                            'spmb.spmb_id',
                                            'spmb_types.spmb_type_name',
                                            'spmb.spmb_no',
                                            'divisions.division_name',
                                            'spmb.spmb_applicant_name',
                                            'spmb.flow_no',
                                            'users.user_firstname'
                                        )
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_id')
                                ->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
                                ->join('users','users.user_id', '=', 'spmb.created_by')
                                ->where('spmb.active','1')
                                ->where('spmb.flow_no','<>','98')
                                ->where('spmb.flow_no','<>','99')
                                ->where('spmb.current_user', '=' , $request->user()->user_id)
                                ->where(function($query) use($searchPhrase) {
                                    $query->orWhere('spmb_type_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_no','like','%' . $searchPhrase . '%')
                                            ->orWhere('division_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_applicant_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                                })
                                ->skip($skip)->take($rowCount)
                                ->orderBy($sort_column, $sort_type)->get();
            $data['total'] = SPMB::select(
                                            'spmb.spmb_id',
                                            'spmb_types.spmb_type_name',
                                            'spmb.spmb_no',
                                            'divisions.division_name',
                                            'spmb.spmb_applicant_name',
                                            'spmb.flow_no',
                                            'users.user_firstname'
                                        )
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_id')
                                ->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
                                ->join('users','users.user_id', '=', 'spmb.created_by')
                                ->where('spmb.active','1')
                                ->where('spmb.flow_no','<>','98')
                                ->where('spmb.flow_no','<>','99')
                                ->where('spmb.current_user', '=' , $request->user()->user_id)
                                ->where(function($query) use($searchPhrase) {
                                    $query->orWhere('spmb_type_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_no','like','%' . $searchPhrase . '%')
                                            ->orWhere('division_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_applicant_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                                })->count();
        }elseif($listtype == 'finished') {
            $data['rows'] = SPMB::select(
                                            'spmb.spmb_id',
                                            'spmb_types.spmb_type_name',
                                            'spmb.spmb_no',
                                            'divisions.division_name',
                                            'spmb.spmb_applicant_name',
                                            'spmb.flow_no',
                                            'users.user_firstname'
                                        )
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_id')
                                ->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
                                ->join('users','users.user_id', '=', 'spmb.created_by')
                                ->where('spmb.active','1')
                                ->where('spmb.flow_no','=','98')
                                ->where(function($query) use($request, $subordinate){
                                    $query->where('spmb.created_by', '=' , $request->user()->user_id)
                                            ->orWhereIn('spmb.created_by', $subordinate)
                                            ->orWhere('spmb.pic', '=', $request->user()->user_id)
                                            ->orWhereIn('spmb.pic', $subordinate);
                                })
                                ->where(function($query) use($searchPhrase) {
                                    $query->orWhere('spmb_type_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_no','like','%' . $searchPhrase . '%')
                                            ->orWhere('division_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_applicant_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                                })
                                ->skip($skip)->take($rowCount)
                                ->orderBy($sort_column, $sort_type)->get();
            $data['total'] = SPMB::select(
                                            'spmb.spmb_id',
                                            'spmb_types.spmb_type_name',
                                            'spmb.spmb_no',
                                            'divisions.division_name',
                                            'spmb.spmb_applicant_name',
                                            'spmb.flow_no',
                                            'users.user_firstname'
                                        )
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_id')
                                ->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
                                ->join('users','users.user_id', '=', 'spmb.created_by')
                                ->where('spmb.active','1')
                                ->where('spmb.flow_no','=','98')
                                ->where(function($query) use($request, $subordinate){
                                    $query->where('spmb.created_by', '=' , $request->user()->user_id)
                                            ->orWhereIn('spmb.created_by', $subordinate)
                                            ->orWhere('spmb.pic', '=', $request->user()->user_id)
                                            ->orWhereIn('spmb.pic', $subordinate);
                                })
                                ->where(function($query) use($searchPhrase) {
                                    $query->orWhere('spmb_type_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_no','like','%' . $searchPhrase . '%')
                                            ->orWhere('division_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_applicant_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                                })->count();
        }elseif($listtype == 'canceled') {
            $data['rows'] = SPMB::select(
                                            'spmb.spmb_id',
                                            'spmb_types.spmb_type_name',
                                            'spmb.spmb_no',
                                            'divisions.division_name',
                                            'spmb.spmb_applicant_name',
                                            'spmb.flow_no',
                                            'users.user_firstname'
                                        )
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_id')
                                ->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
                                ->join('users','users.user_id', '=', 'spmb.created_by')
                                ->where('spmb.active','0')
                                ->where(function($query) use($request, $subordinate){
                                    $query->where('spmb.created_by', '=' , $request->user()->user_id)
                                            ->orWhereIn('spmb.created_by', $subordinate);
                                })
                                ->where(function($query) use($searchPhrase) {
                                    $query->orWhere('spmb_type_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_no','like','%' . $searchPhrase . '%')
                                            ->orWhere('division_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_applicant_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                                })
                                ->skip($skip)->take($rowCount)
                                ->orderBy($sort_column, $sort_type)->get();
            $data['total'] = SPMB::select(
                                            'spmb.spmb_id',
                                            'spmb_types.spmb_type_name',
                                            'spmb.spmb_no',
                                            'divisions.division_name',
                                            'spmb.spmb_applicant_name',
                                            'spmb.flow_no',
                                            'users.user_firstname'
                                        )
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_id')
                                ->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
                                ->join('users','users.user_id', '=', 'spmb.created_by')
                                ->where('spmb.active','0')
                                ->where(function($query) use($request, $subordinate){
                                    $query->where('spmb.created_by', '=' , $request->user()->user_id)
                                            ->orWhereIn('spmb.created_by', $subordinate);
                                })
                                ->where(function($query) use($searchPhrase) {
                                    $query->orWhere('spmb_type_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_no','like','%' . $searchPhrase . '%')
                                            ->orWhere('division_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('spmb_applicant_name','like','%' . $searchPhrase . '%')
                                            ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                                })->count();
        }

        

        return response()->json($data);
    }
}
