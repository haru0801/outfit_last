
    <x-app-layout>
        <div class="bg-gray-100 py-6 sm:py-8 lg:py-12">
          <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
                 <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">女性の最新のコーデ一覧</h2>
            <div class="max-w-xl flex flex-col items-center text-center mx-auto">
            <div class="flex flex-col items-center lg:items-end">
                <form method="GET" action="{{ route('post.search') }}" class="w-full max-w-md flex gap-2 mb-3">
                 <input type="search" placeholder="キーワードを入力" class="w-full flex-1 bg-gray-white text-gray-800 placeholder-gray-400 border border-gray-300 focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" name="search" value="@if (isset($search)) {{ $search }} @endif">
        
                  <button type="submit" class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded outline-none transition duration-100 px-8 py-2">検索</button>
                </form>
              </div>
              <div class="w-full flex flex-col sm:flex-row sm:justify-center gap-2.5">
                <a href="/users/male" class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">男性のコーデ</a>
        
                <a href="/users/female" class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">女性のコーデ</a>
              </div>
            </div>
            
          </div>
        </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 xl:gap-8">
                @foreach ($posts as $post)
                    
                          <a href="/posts/{{ $post->id }}" class="group h-48 md:h-64 xl:h-96 flex flex-col bg-gray-100 rounded-lg shadow-lg overflow-hidden relative">
                            <img src="{{ $post->image_url }}" alt="画像が読み込めません" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />
                    
                            <div class="bg-gradient-to-t from-gray-800 md:via-transparent to-transparent absolute inset-0 pointer-events-none"></div>
                    
                            <div class="relative p-4 mt-auto">
                              <span class="block text-gray-200 text-sm">評価：☆{{ round($post->stars_review, 2) }}</span>
                              <h2 class="text-white text-xl font-semibold transition duration-100 mb-2">{{ $post->title }}</h2>
                    
                              <span class="text-indigo-300 font-semibold">View more</span>
                            </div>
                          </a>
                         
                      
                @endforeach
                
            </div>
            <div class='py-12 px-8 text-gray-800 text-xl text-center'>
                {{ $posts->links() }}
            </div>
               
    </x-app-layout>