<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HistoryDetailModel extends Model
{
    protected $table = 'tbl_detail_history';

    protected $primaryKey = 'tbl_detail_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'his_id','pha_id','id_doc', 'amount'
    ];

    public function history()
    {
        return $this->belongsTo('App\Model\HistoryModel', 'his_id', 'id');
    }

    public function pha()
    {
        return $this->belongsTo('App\Model\PhamacyModel', 'pha_id', 'pha_id');
    }

    public function nurse()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
