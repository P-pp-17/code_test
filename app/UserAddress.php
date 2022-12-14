<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id',
        //'division',
        //'township',
        'address',
        'phone',
        'type',
        'lat',
        'lng',
        'loc_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
