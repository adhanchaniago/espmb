<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPMBCategory extends Model
{
    protected $table = 'spmb_categories';
	protected $primaryKey = 'spmb_category_id';

	protected $fillable = [
				'spmb_category_name'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function spmbtypes()
	{
		return $this->hasMany('App\SPMBType', 'spmb_category_id');
	}
}
