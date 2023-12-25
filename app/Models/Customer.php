<?php

namespace App\Models;

use App\Models\PlacingOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    public function placingOrders(){
        return $this->belongsTo(PlacingOrder::class);
    }
}
