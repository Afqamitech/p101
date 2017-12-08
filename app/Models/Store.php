<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Store extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'link','offer_line','image','status'
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
