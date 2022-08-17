<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorTokens extends Model
{
    protected $fillable = [
        'vendor_id',
        'token',
    ];
    public function vendor()
    {   
        return $this->belongsTo(Vendor::class);

    }
}
