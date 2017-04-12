<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Flow;

class SPMB extends Model
{
    protected $table = 'spmb';
	protected $primaryKey = 'spmb_id';

	protected $fillable = [
				'spmb_type_id',
				'spmb_no',
				'spmb_no_pr_sap',
				'spmb_group',
				'division_id',
				'spmb_cost_center',
				'spmb_io_no',
				'spmb_buyer_no',
				'spmb_applicant_name',
				'spmb_applicant_email',
				'spmb_finish_date',
				'flow_no',
				'current_user',
				'pic',
				'revision',
				'spmb_method',
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function spmbtype() 
	{
		return $this->belongsTo('App\SPMBType', 'spmb_type_id');
	}

	public function division() 
	{
		return $this->belongsTo('App\Division', 'division_id');
	}

	public function spmbdetails()
	{
		return $this->hasMany('App\SPMBDetail', 'spmb_id');
	}

	public function spmbhistories()
	{
		return $this->hasMany('App\SPMBHistory', 'spmb_id');
	}

	public function rules()
	{
		return $this->belongsToMany('App\Rule','spmb_rule', 'spmb_id', 'rule_id');
	}

	public function _currentuser()
	{
		return $this->belongsTo('App\User', 'current_user');
	}

	public function _pic()
	{
		return $this->belongsTo('App\User', 'pic');
	}

	public function _created()
	{
		return $this->belongsTo('App\User', 'created_by');
	}

	public function _currentflow($value)
	{
		$flow = Flow::where('flow_no',$value)->where('flow_group_id',1)->where('active','1')->get();
		if(count($flow) > 0) {
			return $flow[0]->flow_name;
		}else{
			return 'FINISHED';
		}
	}
}
