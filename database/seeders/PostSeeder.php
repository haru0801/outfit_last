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
            'body' => '着物',
            'user_id' => '1',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1675156843/%E7%9D%80%E7%89%A9_do2toa.jpg'
            ],
            
            [
            'title' => 'ready',
            'body' => 'スーツ',
            'user_id' => '1',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1675156810/%E3%82%B9%E3%83%BC%E3%83%84_hkncqz.jpg'
            ],
            
            [
            'title' => 'mow',
            'body' => 'ワンピース',
            'user_id' => '4',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1675156837/%E3%83%AF%E3%83%B3%E3%83%94%E3%83%BC%E3%82%B9_qxgvv4.jpg'
            ],
            [
            'title' => 'Mori',
            'body' => 'ロングコート',
            'user_id' => '4',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1675156827/%E3%83%AD%E3%83%B3%E3%82%B0%E3%82%B3%E3%83%BC%E3%83%88_b25ylp.jpg'
            ],
            [
            'title' => 'Koro',
            'body' => 'ロングコート',
            'user_id' => '1',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1675156801/lev_code2_ao8fo7.jpg'
            ],
            [
            'title' => 'こんにちは',
            'body' => 'レザースカート',
            'user_id' => '4',
            'image_url' =>'https://res.cloudinary.com/djyg6jqy2/image/upload/v1675156822/%E3%83%AC%E3%82%B6%E3%83%BC%E3%82%B9%E3%82%AB%E3%83%BC%E3%83%88_nkow2v.jpg'
            ],
     ]);
    }
}