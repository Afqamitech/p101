<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function approvedAmount()
    {
        
        return $this->hasOne('App\Models\GlobalWallet','flingal_id','flingal_id')->where('status',1);
    }
    
    public function pendingCashBackAmount()
    {
        
        return $this->hasMany('App\Models\OrderHistory','flingal_id','flingal_id')->where('status',0)->where('type',1);
    }
    
    public function pendingRewardAmount()
    {
        
        return $this->hasMany('App\Models\OrderHistory','flingal_id','flingal_id')->where('status',0)->where('type',2);
    }
    
    public function paidCashBackAmount()
    {
        
        return $this->hasMany('App\Models\Redeem','flingal_id','flingal_id')->where('redeem_type',0)->where('status',1);
    }
    
    public function paidRewardAmount()
    {
        
        return $this->hasMany('App\Models\Redeem','flingal_id','flingal_id')->where('redeem_type',1)->where('status',2);
    }
}
