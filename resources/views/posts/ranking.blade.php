   <x-app-layout>
            <h1>Ranking</h1>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->user->name }}</a>
                        </h2>
                        <p class='body'>{{ $post->body }}</p>
                        評価平均{{ $post->stars_review }}
                    </div>
                @endforeach
            </div>
            
    </x-app-layout>