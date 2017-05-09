@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Vendor Management<small>View Vendor</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form">
	            <div class="form-group">
	                <label for="vendor_type_id" class="col-sm-2 control-label">Type</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="Vendor Type Name" required="true" maxlength="100" value="{{ $vendor->vendortype->vendor_type_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_name" class="col-sm-2 control-label">Vendor Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="vendor_name" id="vendor_name" placeholder="Vendor Name" required="true" maxlength="100" value="{{ $vendor->vendor_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="vendor_address" class="col-sm-2 control-label">Address</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<textarea name="vendor_address" class="form-control input-sm" id="vendor_address" placeholder="Vendor Address" required="true" disabled="true">{{ $vendor->vendor_address }}</textarea>
	            		</div>
	            	</div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_phone" class="col-sm-2 control-label">Phone No</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-mask" name="vendor_phone" id="vendor_phone" placeholder="Phone No" maxlength="14" value="{{ $vendor->vendor_phone }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_fax" class="col-sm-2 control-label">Fax</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-mask" name="vendor_fax" id="vendor_fax" placeholder="Fax No" maxlength="14" value="{{ $vendor->vendor_fax }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_email" class="col-sm-2 control-label">Email</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="vendor_email" id="vendor_email" placeholder="Email" required="true" maxlength="100" value="{{ $vendor->vendor_email }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_status" class="col-sm-2 control-label">Status</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                    	<span class="badge">{{ $vendor->vendor_status }}</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="term_of_payment_id" class="col-sm-2 control-label">TOP Type</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" placeholder="TOP Type" required="true" maxlength="100" value="{{ $vendor->termofpayment->term_of_payment_name }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="term_of_payment_value" class="col-sm-2 control-label">TOP Value (Days)</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-mask" name="term_of_payment_value" id="term_of_payment_value" placeholder="TOP Value" maxlength="3" value="{{ $vendor->term_of_payment_value }}" disabled="true">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="vendor_note" class="col-sm-2 control-label">Notes</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<textarea name="vendor_note" class="form-control input-sm" id="vendor_note" placeholder="Note" disabled="true">{{ $vendor->vendor_note }}</textarea>
	            		</div>
	            	</div>
	            </div>
	            <div class="form-group">
	                <label for="item_category_id" class="col-sm-2 control-label">Item Categories</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                    	@foreach($vendor->itemcategories as $row)
	                    		<span class="badge">{{ $row->item_category_name }}</span><br/>
	                    	@endforeach
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="rating_id" class="col-sm-2 control-label">Rating(s)</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                    	@foreach($vendor->ratings as $row)
	                    		<span class="badge">{{ $row->rating_name }} = &nbsp;{{ number_format($vendor->_avg_rating($row->rating_id, $vendor->vendor_id), 2) }}</span><br/>
	                    	@endforeach
	                    </div>
	                    @if ($errors->has('rating_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('rating_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <hr>
				<br/>
				<h5>Last 10 Transactions</h5>
				<div class="table-responsive">
					<table id="tabel_last_transaction" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><center>SPMB No<center></th>
								<th><center>Item Name</center></th>
								<th><center>Qty</center></th>
								<th><center>Offer Price</center></th>
								<th><center>Deal Price</center></th>
								<th><center>Note</center></th>
							</tr>
						</thead>
						<tbody>
						@foreach($vendor->spmbdetailvendors as $detailvendor)
							<tr>
								<td><center>{{ $detailvendor->spmbdetail->spmb->spmb_no }}</center></td>
								<td>{{ $detailvendor->spmbdetail->spmb_detail_item_name }}</td>
								<td><center>{{ $detailvendor->spmbdetail->spmb_detail_qty }}<center></td>
								<td><center>{{ number_format($detailvendor->spmb_detail_vendor_offer_price) }}<center></td>
								<td><center>{{ number_format($detailvendor->spmb_detail_vendor_deal_price) }}<center></td>
								<td>{{ $detailvendor->spmbdetail->spmb_detail_note }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				<br/>
				<hr/>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <a href="{{ url('vendor') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection