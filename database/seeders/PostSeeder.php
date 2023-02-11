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
            'title' => '結婚式',
            'body' => '夫婦で着物を着ました。',
            'user_id' => '1',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1676111459/%E3%82%B3%E3%83%BC%E3%83%87%EF%BC%95_lol9pu.jpg',
            'created_at' => new DateTime(),
            ],
            
            [
            'title' => '夏のコーデ',
            'body' => 'シャツ',
            'user_id' => '1',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1676111432/%E3%82%B3%E3%83%BC%E3%83%87%EF%BC%96_us6c9y.jpg',
            'created_at' => new DateTime(),
            ],
            
            [
            'title' => '今日のコーデ♪',
            'body' => 'ニットベストを使ったコーデ',
            'user_id' => '4',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1676111453/%E3%82%B3%E3%83%BC%E3%83%87%EF%BC%93_kchglo.jpg',
            'created_at' => new DateTime(),
            ],
            [
            'title' => 'お気に入り！',
            'body' => 'ロングコート',
            'user_id' => '4',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1676111440/%E3%82%B3%E3%83%BC%E3%83%87%EF%BC%94_hkc4ne.jpg',
            'created_at' => new DateTime(),
            ],
            [
            'title' => '黒シャツ',
            'body' => '普段着です。',
            'user_id' => '1',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1676111609/%E3%82%B3%E3%83%BC%E3%83%87%EF%BC%97_gvhpn0.jpg',
            'created_at' => new DateTime(),
            ],
            [
            'title' => 'はじめまして。',
            'body' => 'スーツスタイル',
            'user_id' => '4',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1676111613/%E3%82%B3%E3%83%BC%E3%83%87%EF%BC%98_rjt2sp.jpg',
            'created_at' => new DateTime(),
            ],
     ]);
    }
}