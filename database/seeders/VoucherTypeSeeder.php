<?php

namespace Database\Seeders;

use App\Models\Techso\VoucherType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VoucherType::create(['code' => 'siv' , 'name' => 'Sales Invoice', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        VoucherType::create(['code' => 'srt' , 'name' => 'Sales Return', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        VoucherType::create(['code' => 'pin' , 'name' => 'Purchase Invoice', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        VoucherType::create(['code' => 'prt' , 'name' => 'Purchase Return', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        VoucherType::create(['code' => 'ope' , 'name' => 'Opening Stock', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        VoucherType::create(['code' => 'rec' , 'name' => 'Receipt', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        VoucherType::create(['code' => 'pay' , 'name' => 'Payment', 'description' => 'des' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

    }
}
