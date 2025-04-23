<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'medicine_id', 'quantity', 'price_per_unit', 'total_price'];

    protected $table = 'order_items';
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
