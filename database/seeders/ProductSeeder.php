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
        Product::create(['code' => 'deci3' , 'name' => 'Dell Desktop 3010 core i3' ,'product_type_id' => '1','brand_id' => '1', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Product::create(['code' => 'asui3' , 'name' => 'Asus Laptop AS51 core i3' ,'product_type_id' => '2','brand_id' => '2', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

    }
}
