<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'id',
        'name',
        'logo',
        'address',
        'location',
        'country',
        'representative',
        'cellphone',
        'email',
        'facebook',
    ];
}
