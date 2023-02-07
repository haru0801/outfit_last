
    <x-app-layout>
        <div className="grid sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6 xl:gap-8">
            <div name="post" class="group h-48 md:h-64 xl:h-96 flex flex-col bg-gray-100 rounded-lg shadow-lg overflow-hidden relative">
                <img src="{{ $post->image_url }}" alt="画像が読み込めません" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />
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
            </div>
            <div class "w=1/2">
                <div class="flex ">
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>評価</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">{{ round($post->stars_review, 2) }}</p>
                    <span class="w-1 h-1 mx-1.5 bg-gray-100 rounded-full dark:bg-gray-400 px-2"></span>
                    <a  class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">{{ $post->reviews_count }} reviews</a>
                </div>
               <div class= "flex  items-center overflow-auto h-32">
                    @foreach($post->reviews as $review)
                            <div class='review'>
                                <div class ='review_name'>
                                    <a href="/users/{{ $review->user->id }}">{{ $review->user->name }}</a
                                </div>
                                <h2 class='stars'>
                                    {{ $review->stars }}
                                </h2>
                                <p class='comment'>{{$review->comment}}</p>
                                 @if (auth()->id() == $review->user_id)
                                <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deleteReview({{ $review->id }})">delete</button> 
                                </form>
                                @endif
                            </div>
                    @endforeach
                </div>
                @if (auth()->id() != $post->user_id)
             <a href='/reviews/create/{{ $post->id }}'>レビューする</a>
             @endif
        <script>
            function deleteReview(id) {
                'use strict'
        
                
                document.getElementById(`form_${id}`).submit();
                
            }
        </script>
    </div>
</x-app-layout>