<?php

namespace Database\Seeders;

use App\Models\Techso\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['code' => 'deci3', 'name' => 'Dell Desktop 3010 core i3', 'product_type_id' => '1', 'brand_id' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Product::create(['code' => 'asui3', 'name' => 'Asus Laptop AS51 core i5', 'product_type_id' => '2', 'brand_id' => '2', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Product::create(['code' => 'hpi3', 'name' => 'Hp Laptop P15 core i7', 'product_type_id' => '2', 'brand_id' => '5', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Product::create(['code' => 'hp123b', 'name' => 'Hp Ink 123 Black', 'product_type_id' => '4', 'brand_id' => '5', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Product::create(['code' => 'hp123c', 'name' => 'Hp Ink 123 Color', 'product_type_id' => '4', 'brand_id' => '5', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
    }
}
