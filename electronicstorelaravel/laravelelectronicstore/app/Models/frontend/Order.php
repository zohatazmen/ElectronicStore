<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = [
        'customer_name',
        'customer_email',
        'address',
        'total_amount',
    ];

    // Define the relationship with the OrderItem model
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}