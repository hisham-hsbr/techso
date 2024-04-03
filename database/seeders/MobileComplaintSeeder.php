<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fixancare\MobileComplaint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MobileComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MobileComplaint::create(['code' => 'di' , 'name' => 'Display not working' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        MobileComplaint::create(['code' => 'ch' , 'name' => 'Charging not working' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        MobileComplaint::create(['code' => 'sp' , 'name' => 'Speaker not working' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        MobileComplaint::create(['code' => 'mi' , 'name' => 'Mic not working' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        MobileComplaint::create(['code' => 'ba' , 'name' => 'Battery not working' , 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

    }
}
