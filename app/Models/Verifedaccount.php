<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifedaccount extends Model
{
    use HasFactory;


    protected $fillable = [
        'usersid',
        'nin',
        'profile_pic',
        'ninpic',
        'whatsapp',
        'state',
        'lga',
        'address',
    ];
}
