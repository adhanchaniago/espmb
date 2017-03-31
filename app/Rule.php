<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'rules';
	protected $primaryKey = 'rule_id';

	protected $fillable = [
				'rule_name', 'rule_desc'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function spmbtypes() {
        return $this->belongsToMany('App\SPMBType','spmb_type_rule', 'rule_id', 'spmb_type_id');
    }

    public function spmbs()
	{
		return $this->belongsToMany('App\SPMB','spmb_rule', 'rule_id', 'spmb_id');
	}
}
