<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
	protected $primaryKey = 'company_id';

	protected $fillable = [
				'company_code', 'company_name'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function divisions()
	{
		return $this->hasMany('App\Division', 'company_id');
	}
}
