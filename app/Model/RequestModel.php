<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestModel extends Model
{
    use SoftDeletes;

    protected $table = 'request';

    protected $fillable = [
        'user_iden','description'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User' , 'user_iden' , 'identification_number');
    }
}
