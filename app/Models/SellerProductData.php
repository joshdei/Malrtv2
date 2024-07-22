<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProductData extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'buyer_id',
        'product_id',
        'total_orders',
        'grand_total',
        // Add more columns as needed
    ];
    
}
