<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'role_id' , 'telephone_number' , 'parent_phone_number' ,'birth' , 'identification_number' ,'congenital_disease' , 'drug_allergies'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function requests()
    {
        return $this->hasMany('App\Model\RequestModel' , 'user_iden' , 'identification_number');
    }

    public function role()
    {
        return $this->belongsTo('App\Model\RoleModel', 'role_id', 'id');
    }

    public function history(){
        return $this->hasMany('App\Model\HistoryModel' , 'id_user' , 'id');
    }

    public function is_admin()
    {
        if($this->role_id == 99){
            return true;
        }
        return false;
    }

    public function is_doc()
    {
        if($this->role_id == 10){
            return true;
        }
        return false;
    }

}
