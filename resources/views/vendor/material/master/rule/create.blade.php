@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Rules Management<small>Create New Rule</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/rule') }}">
        		{{ csrf_field() }}
	            <div class="form-group">
	                <label for="rule_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="rule_name" id="rule_name" placeholder="Rule Name" required="true" maxlength="100" value="{{ old('rule_name') }}">
	                    </div>
	                    @if ($errors->has('rule_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('rule_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="rule_desc" class="col-sm-2 control-label">Description</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="rule_desc" id="rule_desc" class="form-control input-sm" placeholder="Description">{{ old('rule_desc') }}</textarea>
	                    </div>
	                    @if ($errors->has('rule_desc'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('rule_desc') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/rule') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection