<?php

namespace Database\Seeders;

use App\Models\Techso\PromotionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PromotionType::create(['code' => 'tp' , 'name' => '10 %' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        PromotionType::create(['code' => 'tfp' , 'name' => '25 %' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        PromotionType::create(['code' => 'fp' , 'name' => '50 %' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
