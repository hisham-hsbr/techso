<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // => Default
        Permission::create(['name' => 'Developer Settings', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Admin Settings', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'App Settings', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Dashboard Menu', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Sidebar Search Menu', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Default

        // => User
        Permission::create(['name' => 'User Read', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Create', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Edit', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Update', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Delete', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Settings', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Profile Read', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Profile Update', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'User Read First Name', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Last Name', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read DOB', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Phone1', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Phone2', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Gender', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Avatar', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Email', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Email Verified', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read City', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Blood', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Time Zone', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Roles', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Permissions', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'User Read Status', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Created By', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Created At', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Updated By', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Updated At', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'User Table Export Excel', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Export PDF', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Print', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Copy', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Column Visible', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= User

        // => Blood
        Permission::create(['name' => 'Blood Menu', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Read', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Create', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Edit', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Update', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Delete', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Settings', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Table', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Read Name', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Read Status', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Read Created By', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Read Created At', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Read Updated By', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Read Updated At', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Export Excel', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Export PDF', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Print', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Blood Table Column Visible', 'parent' => 'Blood', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Blood

        // => Role
        Permission::create(['name' => 'Role Menu', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Create', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Edit', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Update', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Delete', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Settings', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Name', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Users', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Permissions', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Parent', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Status', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Created By', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Created At', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Updated By', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Updated At', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Export Excel', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Export PDF', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table Column Visible', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Role

        // => Permission
        Permission::create(['name' => 'Permission Read', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Create', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Edit', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Update', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Delete', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Settings', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Import', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Permission Read Name', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Parent', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Permission Read Status', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Created By', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Created At', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Updated By', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Updated At', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Permission Table Export Excel', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Export PDF', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Print', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Copy', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Column Visible', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Permission

        // => Activity Logs
        Permission::create(['name' => 'Activity Logs Read', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Settings', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Table', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs View', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Activity Logs Read Log Name', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Read Description', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Read Event', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Read Event User', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Read Subject Type', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Read Causer Type', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Activity Logs Read Created At', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // Permission::create(['name' => 'Activity Logs Read Created By' , 'parent' => 'Activity Logs' , 'guard_name' => 'web' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        // Permission::create(['name' => 'Activity Logs Read Updated By' , 'parent' => 'Activity Logs' , 'guard_name' => 'web' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);
        // Permission::create(['name' => 'Activity Logs Read Updated At' , 'parent' => 'Activity Logs' , 'guard_name' => 'web' , 'status' => '1' , 'created_by' => '1' , 'updated_by' => '1']);

        Permission::create(['name' => 'Activity Logs Table Export Excel', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Table Export PDF', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Table Print', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Table Copy', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs Table Column Visible', 'parent' => 'Activity Logs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Activity Logs

        // Start => Activity Logs models
        Permission::create(['name' => 'Activity Logs For User', 'parent' => 'Activity Logs Models', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs For Time Zone', 'parent' => 'Activity Logs Models', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs For Role', 'parent' => 'Activity Logs Models', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs For Permission', 'parent' => 'Activity Logs Models', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs For Blood', 'parent' => 'Activity Logs Models', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs For App Settings', 'parent' => 'Activity Logs Models', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Logs For Brand', 'parent' => 'Activity Logs Models', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Activity Logs models

        // Start => Service
        Permission::create(['name' => 'Service Read', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Create', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Edit', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Update', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Delete', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Settings', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Import', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Table', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Service Read Code', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Name', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Local Name', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Date', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Job Number', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Job Type', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Contact Name', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Contact Number', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read IMEI', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Lock', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Model', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Complaint', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Complaint Details', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Work Details', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Delivered At', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Work Status', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Job Status', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Payment', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Advance', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Balance', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Service Print PDF', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Service Read Description', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Edit Description', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Service Read Status', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Created By', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Created At', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Updated By', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Read Updated At', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Service Table Export Excel', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Table Export PDF', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Table Print', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Table Copy', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Service Table Column Visible', 'parent' => 'Service', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // End <= Service

        // Start => Job Type
        Permission::create(['name' => 'Job Type Read', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Create', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Edit', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Update', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Delete', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Settings', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Import', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Table', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Print PDF', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Job Type Read Code', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Read Name', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Job Type Read Description', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Read Edit Description', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Job Type Read Status', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Read Created By', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Read Created At', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Read Updated By', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Read Updated At', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Job Type Table Export Excel', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Table Export PDF', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Table Print', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Table Copy', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Type Table Column Visible', 'parent' => 'Job Type', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // End <= Job Type

        // Start => Mobile Complaint
        Permission::create(['name' => 'Mobile Complaint Read', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Create', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Edit', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Update', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Delete', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Settings', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Import', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Table', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Print PDF', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Mobile Complaint Read Code', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Read Name', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Mobile Complaint Read Description', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Read Edit Description', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Mobile Complaint Read Status', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Read Created By', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Read Created At', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Read Updated By', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Read Updated At', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Mobile Complaint Table Export Excel', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Table Export PDF', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Table Print', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Table Copy', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Complaint Table Column Visible', 'parent' => 'Mobile Complaint', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // End <= Mobile Complaint

        // Start => Work Status
        Permission::create(['name' => 'Work Status Read', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Create', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Edit', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Update', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Delete', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Settings', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Import', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Table', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Print PDF', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Work Status Read Code', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Read Name', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Work Status Read Description', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Read Edit Description', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Work Status Read Status', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Read Created By', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Read Created At', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Read Updated By', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Read Updated At', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Work Status Table Export Excel', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Table Export PDF', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Table Print', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Table Copy', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Work Status Table Column Visible', 'parent' => 'Work Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // End <= Work Status

        // Start => Job Status
        Permission::create(['name' => 'Job Status Read', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Create', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Edit', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Update', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Delete', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Settings', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Import', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Table', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Print PDF', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Job Status Read Code', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Read Name', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Job Status Read Description', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Read Edit Description', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Job Status Read Status', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Read Created By', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Read Created At', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Read Updated By', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Read Updated At', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Job Status Table Export Excel', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Table Export PDF', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Table Print', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Table Copy', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Job Status Table Column Visible', 'parent' => 'Job Status', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // End <= Job Status

        // Start => Mobile Model
        Permission::create(['name' => 'Mobile Model Read', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Create', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Edit', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Update', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Delete', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Settings', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Import', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Table', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Print PDF', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Mobile Model Read Code', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Read Name', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Read Brand', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Mobile Model Read Description', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Read Edit Description', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Mobile Model Read Status', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Read Created By', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Read Created At', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Read Updated By', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Read Updated At', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Mobile Model Table Export Excel', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Table Export PDF', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Table Print', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Table Copy', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Mobile Model Table Column Visible', 'parent' => 'Mobile Model', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // End <= Mobile Model

        // Start => Brand
        Permission::create(['name' => 'Brand Read', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Create', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Edit', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Update', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Delete', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Settings', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Import', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Table', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Print PDF', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Brand Read Code', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Read Name', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Brand Read Description', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Read Edit Description', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Brand Read Status', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Read Created By', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Read Created At', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Read Updated By', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Read Updated At', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Brand Table Export Excel', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Table Export PDF', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Table Print', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Table Copy', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Brand Table Column Visible', 'parent' => 'Brand', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // End <= Brand

        // Start => Image Controller
        Permission::create(['name' => 'Image Controller Read', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Create', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Edit', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Update', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Delete', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Settings', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Import', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Table', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Print PDF', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Image Controller Read Code', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Name', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Type', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Title', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Data', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read URL', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Group', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Parent', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Image Controller Read Description', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Edit Description', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Image Controller Read Status', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Created By', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Created At', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Updated By', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Read Updated At', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Image Controller Table Export Excel', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Table Export PDF', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Table Print', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Table Copy', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Image Controller Table Column Visible', 'parent' => 'Image Controller', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // End <= Image Controller

    }
}
