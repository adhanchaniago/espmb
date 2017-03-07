@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Rules Management<small>Edit Rule</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/rule/'.$rule->rule_id) }}">
        		{{ csrf_field() }}
        		<input type="hidden" name="_method" value="PUT">
	            <div class="form-group">
	                <label for="rule_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="rule_name" id="rule_name" placeholder="Rule Name" required="true" maxlength="100" value="{{ $rule->rule_name }}">
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
	                        <textarea name="rule_desc" id="rule_desc" class="form-control input-sm" placeholder="Description">{{ $rule->rule_desc }}</textarea>
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