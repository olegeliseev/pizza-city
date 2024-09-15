<?php

namespace App\Models;

use App\Contracts\HasTagsContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model implements HasTagsContract
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
            'category_id',
        ];

    protected $attributes = [
        'category_id' => null,
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
