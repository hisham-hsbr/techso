<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Techso\WorkStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkStatus::create(['code' => 'fi' , 'name' => 'Send To Khobar' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        WorkStatus::create(['code' => 'dr' , 'name' => 'Send To Dell Service' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        WorkStatus::create(['code' => 'ks' , 'name' => 'Send To Dammam' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
