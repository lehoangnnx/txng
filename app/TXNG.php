<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TXNG extends Model
{
    protected $fillable = [
        'id',
        'qr_code',
        'product_name',
        'mfg',
        'exp',
        'size',
        'packing',
        'storage_advice',
        'packaging_factory',
        'company_name',
        'country',
        'representative',
        'company_address',
        'cell_phone',
        'email',
        'fb',
        'farm_name',
        'farm_address',
        'growing_area',
        'standard_applied',
        'description_header',
        'discription',
        'image'
    ];
}
