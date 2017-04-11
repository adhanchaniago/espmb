@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>SURAT PERMINTAAN MEMBELI BARANG<small>Pencarian Vendor</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('spmb/approve/' . $spmb->flow_no . '/' . $spmb->spmb_id) }}">
                {{ csrf_field() }}
	            
        		@include('vendor.material.spmb.view')
        		@include('vendor.material.spmb.approval_flow_2-table')
	            @include('vendor.material.spmb.history')


                <div class="form-group">
                    <label for="comment" class="col-sm-2 control-label">Comment</label>
                    <div class="col-sm-10">
                        <div class="fg-line">
                            <textarea name="comment" id="comment" class="form-control input-sm" placeholder="Comment" required="true">{{ old('comment') }}</textarea>
                        </div>
                    </div>
                </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('spmb') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>

    @include('vendor.material.spmb.detail-modal')
    @include('vendor.material.spmb.search-vendor-modal')
    @include('vendor.material.spmb.select-vendor-modal')
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('js/input-mask.min.js') }}"></script>
@endsection