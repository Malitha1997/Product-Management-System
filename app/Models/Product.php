<?php

namespace App\Models;

use App\Models\FreeIssue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'price',
        'expiry_date'
    ];

    public function freeIssue(){
        return $this->hasOne(FreeIssue::class);
    }
}
