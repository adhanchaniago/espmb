<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Gate;
use App\Http\Requests;
use App\Company;
use App\Division;
use App\ItemCategory;
use App\PaymentType;
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

    public function fico() {
    	if(Gate::denies('FICO Report-Read')) {
            abort(403, 'Unauthorized action.');
        }

    	$data = array();
    	$data['divisions'] = Division::with('company')->where('active', '1')->orderBy('company_id')->orderBy('division_name')->get();
    	$data['payment_types'] = PaymentType::where('active', '1')->orderBy('payment_type_name')->get();

    	return view('vendor.material.report.fico', $data);
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

    public function apiGenerateVendor(Request $request) {
    	if(Gate::denies('Vendor Report-Create')) {
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
		$item_categories = $request->input('item_categories');
		$vendors = $request->input('vendors');
		$pics = $request->input('pics');

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
		}

		if(is_null($division_ids)) {
			$division_ids = Division::select('division_id')->where('active', '1')->get();
		}

		if(is_null($vendors)) {
			$vendors = Vendor::select('vendor_id')->where('active', '1')->get();
		}

		if(is_null($item_categories)) {
			$item_categories = ItemCategory::select('item_category_id')->where('active', '1')->get();
		}

		if(is_null($pics)) {
			$pics = User::select('user_id')->where('active', '1')->whereHas('roles', function($query) {
                            $query->where('role_name', '=', 'Officer Procurement');
                        })->get();
		}		

		$result = DB::table('spmb')
							->select(DB::raw("spmb.*,
									    company_name,
									    division_code,
									    division_name,
									    vendor_name,
									    item_category_name,
									    pic.user_firstname AS pic_firstname,
									    pic.user_lastname AS pic_lastname,
									    spmb_detail_vendors.spmb_detail_vendor_offer_price,
									    spmb_detail_vendors.spmb_detail_vendor_deal_price,
									    spmb_details.spmb_detail_qty,
									    (spmb_detail_vendors.spmb_detail_vendor_deal_price * spmb_details.spmb_detail_qty) AS total_price,
									    (SELECT score FROM spmb_detail_vendor_rating_score WHERE spmb_detail_id = spmb_details.spmb_detail_id AND vendor_id = spmb_detail_vendors.vendor_id AND rating_id = 1) AS price_rating,
									    (SELECT score FROM spmb_detail_vendor_rating_score WHERE spmb_detail_id = spmb_details.spmb_detail_id AND vendor_id = spmb_detail_vendors.vendor_id AND rating_id = 2) AS speed_rating,
									    (SELECT score FROM spmb_detail_vendor_rating_score WHERE spmb_detail_id = spmb_details.spmb_detail_id AND vendor_id = spmb_detail_vendors.vendor_id AND rating_id = 3) AS quality_rating"))
							->join('spmb_details', 'spmb_details.spmb_id', '=', 'spmb.spmb_id')
							->join('spmb_detail_vendors', 'spmb_detail_vendors.spmb_detail_id', '=', 'spmb_details.spmb_detail_id')
							->join('item_categories', 'item_categories.item_category_id', '=', 'spmb_details.item_category_id')
							->join('vendors', 'vendors.vendor_id', '=', 'spmb_detail_vendors.vendor_id')
							->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
							->join('companies', 'companies.company_id', '=', 'divisions.company_id')
							->join('users AS pic', 'pic.user_id', '=', 'spmb.pic')
							->where('spmb.active', '1')
							->where('spmb_detail_vendors.spmb_detail_vendor_status', '1')
							->whereBetween('spmb.created_at', [$mulai, $selesai])
							->whereIn('spmb.division_id', $division_ids)
							->whereIn('spmb.pic', $pics)
							->whereIn('spmb_detail_vendors.vendor_id', $vendors)
							->whereIn('spmb_details.item_category_id', $item_categories)
							->orderBy('division_id', 'asc')
							->orderBy('created_at', 'asc')
							->orderBy('vendor_name', 'asc')
							->orderBy('item_category_name', 'asc')
							->orderBy('pic.user_firstname', 'asc')
							->get();


		$data['result'] = $result;

		return response()->json($data);
    }

    public function apiGenerateFico(Request $request) {
    	if(Gate::denies('FICO Report-Create')) {
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
		$payment_types = $request->input('payment_types');
		$payment_status = $request->input('payment_status');

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
		}

		if(is_null($division_ids)) {
			$division_ids = Division::select('division_id')->where('active', '1')->get();
		}

		if(is_null($payment_types)) {
			$payment_types = PaymentType::select('payment_type_id')->where('active', '1')->get();
		}

		if($payment_status=='1') {
			$result = DB::table('spmb')
						->select(DB::raw("spmb.*,
								    company_name,
								    division_code,
								    division_name,
								    spmb_detail_payment_amount,
								    spmb_detail_payment_request_date,
								    spmb_detail_payment_transfer_date,
								    spmb_detail_payment_finish_date,
								    spmb_detail_payment_status,
								    spmb_detail_payment_note,
								    spmb_detail_payment_request_name,
								    payment_type_name"))
						->join('spmb_details', 'spmb_details.spmb_id', '=', 'spmb.spmb_id')
						->join('spmb_detail_payments', 'spmb_detail_payments.spmb_detail_id', '=', 'spmb_details.spmb_detail_id')
						->join('payment_types', 'payment_types.payment_type_id', '=', 'spmb_detail_payments.payment_type_id')
						->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
						->join('companies', 'companies.company_id', '=', 'divisions.company_id')
						->where('spmb.active', '1')
						->whereBetween('spmb.created_at', [$mulai, $selesai])
						->whereIn('spmb.division_id', $division_ids)
						->whereIn('spmb_detail_payments.payment_type_id', $payment_types)
						->where('spmb_detail_payments.spmb_detail_payment_status', '1')
						->orderBy('division_id', 'asc')
						->orderBy('created_at', 'asc')
						->orderBy('payment_type_name', 'asc')
						->get();
		}else if($payment_status=='0') {
			$result = DB::table('spmb')
						->select(DB::raw("spmb.*,
								    company_name,
								    division_code,
								    division_name,
								    spmb_detail_payment_amount,
								    spmb_detail_payment_request_date,
								    spmb_detail_payment_transfer_date,
								    spmb_detail_payment_finish_date,
								    spmb_detail_payment_status,
								    spmb_detail_payment_note,
								    spmb_detail_payment_request_name,
								    payment_type_name"))
						->join('spmb_details', 'spmb_details.spmb_id', '=', 'spmb.spmb_id')
						->join('spmb_detail_payments', 'spmb_detail_payments.spmb_detail_id', '=', 'spmb_details.spmb_detail_id')
						->join('payment_types', 'payment_types.payment_type_id', '=', 'spmb_detail_payments.payment_type_id')
						->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
						->join('companies', 'companies.company_id', '=', 'divisions.company_id')
						->where('spmb.active', '1')
						->whereBetween('spmb.created_at', [$mulai, $selesai])
						->whereIn('spmb.division_id', $division_ids)
						->whereIn('spmb_detail_payments.payment_type_id', $payment_types)
						->where('spmb_detail_payments.spmb_detail_payment_status', '0')
						->orderBy('division_id', 'asc')
						->orderBy('created_at', 'asc')
						->orderBy('payment_type_name', 'asc')
						->get();
		}else{
			$result = DB::table('spmb')
						->select(DB::raw("spmb.*,
								    company_name,
								    division_code,
								    division_name,
								    spmb_detail_payment_amount,
								    spmb_detail_payment_request_date,
								    spmb_detail_payment_transfer_date,
								    spmb_detail_payment_finish_date,
								    spmb_detail_payment_status,
								    spmb_detail_payment_note,
								    spmb_detail_payment_request_name,
								    payment_type_name"))
						->join('spmb_details', 'spmb_details.spmb_id', '=', 'spmb.spmb_id')
						->join('spmb_detail_payments', 'spmb_detail_payments.spmb_detail_id', '=', 'spmb_details.spmb_detail_id')
						->join('payment_types', 'payment_types.payment_type_id', '=', 'spmb_detail_payments.payment_type_id')
						->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
						->join('companies', 'companies.company_id', '=', 'divisions.company_id')
						->where('spmb.active', '1')
						->whereBetween('spmb.created_at', [$mulai, $selesai])
						->whereIn('spmb.division_id', $division_ids)
						->whereIn('spmb_detail_payments.payment_type_id', $payment_types)
						->orderBy('division_id', 'asc')
						->orderBy('created_at', 'asc')
						->orderBy('payment_type_name', 'asc')
						->get();
		}


		$data['result'] = $result;

		return response()->json($data);
    }
}
