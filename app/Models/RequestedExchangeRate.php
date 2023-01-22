<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedExchangeRate extends Model
{
    use HasFactory;
    protected $fillable=['user_id', 'exchange_rate_id'];
}
