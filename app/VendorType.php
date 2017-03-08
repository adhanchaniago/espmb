<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorType extends Model
{
    protected $table = 'vendor_types';
	protected $primaryKey = 'vendor_type_id';

	protected $fillable = [
				'vendor_type_name', 'vendor_type_desc'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];
}
