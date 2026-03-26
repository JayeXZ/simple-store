<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address',
        'total_amount', 'status', 'invoice_url'
    ];

    // An order belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // An order can have many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}


