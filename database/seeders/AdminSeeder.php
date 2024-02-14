<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Config;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->truncate();

        $user = new User;
        $user->name                  = 'Super Admin';
        $user->email                 = 'admin@neork.com';
        $user->role_id               = 1;
        $user->password              = Hash::make('Neork@123');
        $user->created_at            = '2023-11-07 02:20:00';
        $user->save();    
    }
}
