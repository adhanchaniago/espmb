@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-body card-padding">
        	<h3>Sorry, <u><i>{{ $spmb_no }}</i></u> not found</h3>
        	<p>Please check your SPMB No for better result.</p>
        </div>
    </div>
@endsection