@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>SURAT PERMINTAAN MEMBELI BARANG PO BELAKANG<small>View SPMB PO Belakang</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
	            
        		@include('vendor.material.otherspmb.view')
        		@include('vendor.material.otherspmb.view-table')
	            @include('vendor.material.otherspmb.history')

	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <a href="{{ url('otherspmb') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>

    @include('vendor.material.otherspmb.detail-modal')
@endsection

@section('customjs')
<script src="{{ url('js/otherspmb/view-detail.js') }}"></script>
@endsection

