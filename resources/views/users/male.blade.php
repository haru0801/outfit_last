 <x-app-layout>
            <h1>Blog Name</h1>
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
            <form method="GET" action="{{ route('post.search') }}">
                <input type="search" placeholder="キーワードを入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div>
                    <button type="submit">検索</button>
                </div>
            </form>
            
                        <!--<a href='/posts/create'>create</a>-->
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
    </x-app-layout>