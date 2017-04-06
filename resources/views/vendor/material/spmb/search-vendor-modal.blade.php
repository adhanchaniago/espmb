
<div class="modal fade" id="modalSearchVendor" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cari Vendor</h4>
                <hr/>
            </div>
            <div class="modal-body">
                <div class="panel-group" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-collapse">
                        <div class="panel-heading" role="tab" id="heading-recommended-vendor">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#recommended-vendor" aria-expanded="true" aria-controls="recommended-vendor">
                                    Vendor Rekomendasi
                                </a>
                            </h4>
                        </div>
                        <div id="recommended-vendor" class="collapse in" role="tabpanel" aria-labelledby="heading-recommended-vendor">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="recommended-vendor-table" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><center>Nama Vendor</center></th>
                                                <th><center>Rating</center></th>
                                                <th><center>Transaksi Terakhir</center></th>
                                                <th><center>Action</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-collapse">
                        <div class="panel-heading" role="tab" id="heading-others-vendor">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#others-vendor" aria-expanded="false" aria-controls="others-vendor">
                                    Vendor Lainnya
                                </a>
                            </h4>
                        </div>
                        <div id="others-vendor" class="collapse" role="tabpanel" aria-labelledby="heading-others-vendor">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Filter</h5><hr/>
                                        <form class="form" role="form">
                                            Kategori Barang
                                            <div class="form-group">
                                                <div class="fg-line">
                                                    <select name="filter_item_category_id" id="filter_item_category_id" class="selectpicker" data-live-search="true" multiple>
                                                        <option value=""></option>
                                                        @foreach ($item_categories as $row)
                                                            <option value="{{ $row->item_category_id }}">{{ $row->item_category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            Tipe Vendor
                                            <div class="form-group">
                                                <div class="fg-line">
                                                    <select name="filter_vendor_type_id" id="filter_vendor_type_id" class="selectpicker" data-live-search="true" multiple>
                                                        <option value=""></option>
                                                        @foreach ($vendor_types as $row)
                                                            <option value="{{ $row->vendor_type_id }}">{{ $row->vendor_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            Status Vendor
                                            <div class="form-group">
                                                <div class="fg-line">
                                                    <select name="filter_vendor_status" id="filter_vendor_status" class="selectpicker" data-live-search="true">
                                                        <option value=""></option>
                                                        <option value="ONE TIME">ONE TIME</option>
                                                        <option value="PERMANENT">PERMANENT</option>
                                                    </select>
                                                </div>
                                            </div>
                                            Nama Vendor
                                            <div class="form-group">
                                                <div class="fg-line">
                                                    <input type="text" name="filter_vendor_name" id="filter_vendor_name" class="form-control input-sm" value="">
                                                </div>
                                            </div>
                                            Data yg ditampilkan
                                            <div class="form-group">
                                                <div class="fg-line">
                                                    <select name="filter_data_views" id="filter_data_views" class="selectpicker" data-live-search="true">
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="javascript:void(0);" type="button" id="btn-filter-ok" class="btn btn-primary btn-sm waves-effect">Filter</a>
                                                <a href="javascript:void(0);" type="button" id="btn-filter-reset" class="btn btn-danger btn-sm waves-effect">Reset</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="table-responsive" id="filter_result">
                                            <p><center>No data</center></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect btn-close-search-vendor" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>