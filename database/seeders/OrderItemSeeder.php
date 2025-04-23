<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Medicine;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::all();
        $medicines = Medicine::all();

        foreach ($orders as $order) {
            foreach ($medicines->random(3) as $medicine) {  // pick 3 random medicines
                $quantity = rand(1, 50);
                $price = $medicine->price ?? rand(10, 100);
                OrderItem::create([
                    'order_id' => $order->id,
                    'medicine_id' => $medicine->id,
                    'quantity' => $quantity,
                    'price_per_unit' => $price,
                    'total_price' => $quantity * $price
                ]);
            }
        }
    }
}

