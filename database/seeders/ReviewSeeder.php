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
            [
            'comment' => 'review_comment',
            'stars' => '2',
            'user_id' => '2',
            'post_id' => '1'
            ],
            [
            'comment' => 'review_comment',
            'stars' => '5',
            'user_id' => '3',
            'post_id' => '1'
            ],
            [
            'comment' => 'review_comment',
            'stars' => '1',
            'user_id' => '2',
            'post_id' => '2'
            ],
            [
            'comment' => 'review_comment',
            'stars' => '2',
            'user_id' => '3',
            'post_id' => '2'
            ],
            [
            'comment' => 'review_comment',
            'stars' => '2',
            'user_id' => '2',
            'post_id' => '4'
            ],
            [
            'comment' => 'review_comment',
            'stars' => '3',
            'user_id' => '3',
            'post_id' => '4'
            ],
            [
            'comment' => 'review_comment',
            'stars' => '1',
            'user_id' => '2',
            'post_id' => '5'
            ],
            [
            'comment' => 'review_comment',
            'stars' => '1',
            'user_id' => '3',
            'post_id' => '5'
            ],
            [
            'comment' => 'review_comment',
            'stars' => '5',
            'user_id' => '2',
            'post_id' => '6'
            ],
            [
            'comment' => 'review_comment',
            'stars' => '5',
            'user_id' => '3',
            'post_id' => '6'
            ],
            ]);
    }
}