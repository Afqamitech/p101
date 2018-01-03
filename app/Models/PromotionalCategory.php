<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class PromotionalCategory extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','icon','image','status'
    ];
    
    public function promotionalCategoryData()
    {
        return $this->hasMany('App\Models\PromotionalCategoryData','promotional_category_id','id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
