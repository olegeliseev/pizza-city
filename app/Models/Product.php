<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function image(): Attribute
    {
        return Attribute::get(fn($value, $attributes) => $attributes['image'] ??
            '/assets/images/no_product.svg');
    }

    public function name(): Attribute
    {
        return Attribute::set(fn($value) => mb_ucfirst($value));
    }
}
