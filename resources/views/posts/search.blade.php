 <x-app-layout>
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
        
 </x-app-layout>
 