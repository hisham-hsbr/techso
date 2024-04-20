<?php

namespace Database\Seeders;

use App\Models\Techso\CustomerAccessories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerAccessoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerAccessories::create(['code' => 'bg' , 'name' => 'Laptop Bag' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        CustomerAccessories::create(['code' => 'ch' , 'name' => 'Laptop Charger' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        CustomerAccessories::create(['code' => 'ba' , 'name' => 'Laptop Battery' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
