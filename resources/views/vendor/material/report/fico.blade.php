@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ url('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>FICO Report<small>Generate report</small></h2></div>
        <div class="card-body card-padding">
        	<div class="row">
        		<div class="col-md-3">
        			<div role="tabpanel">
			            <ul class="tab-nav" role="tablist">
			                <li class="active"><a href="#filtersection" aria-controls="filtersection" role="tab" data-toggle="tab">Filter</a></li>
			            </ul>
			            <div class="tab-content">
				            <div role="tabpanel" class="tab-pane active" id="filtersection">
				            	<form class="form" role="form" action="javascript:void(0)">
				            		<div class="form-group">
						                <label for="period_type">Report Type</label>
						                <select name="report_type" id="report_type" class="form-control input-sm selectpicker" data-live-search="true">
						                	<option value=""></option>
			                                <option value="daily">Daily</option>
			                                <option value="monthly">Monthly</option>
			                                <option value="yearly">Yearly</option>
			                                <option value="period">2 Period</option>
			                            </select>
						            </div>
						            <div class="form-group" id="container_daily">
						                <label for="period_daily">Date</label>
					                    <div class="fg-line">
					                        <input type="text" class="form-control input-sm date-picker" name="period_daily" id="period_daily" placeholder="e.g 17/08/1945" maxlength="10" value="">
					                    </div>
						            </div>
						            <div class="form-group" id="container_month">
						                <label for="period_month">Month</label>
						                <select name="period_month" id="period_month" class="form-control input-sm selectpicker" data-live-search="true">
						                	<option value=""></option>
			                                <option value="01">January</option>
			                                <option value="02">February</option>
			                                <option value="03">March</option>
			                                <option value="04">April</option>
			                                <option value="05">May</option>
			                                <option value="06">June</option>
			                                <option value="07">July</option>
			                                <option value="08">August</option>
			                                <option value="09">September</option>
			                                <option value="10">October</option>
			                                <option value="11">November</option>
			                                <option value="12">December</option>
			                            </select>
						            </div>
						            <div class="form-group" id="container_year">
						                <label for="periode_year">Year</label>
					                    <div class="fg-line">
					                        <input type="text" class="form-control input-sm" name="period_year" id="period_year" placeholder="e.g 1945" maxlength="4" value="">
					                    </div>
						            </div>
						            <div class="form-group" id="container_period_start">
						                <label for="periode_start">Period Start</label>
					                    <div class="fg-line">
					                        <input type="text" class="form-control input-sm date-picker" name="period_start" id="period_start" placeholder="Period Start e.g 17/08/1945" maxlength="10" value="">
					                    </div>
						            </div>
						            <div class="form-group" id="container_period_end">
						                <label for="periode_end">Period End</label>
					                    <div class="fg-line">
					                        <input type="text" class="form-control input-sm date-picker" name="period_end" id="period_end" placeholder="Period End e.g 17/08/1945" maxlength="10" value="">
					                    </div>
						            </div>
						            <div class="form-group">
						                <label for="division_ids">Division</label>
						                <select name="division_ids[]" id="division_ids" class="form-control input-sm selectpicker" data-live-search="true" multiple="true">
			                                @foreach($divisions as $division)
			                                <option value="{{ $division->division_id }}">{{ $division->company->company_name . ' - ' . $division->division_name }}</option>
			                                @endforeach
			                            </select>
						            </div>
						            <div class="form-group">
						                <label for="payment_types">Payment Type</label>
						                <select name="payment_types[]" id="payment_types" class="form-control input-sm selectpicker" data-live-search="true" multiple="true">
			                                @foreach($payment_types as $payment_type)
			                                <option value="{{ $payment_type->payment_type_id }}">{{ $payment_type->payment_type_name }}</option>
			                                @endforeach
			                            </select>
						            </div>
						            <div class="form-group">
						                <label for="payment_status">Payment Status</label>
						                <select name="payment_status" id="payment_status" class="form-control input-sm selectpicker" data-live-search="true">
						                	<option value="">All</option>
			                                <option value="1">Completed</option>
			                                <option value="0">Waiting Payment</option>
			                            </select>
						            </div>
						            <div class="form-group">
						            	<button id="btn_generate_report" class="btn btn-primary waves-effect">Generate</button>
						            	<button id="btn_clear_report" class="btn btn-danger waves-effect">Clear</button>
						            </div>
						            <div class="form-group">
						            	<button id="btn_export_report" class="btn btn-success waves-effect">Export Result</button>
						            </div>
				            	</form>
				            </div>
				        </div>
				    </div>
        		</div>
        		<div class="col-md-9">
        			<div role="tabpanel">
			            <ul class="tab-nav" role="tablist">
			                <li class="active"><a href="#resultsection" aria-controls="resultsection" role="tab" data-toggle="tab">Result</a></li>
			            </ul>
			            <div class="tab-content">
				            <div role="tabpanel" class="tab-pane active" id="resultsection">
				            	<div class="table-responsive">
							        <table id="grid-data-result" class="table table-hover">
							            <thead>
							                <tr>
							                    <th>COMPANY</th>
							                    <th>DIVISION</th>
							                    <th>DATE</th>
							                    <th>SPMB NO</th>
							                    <th>PAYMENT AMOUNT</th>
							                    <th>PAYMENT TYPE</th>
							                    <th>PAYMENT STATUS</th>
							                    <th>REQUEST DATE</th>
							                    <th>TRANSFER DATE</th>
							                    <th>REALIZATION DATE</th>
							                    <th>PIC</th>
							                </tr>
							            </thead>
							            <tbody>
							            </tbody>
							        </table>
							    </div>
				            </div>
				        </div>
				    </div>
        		</div>
        	</div>
        </div>
    </div>
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('js/jquery.table2excel.js') }}"></script>
<script src="{{ url('js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection

@section('customjs')
<script src="{{ url('js/report/fico.js') }}"></script>
@endsection