<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Gate;
use App\Http\Requests;
use App\Company;
use App\Division;
use App\User;

use DB;

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

		//dd($report_type);

		if($report_type=='daily') {

		}elseif($report_type=='monthly') {

		}elseif($report_type=='yearly') {
			
		}elseif($report_type=='period') {
			
		}else{
			$result = DB::raw("SELECT 
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
									ORDER BY division_id,created_at,spmb_no,revision,created_by,pic");

			$result = DB::table('spmb')
							->select(DB::raw("spmb.*,
									    company_name,
									    division_code,
									    division_name,
									    author.user_firstname AS author_firstname,
									    author.user_lastname AS author_lastname,
									    pic.user_firstname AS pic_firstname,
									    pic.user_lastname AS pic_lastname,
									    (SELECT SUM(spmb_detail_item_price * spmb_detail_qty) FROM spmb_details WHERE spmb_id = spmb.spmb_id) AS total_price"))
							->join('divisions', 'divisions.division_id', '=', 'spmb.division_id')
							->join('companies', 'companies.company_id', '=', 'divisions.company_id')
							->join('users AS author', 'author.user_id', '=', 'spmb.created_by')
							->leftJoin('users AS pic', 'pic.user_id', '=', 'spmb.pic')
							->where('spmb.active', '1')
							->orderBy('division_id', 'asc')
							->orderBy('created_at', 'asc')
							->orderBy('spmb_no', 'asc')
							->orderBy('revision', 'asc')
							->orderBy('author.user_firstname', 'asc')
							->orderBy('pic.user_firstname', 'asc')
							->get();
		}

		$data['result'] = $result;

		return response()->json($data);
    }
}
