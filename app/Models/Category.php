<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','icon','is_featured', 'image','status'
    ];
    
    public function stores()
    {
        return $this->hasMany('App\Models\Store','category_id','id');
    }
    public function storeCategories()
    {
        return $this->hasMany('App\Models\StoreCategory','category_id','id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
