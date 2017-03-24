<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
	protected $primaryKey = 'notification_id';

	protected $fillable = [
				'type', 
				'notifiable_id', 
				'notifiable_type', 
				'data', 
				'read_at', 
				'notification_readtime', 
				'notification_status'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	
}
