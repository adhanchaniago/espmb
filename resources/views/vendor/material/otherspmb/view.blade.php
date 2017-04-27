<div class="form-group">
    <label for="spmb_type_id" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
        <div class="fg-line">
        	<input type="text" name="spmb_no" id="spmb_no" class="form-control input-sm" placeholder="SPMB Type" value="{{ $spmb->spmbtype->spmbcategory->spmb_category_name . ' - ' . $spmb->spmbtype->spmb_type_name }}" disabled="true">
        </div>
    </div>
</div>
<div class="form-group">
	<label for="spmb_no" class="col-sm-2 control-label">SPMB No</label>
	<div class="col-sm-10">
		<div class="fg-line">
			<input type="text" name="spmb_no" id="spmb_no" class="form-control input-sm" placeholder="SPMB No" value="{{ $spmb->spmb_no }}" disabled="true">
		</div>
	</div>
</div>
<div class="form-group">
	<label for="spmb_no_pr_sap" class="col-sm-2 control-label">No PR SAP</label>
	<div class="col-sm-10">
		<div class="fg-line">
			<input type="text" name="spmb_no_pr_sap" id="spmb_no_pr_sap" class="form-control input-sm" placeholder="No PR SAP" maxlength="20" value="{{ $spmb->spmb_no_pr_sap }}" disabled="true">
		</div>
	</div>
</div>
<div class="form-group">
	<label for="spmb_group" class="col-sm-2 control-label">Kelompok</label>
	<div class="col-sm-10">
		<div class="fg-line">
			<input type="text" name="spmb_group" id="spmb_group" class="form-control input-sm" placeholder="Kelompok" maxlength="50" value="{{ $spmb->spmb_group }}" disabled="true">
		</div>
	</div>
</div>
<div class="form-group">
    <label for="company_id" class="col-sm-2 control-label">PT/Yayasan</label>
    <div class="col-sm-10">
        <div class="fg-line">
            <input type="text" name="company" id="company" class="form-control input-sm" placeholder="PT/Yayasan" value="{{ $spmb->division->company->company_name }}" disabled="true">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="division_id" class="col-sm-2 control-label">Suku Usaha/Divisi</label>
    <div class="col-sm-10">
        <div class="fg-line">
            <input type="text" name="division" id="division" class="form-control input-sm" placeholder="Divisi" value="{{ $spmb->division->division_name }}" disabled="true">
        </div>
    </div>
</div>
<div class="form-group">
	<label for="spmb_cost_center" class="col-sm-2 control-label">Bagian/Seksi</label>
	<div class="col-sm-10">
		<div class="fg-line">
			<input type="text" name="spmb_cost_center" id="spmb_cost_center" class="form-control input-sm" placeholder="Cost Center" maxlength="20" value="{{ $spmb->spmb_cost_center }}" disabled="true">
		</div>
	</div>
</div>
<div class="form-group">
	<label for="spmb_io_no" class="col-sm-2 control-label">No I/O DIPK</label>
	<div class="col-sm-10">
		<div class="fg-line">
			<input type="text" name="spmb_io_no" id="spmb_io_no" class="form-control input-sm" placeholder="No I/O DIPK" maxlength="20" value="{{ $spmb->spmb_io_no }}" disabled="true">
		</div>
	</div>
</div>
<div class="form-group">
	<label for="spmb_buyer_no" class="col-sm-2 control-label">No Pemesan</label>
	<div class="col-sm-10">
		<div class="fg-line">
			<input type="text" name="spmb_buyer_no" id="spmb_buyer_no" class="form-control input-sm" placeholder="No Pemesan" maxlength="20" value="{{ $spmb->spmb_buyer_no }}" disabled="true">
		</div>
	</div>
</div>
<div class="form-group">
	<label for="spmb_applicant_name" class="col-sm-2 control-label">Nama Pemesan</label>
	<div class="col-sm-10">
		<div class="fg-line">
			<input type="text" name="spmb_applicant_name" id="spmb_applicant_name" class="form-control input-sm" placeholder="Nama Pemesan" maxlength="50" value="{{ $spmb->spmb_applicant_name }}" disabled="true">
		</div>
	</div>
</div>
<div class="form-group">
	<label for="spmb_applicant_email" class="col-sm-2 control-label">E-mail Pemesan</label>
	<div class="col-sm-10">
		<div class="fg-line">
			<input type="email" name="spmb_applicant_email" id="spmb_applicant_email" class="form-control input-sm" placeholder="E-mail Pemesan" maxlength="100" value="{{ $spmb->spmb_applicant_email }}" disabled="true">
		</div>
	</div>
</div>
<div class="form-group">
    <label for="pic" class="col-sm-2 control-label">PIC</label>
    <div class="col-sm-10">
        <div class="fg-line">
            <input type="text" name="pic" id="pic" class="form-control input-sm" placeholder="PIC" value="{{ ($spmb->pic!=NULL) ? $spmb->_pic->user_firstname . ' ' . $spmb->_pic->user_lastname : '' }}" disabled="true">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="current" class="col-sm-2 control-label">Current Position</label>
    <div class="col-sm-10">
        <div class="fg-line">
            <input type="text" name="current" id="current" class="form-control input-sm" placeholder="Current Position" value="{{ $spmb->_currentuser->user_firstname . ' ' . $spmb->_currentuser->user_lastname }}" disabled="true">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="flow" class="col-sm-2 control-label">Current Flow</label>
    <div class="col-sm-10">
        <div class="fg-line">
            <input type="text" name="flow" id="flow" class="form-control input-sm" placeholder="Current Flow" value="{{ $spmb->_currentflow($spmb->flow_no, 2) }}" disabled="true">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="revision" class="col-sm-2 control-label">Revision</label>
    <div class="col-sm-10">
        <div class="fg-line">
            <input type="text" name="revision" id="revision" class="form-control input-sm" placeholder="Revision" value="{{ $spmb->revision }}" disabled="true">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="created" class="col-sm-2 control-label">Created By</label>
    <div class="col-sm-10">
        <div class="fg-line">
            <input type="text" name="created" id="created" class="form-control input-sm" placeholder="Created By" value="{{ $spmb->_created->user_firstname . ' ' . $spmb->_created->user_lastname }}" disabled="true">
        </div>
    </div>
</div>
<hr/>
<div class="form-group">
	<label for="spmb_rules" class="col-sm-2 control-label">Persyaratan</label>
	<div class="col-sm-10" id="spmb_rules_container">
	@foreach($spmb->spmbtype->rules as $rule)
		<?php $checked = '' ?>
		@foreach($spmb->rules as $r)
			@if($r->rule_id==$rule->rule_id)
				<?php $checked = 'checked' ?>
			@endif
		@endforeach
		<input type="checkbox" name="spmb_rules[]" value="{{ $rule->rule_id }}" {{ $checked }} disabled="true">&nbsp;{{ $rule->rule_name }}<br/>
	@endforeach
	</div>
</div>