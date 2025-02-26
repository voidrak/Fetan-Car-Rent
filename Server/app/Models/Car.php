<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{

    use HasFactory;
    protected $fillable = [
        'brand',
        'model',
        'engine',
        'price_per_day',
        'image',
        'quantity',
        'status',
        'reduce',
        'stars'
    ];
}
