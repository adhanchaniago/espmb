<?php

namespace App;

use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 
        'user_email', 
        'user_firstname',
        'user_lastname',
        'user_phone',
        'user_gender',
        'religion_id',
        'user_birthdate',
        'user_lastlogin',
        'user_lastip',
        'user_avatar',
        'user_status',
        'active',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'user_id';

    public function routeNotificationForMail()
    {
        return $this->user_email;
    }

    public function routeNotificationForNexmo()
    {
        return $this->user_phone;
    }

    public function roles() {
        return $this->belongsToMany('App\Role','users_roles', 'user_id', 'role_id');
    }

    public function groups() {
        return $this->belongsToMany('App\Group','users_groups', 'user_id', 'group_id');
    }

    public function medias() {
        return $this->belongsToMany('App\Media','users_medias', 'user_id', 'media_id');
    }

    public function mediagroups() {
        return $this->belongsToMany('App\MediaGroup','users_media_groups', 'user_id', 'media_group_id');
    }

    public function religion() {
        return $this->belongsTo('App\Religion', 'religion_id');
    }

    public function hasRole($role_name) {
        foreach($this->roles as $role) {
            if($role->role_name == $role_name) {
                return true;
            }
        }
    }

    public function spmbcurrentuser()
    {
        return $this->hasMany('App\SPMB', 'current_user');
    }

    public function spmbpic()
    {
        return $this->hasMany('App\SPMB', 'pic');
    }

    public function spmbcreated()
    {
        return $this->hasMany('App\SPMB', 'created_by');
    }
}
