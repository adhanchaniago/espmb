<div class="modal fade" id="modalAddDetailSPMB" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="modal_add_item_category_id" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <select name="modal_add_item_category_id" id="modal_add_item_category_id" class="selectpicker" data-live-search="true" required="true">
                                    <option value=""></option>
                                    @foreach($item_categories as $row)
                                        <option value="{{ $row->item_category_id }}">{{ $row->item_category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_add_spmb_detail_account_no" class="col-sm-2 control-label">No. ACC</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_add_spmb_detail_account_no" id="modal_add_spmb_detail_account_no" placeholder="No. ACC" required="true" maxlength="15" value="{{ old('modal_add_spmb_detail_account_no') }}" autocomplete="off">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_add_spmb_detail_sequence_no" class="col-sm-2 control-label">No.</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_add_spmb_detail_sequence_no" id="modal_add_spmb_detail_sequence_no" placeholder="No." required="true" maxlength="15" value="{{ old('modal_add_spmb_detail_sequence_no') }}" autocomplete="off">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_add_spmb_detail_item_name" class="col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_add_spmb_detail_item_name" id="modal_add_spmb_detail_item_name" placeholder="Nama Barang" required="true" maxlength="100" value="{{ old('modal_add_spmb_detail_item_name') }}" autocomplete="off">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_add_unit_id" class="col-sm-2 control-label">Satuan</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <select name="modal_add_unit_id" id="modal_add_unit_id" class="selectpicker" data-live-search="true" required="true">
                                    <option value=""></option>
                                    @foreach($units as $row)
                                        <option value="{{ $row->unit_id }}">{{ $row->unit_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_add_spmb_detail_qty" class="col-sm-2 control-label">Qty</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_add_spmb_detail_qty" id="modal_add_spmb_detail_qty" placeholder="Qty" required="true" maxlength="4" value="{{ old('modal_add_spmb_detail_qty') }}" autocomplete="off">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_add_spmb_detail_item_price" class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_add_spmb_detail_item_price" id="modal_add_spmb_detail_item_price" placeholder="Harga Satuan" required="true" maxlength="15" value="{{ old('modal_add_spmb_detail_item_price') }}" autocomplete="off">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_add_spmb_detail_asset_no" class="col-sm-2 control-label">No. Asset</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm" name="modal_add_spmb_detail_asset_no" id="modal_add_spmb_detail_asset_no" placeholder="No Asset" maxlength="25" value="{{ old('modal_add_spmb_detail_asset_no') }}" autocomplete="off">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_add_vendor_id" class="col-sm-2 control-label">Vendor</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <select name="modal_add_vendor_id" id="modal_add_vendor_id" class="selectpicker" data-live-search="true" required="true">
                                    <option value=""></option>
                                    @foreach($vendors as $row)
                                        <option value="{{ $row->vendor_id }}">{{ $row->vendor_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_add_spmb_detail_note" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <textarea name="modal_add_spmb_detail_note" id="modal_add_spmb_detail_note" class="form-control input-sm" placeholder="Keterangan">{{ old('modal_add_spmb_detail_note') }}</textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect btn-add-spmb-detail">Save</button>
                <button type="button" class="btn btn-danger waves-effect btn-close-spmb-detail" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>