<?php

namespace Database\Seeders;

use App\Models\AppSettings;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppSettings::create([
            'name' => 'default layout' ,
            'data'=>[
                'card_header'=>1,
                'card_footer'=>1,
                'sidebar_collapse'=>null,
                'dark_mode'=>null,
            ],
            'description' => 'app des' ,'parent'=>'layout', 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        AppSettings::create([
            'name' => 'default action' ,
            'data'=>[
                'default_status'=>1,
                'default_time_zone'=>1,
            ],
            'description' => 'app des' ,'parent'=>'layout', 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        AppSettings::create([
            'name' => 'default message' ,
            'data'=>[
                'home_toolbar_message'=>'hai welcome to my app',
                'message'=>'test',
            ],
            'description' => 'app des' ,'parent'=>'message', 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        AppSettings::create([
            'name' => 'default front end layout' ,
            'data'=>[
                'home_carousel_section'=>1,
                'about_section'=>1,
                'features_section'=>1,
                'call_to_action_section'=>1,
                'services_section'=>1,
                'portfolio_section'=>1,
                'testimonials_section'=>1,
                'pricing_section'=>1,
                'faq_section'=>1,
                'team_section'=>1,
                'contact_section'=>1,
            ],
            'description' => 'app des' ,'parent'=>'message', 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        AppSettings::create([
            'name' => 'default front end blood bank layout' ,
            'data'=>[
                'banner_section'=>1,
                'donation_process_section'=>1,
                'campaigns_section'=>1,
                'appointment_section'=>1,
                'cta_section'=>1,
                'gallery_section'=>1,
                'blog_section'=>1,
            ],
            'description' => 'app des' ,'parent'=>'message', 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
    }
}
