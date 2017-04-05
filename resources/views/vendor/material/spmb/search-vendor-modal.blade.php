
<div class="modal fade" id="modalSearchVendor" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
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
                                Others Vendor
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