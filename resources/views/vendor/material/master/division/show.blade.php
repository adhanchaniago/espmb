@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Division/Unit Management<small>View Division/Unit</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
        		<div class="form-group">
	                <label for="company_id" class="col-sm-2 control-label">Company</label>
	                <div class="col-sm-7">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="company_id" id="company_id" placeholder="Company" required="true" value="{{ $division->company->company_code . ' - ' . $division->company->company_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="division_code" class="col-sm-2 control-label">Cost Center</label>
	                <div class="col-sm-7">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="division_code" id="division_code" placeholder="Cost Center" required="true" maxlength="10" value="{{ $division->division_code }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="division_name" class="col-sm-2 control-label">Unit Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="division_name" id="division_name" placeholder="Unit Name" required="true" maxlength="100" value="{{ $division->division_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <a href="{{ url('master/division') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection