<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DeveloperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =User::create([
        	'name' => 'Developer',
        	'last_name' => 'HSBR',
        	'dob' => '2000-12-1',
        	'email' => 'hisham@hsbr-apps.co',
        	'phone1' => '4374504387',
        	'gender' => 'male',
        	'email_verified_at' => '2000-12-1',
        	'password' => bcrypt('hsbr@gmail.com'),
            'created_by' => '1',
            'updated_by' => '1',
        	'status' => '1'
        ]);
        $role = Role::create(['name' => 'Developer','status'=>'1','created_by' => '1','updated_by' => '1']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        User::create([
        	'name' => 'Hisham Basheer',
        	'last_name' => 'Panayam Thodika',
        	'dob' => '1990-10-24',
        	'phone1' => '9946564387',
        	'gender' => 'male',
        	'email' => 'hisham.hsbr@gmail.com',
        	'password' => bcrypt('hsbr@gmail.com'),
            'created_by' => '1',
            'updated_by' => '1',
        	'status' => '1'
        ]);
    }
}
