<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['items', 'status'];
    protected $casts = [
        'status' => OrderStatus::class, // laravel 9 agora aceita status nos $casts
        'items' => 'json'
    ];
}
