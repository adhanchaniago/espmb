@extends('vendor.material.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>SPMB<small>List of all SPMB</small></h2>
        @can('SPMB-Create')
        <a href="{{ url('spmb/create') }}" title="Create New SPMB"><button class="btn bgm-blue btn-float waves-effect"><i class="zmdi zmdi-plus"></i></button></a>
        @endcan
    </div>

    <div class="card-body card-padding">
        <div role="tabpanel">
            <ul class="tab-nav" role="tablist">
                @can('SPMB-Approval')
                <li class="active"><a href="#needchecking" aria-controls="needchecking" role="tab" data-toggle="tab">Need Checking</a></li>
                <li><a href="#onprocess" aria-controls="onprocess" role="tab" data-toggle="tab">On Process</a></li>
                @endcan
                @can('SPMB-Read')
                <li><a href="#finished" aria-controls="finished" role="tab" data-toggle="tab">Finished</a></li>
                @endcan
                @can('SPMB-Create')
                <li><a href="#canceled" aria-controls="canceled" role="tab" data-toggle="tab">Canceled</a></li>
                @endcan
            </ul>
            <div class="tab-content">
                @can('SPMB-Approval')
                <div role="tabpanel" class="tab-pane active" id="needchecking">
                   <div class="table-responsive">
                        <table id="spmb-needchecking" class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="spmb_type_name" data-order="asc">SPMB Type</th>
                                    <th data-column-id="spmb_no" data-order="asc">SPMB No</th>
                                    <th data-column-id="division_name" data-order="asc">Unit</th>
                                    <th data-column-id="spmb_applicant_name" data-order="asc">Applicant</th>
                                    <th data-column-id="user_firstname" data-order="asc">Created By</th>
                                    @can('SPMB-Update')
                                        @can('SPMB-Approval')
                                            <th data-column-id="link" data-formatter="link-rua" data-sortable="false">Action</th>
                                        @else
                                            <th data-column-id="link" data-formatter="link-ru" data-sortable="false">Action</th>
                                        @endcan
                                    @else
                                        @can('SPMB-Approval')
                                            <th data-column-id="link" data-formatter="link-ra" data-sortable="false">Action</th>
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
                <div role="tabpanel" class="tab-pane" id="onprocess">
                    <div class="table-responsive">
                        <table id="spmb-onprocess" class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="spmb_type_name" data-order="asc">SPMB Type</th>
                                    <th data-column-id="spmb_no" data-order="asc">SPMB No</th>
                                    <th data-column-id="division_name" data-order="asc">Division</th>
                                    <th data-column-id="spmb_applicant_name" data-order="asc">Applicant</th>
                                    <th data-column-id="user_firstname" data-order="asc">Current User</th>
                                    @can('SPMB-Delete')
                                        <th data-column-id="link" data-formatter="link-rd" data-sortable="false">Action</th>
                                    @else
                                        <th data-column-id="link" data-formatter="link-r" data-sortable="false">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endcan
                @can('SPMB-Read')
                <div role="tabpanel" class="tab-pane" id="finished">
                    <div class="table-responsive">
                        <table id="spmb-finished" class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="spmb_type_name" data-order="asc">SPMB Type</th>
                                    <th data-column-id="spmb_no" data-order="asc">SPMB No</th>
                                    <th data-column-id="division_name" data-order="asc">Division</th>
                                    <th data-column-id="spmb_applicant_name" data-order="asc">Applicant</th>
                                    <th data-column-id="user_firstname" data-order="asc">Created By</th>
                                    <th data-column-id="link" data-formatter="link-r" data-sortable="false">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endcan
                @can('SPMB-Create')
                <div role="tabpanel" class="tab-pane" id="canceled">
                    <div class="table-responsive">
                        <table id="spmb-canceled" class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="spmb_type_name" data-order="asc">SPMB Type</th>
                                    <th data-column-id="spmb_no" data-order="asc">SPMB No</th>
                                    <th data-column-id="division_name" data-order="asc">Division</th>
                                    <th data-column-id="spmb_applicant_name" data-order="asc">Applicant</th>
                                    <th data-column-id="user_firstname" data-order="asc">Created By</th>
                                    <th data-column-id="link" data-formatter="link-r" data-sortable="false">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endcan
            </div>
        </div>
        </div>
    </div>
</div>    
@endsection

@section('customjs')
<script src="{{ url('js/spmb/spmb.js') }}"></script>
@endsection