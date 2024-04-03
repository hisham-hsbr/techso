<?php

use App\Models\AppSettings;
use App\Models\DeveloperSettings;


// Developer Settings view

view()->share('application', DeveloperSettings::firstWhere('name', 'application'));
view()->share('page', DeveloperSettings::firstWhere('name', 'page'));
view()->share('developer', DeveloperSettings::firstWhere('name', 'developer'));
view()->share('logo', DeveloperSettings::firstWhere('name', 'logo'));


// App Settings view
view()->share('default_layout', AppSettings::firstWhere('name', 'default layout'));
view()->share('default_action', AppSettings::firstWhere('name', 'default action'));
view()->share('default_message', AppSettings::firstWhere('name', 'default message'));
view()->share('default_front_end_layout', AppSettings::firstWhere('name', 'default front end layout'));


// Blood Bank Settings
view()->share('default_front_end_blood_bank_layout', AppSettings::firstWhere('name', 'default front end blood bank layout'));

