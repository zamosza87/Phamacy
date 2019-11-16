<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    protected $table = 'tbl_history';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','id_user','id_doc', 'note' , 'diagnose' , 'treatment' , 'type_'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function doc()
    {
        return $this->belongsTo('App\User', 'id_doc', 'id');
    }

    public function HistoryDetail()
    {
        return $this->hasMany('App\Model\HistoryDetailModel', 'his_id', 'id');
    }
}
