<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class StoreCashbackRate extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id', 'cash_back'
    ];
    
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
