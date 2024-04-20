<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Techso\JobStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobStatus::create(['code' => 'pe' , 'name' => 'Pending' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        JobStatus::create(['code' => 'ws' , 'name' => 'Work started' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        JobStatus::create(['code' => 'we' , 'name' => 'Work ended' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        JobStatus::create(['code' => 'wp' , 'name' => 'Waiting for parts' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        JobStatus::create(['code' => 'de' , 'name' => 'Delivered' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
