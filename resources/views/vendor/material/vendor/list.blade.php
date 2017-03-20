@extends('vendor.material.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Vendor Management<small>List of all vendors</small></h2>
        <a href="{{ url('vendor/create') }}" title="Create New Vendor"><button class="btn bgm-blue btn-float waves-effect"><i class="zmdi zmdi-plus"></i></button></a>
    </div>

    <div class="table-responsive">
        <table id="grid-data" class="table table-hover">
            <thead>
                <tr>
                    <th data-column-id="vendor_type_name" data-order="asc">Type</th>
                    <th data-column-id="vendor_name" data-order="asc">Vendor Name</th>
                    <th data-column-id="vendor_email" data-order="asc">Email</th>
                    <th data-column-id="vendor_phone" data-order="asc">Phone</th>
                    <th data-column-id="vendor_status" data-order="asc">Status</th>
                    @can('Vendor Management-Update')
                        @can('Vendor Management-Delete')
                            <th data-column-id="link" data-formatter="link-rud" data-sortable="false">Action</th>
                        @else
                            <th data-column-id="link" data-formatter="link-ru" data-sortable="false">Action</th>
                        @endcan
                    @else
                        @can('Vendor Management-Delete')
                            <th data-column-id="link" data-formatter="link-rd" data-sortable="false">Action</th>
                        @else
                            <th data-column-id="link" data-formatter="link-r" data-sortable="false">Action</th>
                        @endcan
                    @endcan
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>    
@endsection

@section('customjs')
<script src="{{ url('js/vendor/vendor.js') }}"></script>
@endsection