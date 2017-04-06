@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>SPMB Categories Management<small>View SPMB Category</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
	            <div class="form-group">
	                <label for="spmb_category_name" class="col-sm-2 control-label">SPMB Category Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="spmb_category_name" id="spmb_category_name" placeholder="SPMB Category Name" required="true" maxlength="100" value="{{ $spmbcategory->spmb_category_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	            	<label class="col-sm-2 control-label">SPMB Type</label>
	            	<div class="col-sm-10">
	            		@foreach($spmbcategory->spmbtypes as $row)
	            			<span class="badge">{{ $row->spmb_type_name }}</span><br/>
	            		@endforeach
	            	</div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <a href="{{ url('master/spmbcategory') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection