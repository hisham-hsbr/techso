<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Techso\ProductAttributeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductAttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductAttributeType::create(['code' => 'p' , 'name' => 'Price List' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttributeType::create(['code' => 's' , 'name' => 'Specification' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
