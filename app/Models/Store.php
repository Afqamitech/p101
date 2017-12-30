<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Store extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'link','offer_line','image','status'
    ];
    
    public function storeCategory()
    {
        return $this->hasMany('App\Models\StoreCategory','store_id','id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
