<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => "Admin",
            'email' => "ekanata1411@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Items::factory()->create([
            'item_id' => "CINNDA",
            'category_id' => '1',
            'name' => "Cincau Cap Panda",
            'price' => 3000,
            'sell_price' => 5000,
            'stock' => 0
        ]);

        \App\Models\Category::factory()->create([
            'name' => "Food",
        ]);

        \App\Models\Category::factory()->create([
            'name' => "Drink",
        ]);

        \App\Models\Category::factory()->create([
            'name' => "Clothes",
        ]);
    }
}
