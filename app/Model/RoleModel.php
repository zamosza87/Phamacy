<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'role';

    public function user()
    {
        // return $this->belongsTo('App\User', 'role_id', 'id');
        return $this->hasOne('App\User', 'role_id', 'id');
    }
}
