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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}