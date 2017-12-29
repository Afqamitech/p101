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
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function store()
    {
        return $this->belongsTo('App\Models\Store','store_id','id');
    }
    public function coupomSubCategory()
    {
        return $this->hasMany('App\Models\CouponSubCategory','coupon_id','id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
