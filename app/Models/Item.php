<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class Item extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
        'discount',
        ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
