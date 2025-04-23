<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Medicine;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
        ]);
        
        User::factory()->create([
            'name' => 'employee',
            'email' => 'employee@gmail.com',
            'role' => 'employee',
        ]);
        
        City::factory()->count(10)->create();
        Store::factory()->count(100)->create();
        Medicine::factory()->count(50)->create();
    }
}

