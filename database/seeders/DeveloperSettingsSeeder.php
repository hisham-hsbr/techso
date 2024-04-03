<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeveloperSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeveloperSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeveloperSettings::create(['name' => 'application' ,'data'=>['app_name'=>'HSBR','app_version'=>'1.1.0'], 'description' => 'app des' ,'parent'=>'default', 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        DeveloperSettings::create(['name' => 'page' ,'data'=>['page_title_prefix'=>'HSBR-App','page_title_suffix'=>'apps','page_description' => 'default description'], 'description' => 'app des' ,'parent'=>'default', 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        DeveloperSettings::create(['name' => 'developer' ,'data'=>['name'=>'HSBR-apps','website' => 'https://hsbr-apps.co','mail' => 'hisham@hsbr-apps.co','starting_year'=>'2020','ending_year' => '2023'], 'description' => 'app des' ,'parent'=>'default', 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        DeveloperSettings::create(['name' => 'logo' ,'data'=>['sidebar_logo'=>'1','sidebar_mini_logo'=>'1','sign_logo'=>'1','sign_mini_logo'=>'1','sign_with_google'=>'1','sign_with_facebook'=>'1'], 'description' => 'app des' ,'parent'=>'default', 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
