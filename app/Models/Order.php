<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'status' => OrderStatus::class,
        'products' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productsCount(): Attribute
    {
        return Attribute::make(
            get: fn() => count($this->products)
        );
    }

    public function totalPrice(): Attribute
    {
        $totalPrice = 0;

        foreach($this->products as $product)
        {
            $id = $product['product_id'];
            $quantity = $product['quantity'] ?? 0;
            $p = Product::query()->find($id, ['price']);
            if($p) {
                $totalPrice += $p->price * $quantity;
            }
        }

        return Attribute::make(get: fn() => $totalPrice);
    }
    
}
