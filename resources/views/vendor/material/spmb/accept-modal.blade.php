<div class="modal fade" id="modalAccept" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Penerimaan Barang</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="modal_accept_vendor" class="col-sm-2 control-label">Vendor</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_accept_vendor" id="modal_accept_vendor" placeholder="Vendor" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_accept_nama_barang" class="col-sm-2 control-label">Barang</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_accept_nama_barang" id="modal_accept_nama_barang" placeholder="Nama Barang" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_accept_qty" class="col-sm-2 control-label">Qty</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_accept_qty" id="modal_accept_qty" placeholder="Qty" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_accept_receipt_no" class="col-sm-2 control-label">No Surat Jalan</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_accept_receipt_no" id="modal_accept_receipt_no" placeholder="No Surat Jalan" value="">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_accept_note" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <textarea name="modal_accept_note" id="modal_accept_note" class="form-control input-sm" placeholder="Keterangan"></textarea>
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_accept_receipt_name" class="col-sm-2 control-label">Penerima</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_accept_receipt_name" id="modal_accept_receipt_name" placeholder="Penerima" value="">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect btn-save-accept-modal">Save</button>
                <button type="button" class="btn btn-link waves-effect btn-close-accept-modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>