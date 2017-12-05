<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Coupon extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','label','deal_of_the_day', 'image','status','expiry_date','offer_line'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
