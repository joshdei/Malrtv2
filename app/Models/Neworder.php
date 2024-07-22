<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neworder extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_value',
        'productid',
        'fname',
        'lname',
        'country',
        'billing_address',
        'city',
        'state',
        'phone',
        'email',
        'products_id',
        'products_newprice'
    ];
}    

