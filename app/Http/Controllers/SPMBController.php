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
use App\Unit;
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
        $data['item_categories'] = ItemCategory::where('active', '1')->orderBy('item_category_name')->get();
        $data['units'] = Unit::where('active', '1')->orderBy('unit_name')->get();
        $data['pics'] = User::where('active', '1')->whereHas('roles', function($query) {
                            $query->where('role_name', '=', 'Officer Procurement');
                        })->get();
        $data['spmb_code'] = $this->generateCode();

     	return view('vendor.material.spmb.create', $data);   
    }

    public function store(Request $request)
    {
        $validation = [
            'spmb_type_id' => 'required',
            'spmb_no' => 'required',
            'spmb_no_pr_sap' => 'required',
            'spmb_group' => 'required',
            'division_id' => 'required',
            'spmb_cost_center' => 'required',
            'spmb_io_no' => 'required',
            'spmb_buyer_no' => 'required',
            'spmb_applicant_name' => 'required',
            'spmb_applicant_email' => 'required',
            'spmb_rules[]' => 'array',
            'notes' => 'required',
        ];

        $spmb_type_id = $request->input('spmb_type_id');
        $spmb_type = SPMBType::find($spmb_type_id);
        $spmb_type_rules = count($spmb_type->rules);

        if($spmb_type_rules==count($request->input('spmb_rules'))) {
            $validation['pic'] = 'required';
        }

        $this->validate($request, $validation);

        $obj = new SPMB;
        $obj->spmb_type_id = $request->input('spmb_type_id');
        $obj->spmb_no = $this->generateCode();
        $obj->spmb_no_pr_sap = $request->input('spmb_no_pr_sap');
        $obj->spmb_group = $request->input('spmb_group');
        $obj->division_id = $request->input('division_id');
        $obj->spmb_cost_center = $request->input('spmb_cost_center');
        $obj->spmb_io_no = $request->input('spmb_io_no');
        $obj->spmb_buyer_no = $request->input('spmb_buyer_no');
        $obj->spmb_applicant_name = $request->input('spmb_applicant_name');
        $obj->spmb_applicant_email = $request->input('spmb_applicant_email');
        $obj->flow_no = 1; //$nextFlow['flow_no'];
        $obj->current_user = $request->user()->user_id; //$nextFlow['current_user'];
        $obj->revision = 0;
        $obj->spmb_method = 'NORMAL';
        $obj->active = '1';
        $obj->created_by = $request->user()->user_id;

        $obj->save();

        //store details
        if($request->session()->has('spmb_details_' . $request->user()->user_id)) {
            $details = $request->session()->get('spmb_details_' . $request->user()->user_id);
            foreach($details as $detail) {
                $det = new SPMBDetail;
                $det->spmb_id = $obj->spmb_id;
                $det->spmb_detail_account_no = $detail['spmb_detail_account_no'];
                $det->spmb_detail_sequence_no = $detail['spmb_detail_sequence_no'];
                $det->item_category_id = $detail['item_category_id'];
                $det->spmb_detail_item_name = $detail['spmb_detail_item_name'];
                $det->unit_id = $detail['unit_id'];
                $det->spmb_detail_qty = $detail['spmb_detail_qty'];
                $det->spmb_detail_note = $detail['spmb_detail_note'];
                $det->active = '1';
                $det->created_by = $request->user()->user_id;

                $det->save();
            }

            $request->session()->forget('spmb_details_' . $request->user()->user_id);
        }

        if($spmb_type_rules==count($request->input('spmb_rules'))) {
            //pass rules
            $his = new SPMBHistory;
            $his->spmb_id = $obj->spmb_id;
            $his->approval_type_id = 1;
            $his->flow_no = 1;
            $his->spmb_history_desc = $request->input('notes');
            $his->active = '1';
            $his->created_by = $request->user()->user_id;

            $his->save();

            $flow = new FlowLibrary;
            $nextFlow = $flow->getNextFlow($this->flow_group_id, 1, $request->user()->user_id, $request->input('pic'), $obj->created_by, $request->input('pic'));

            $spmb = SPMB::find($obj->spmb_id);
            $spmb->pic = $request->input('pic');
            $spmb->flow_no = $nextFlow['flow_no'];
            $spmb->current_user = $nextFlow['current_user'];
            $spmb->updated_by = $request->user()->user_id;
            $spmb->save();

        }else{
            //failed to pass rules
            $his = new SPMBHistory;
            $his->spmb_id = $obj->spmb_id;
            $his->approval_type_id = 5;
            $his->flow_no = 1;
            $his->spmb_history_desc = $request->input('notes');
            $his->active = '1';
            $his->created_by = $request->user()->user_id;

            $his->save();

            $flow = new FlowLibrary;
            $prevFlow = $flow->getPreviousFlow($this->flow_group_id, 1, $request->user()->user_id, $request->input('pic'), $obj->created_by, $request->input('pic'));

            $spmb = SPMB::find($obj->spmb_id);
            $spmb->flow_no = $prevFlow['flow_no'];
            $spmb->current_user = $prevFlow['current_user'];
            $spmb->revision = 1;
            $spmb->updated_by = $request->user()->user_id;
            $spmb->save();
        }

        /*dd($spmb_type_rules);
        dd(count($request->input('spmb_rules')));*/

        $request->session()->flash('status', 'Data has been saved!');

        return redirect('spmb');
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
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
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
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
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
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
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
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
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
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
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
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
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
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
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
                                ->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
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

    public function apiLoadDetails(Request $request) {
        if(Gate::denies('SPMB-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        $data['details'] = $request->session()->get('spmb_details_' . $request->user()->user_id);

        return response()->json($data);
    }

    public function apiStoreDetails(Request $request) {
        if(Gate::denies('SPMB-Create')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        $item_category_id = $request->input('item_category_id');
        $item_category_name = $request->input('item_category_name');
        $spmb_detail_account_no = $request->input('spmb_detail_account_no');
        $spmb_detail_sequence_no = $request->input('spmb_detail_sequence_no');
        $spmb_detail_item_name = $request->input('spmb_detail_item_name');
        $unit_id = $request->input('unit_id');
        $unit_name = $request->input('unit_name');
        $spmb_detail_qty = $request->input('spmb_detail_qty');
        $spmb_detail_note = $request->input('spmb_detail_note');

        $detail = array();
        $detail['item_category_id'] = $item_category_id;
        $detail['item_category_name'] = $item_category_name;
        $detail['spmb_detail_account_no'] = $spmb_detail_account_no;
        $detail['spmb_detail_sequence_no'] = $spmb_detail_sequence_no;
        $detail['spmb_detail_item_name'] = $spmb_detail_item_name;
        $detail['unit_id'] = $unit_id;
        $detail['unit_name'] = $unit_name;
        $detail['spmb_detail_qty'] = $spmb_detail_qty;
        $detail['spmb_detail_note'] = $spmb_detail_note;

        $details = array();
        if($request->session()->has('spmb_details_' . $request->user()->user_id)) {
            $details = $request->session()->get('spmb_details_' . $request->user()->user_id);
            $request->session()->forget('spmb_details_' . $request->user()->user_id);
            $i = count($details) + 1;
        }else{
            $i = 1;
        }

        $details[] = $detail;

        $request->session()->put('spmb_details_' . $request->user()->user_id, $details);
        
        $data['status'] = '200';

        return response()->json($data);
    }

    public function apiDeleteDetails(Request $request) {
        $data = array();

        $key = $request->input('key');

        $details = array();
        if($request->session()->has('spmb_details_' . $request->user()->user_id)) {
            $details = $request->session()->get('spmb_details_' . $request->user()->user_id);
            $request->session()->forget('spmb_details_' . $request->user()->user_id);

            unset($details[$key]);

            $request->session()->put('spmb_details_' . $request->user()->user_id, $details);
        
            $data['status'] = '200';

            return response()->json($data); 
        }else{
            $data['status'] = '500';

            return response()->json($data);
        }


    }

    private function generateCode()
    {
        $total = SPMB::count();
        $code = 'SPMB-';

        if($total > 0) {
            $last_row = SPMB::select('spmb_id')->orderBy('spmb_id', 'desc')->first();

            $id = $last_row->spmb_id + 1;

            if($id >= 10000) {
                $code .= date('y') . date('m') . $id;
            }elseif($id >= 1000) {
                $code .= date('y') . date('m') . '0' . $id;
            }elseif($id >= 100) {
                $code .= date('y') . date('m') . '00' . $id;
            }elseif($id >= 10) {
                $code .= date('y') . date('m') . '000' . $id;
            }else{
                $code .= date('y') . date('m') . '0000' . $id;
            }
        }else{
            $code .= date('y') . date('m') . '00001';
        }

        return $code;

    }
}