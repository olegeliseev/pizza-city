<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'price',
            'image',
            'description',
            'energy_value',
            'proteins',
            'fats',
            'carbohydrates',
            'new',
            'hit',
        ];
}
