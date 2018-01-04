<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    
    public function category()
    {
        return $this->hasOne('App\Models\Category','id','category_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
