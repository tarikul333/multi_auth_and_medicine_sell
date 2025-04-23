<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['city_id', 'user_id', 'store_id', 'order_date', 'total_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }


    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

