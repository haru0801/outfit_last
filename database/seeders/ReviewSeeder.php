<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
            'comment' => 'review_comment',
            'stars' => '1',
            'user_id' => '2',
            'post_id' => '3'
            ],
            [
            'comment' => 'review_comment_02',
            'stars' => '5',
            'user_id' => '3',
            'post_id' => '3' 
            ],
            ]);
    }
}