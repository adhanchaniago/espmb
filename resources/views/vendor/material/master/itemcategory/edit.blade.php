@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Item Categories Management<small>Edit Item Category</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/itemcategory/'.$itemcategory->item_category_id) }}">
        		{{ csrf_field() }}
        		<input type="hidden" name="_method" value="PUT">
	            <div class="form-group">
	                <label for="item_category_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="item_category_name" id="item_category_name" placeholder="Item Category Name" required="true" maxlength="100" value="{{ $itemcategory->item_category_name }}">
	                    </div>
	                    @if ($errors->has('item_category_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('item_category_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="item_category_desc" class="col-sm-2 control-label">Description</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="item_category_desc" id="item_category_desc" class="form-control input-sm" placeholder="Description">{{ $itemcategory->item_category_desc }}</textarea>
	                    </div>
	                    @if ($errors->has('item_category_desc'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('item_category_desc') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/itemcategory') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection