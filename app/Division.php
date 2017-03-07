<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';
	protected $primaryKey = 'division_id';

	protected $fillable = [
				'company_id', 'division_code', 'division_name'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function company()
	{
		return $this->belongsTo('App\Company', 'company_id');
	}
}
