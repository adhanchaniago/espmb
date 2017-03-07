@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Company Management<small>View Company</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
	            <div class="form-group">
	                <label for="company_code" class="col-sm-2 control-label">Code</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="company_code" id="company_code" placeholder="Industry Code" required="true" maxlength="10" value="{{ $company->company_code }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="company_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="company_name" id="company_name" placeholder="Industry Name" required="true" maxlength="100" value="{{ $company->company_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	            	<label class="col-sm-2 control-label">Divisions</label>
	            	<div class="col-sm-10">
	            		@foreach($company->divisions as $row)
	            			<span class="badge">{{ $row->division_code . ' - ' . $row->division_name }}</span><br/>
	            		@endforeach
	            	</div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <a href="{{ url('master/company') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection