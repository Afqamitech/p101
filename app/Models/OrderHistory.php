<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class OrderHistory extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'flingal_id','order_id','title', 'status','amount'
    ];
    
    
    protected $table="order_history";
    
    public function users()
    {
        return $this->belongsTo('App\User','flingal_id','flingal_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
