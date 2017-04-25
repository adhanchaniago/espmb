@extends('vendor.material.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>MIGO<small>List of all items</small></h2>
    </div>

    <div class="card-body card-padding">
        <div role="tabpanel">
            <ul class="tab-nav" role="tablist">
                @can('MIGO-Approval')
                <li class="active"><a href="#needchecking" aria-controls="needchecking" role="tab" data-toggle="tab">Need Checking</a></li>
                @endcan
            </ul>
            <div class="tab-content">
                @can('MIGO-Approval')
                <div role="tabpanel" class="tab-pane active" id="needchecking">
                   <div class="table-responsive">
                        <table id="migo-needchecking" class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="spmb_no" data-order="asc">SPMB No</th>
                                    <th data-column-id="division_name" data-order="asc">Unit</th>
                                    <th data-column-id="spmb_detail_item_name" data-order="asc">Item Name</th>
                                    <th data-column-id="vendor_name" data-order="asc">Vendor</th>
                                    <th data-column-id="link" data-formatter="link-ra" data-sortable="false">Action</th>
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
<script src="{{ url('js/spmb/migo.js') }}"></script>
@endsection