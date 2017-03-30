@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>SURAT PERMINTAAN MEMBELI BARANG<small>View SPMB</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
        		{{ csrf_field() }}
	            <div class="form-group">
	                <label for="spmb_type_id" class="col-sm-2 control-label">Type</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                    	<input type="text" name="spmb_no" id="spmb_no" class="form-control input-sm" placeholder="SPMB Type" value="{{ $spmb->spmbtype->spmb_type_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_no" class="col-sm-2 control-label">SPMB No</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_no" id="spmb_no" class="form-control input-sm" placeholder="SPMB No" value="{{ $spmb->spmb_no }}" disabled="true">
	            		</div>
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_no_pr_sap" class="col-sm-2 control-label">No PR SAP</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_no_pr_sap" id="spmb_no_pr_sap" class="form-control input-sm" placeholder="No PR SAP" maxlength="20" value="{{ $spmb->spmb_no_pr_sap }}" disabled="true">
	            		</div>
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_group" class="col-sm-2 control-label">Kelompok</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_group" id="spmb_group" class="form-control input-sm" placeholder="Kelompok" maxlength="50" value="{{ $spmb->spmb_group }}" disabled="true">
	            		</div>
	            	</div>
	            </div>
	            <div class="form-group">
	                <label for="company_id" class="col-sm-2 control-label">PT/Yayasan</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" name="company" id="company" class="form-control input-sm" placeholder="PT/Yayasan" value="{{ $spmb->division->company->company_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="division_id" class="col-sm-2 control-label">Suku Usaha/Divisi</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" name="division" id="division" class="form-control input-sm" placeholder="Divisi" value="{{ $spmb->division->division_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_cost_center" class="col-sm-2 control-label">Bagian/Seksi</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_cost_center" id="spmb_cost_center" class="form-control input-sm" placeholder="Cost Center" maxlength="20" value="{{ $spmb->spmb_cost_center }}" disabled="true">
	            		</div>
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_io_no" class="col-sm-2 control-label">No I/O DIPK</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_io_no" id="spmb_io_no" class="form-control input-sm" placeholder="No I/O DIPK" maxlength="20" value="{{ $spmb->spmb_io_no }}" disabled="true">
	            		</div>
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_buyer_no" class="col-sm-2 control-label">No Pemesan</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_buyer_no" id="spmb_buyer_no" class="form-control input-sm" placeholder="No Pemesan" maxlength="20" value="{{ $spmb->spmb_buyer_no }}" disabled="true">
	            		</div>
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_applicant_name" class="col-sm-2 control-label">Nama Pemesan</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="text" name="spmb_applicant_name" id="spmb_applicant_name" class="form-control input-sm" placeholder="Nama Pemesan" maxlength="50" value="{{ $spmb->spmb_applicant_name }}" disabled="true">
	            		</div>
	            	</div>
	            </div>
	            <div class="form-group">
	            	<label for="spmb_applicant_email" class="col-sm-2 control-label">E-mail Pemesan</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<input type="email" name="spmb_applicant_email" id="spmb_applicant_email" class="form-control input-sm" placeholder="E-mail Pemesan" maxlength="100" value="{{ $spmb->spmb_applicant_email }}" disabled="true">
	            		</div>
	            	</div>
	            </div>
	            <hr>
	            <br/>
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
	            	@foreach($spmb->spmbdetails as $detail)
	            		<tr>
	            			<td>{{ $detail->spmb_detail_account_no }}</td>
	            			<td><center>{{ $detail->spmb_detail_sequence_no }}<center/></td>
	            			<td>{{ $detail->spmb_detail_item_name }}</td>
	            			<td>{{ $detail->unit->unit_name }}</td>
	            			<td><center>{{ $detail->spmb_detail_qty }}<center></td>
	            			<td>{{ $detail->spmb_detail_note }}</td>
	            		</tr>
	            	@endforeach
	            	</tbody>
	            </table>
	            <br/>
	            <hr/>
	            <br/>
	            <div class="form-group">
	                <label for="pic" class="col-sm-2 control-label">PIC</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" name="pic" id="pic" class="form-control input-sm" placeholder="PIC" value="{{ $spmb->_pic->user_firstname . ' ' . $spmb->_pic->user_lastname }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="current" class="col-sm-2 control-label">Current Position</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" name="current" id="current" class="form-control input-sm" placeholder="Current Position" value="{{ $spmb->_currentuser->user_firstname . ' ' . $spmb->_currentuser->user_lastname }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="created" class="col-sm-2 control-label">Created By</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" name="created" id="created" class="form-control input-sm" placeholder="Created By" value="{{ $spmb->_created->user_firstname . ' ' . $spmb->_created->user_lastname }}" disabled="true">
	                    </div>
	                </div>
	            </div>

	            @include('vendor.material.spmb.history')

	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <a href="{{ url('spmb') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection