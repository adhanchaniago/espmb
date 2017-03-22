<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'payment_types';
	protected $primaryKey = 'payment_type_id';

	protected $fillable = [
				'payment_type_name', 'payment_type_desc'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function spmbdetailpayments()
	{
		return $this->hasMany('App\SPMBDetailPayment', 'payment_type_id');
	}
}
