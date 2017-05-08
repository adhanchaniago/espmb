<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Gate;
use App\Http\Requests;
use App\Company;
use App\Division;
use App\ItemCategory;
use App\User;
use App\Vendor;

use DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    //

    public function timeprocess() {
    	if(Gate::denies('Time Process-Read')) {
            abort(403, 'Unauthorized action.');
        }

    	$data = array();
    	$data['divisions'] = Division::with('company')->where('active', '1')->orderBy('company_id')->orderBy('division_name')->get();
    	$data['pics'] = User::where('active', '1')->whereHas('roles', function($query) {
                            $query->where('role_name', '=', 'Officer Procurement');
                        })->get();
    	$data['authors'] = User::where('active', '1')->whereHas('roles', function($query) {
                            $query->where('role_name', '=', 'Admin Procurement');
                        })->get();

    	return view('vendor.material.report.time-process', $data);
    }

    public function vendor() {
    	if(Gate::denies('Vendor Report-Read')) {
            abort(403, 'Unauthorized action.');
        }

    	$data = array();
    	$data['divisions'] = Division::with('company')->where('active', '1')->orderBy('company_id')->orderBy('division_name')->get();
    	$data['vendors'] = Vendor::where('active', '1')->orderBy('vendor_name')->get();
    	$data['itemcategories'] = ItemCategory::where('active', '1')->orderBy('item_category_name')->get();
    	$data['pics'] = User::where('active', '1')->whereHas('roles', function($query) {
                            $query->where('role_name', '=', 'Officer Procurement');
                        })->get();

    	return view('vendor.material.report.vendor', $data);
    }

    public function apiGenerateTimeProcess(Request $request) {
    	if(Gate::denies('Time Process-Create')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        $report_type = $request->input('report_type');
		$period_daily = $request->input('period_daily');
		$period_month = $request->input('period_month');
		$period_year = $request->input('period_year');
		$period_start = $request->input('period_start');
		$period_end = $request->input('period_end');
		$division_ids = $request->input('division_ids');
		$authors = $request->input('authors');
		$pics = $request->input('pics');
		$revision = $request->input('revision');

		//dd($revision);
		$mulai = '';
		$selesai = '';
		if($report_type=='daily') {
			$mulai = Carbon::createFromFormat('d/m/Y', $period_daily)->toDateString() . ' 00:00:00';
			$selesai = Carbon::createFromFormat('d/m/Y', $period_daily)->toDateString() . ' 23:59:59';
		}elseif($report_type=='monthly') {
			$mulai = $period_year.'-'.$period_month.'-01 00:00:00';
			$tanggalakhir = cal_days_in_month(CAL_GREGORIAN, $period_month, $period_year);
			$selesai = $period_year.'-'.$period_month.'-'.$tanggalakhir.' 23:59:59';
		}elseif($report_type=='yearly') {
			$mulai = $period_year.'-01-01 00:00:00';
			$selesai = $period_year.'-12-31 23:59:59';
		}elseif($report_type=='period') {
			$mulai = Carbon::createFromFormat('d/m/Y', $period_start)->toDateString() . ' 00:00:00';
			$selesai = Carbon::createFromFormat('d/m/Y', $period_end)->toDateString() . ' 23:59:59';
		}else{
			$mulai = '1990-01-01 00:00:00';
			$selesai = '2050-12-31 23:59:59';

			/*$result = DB::raw("SELECT 
										spmb.*,
									    company_name,
									    division_code,
									    division_name,
									    author.user_firstname AS author_firstname,
									    author.user_lastname AS author_lastname,
									    pic.user_firstname AS pic_firstname,
									    pic.user_lastname AS pic_lastname,
									    (SELECT SUM(spmb_detail_item_price * spmb_detail_qty) FROM spmb_details WHERE spmb_id = spmb.spmb_id) AS total_price
									FROM spmb 
									INNER JOIN divisions ON divisions.division_id = spmb.division_id
									INNER JOIN companies ON companies.company_id = divisions.company_id
									INNER JOIN users author ON author.user_id = spmb.created_by
									LEFT JOIN users pic ON pic.user_id = spmb.pic
									WHERE spmb.active = '1'
									ORDER BY division_id,created_at,spmb_no,revision,created_by,pic");*/
		}

		if(is_null($division_ids)) {
			$division_ids = Division::select('division_id')->where('active', '1')->get();
		}

		if(is_null($authors)) {
			$authors = User::select('user_id')->where('active', '1')->whereHas('roles', function($query) {
                            $query->where('role_name', '=', 'Admin Procurement');
                        })->get();
		}

		if(is_null($pics)) {
			if($revision=='yes'){
				$result = DB::table('spmb')
							->select(DB::raw("spmb.*,
										spmb_type_name,
									    company_name,
									    division_code,
									    division_name,
									    author.user_firstname AS author_firstname,
									    author.user_lastname AS author_lastname,
									    pic.user_firstname AS pic_firstname,
									    pic.user_lastname AS pic_lastname,
									    (SELECT SUM(spmb_detail_item_price * spmb_detail_qty) FROM spmb_details WHERE spmb_id = spmb.spmb_id) AS total_price"))
							->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
							->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
							->join('companies', 'companies.company_id', '=', 'divisions.company_id')
							->join('users AS author', 'author.user_id', '=', 'spmb.created_by')
							->leftJoin('users AS pic', 'pic.user_id', '=', 'spmb.pic')
							->where('spmb.active', '1')
							->whereBetween('spmb.created_at', [$mulai, $selesai])
							->whereIn('spmb.division_id', $division_ids)
							->whereIn('spmb.created_by', $authors)
							->where('revision', '>', 0)
							->orderBy('division_id', 'asc')
							->orderBy('created_at', 'asc')
							->orderBy('spmb_no', 'asc')
							->orderBy('revision', 'asc')
							->orderBy('author.user_firstname', 'asc')
							->orderBy('pic.user_firstname', 'asc')
							->get();
			}else if($revision=='no'){
				$result = DB::table('spmb')
						->select(DB::raw("spmb.*,
									spmb_type_name,
								    company_name,
								    division_code,
								    division_name,
								    author.user_firstname AS author_firstname,
								    author.user_lastname AS author_lastname,
								    pic.user_firstname AS pic_firstname,
								    pic.user_lastname AS pic_lastname,
								    (SELECT SUM(spmb_detail_item_price * spmb_detail_qty) FROM spmb_details WHERE spmb_id = spmb.spmb_id) AS total_price"))
						->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
						->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
						->join('companies', 'companies.company_id', '=', 'divisions.company_id')
						->join('users AS author', 'author.user_id', '=', 'spmb.created_by')
						->leftJoin('users AS pic', 'pic.user_id', '=', 'spmb.pic')
						->where('spmb.active', '1')
						->whereBetween('spmb.created_at', [$mulai, $selesai])
						->whereIn('spmb.division_id', $division_ids)
						->whereIn('spmb.created_by', $authors)
						->where('revision', '=', 0)
						->orderBy('division_id', 'asc')
						->orderBy('created_at', 'asc')
						->orderBy('spmb_no', 'asc')
						->orderBy('revision', 'asc')
						->orderBy('author.user_firstname', 'asc')
						->orderBy('pic.user_firstname', 'asc')
						->get();
			}else{
				$result = DB::table('spmb')
						->select(DB::raw("spmb.*,
									spmb_type_name,
								    company_name,
								    division_code,
								    division_name,
								    author.user_firstname AS author_firstname,
								    author.user_lastname AS author_lastname,
								    pic.user_firstname AS pic_firstname,
								    pic.user_lastname AS pic_lastname,
								    (SELECT SUM(spmb_detail_item_price * spmb_detail_qty) FROM spmb_details WHERE spmb_id = spmb.spmb_id) AS total_price"))
						->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
						->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
						->join('companies', 'companies.company_id', '=', 'divisions.company_id')
						->join('users AS author', 'author.user_id', '=', 'spmb.created_by')
						->leftJoin('users AS pic', 'pic.user_id', '=', 'spmb.pic')
						->where('spmb.active', '1')
						->whereBetween('spmb.created_at', [$mulai, $selesai])
						->whereIn('spmb.division_id', $division_ids)
						->whereIn('spmb.created_by', $authors)
						->orderBy('division_id', 'asc')
						->orderBy('created_at', 'asc')
						->orderBy('spmb_no', 'asc')
						->orderBy('revision', 'asc')
						->orderBy('author.user_firstname', 'asc')
						->orderBy('pic.user_firstname', 'asc')
						->get();
			}
		}else{
			if($revision=='yes') {
				$result = DB::table('spmb')
							->select(DB::raw("spmb.*,
										spmb_type_name,
									    company_name,
									    division_code,
									    division_name,
									    author.user_firstname AS author_firstname,
									    author.user_lastname AS author_lastname,
									    pic.user_firstname AS pic_firstname,
									    pic.user_lastname AS pic_lastname,
									    (SELECT SUM(spmb_detail_item_price * spmb_detail_qty) FROM spmb_details WHERE spmb_id = spmb.spmb_id) AS total_price"))
							->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
							->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
							->join('companies', 'companies.company_id', '=', 'divisions.company_id')
							->join('users AS author', 'author.user_id', '=', 'spmb.created_by')
							->leftJoin('users AS pic', 'pic.user_id', '=', 'spmb.pic')
							->where('spmb.active', '1')
							->whereBetween('spmb.created_at', [$mulai, $selesai])
							->whereIn('spmb.division_id', $division_ids)
							->whereIn('spmb.created_by', $authors)
							->whereIn('spmb.pic', $pics)
							->where('revision', '>', 0)
							->orderBy('division_id', 'asc')
							->orderBy('created_at', 'asc')
							->orderBy('spmb_no', 'asc')
							->orderBy('revision', 'asc')
							->orderBy('author.user_firstname', 'asc')
							->orderBy('pic.user_firstname', 'asc')
							->get();
			}else if($revision=='no') {
				$result = DB::table('spmb')
							->select(DB::raw("spmb.*,
										spmb_type_name,
									    company_name,
									    division_code,
									    division_name,
									    author.user_firstname AS author_firstname,
									    author.user_lastname AS author_lastname,
									    pic.user_firstname AS pic_firstname,
									    pic.user_lastname AS pic_lastname,
									    (SELECT SUM(spmb_detail_item_price * spmb_detail_qty) FROM spmb_details WHERE spmb_id = spmb.spmb_id) AS total_price"))
							->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
							->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
							->join('companies', 'companies.company_id', '=', 'divisions.company_id')
							->join('users AS author', 'author.user_id', '=', 'spmb.created_by')
							->leftJoin('users AS pic', 'pic.user_id', '=', 'spmb.pic')
							->where('spmb.active', '1')
							->whereBetween('spmb.created_at', [$mulai, $selesai])
							->whereIn('spmb.division_id', $division_ids)
							->whereIn('spmb.created_by', $authors)
							->whereIn('spmb.pic', $pics)
							->where('revision', '=', 0)
							->orderBy('division_id', 'asc')
							->orderBy('created_at', 'asc')
							->orderBy('spmb_no', 'asc')
							->orderBy('revision', 'asc')
							->orderBy('author.user_firstname', 'asc')
							->orderBy('pic.user_firstname', 'asc')
							->get();
			}else{
				$result = DB::table('spmb')
							->select(DB::raw("spmb.*,
										spmb_type_name,
									    company_name,
									    division_code,
									    division_name,
									    author.user_firstname AS author_firstname,
									    author.user_lastname AS author_lastname,
									    pic.user_firstname AS pic_firstname,
									    pic.user_lastname AS pic_lastname,
									    (SELECT SUM(spmb_detail_item_price * spmb_detail_qty) FROM spmb_details WHERE spmb_id = spmb.spmb_id) AS total_price"))
							->join('spmb_types', 'spmb_types.spmb_type_id', '=', 'spmb.spmb_type_id')
							->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
							->join('companies', 'companies.company_id', '=', 'divisions.company_id')
							->join('users AS author', 'author.user_id', '=', 'spmb.created_by')
							->leftJoin('users AS pic', 'pic.user_id', '=', 'spmb.pic')
							->where('spmb.active', '1')
							->whereBetween('spmb.created_at', [$mulai, $selesai])
							->whereIn('spmb.division_id', $division_ids)
							->whereIn('spmb.created_by', $authors)
							->whereIn('spmb.pic', $pics)
							->orderBy('division_id', 'asc')
							->orderBy('created_at', 'asc')
							->orderBy('spmb_no', 'asc')
							->orderBy('revision', 'asc')
							->orderBy('author.user_firstname', 'asc')
							->orderBy('pic.user_firstname', 'asc')
							->get();
			}
		}

		$data['result'] = $result;

		return response()->json($data);
    }
}
