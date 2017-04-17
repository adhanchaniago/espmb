
<div class="modal fade" id="modalViewDetailSPMB" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Lihat Detail Barang</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="span_item_category_name" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <span id="span_item_category_name"></span>    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="span_spmb_detail_account_no" class="col-sm-2 control-label">No. ACC</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <span id="span_spmb_detail_account_no"></span>    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="span_spmb_detail_item_name" class="col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <span id="span_spmb_detail_item_name"></span>    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="span_unit_name" class="col-sm-2 control-label">Satuan</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <span id="span_unit_name"></span>    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="span_spmb_detail_qty" class="col-sm-2 control-label">Qty</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <span id="span_spmb_detail_qty"></span>    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="span_spmb_detail_asset_no" class="col-sm-2 control-label">No Asset</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <span id="span_spmb_detail_asset_no"></span>    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="span_spmb_detail_note" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <span id="span_spmb_detail_note"></span>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <h4>Vendor yang dipilih</h4>
                        <hr/>
                        <div class="table-responsive">
                            <table id="vendor-tables" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th><center>Vendor</center></th>
                                        <th><center>Harga Awal</center></th>
                                        <th><center>Harga Deal</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Keterangan</center></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4>Pemesanan Dana</h4>
                        <hr/>
                        <div class="table-responsive">
                            <table id="order-payment-tables" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th><center>Tipe Pembayaran</center></th>
                                        <th><center>Tgl Pemesanan</center></th>
                                        <th><center>Tgl Pembayaran</center></th>
                                        <th><center>Tgl Selesai</center></th>
                                        <th><center>Total</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Keterangan</center></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4>Penerimaan Barang</h4>
                        <hr/>
                        <div class="table-responsive">
                            <table id="receipt-tables" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th><center>No Surat Jalan</center></th>
                                        <th><center>Tgl Diterima</center></th>
                                        <th><center>Nama Penerima</center></th>
                                        <th><center>Keterangan</center></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4>Rating</h4>
                        <hr/>
                        <div id="rating-container">
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect btn-close-spmb-detail-view" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>