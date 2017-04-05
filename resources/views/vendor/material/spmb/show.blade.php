@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>SURAT PERMINTAAN MEMBELI BARANG<small>View SPMB</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
	            
        		@include('vendor.material.spmb.view')
        		@include('vendor.material.spmb.view-table')
	            @include('vendor.material.spmb.history')

	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <a href="{{ url('spmb') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>

    @include('vendor.material.spmb.detail-modal')
@endsection

@section('customjs')
<script src="{{ url('js/spmb/view-detail.js') }}"></script>
@endsection

