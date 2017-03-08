@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Vendor Types Management<small>Edit Vendor Type</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/vendortype/'.$vendortype->vendor_type_id) }}">
        		{{ csrf_field() }}
        		<input type="hidden" name="_method" value="PUT">
	            <div class="form-group">
	                <label for="vendor_type_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="vendor_type_name" id="vendor_type_name" placeholder="Rule Name" required="true" maxlength="100" value="{{ $vendortype->vendor_type_name }}">
	                    </div>
	                    @if ($errors->has('vendor_type_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('vendor_type_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_type_desc" class="col-sm-2 control-label">Description</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="vendor_type_desc" id="vendor_type_desc" class="form-control input-sm" placeholder="Description">{{ $vendortype->vendor_type_desc }}</textarea>
	                    </div>
	                    @if ($errors->has('vendor_type_desc'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('vendor_type_desc') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/vendortype') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection