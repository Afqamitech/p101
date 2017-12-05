<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Redeem extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','redeem_amount','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
