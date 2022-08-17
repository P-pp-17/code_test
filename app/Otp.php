<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'count',
        'expire',
        'date_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
