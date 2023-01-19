<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
            'title' => 'top',
            'body' => 'test',
            'user_id' => '1',
            ],
            
            [
            'title' => 'ready',
            'body' => 'yse',
            'user_id' => '1',
            ],
            
            [
            'title' => 'mow',
            'body' => 'no',
            'user_id' => '1',
            ],
     ]);
    }
}