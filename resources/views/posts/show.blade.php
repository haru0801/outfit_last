<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Posts</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <h1 class="title">
                {{ $post->title }}
            </h1>
            <h2>
                <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>
            </h2>
            <div class="content">
                <div class="content__post">
                    <h3>本文</h3>
                    <p>{{ $post->body }}</p>    
                </div>
            </div>
            <div class="footer">
                <a href="route('post.index')">戻る</a>
            </div>
        </body>
     </x-app-layout>
</html>