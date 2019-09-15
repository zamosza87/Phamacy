<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhamacyModel extends Model
{
    protected $table = 'tbl_phamacy';

    protected $primaryKey = 'pha_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pha_name','stock', 'analgesic'
    ];
}
