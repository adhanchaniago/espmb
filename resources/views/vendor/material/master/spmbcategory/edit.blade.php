@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>SPMB Categories Management<small>Edit SPMB Category</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/spmbcategory/'.$spmbcategory->spmb_category_id) }}">
        		{{ csrf_field() }}
        		<input type="hidden" name="_method" value="PUT">
	            <div class="form-group">
	                <label for="spmb_category_name" class="col-sm-2 control-label">SPMB Category Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="spmb_category_name" id="spmb_category_name" placeholder="SPMB Category Name" required="true" maxlength="100" value="{{ $spmbcategory->spmb_category_name }}">
	                    </div>
	                    @if ($errors->has('spmb_category_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('spmb_category_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/spmbcategory') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
@endsection