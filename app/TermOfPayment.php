<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermOfPayment extends Model
{
    protected $table = 'term_of_payments';
	protected $primaryKey = 'term_of_payment_id';

	protected $fillable = [
				'term_of_payment_name'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function vendors() 
	{
		return $this->hasMany('App\Vendor', 'term_of_payment_id');
	}
}
