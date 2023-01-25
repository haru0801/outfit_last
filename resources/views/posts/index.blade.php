
    <x-app-layout>
            <h1>Blog Name</h1>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->user->name }}</a>
                        </h2>
                        <p class='body'>{{ $post->body }}</p>
                    </div>
                @endforeach
            </div>
            <a href='/posts/create'>create</a>
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
    </x-app-layout>