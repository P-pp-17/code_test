<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes,SoftCascadeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $softCascade = ['user_addresses','otps'];

    protected $fillable = [
        'name',
        'phone',
        'email',
        'image',
        'activation_code',
        'register_source',
        'testing_status',
        'is_active',
        'token',
        'last_login'
    ];

    public function user_addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function otps()
    {
        return $this->hasMany(Otp::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function general_forms()
    {
        return $this->hasMany(GeneralForm::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function usertokens()
    {
        return $this->hasMany(UserToken::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
