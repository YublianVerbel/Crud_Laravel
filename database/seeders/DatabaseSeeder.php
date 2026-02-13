<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // ...existing code...

        Product::factory()->create([
            'name' => 'Papas Fritas',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Gaseosa',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Hamburguesa',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Pizza',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Hot Dog',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);
        Product::factory()->create([
            'name' => 'Tacos',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Burrito',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Ensalada César',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Nuggets de Pollo',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Sándwich Club',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Arepa',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Empanada',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Helado',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Brownie',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);

        Product::factory()->create([
            'name' => 'Malteada',
            'price' => fake()->randomFloat(2, 0, 99),
        ]);
    }
}
