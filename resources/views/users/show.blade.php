
<x-app-layout>
        <div class="bg-gray-100 border-b-2 border-gray-400 py-2 sm:py-4 lg:py-6">
          <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
              <div class="flex mt-2">
                 <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold  py-1 ml-2 mb-4 md:mb-6"> {{ $user->name }}</h2>
                 <div class="text-gray-400 text-xl lg:text-xl font-bold mb-4 md:mb-6 py-2 px-4">{{ $user->nickname }}</div>
                 @if(Auth::id() != $user->id)
                                       @if (Auth::user()->isFollowing($user->id))
                                           <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                                               {{ csrf_field() }}
                                               {{ method_field('DELETE') }}
         
                                               <button type="submit" class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">フォロー解除</button>
                                           </form>
                                       @else
                                           <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                                               {{ csrf_field() }}
         
                                               <button type="submit" class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">フォローする</button>
                                           </form>
                                       @endif
                @endif
              </div>
              <a class="text-gray-800 text-xl lg:text-xl ml-2 mb-4 md:mb-6">{{ $user->description }}</a>
                 <div class="w-full flex flex-col sm:flex-row sm:justify-left gap-2.5">
                                        @if (auth()->id() == $user->id)
                                          <div>
                                             <button class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-1" style="margin-top:10px" type = "button" onclick="location.href='{{ route('user.edit', $user->id)}}'">編集する</button>
                                           </div>
                                        @endif
                        <div class="text-gray-800 text-sm lg:text-base mt-3 mb-4 md:mb-6  ml-2">フォロワー数:{{ $followed_count }}</div>
                </div>
                
                 
                 
                 
            </div>
        </div>
            <div class="grid m-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 xl:gap-8">
                @foreach ($user->posts as $post)
                    
                          <a href="/posts/{{ $post->id }}" class="group h-48 md:h-64 xl:h-96 flex flex-col bg-gray-100 rounded-lg shadow-lg overflow-hidden relative">
                            <img src="{{ $post->image_url }}" alt="画像が読み込めません" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />
                    
                            <div class="bg-gradient-to-t from-gray-800 md:via-transparent to-transparent absolute inset-0 pointer-events-none"></div>
                    
                            <div class="relative p-4 mt-auto">
                
                              <h2 class="text-white text-xl font-semibold transition duration-100 mb-2">{{ $post->title }}</h2>
                    
                              <span class="text-indigo-300 font-semibold">View more</span>
                            </div>
                          </a>
                         
                      
                @endforeach
                 
            </div>
               
</x-app-layout>