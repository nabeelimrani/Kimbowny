<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petStoreCategories = [
    'Dog Supplies',
    'cat accessories',
    'Cat Supplies',
    'Small Animal Supplies',
    'Bird Supplies',
    'Pet Toys',
];
    foreach ($petStoreCategories as $key => $cat) {
        $key++;
        Category::create(["name"=>$cat,"image"=>"assets/images/category-".$key.".png"]);
    }
    }
}
