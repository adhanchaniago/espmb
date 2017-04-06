@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>SPMB Types Management<small>View SPMB Type</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
        		<div class="form-group">
	                <label for="spmb_category_name" class="col-sm-2 control-label">Category</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="spmb_category_name" id="spmb_category_name" placeholder="SPMB Category Name" required="true" maxlength="100" value="{{ $spmbtype->spmbcategory->spmb_category_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="spmb_type_name" class="col-sm-2 control-label">SPMB Type Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="spmb_type_name" id="spmb_type_name" placeholder="SPMB Type Name" required="true" maxlength="100" value="{{ $spmbtype->spmb_type_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	            	<label class="col-sm-2 control-label">Rule(s)</label>
	            	<div class="col-sm-10">
	            		@foreach($spmbtype->rules as $row)
	            			<span class="badge">{{ $row->rule_name }}</span><br/>
	            		@endforeach
	            	</div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <a href="{{ url('master/spmbtype') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection