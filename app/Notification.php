<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
	protected $primaryKey = 'id';

	public $incrementing = false;

	protected $fillable = [
				'type', 
				'notifiable_id', 
				'notifiable_type', 
				'data', 
				'read_at'
	];

	protected $hidden = [
				'created_at', 'updated_at'
	];

	
}
