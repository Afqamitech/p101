<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class PromotionalCategoryData extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'promotional_category_id','type','store_id','coupon_id','old_value','new_value'
    ];
    
    public function store()
    {
        return $this->hasOne('App\Models\Store','store_id');
    }
    public function coupon()
    {
        return $this->hasOne('App\Models\Coupon','id','coupon_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
