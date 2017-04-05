<div class="modal fade" id="modalSelectVendor" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Vendor</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="modal_select_vendor_vendor_name" class="col-sm-2 control-label">Vendor</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="hidden" name="modal_select_vendor_spmb_detail_id" value="">
                                <input type="hidden" name="modal_select_vendor_vendor_id" value="">
                                <input type="text" class="form-control input-sm" name="modal_select_vendor_vendor_name" id="modal_select_vendor_vendor_name" placeholder="Nama Vendor" required="true" maxlength="50" value="">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_select_vendor_offer_price" class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_select_vendor_offer_price" id="modal_select_vendor_offer_price" placeholder="Harga" required="true" maxlength="15" value="">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_select_vendor_note" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <textarea name="modal_select_vendor_note" id="modal_select_vendor_note" class="form-control input-sm" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect btn-save-select-vendor-modal">Save</button>
                <button type="button" class="btn btn-danger waves-effect btn-close-select-vendor-modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>