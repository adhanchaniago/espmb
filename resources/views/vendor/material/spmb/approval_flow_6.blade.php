@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ url('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>SURAT PERMINTAAN MEMBELI BARANG<small>Pembuatan Kontrak/PO</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('spmb/approve/' . $spmb->flow_no . '/' . $spmb->spmb_id) }}">
                {{ csrf_field() }}
	            
        		@include('vendor.material.spmb.view')
        		@include('vendor.material.spmb.approval_flow_6-table')
	            @include('vendor.material.spmb.history')

                <div class="form-group">
                    <label for="pic" class="col-sm-2 control-label">MIGO Officer</label>
                    <div class="col-sm-10">
                        <div class="fg-line">
                            <select name="pic" id="pic" class="selectpicker" data-live-search="true" required>
                                <option value=""></option>
                                @foreach ($pics as $row)
                                    {!! $selected = '' !!}
                                    @if($row->user_id==old('pic'))
                                        {!! $selected = 'selected' !!}
                                    @endif
                                    <option value="{{ $row->user_id }}" {{ $selected }}>{{ $row->user_firstname . ' ' . $row->user_lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
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
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ url('js/input-mask.min.js') }}"></script>
@endsection