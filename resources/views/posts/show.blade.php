
    <x-app-layout>
        <div class="flex w-4/5 mx-auto py-2">
        	<div class="w-full bg-white shadow-md rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
        			<img class="rounded-t-lg p-8 " src="{{ $post->image_url }}" alt=" image">
        			<div class="px-5 pb-5">
        				<h3 class="text-gray-900 font-semibold text-xl tracking-tight dark:text-white underline">{{ $post->title }}</h3>
        				<a class="text-gray-900 font-semibold text-lg tracking-tight dark:text-white">{{ $post->body }}</a>
        				<div class="flex items-center mt-2.5 mb-5">
        					<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>評価</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        					<span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ round($post->stars_review, 2) }}</span>
        					<a  class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">{{ $post->reviews_count }} reviews</a>
        				</div>
        				<div class="flex items-center justify-between">
        					<a href="/users/{{ $post->user->id }}" class="text-3xl font-bold text-gray-900 dark:text-white underline">{{ $post->user->name }}</a>
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
        	</div>
               
            <div class="bg-gray-100 w-full">
               <div class= "items-center overflow-y-auto h-4/5 w-full">
                    @foreach($post->reviews as $review)
                           <div class='w-3/4 px-10 py-5 m-5 bg-white rounded-lg shadow-xl'>
                                <div class ='review_name'>
                                    <a href="/users/{{ $review->user->id }}">{{ $review->user->name }}</a>

                                </div>
                                <div class="flex items-center mt-2.5 mb-5">
                                   <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>評価</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            				       <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $review->stars }}</span>
                                </div>
                                <p class='comment'>{{$review->comment}}</p>
                                 @if (auth()->id() == $review->user_id)
                                <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-1" style="margin-top:10px" type="button" onclick="deleteReview({{ $review->id }})">delete</button> 
                                </form>
                                @endif
                            </div>
                    @endforeach
                   
                </div>
                @if (auth()->id() != $post->user_id)
                <button class="text-left inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-1" style="margin-left:20px" type = "button" onclick="location.href='{{ route('review.create', $post->id)}}'">レビュー作成</button>
                @endif
                <script>
                    function deleteReview(id) {
                        'use strict'
                
                        
                        document.getElementById(`form_${id}`).submit();
                        
                    }
                </script>
            </div>
    </div>
    
</x-app-layout>