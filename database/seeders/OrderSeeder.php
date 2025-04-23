<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Store;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $stores = Store::all();

        foreach ($stores as $store) {
            Order::create([
                'user_id' => '2',
                'city_id' => rand(1,10),
                'store_id' => $store->id,
                'order_date' => now(),
            ]);
        }
    }
}

