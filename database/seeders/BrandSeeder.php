<?php

namespace Database\Seeders;

use App\Models\Techso\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create(['code' => 'de' , 'name' => 'Dell' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Brand::create(['code' => 'ac' , 'name' => 'Acer' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Brand::create(['code' => 'le' , 'name' => 'Lenovo' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Brand::create(['code' => 'as' , 'name' => 'Asus' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

    }
}
