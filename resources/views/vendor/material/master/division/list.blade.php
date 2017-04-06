@extends('vendor.material.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Division/Unit Management<small>List of all division/unit</small></h2>
        @can('Division/Unit Management-Create')
        <a href="{{ url('master/division/create') }}" title="Create New Division"><button class="btn bgm-blue btn-float waves-effect"><i class="zmdi zmdi-plus"></i></button></a>
        @endcan
    </div>

    <div class="table-responsive">
        <table id="grid-data" class="table table-hover">
            <thead>
                <tr>
                    <th data-column-id="division_code" data-order="asc">Cost Center</th>
                    <th data-column-id="company_name" data-order="asc">Company</th>
                    <th data-column-id="division_name" data-order="asc">Unit Name</th>
                    @can('Division/Unit Management-Update')
                        @can('Division/Unit Management-Delete')
                            <th data-column-id="link" data-formatter="link-rud" data-sortable="false">Action</th>
                        @else
                            <th data-column-id="link" data-formatter="link-ru" data-sortable="false">Action</th>
                        @endcan
                    @else
                        @can('Division/Unit Management-Delete')
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
<script src="{{ url('js/master/division.js') }}"></script>
@endsection