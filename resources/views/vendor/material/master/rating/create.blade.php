@extends('vendor.material.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h2>Ratings Management<small>Create New Rating</small></h2></div>
        <div class="card-body card-padding">
        	<form class="form-horizontal" role="form" method="POST" action="{{ url('master/rating') }}">
        		{{ csrf_field() }}
	            <div class="form-group">
	                <label for="rating_name" class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <input type="text" class="form-control input-sm" name="rating_name" id="rating_name" placeholder="Rating  Name" required="true" maxlength="100" value="{{ old('rating_name') }}">
	                    </div>
	                    @if ($errors->has('rating_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('rating_name') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="rating_desc" class="col-sm-2 control-label">Description</label>
	                <div class="col-sm-10">
	                    <div class="fg-line">
	                        <textarea name="rating_desc" id="rating_desc" class="form-control input-sm" placeholder="Description">{{ old('rating_desc') }}</textarea>
	                    </div>
	                    @if ($errors->has('rating_desc'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('rating_desc') }}</strong>
			                </span>
			            @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	                    <a href="{{ url('master/rating') }}" class="btn btn-danger btn-sm">Back</a>
	                </div>
	            </div>
	        </form>
        </div>
    </div>
@endsection