<?php

namespace Database\Seeders;

use App\Models\Techso\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create(['name' => 'Computruck' ,'contact_name' => 'Mubeer' ,'phone_1' => '0535331137','promotion_type_id' => '1','customer_type_id' => '1', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

    }
}
