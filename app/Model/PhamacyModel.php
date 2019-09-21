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
        'pha_id','thai_name','generic_name', 'trade_name' , 'company_Name' , 'drug_type' , 'package' , 'amount' , 'properties' , 'expiry_date' , 'stock'
    ];
}
