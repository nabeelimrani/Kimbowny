<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;
class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pets = [
    'Dog', 'Cat', 'bird', 'fishes'
    ];
    foreach ($pets as $key => $pet) {
        Pet::create(["name"=>$pet,"image"=>"assets/images/pet2.png"]);
    }
    }
}
