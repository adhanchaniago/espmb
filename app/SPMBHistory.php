<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPMBHistory extends Model
{
    protected $table = 'spmb_histories';
	protected $primaryKey = 'spmb_history_id';

	protected $fillable = [
				'spmb_id',
				'approval_type_id',
				'flow_no',
				'spmb_history_desc',
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function spmb()
	{
		return $this->belongsTo('App\SPMB', 'spmb_id');
	}

	public function approvaltype()
	{
		return $this->belongsTo('App\ApprovalType', 'approval_type_id');
	}
}