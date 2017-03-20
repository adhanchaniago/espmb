<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = 'item_categories';
	protected $primaryKey = 'item_category_id';

	protected $fillable = [
				'item_category_name', 'item_category_desc'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function vendors()
	{
        return $this->belongsToMany('App\Vendor','vendor_item_category', 'item_category_id', 'vendor_id');
    }
}
