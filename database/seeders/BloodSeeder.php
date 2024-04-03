<?php

namespace Database\Seeders;

use App\Models\Blood;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blood::create(['name' => 'O-ve' , 'description' => 'Group O-ve' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Blood::create(['name' => 'O+ve' , 'description' => 'Group O+ve' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Blood::create(['name' => 'A-ve' , 'description' => 'Group A-ve' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Blood::create(['name' => 'A+ve' , 'description' => 'Group A+ve' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Blood::create(['name' => 'B-ve' , 'description' => 'Group B-ve' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Blood::create(['name' => 'B+ve' , 'description' => 'Group B+ve' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Blood::create(['name' => 'AB-ve' , 'description' => 'Group AB-ve' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        Blood::create(['name' => 'AB+ve' , 'description' => 'Group AB+ve' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
