<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class StoreCategory extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id','category_id'
    ];
    
    public function category()
    {
        return $this->hasOne('App\Models\Category','id','category_id');
    }
    public function stores()
    {
        return $this->hasOne('App\Models\Store','id','store_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
