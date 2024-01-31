<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
        for ($i = 0; $i <= 100; $i++) {
        $product=Product::create([
        'name' => "product".$i,
        'description' => fake()->text(1000),
        'quantity' => $i==0?0:100,
        'sale' => 1200,
        'purchase' => 1000,
        'brand_id' => fake()->numberBetween(1,10),
        'pet_id' => fake()->numberBetween(1,4),
        'category_id' => fake()->numberBetween(1,6),
        'photo'=>"assets/images/product1.jpg",
          'feature' => $i < 10 ? 1 : 0,
    ]);
        $product->ratings()->create(["rating"=>fake()->numberBetween(1,5),
          "user_id"=>fake()->numberBetween(1,10),
          "comment"=>"good products",
        ]);
        $product->colors()->attach(fake()->numberBetween(1,5));
        $product->sizes()->attach(fake()->numberBetween(1,5));

    }
    }
}
}