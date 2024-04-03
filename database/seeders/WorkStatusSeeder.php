<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Fixancare\WorkStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkStatus::create(['code' => 'fi' , 'name' => 'Fixancare' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        WorkStatus::create(['code' => 'dr' , 'name' => 'DR. Mobile' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        WorkStatus::create(['code' => 'ks' , 'name' => 'I fix KSD' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
