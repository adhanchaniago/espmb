@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>Division Management<small>Edit Division</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/division/'.$division->division_id) }}">
        		{{ csrf_field() }}
        		<input type="hidden" name="_method" value="PUT">
        		<div class="form-group">
	                <label for="company_id" class="col-sm-2 control-label">Company</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="company_id" id="company_id" class="selectpicker" data-live-search="true" required="true">
                                @foreach ($company as $row)
                                	{!! $selected = '' !!}
                                	@if($row->company_id==$division->company_id)
                                		{!! $selected = 'selected' !!}
                                	@endif
								    <option value="{{ $row->company_id }}" {{ $selected }}>{{ $row->company_code . ' - ' . $row->company_name  }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('company_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('company_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="division_code" class="col-sm-2 control-label">Division Code</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="division_code" id="division_code" placeholder="Division Code" required="true" maxlength="10" value="{{ $division->division_code }}">
	                    </div>
	                    @if ($errors->has('division_code'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('division_code') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="division_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="division_name" id="division_name" placeholder="Division Name" required="true" maxlength="100" value="{{ $division->division_name }}">
	                    </div>
	                    @if ($errors->has('division_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('division_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/division') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
@endsection