<?php

namespace Database\Seeders;

use App\Models\Techso\CustomerType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerType::create(['code' => 're' , 'name' => 'Retail' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        CustomerType::create(['code' => 'co' , 'name' => 'Company' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        CustomerType::create(['code' => 'tr' , 'name' => 'Trading' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        CustomerType::create(['code' => 'sc' , 'name' => 'School' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

    }
}
