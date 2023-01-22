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
            <h1 class="name">
                {{ $user->name }}
            </h1>
             <div class="d-flex justify-content-end flex-grow-1">
                                   @if(Auth::id() != $user_flg)
                                   @if (Auth::user()->isFollowing($user->id))
                                       <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE') }}
     
                                           <button type="submit" class="btn btn-danger">フォロー解除</button>
                                       </form>
                                   @else
                                       <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                                           {{ csrf_field() }}
     
                                           <button type="submit" class="btn btn-primary">フォローする</button>
                                       </form>
                                   @endif
                                   @endif
            <div class="nickname">
                <p>{{ $user->nickname }}</p>
            </div>
            
            <div class="description">
                <div class="description__user">
                    <h3>自己紹介</h3>
                    <p>{{ $user->description }}</p>    
                </div>
            </div>
            <div class="footer">
                <a href="/posts/index">戻る</a>
            </div>
            <div class="edit"><a href="/users/{{ $user->id }}/edit">プロフィール編集</a></div>
        </body>
    </x-app-layout>
</html>