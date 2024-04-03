<?php

namespace Database\Seeders;

use App\Models\Fixancare\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create(['code' => 'vi' , 'name' => 'Vivo' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Brand::create(['code' => 'sa' , 'name' => 'Samsung' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Brand::create(['code' => 'ip' , 'name' => 'Iphone' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Brand::create(['code' => 'no' , 'name' => 'Nokia' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Brand::create(['code' => 'op' , 'name' => 'Oppo' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
