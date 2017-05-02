<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\SPMB;
use Carbon\Carbon;

class TrackerController extends Controller
{
    public function index()
    {
        return view('vendor.material.public.tracker');
    }

    public function spmb(Request $request)
    {
    	$this->validate($request, [
            'spmb_no' => 'required',
            'spmb_token' => 'required|max:6'
        ]);

        $count = SPMB::where('spmb_no', $request->input('spmb_no'))->where('spmb_token', $request->input('spmb_token'))->count();

        if($count > 0) {
        	$data['spmb'] = SPMB::with(
                            'spmbtype',
                            'spmbtype.rules',
                            'division',
                            'division.company',
                            'spmbdetails',
                            'spmbdetails.itemcategory',
                            'spmbdetails.unit',
                            'spmbhistories',
                            'spmbhistories.approvaltype',
                            'rules',
                            '_pic',
                            '_currentuser'
                            )
        				->where('spmb_no', $request->input('spmb_no'))
        				->where('spmb_token', $request->input('spmb_token'))
        				->first();

            $data['flow_group_id'] = ($data['spmb']->spmb_method=='NORMAL') ? '1' : '2';

        	$data['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $data['spmb']->created_at)->format('d/m/Y');

        	return view('vendor.material.public.tracker-result', $data);
        }else{

        	$request->session()->flash('error_tracker', 'SPMB No / Token is invalid. Please try again!');

        	return redirect('public/tracker');
        }
    }
}
