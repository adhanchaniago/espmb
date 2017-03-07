@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>SPMB Types Management<small>Edit SPMB Type</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/spmbtype/'.$spmbtype->spmb_type_id) }}">
        		{{ csrf_field() }}
        		<input type="hidden" name="_method" value="PUT">
	            <div class="form-group">
	                <label for="spmb_type_name" class="col-sm-2 control-label">SPMB Type Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="spmb_type_name" id="spmb_type_name" placeholder="SPMB Type Name" required="true" maxlength="100" value="{{ $spmbtype->spmb_type_name }}">
	                    </div>
	                    @if ($errors->has('spmb_type_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('spmb_type_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="rule_id" class="col-sm-2 control-label">Rule(s)</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="rule_id[]" id="rule_id" class="selectpicker" data-live-search="true" multiple required="true">
	                        	<!-- <option value=""></option> -->
                                @foreach ($rules as $row)
                                	{!! $selected = '' !!}
                                	@foreach ($spmbtype->rules as $rule)
                                		@if($rule->rule_id==$row->rule_id)
                                			{!! $selected = 'selected' !!}
                                		@endif
                                	@endforeach
								    <option value="{{ $row->rule_id }}" {{ $selected }}>{{ $row->rule_name }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('rule_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('rule_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/spmbtype') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
@endsection