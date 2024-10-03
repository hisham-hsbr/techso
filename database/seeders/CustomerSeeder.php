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
        Customer::create(['name' => 'Walking Customer', 'contact_name' => 'name', 'phone_1' => '9100000000', 'promotion_type_id' => '1', 'customer_type_id' => '1', 'description' => 'des', 'default' => '1', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Customer::create(['name' => 'Computruck', 'contact_name' => 'Mubeer', 'phone_1' => '919946564387', 'promotion_type_id' => '1', 'customer_type_id' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
    }
}
