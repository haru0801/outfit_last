   <x-app-layout>
            <h1>Ranking</h1>
            <a href='/users/male/ranking'>男性</a>
            <a href='/users/female/ranking'>女性</a>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->user->name }}</a>
                        </h2>
                        <div>
                            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                        </div>
                        <p class='body'>{{ $post->body }}</p>
                        評価平均{{ round($post->stars_review, 2) }}
                    </div>
                @endforeach
            </div>
            
    </x-app-layout>