<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\concerns\HasPrice;

class Payments extends Model
{
    use HasFactory , HasPrice;
    protected $guarded = [];

    protected $casts = [
        'data' => 'json',
    ];
}
