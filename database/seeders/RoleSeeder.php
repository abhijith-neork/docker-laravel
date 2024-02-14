<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $user_role =  [
            [
                'name' => 'SuperAdmin',
                'description'=>'Admin Full Access',
                'created_at' => date('Y-m-d H:s:i')
            ],
            [
                'name' => 'Admin',
                'description'=>'HR Admin Full Access',
                'created_at' => date('Y-m-d H:s:i')
            ],
            [
                'name' => 'Employee',
                'description'=>'Employee Limited Access',
                'created_at' => date('Y-m-d H:s:i')
            ],
          
       
        ];
        Role::insert($user_role);      
    }
}
