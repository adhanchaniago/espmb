<hr>
<br/>
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
				<th><center>Action</center></th>
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
				<td>
					<center>
						<a title="Lihat Detail" href="javascript:void(0)" class="btn btn-icon command-detail waves-effect waves-circle view-detail-spmb-item" data-detail-id="{{ $detail->spmb_detail_id }}" type="button"><span class="zmdi zmdi-more"></span></a>&nbsp;
						<a title="Pesan Dana" href="javascript:void(0)" class="btn btn-icon waves-effect waves-circle order-payment-spmb-item" data-detail-id="{{ $detail->spmb_detail_id }}" type="button"><span class="zmdi zmdi-money"></span></a>&nbsp;
					</center>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
<br/>
<hr/>

@section('customjs')
<script src="{{ url('js/spmb/view-detail.js') }}"></script>
<script src="{{ url('js/spmb/order-payment.js') }}"></script>
@endsection