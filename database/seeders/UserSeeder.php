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
            'name' => 'よしき',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'nickname' => 'Yoshi',
            'description' => 'Hello',
            'gender' => 'man',
            ],
            [
            'name' => 'はなお',
            'email' => 'more@test.com',
            'password' => Hash::make('password'),
            'nickname' => 'hanao',
            'description' => 'Hanaoです',
            'gender' => 'man',
            ],
            [
            'name' => '直美',
            'email' => 'loc@mo.com',
            'password' => Hash::make('password'),
            'nickname' => 'Shiro',
            'description' => 'sample',
            'gender' => 'lady',
             ],
             [
            'name' => '裕子',
            'email' => 'loc@m',
            'password' => Hash::make('password'),
            'nickname' => 'ゆーこ',
            'description' => 'sample',
            'gender' => 'lady',
             ]
          ]);
    }
}