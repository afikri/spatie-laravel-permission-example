<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'              => 'adminstrator',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('admin'),
        ]);
        $user = User::find(1);
        $user->assignRole(1);
    }
}
