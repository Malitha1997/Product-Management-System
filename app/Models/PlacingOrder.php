<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlacingOrder extends Model
{
    use HasFactory;

    protected $table = 'placing_orders';

    protected $fillable = [
        'order_number',
        'quantity',
        'free',
        'amount',
        'net_amount',
        'product_id',
        'customer_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
