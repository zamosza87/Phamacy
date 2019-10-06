<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestModel extends Model
{
    protected $table = 'request';

    protected $fillable = [
        'user_iden','description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User' , 'user_iden' , 'identification_number');
    }
}
