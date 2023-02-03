   <x-app-layout>
            <h1>Female Ranking</h1>
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
                __}{|
                @endforeach
            </div>
            
    </x-app-layout>