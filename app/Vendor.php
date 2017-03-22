<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';
	protected $primaryKey = 'vendor_id';

	protected $fillable = [
				'vendor_type_id',
				'vendor_name',
				'vendor_address',
				'vendor_phone',
				'vendor_fax',
				'vendor_email',
				'vendor_note',
				'term_of_payment_id',
				'term_of_payment_value',
				'vendor_status',
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function itemcategories()
	{
        return $this->belongsToMany('App\ItemCategory','vendor_item_category', 'vendor_id', 'item_category_id');
    }

    public function ratings()
	{
        return $this->belongsToMany('App\Rating','vendor_rating', 'vendor_id', 'rating_id');
    }

    public function vendortype()
    {
    	return $this->belongsTo('App\VendorType', 'vendor_type_id');
    }

    public function termofpayment()
    {
    	return $this->belongsTo('App\TermOfPayment', 'term_of_payment_id');
    }

    public function spmbdetailvendors()
    {
    	return $this->hasMany('App\SPMBDetailVendor', 'vendor_id');
    }
}
