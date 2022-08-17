<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorOtp extends Model
{
    protected $fillable = [
        'vendor_id',
        'code',
        'count',
        'expire',
        'date_time'
    ];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
