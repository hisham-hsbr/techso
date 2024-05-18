<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Techso\ProductAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductAttribute::create(['code' => 'mnm' , 'name' => 'Model Name', 'product_attribute_type_id' => '2' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'mno' , 'name' => 'Model Number', 'product_attribute_type_id' => '2' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'szi' , 'name' => 'Screen Size', 'product_attribute_type_id' => '2' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'ram' , 'name' => 'Ram', 'product_attribute_type_id' => '2' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'hdd' , 'name' => 'Hard disk', 'product_attribute_type_id' => '2' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'oss' , 'name' => 'Operating System', 'product_attribute_type_id' => '2' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'gcd' , 'name' => 'Graphics card', 'product_attribute_type_id' => '2' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'cnt' , 'name' => 'Connectivity', 'product_attribute_type_id' => '2' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'pr1' , 'name' => 'Wholesale', 'product_attribute_type_id' => '1' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'pr2' , 'name' => 'Retail', 'product_attribute_type_id' => '1' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'pr3' , 'name' => 'Semi Wholesale', 'product_attribute_type_id' => '1' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        ProductAttribute::create(['code' => 'pr4' , 'name' => 'Company', 'product_attribute_type_id' => '1' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

    }
}
