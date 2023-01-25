<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            [
            'name' => 'purin',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'nickname' => 'Haru',
            'description' => 'Hello',
            'gender' => 'man',
            ],
            [
            'name' => 'hana',
            'email' => 'more@test.com',
            'password' => Hash::make('password'),
            'nickname' => 'hanao',
            'description' => 'Hanaoです',
            'gender' => 'man',
            ],
            [
            'name' => 'soso',
            'email' => 'loc@mo.com',
            'password' => Hash::make('password'),
            'nickname' => 'Shiro',
            'description' => 'sample',
            'gender' => 'lady',
             ]
          ]);
    }
}