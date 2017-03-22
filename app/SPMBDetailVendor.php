<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPMBDetailVendor extends Model
{
    protected $table = 'spmb_detail_vendors';
	protected $primaryKey = 'spmb_detail_vendor_id';

	protected $fillable = [
				'spmb_detail_id',
				'vendor_id',
				'spmb_detail_vendor_offer_price',
				'spmb_detail_vendor_deal_price',
				'spmb_detail_vendor_status',
				'spmb_detail_vendor_note',
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function spmbdetail()
	{
		return $this->belongsTo('App\SPMBDetail', 'spmb_detail_id');
	}

	public function vendor()
	{
		return $this->belongsTo('App\Vendor', 'vendor_id');
	}
}
