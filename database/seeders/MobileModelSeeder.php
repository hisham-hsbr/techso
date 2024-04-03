<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fixancare\MobileModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MobileModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MobileModel::create(['code' => 'i1164' , 'name' => 'iphone 11 pro max 64gb' ,'brand_id'=>'1', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        MobileModel::create(['code' => 'i11128' , 'name' => 'iphone 11 pro max 128gb' ,'brand_id'=>'1', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        MobileModel::create(['code' => 'i11256' , 'name' => 'iphone 11 pro max 256gb' ,'brand_id'=>'1', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        MobileModel::create(['code' => 'i11512' , 'name' => 'iphone 11 pro max 512gb' ,'brand_id'=>'1', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
