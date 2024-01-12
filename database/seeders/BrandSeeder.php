<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petFoodBrands = [
            'PawsPal Nutrition',
            'WhiskerWonders',
            'TailTreats Co.',
            'FurryFeast Delights',
            'MeowMunch Gourmet',
            'BarkBite Bistro',
            'PetPlate Pantry',
            'NourishNest Pet Foods',
            'FelineFlavors Emporium',
            'WaggingWell Meals',
        ];

        foreach ($petFoodBrands as $brandName) {
            Brand::create(['name' => $brandName,"image"=>"assets/images/small/cat1.jpg"]);

        }
    }
}
