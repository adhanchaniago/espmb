<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPMBDetailPayment extends Model
{
    protected $table = 'spmb_detail_payments';
	protected $primaryKey = 'spmb_detail_payment_id';

	protected $fillable = [
				'spmb_detail_id',
				'payment_type_id',
				'spmb_detail_payment_request_date',
				'spmb_detail_payment_transfer_date',
				'spmb_detail_payment_finish_date',
				'spmb_detail_payment_amount',
				'spmb_detail_payment_note',
				'spmb_detail_payment_status',
				'spmb_detail_payment_request_name',
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function spmbdetail()
	{
		return $this->belongsTo('App\SPMBDetail', 'spmb_detail_id');
	}

	public function paymenttype()
	{
		return $this->belongsTo('App\PaymentType', 'payment_type_id');
	}
}
