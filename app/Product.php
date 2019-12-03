<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'planting_area_id',
        'code',
        'name',
        'mfg',
        'exp',
        'size',
        'packing',
        'description',
    ];
}
