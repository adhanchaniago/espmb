@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Company Management<small>Create New Company</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/company') }}">
        		{{ csrf_field() }}
        		<div class="form-group">
	                <label for="company_code" class="col-sm-2 control-label">Code</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="company_code" id="company_code" placeholder="Industry Code" required="true" maxlength="5" value="{{ old('company_code') }}">
	                    </div>
	                    @if ($errors->has('company_code'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('company_code') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="company_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="company_name" id="company_name" placeholder="Industry Name" required="true" maxlength="100" value="{{ old('company_name') }}">
	                    </div>
	                    @if ($errors->has('company_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('company_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/company') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection