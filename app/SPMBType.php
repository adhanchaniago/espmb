<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPMBType extends Model
{
    protected $table = 'spmb_types';
	protected $primaryKey = 'spmb_type_id';

	protected $fillable = [
				'spmb_type_name'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function rules() {
        return $this->belongsToMany('App\Rule','spmb_type_rule', 'spmb_type_id', 'rule_id');
    }

    public function spmb() {
    	return $this->hasMany('App\SPMB', 'spmb_type_id');
    }
}
