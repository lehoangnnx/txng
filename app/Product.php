<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'id',
        'planting_area_id',
        'code',
        'name',
        'mfg',
        'exp',
        'size',
        'packing',
        'storage_advice',
        'packaging_factory',
        'description_header',
        'description',
    ];
}
