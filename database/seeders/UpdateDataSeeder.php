<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->update(['city_id' => 1]);
        DB::table('users')->update(['time_zone_id' => 1]);
        DB::table('users')->update(['blood_id' => 1]);
    }
}
