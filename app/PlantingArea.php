<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantingArea extends Model
{
    protected $table = 'planting_area';
    protected $fillable = [
        'id',
        'farm_name',
        'address',
        'growing_area',
        'standard',
    ];
}
