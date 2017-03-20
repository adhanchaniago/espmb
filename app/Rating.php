<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
	protected $primaryKey = 'rating_id';

	protected $fillable = [
				'rating_name', 'rating_desc'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function vendors()
	{
        return $this->belongsToMany('App\Vendor','vendor_rating', 'rating_id', 'vendor_id');
    }
}
