<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'foodname',
        'price',
        'quantity',
        'name',
        'price',
        'address',
    ];
}
