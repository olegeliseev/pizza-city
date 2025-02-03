<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cart_key'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function getTotalQuantity(): int
    {
        return $this->products->sum('pivot.quantity');
    }

    public function getTotalPrice(): float
    {
        return $this->products->sum(fn($product) => $product->price * $product->pivot->quantity);
    }

}
