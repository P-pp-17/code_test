<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'image',
        'join_date',
        'permanent_date',
        'attached_files',
        'is_active'
    ];
    public function vendorotps()
    {
        return $this->hasMany(VendorOtp::class);
    }
    public function vendortokens()
    {
        return $this->hasMany(VendorTokens::class);
    }
}
