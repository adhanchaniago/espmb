<div class="modal fade" id="modalOrderPaymentVendor" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pemesanan Dana</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="modal_vendor" class="col-sm-2 control-label">Vendor</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_vendor" id="modal_vendor" placeholder="Vendor" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_nama_barang" class="col-sm-2 control-label">Barang</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_nama_barang" id="modal_nama_barang" placeholder="Nama Barang" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_qty" class="col-sm-2 control-label">Qty</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_qty" id="modal_qty" placeholder="Qty" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_price" class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_price" id="modal_price" placeholder="Harga" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_total" class="col-sm-2 control-label">Total</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_total" id="modal_total" placeholder="Total" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_payment_type" class="col-sm-2 control-label">Tipe Pembayaran</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <select name="modal_payment_type" id="modal_payment_type" class="selectpicker" data-live-search="true">
                                    <option value=""></option>
                                    @foreach($payment_types as $row)
                                        <option value="{{ $row->payment_type_id }}">{{ $row->payment_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_transfer_date" class="col-sm-2 control-label">Tanggal Pembayaran</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm date-picker" name="modal_transfer_date" id="modal_transfer_date" placeholder="dd/mm/yyyy" maxlength="10" value="">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_amount" class="col-sm-2 control-label">Total Pembayaran</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_amount" id="modal_amount" placeholder="Total Pembayaran" value="">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_note" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <textarea name="modal_note" id="modal_note" class="form-control input-sm" placeholder="Keterangan"></textarea>
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_request_name" class="col-sm-2 control-label">Penanggung Jawab</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_request_name" id="modal_request_name" placeholder="Penanggung Jawab" value="">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect btn-save-order-payment-vendor-modal">Save</button>
                <button type="button" class="btn btn-link waves-effect btn-close-order-payment-vendor-modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>