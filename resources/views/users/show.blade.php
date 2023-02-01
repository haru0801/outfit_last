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
            </div>
            <div class="nickname">
                <p>{{ $user->nickname }}</p>
            </div>
            
            <div class="description">
                <div class="description__user">
                    <h3>自己紹介</h3>
                    <p>{{ $user->description }}</p>    
                </div>
            </div>
            フォロワー数{{ $followed_count }}
             @foreach($user->posts as $post)
            <div class='posts'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <div>
                            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                        </div>
            </div>
            @endforeach
            <div class="footer">
                <a href="/posts/index">戻る</a>
            </div>
            @if (auth()->id() == $user->id)
              <div class="mb-4 text-center" style="margin-top:10px">
                 <button type = "button" onclick="location.href='{{ route('user.edit', $user->id)}}'">編集する</button>
               </div>
            @endif
        </body>
    </x-app-layout>
</html>