<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPMBDetail extends Model
{
    protected $table = 'spmb_details';
	protected $primaryKey = 'spmb_detail_id';

	protected $fillable = [
				'spmb_id',
				'spmb_detail_account_no',
				'spmb_detail_sequence_no',
				'item_category_id',
				'spmb_detail_item_name',
				'unit_id',
				'spmb_detail_qty',
				'spmb_detail_item_price',
				'spmb_detail_status',
				'spmb_detail_asset_no',
				'spmb_detail_note',
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function spmb() 
	{
		return $this->belongsTo('App\SPMB', 'spmb_id');
	}

	public function itemcategory()
	{
		return $this->belongsTo('App\ItemCategory', 'item_category_id');
	}

	public function unit()
	{
		return $this->belongsTo('App\Unit','unit_id');
	}

	public function spmbdetailpayments()
	{
		return $this->hasMany('App\SPMBDetailPayment', 'spmb_detail_id');
	}

	public function spmbdetailreceipt()
	{
		return $this->hasOne('App\SPMBDetailReceipt', 'spmb_detail_id');
	}

	public function spmbdetailvendors()
	{
		return $this->hasMany('App\SPMBDetailVendor', 'spmb_detail_id');
	}
}
