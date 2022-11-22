<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Product;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref_id',
        'user_id',
        'total_price',
    ];

    public function order_items() {
       return $this->hasMany(Item::class, 'order_id');
    }
}
