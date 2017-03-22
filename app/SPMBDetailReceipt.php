<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPMBDetailReceipt extends Model
{
    protected $table = 'spmb_detail_receipts';
	protected $primaryKey = 'spmb_detail_receipt_id';

	protected $fillable = [
				'spmb_detail_id',
				'spmb_detail_receipt_no',
				'spmb_detail_receipt_name',
				'spmb_detail_receipt_date',
				'spmb_detail_receipt_note',
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function spmbdetail()
	{
		return $this->belongsTo('App\SPMBDetail', 'spmb_detail_id');
	}
}
