<?php

namespace Database\Seeders;

use App\Models\Techso\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::create(['code' => 'de' , 'name' => 'Desktop' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductType::create(['code' => 'la' , 'name' => 'Laptop' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductType::create(['code' => 'pr' , 'name' => 'Printer' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

    }
}
