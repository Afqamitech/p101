<?php

namespace App;

//use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
//    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mobile', 'email_id', 'password', 'provider', 'provider_id', 'name', 'image', 'flingal_id', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function userInformation()
    {
        return $this->hasOne('App\UserInformation');
    }
    
    public function approvedAmount()
    {
        return $this->hasOne('App\Models\GlobalWallet','flingal_id','flingal_id')->where('status',1);
    }
    
}
