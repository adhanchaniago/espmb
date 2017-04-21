@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>SURAT PERMINTAAN MEMBELI BARANG<small>Edit SPMB</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('spmb/' . $spmb->spmb_id) }}">
        		{{ csrf_field() }}
        		<input type="hidden" name="_method" value="PUT">
	            <div class="form-group">
	                <label for="spmb_type_id" class="col-sm-2 control-label">Type</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="spmb_type_id" id="spmb_type_id" class="selectpicker" data-live-search="true" required="true">
	                        	<option value=""></option>
                                @foreach ($spmb_types as $row)
                                	{!! $selected = '' !!}
                                	@if($row->spmb_type_id==$spmb->spmb_type_id)
                                		{!! $selected = 'selected' !!}
                                	@endif
								    <option value="{{ $row->spmb_type_id }}" {{ $selected }}>{{ $row->spmbcategory->spmb_category_name . ' - ' . $row->spmb_type_name }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('spmb_type_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('spmb_type_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_no" class="col-sm-2 control-label">SPMB No</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_no" id="spmb_no" class="form-control input-sm" placeholder="SPMB No" maxlength="20" value="{{ $spmb->spmb_no }}" readonly="true">
	            		</div>
	            		@if ($errors->has('spmb_no'))
	            			<span class="help-block">
	            				<strong>{{ $errors->first('spmb_no') }}</strong>
	            			</span>
	            		@endif
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_no_pr_sap" class="col-sm-2 control-label">No PR SAP</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_no_pr_sap" id="spmb_no_pr_sap" class="form-control input-sm" placeholder="No PR SAP" maxlength="20" value="{{ $spmb->spmb_no_pr_sap }}">
	            		</div>
	            		@if ($errors->has('spmb_no_pr_sap'))
	            			<span class="help-block">
	            				<strong>{{ $errors->first('spmb_no_pr_sap') }}</strong>
	            			</span>
	            		@endif
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_group" class="col-sm-2 control-label">Kelompok</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_group" id="spmb_group" class="form-control input-sm" placeholder="Kelompok" maxlength="50" value="{{ $spmb->spmb_group }}">
	            		</div>
	            		@if ($errors->has('spmb_group'))
	            			<span class="help-block">
	            				<strong>{{ $errors->first('spmb_group') }}</strong>
	            			</span>
	            		@endif
	            	</div>
	            </div>
	            <div class="form-group">
	                <label for="company_id" class="col-sm-2 control-label">PT/Yayasan</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="company_id" id="company_id" class="selectpicker" data-live-search="true" required="true">
	                        	<option value=""></option>
                                @foreach ($companies as $row)
                                	{!! $selected = '' !!}
                                	@if($row->company_id==$spmb->division->company_id)
                                		{!! $selected = 'selected' !!}
                                	@endif
								    <option value="{{ $row->company_id }}" {{ $selected }}>{{ $row->company_name }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('company_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('company_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="division_id" class="col-sm-2 control-label">Suku Usaha/Divisi</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="division_id" id="division_id" class="selectpicker" data-live-search="true" required="true">
	                        	<option value="{{ $spmb->division_id }}" selected>{{ $spmb->division->division_name }}</option>
                            </select>
	                    </div>
	                    @if ($errors->has('division_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('division_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_cost_center" class="col-sm-2 control-label">Bagian/Seksi</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_cost_center" id="spmb_cost_center" class="form-control input-sm" placeholder="Cost Center" maxlength="20" value="{{ $spmb->spmb_cost_center }}" required="true">
	            		</div>
	            		@if ($errors->has('spmb_cost_center'))
	            			<span class="help-block">
	            				<strong>{{ $errors->first('spmb_cost_center') }}</strong>
	            			</span>
	            		@endif
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_io_no" class="col-sm-2 control-label">No I/O DIPK</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_io_no" id="spmb_io_no" class="form-control input-sm" placeholder="No I/O DIPK" maxlength="20" value="{{ $spmb->spmb_io_no }}" required="true">
	            		</div>
	            		@if ($errors->has('spmb_io_no'))
	            			<span class="help-block">
	            				<strong>{{ $errors->first('spmb_io_no') }}</strong>
	            			</span>
	            		@endif
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_buyer_no" class="col-sm-2 control-label">No Pemesan</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_buyer_no" id="spmb_buyer_no" class="form-control input-sm" placeholder="No Pemesan" maxlength="20" value="{{ $spmb->spmb_buyer_no }}" required="true">
	            		</div>
	            		@if ($errors->has('spmb_buyer_no'))
	            			<span class="help-block">
	            				<strong>{{ $errors->first('spmb_buyer_no') }}</strong>
	            			</span>
	            		@endif
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_applicant_name" class="col-sm-2 control-label">Nama Pemesan</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_applicant_name" id="spmb_applicant_name" class="form-control input-sm" placeholder="Nama Pemesan" maxlength="50" value="{{ $spmb->spmb_applicant_name }}" required="true">
	            		</div>
	            		@if ($errors->has('spmb_applicant_name'))
	            			<span class="help-block">
	            				<strong>{{ $errors->first('spmb_applicant_name') }}</strong>
	            			</span>
	            		@endif
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_applicant_email" class="col-sm-2 control-label">E-mail Pemesan</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="email" name="spmb_applicant_email" id="spmb_applicant_email" class="form-control input-sm" placeholder="E-mail Pemesan" maxlength="100" value="{{ $spmb->spmb_applicant_email }}" required="true">
	            		</div>
	            		@if ($errors->has('spmb_applicant_email'))
	            			<span class="help-block">
	            				<strong>{{ $errors->first('spmb_applicant_email') }}</strong>
	            			</span>
	            		@endif
	            	</div>
	            </div>
	            <hr>
	            <a href="javascript:void(0)" class="btn btn-primary btn-sm waves-effect command-add-spmb-detail">Tambah Barang</a>
	            <br/><br/>
	            <div class="table-responsive">
		            <table id="tabel_detail_spmb" class="table table-bordered table-hover">
		            	<thead>
		            		<tr>
		            			<th><center>No. Acc<center></th>
		            			<th><center>No.</center></th>
		            			<th><center>Nama Barang</center></th>
		            			<th><center>Satuan</center></th>
		            			<th><center>Qty</center></th>
		            			<th><center>Keterangan</center></th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            	</tbody>
		            </table>
	            </div>
	            <br/>
	            <hr/>
	            <div class="form-group">
	            	<label for="spmb_rules" class="col-sm-2 control-label">Persyaratan</label>
	            	<div class="col-sm-10" id="spmb_rules_container">
	            		
	            	</div>
	            </div>
	            <hr/>
	            <br/>
	            <div class="form-group" id="pic_container">
	                <label for="pic" class="col-sm-2 control-label">PIC</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="pic" id="pic" class="selectpicker" data-live-search="true">
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
	                    @if ($errors->has('pic'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('pic') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="notes" class="col-sm-2 control-label">Pesan</label>
	            	<div class="col-sm-10">
	            		<textarea name="notes" id="notes" class="form-control input-sm" placeholder="Ketikan pesan Anda disini" required="true">{{ old('notes') }}</textarea>
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

    @include('vendor.material.spmb.modal')
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('js/input-mask.min.js') }}"></script>
@endsection

@section('customjs')
<script src="{{ url('js/spmb/create.js') }}"></script>
@endsection