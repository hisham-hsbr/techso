<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fixancare\JobType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobType::create(['code' => 'r' , 'name' => 'repair' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        JobType::create(['code' => 'w' , 'name' => 'warranty' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

    }
}
