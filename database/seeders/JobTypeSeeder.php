<?php

namespace Database\Seeders;

use App\Models\Techso\JobType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobType::create(['code' => 'r' , 'name' => 'Repair' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        JobType::create(['code' => 'w' , 'name' => 'Warranty' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        JobType::create(['code' => 'wa' , 'name' => 'Walking' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
