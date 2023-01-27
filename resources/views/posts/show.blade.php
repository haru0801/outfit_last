
    <x-app-layout>
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
            {{ $average }}
            <div class="footer">
                <a href="/posts/index">戻る</a>
            </div>
            @foreach($post->reviews as $review)
            <div class='review'>
                        <h2 class='stars'>
                            {{ $review->stars }}
                        </h2>
                        <p class='comment'>{{$review->comment}}</p>
                    </div>
            @endforeach
                    
             
            @if (auth()->id() == $post->user_id)
              <div class="mb-4 text-center" style="margin-top:10px">
                <form style="display: inline-block;"method="POST"
                      action="{{ route('post.delete', $post->id) }}"
                 >
                 @csrf
                 @method('DELETE')
                 <button class="btn btn-danger">削除する</button>
                 </form>
               </div>
            @endif
             @if (auth()->id() != $post->user_id)
             <a href='/reviews/create/{{ $post->id }}'>レビューする</a>
             @endif
        </body>
     </x-app-layout>
</html>