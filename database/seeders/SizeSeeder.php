<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $sizes = array('xs', 'sm', 'md', 'lg', 'xl', 'xxl');

      foreach ($sizes as $size) {
        Size::create(['name' => $size]);
      }
    }
}
