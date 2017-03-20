@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>Vendor Management<small>Create New Vendor</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('vendor') }}">
        		{{ csrf_field() }}
	            <div class="form-group">
	                <label for="vendor_type_id" class="col-sm-2 control-label">Type</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="vendor_type_id" id="vendor_type_id" class="selectpicker" data-live-search="true" required="true">
	                        	<option value=""></option>
                                @foreach ($vendortypes as $row)
                                	{!! $selected = '' !!}
                                	@if($row->vendor_type_id==old('vendor_type_id'))
                                		{!! $selected = 'selected' !!}
                                	@endif
								    <option value="{{ $row->vendor_type_id }}" {{ $selected }}>{{ $row->vendor_type_name }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('vendor_type_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('vendor_type_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_name" class="col-sm-2 control-label">Vendor Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="vendor_name" id="vendor_name" placeholder="Vendor Name" required="true" maxlength="100" value="{{ old('vendor_name') }}">
	                    </div>
	                    @if ($errors->has('vendor_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('vendor_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="vendor_address" class="col-sm-2 control-label">Address</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<textarea name="vendor_address" class="form-control input-sm" id="vendor_address" placeholder="Vendor Address" required="true">{{ old('vendor_address') }}</textarea>
	            		</div>
	            	</div>
                    @if ($errors->has('vendor_address'))
		                <span class="help-block">
		                    <strong>{{ $errors->first('vendor_address') }}</strong>
		                </span>
		            @endif
	            </div>
	            <div class="form-group">
	                <label for="vendor_phone" class="col-sm-2 control-label">Phone No</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-mask" name="vendor_phone" id="vendor_phone" placeholder="Phone No" maxlength="14" value="{{ old('vendor_phone') }}" autocomplete="off" data-mask="00000000000000">
	                    </div>
	                    @if ($errors->has('vendor_phone'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('vendor_phone') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_fax" class="col-sm-2 control-label">Fax</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-mask" name="vendor_fax" id="vendor_fax" placeholder="Fax No" maxlength="14" value="{{ old('vendor_fax') }}" autocomplete="off" data-mask="00000000000000">
	                    </div>
	                    @if ($errors->has('vendor_fax'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('vendor_fax') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_email" class="col-sm-2 control-label">Email</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="email" class="form-control input-sm" name="vendor_email" id="vendor_email" placeholder="Email" required="true" maxlength="100" value="{{ old('vendor_email') }}">
	                    </div>
	                    @if ($errors->has('vendor_email'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('vendor_email') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="vendor_status" class="col-sm-2 control-label">Status</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                    	<div class="radio m-b-15">
	                    		<label>
		                        	<input type="radio" name="vendor_status" value="PERMANENT" {{ (old('vendor_status')=='PERMANENT') ? 'checked' : '' }}>
		                        	<i class="input-helper"></i>
		                        	PERMANENT
		                        </label>
	                    	</div>
	                    	<div class="radio m-b-15">
	                    		<label>
		                        	<input type="radio" name="vendor_status" value="ONE TIME" {{ (old('vendor_status')=='ONE TIME') ? 'checked' : '' }}>
		                        	<i class="input-helper"></i>
		                        	ONE TIME
		                        </label>
	                    	</div>
	                    </div>
	                    @if ($errors->has('vendor_status'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('vendor_status') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="term_of_payment_id" class="col-sm-2 control-label">TOP Type</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="term_of_payment_id" id="term_of_payment_id" class="selectpicker" data-live-search="true" required="true">
	                        	<option value=""></option>
                                @foreach ($termofpayments as $row)
                                	{!! $selected = '' !!}
                                	@if($row->term_of_payment_id==old('term_of_payment_id'))
                                		{!! $selected = 'selected' !!}
                                	@endif
								    <option value="{{ $row->term_of_payment_id }}" {{ $selected }}>{{ $row->term_of_payment_name }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('term_of_payment_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('term_of_payment_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>

	            <div class="form-group">
	                <label for="term_of_payment_value" class="col-sm-2 control-label">TOP Value (Days)</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-mask" name="term_of_payment_value" id="term_of_payment_value" placeholder="TOP Value" maxlength="3" value="{{ old('term_of_payment_value') }}" autocomplete="off" data-mask="000">
	                    </div>
	                    @if ($errors->has('term_of_payment_value'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('term_of_payment_value') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="vendor_note" class="col-sm-2 control-label">Notes</label>
	            	<div class="col-sm-10">
	            		<div class="fg-line">
	            			<textarea name="vendor_note" class="form-control input-sm" id="vendor_note" placeholder="Note">{{ old('vendor_note') }}</textarea>
	            		</div>
	            	</div>
                    @if ($errors->has('vendor_note'))
		                <span class="help-block">
		                    <strong>{{ $errors->first('vendor_note') }}</strong>
		                </span>
		            @endif
	            </div>
	            <div class="form-group">
	                <label for="item_category_id" class="col-sm-2 control-label">Item Categorie(s)</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="item_category_id[]" id="item_category_id" class="selectpicker" data-live-search="true" multiple required="true">
                                @foreach ($itemcategories as $row)
                                	{!! $selected = '' !!}
                                	@if(old('item_category_id'))
	                                	@foreach (old('item_category_id') as $key => $value)
	                                		@if($value==$row->item_category_id)
	                                			{!! $selected = 'selected' !!}
	                                		@endif
	                                	@endforeach
                                	@endif
								    <option value="{{ $row->item_category_id }}" {{ $selected }}>{{ $row->item_category_name }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('item_category_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('item_category_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="rating_id" class="col-sm-2 control-label">Rating(s)</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <select name="rating_id[]" id="rating_id" class="selectpicker" data-live-search="true" multiple required="true">
	                        	<!-- <option value=""></option> -->
                                @foreach ($ratings as $row)
                                	{!! $selected = '' !!}
                                	@if(old('rating_id'))
	                                	@foreach (old('rating_id') as $key => $value)
	                                		@if($value==$row->rating_id)
	                                			{!! $selected = 'selected' !!}
	                                		@endif
	                                	@endforeach
                                	@endif
								    <option value="{{ $row->rating_id }}" {{ $selected }}>{{ $row->rating_name }}</option>
								@endforeach
                            </select>
	                    </div>
	                    @if ($errors->has('rating_id'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('rating_id') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('rating') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('js/input-mask.min.js') }}"></script>
@endsection

@section('customjs')
<script src="{{ url('js/vendor/create.js') }}"></script>
@endsection