
    <x-app-layout>
        <div class="bg-gray-100 py-6 sm:py-8 lg:py-12">
          <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
                 <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">今月のトップ５:男性</h2>
            <div class="max-w-xl flex flex-col items-center text-center mx-auto">
              <div class="w-full flex flex-col sm:flex-row sm:justify-center gap-2.5">
                <a href="/users/male/ranking" class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">男性のコーデ</a>
        
                <a href="/users/female/ranking" class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">女性のコーデ</a>
              </div>
            </div>
            
          </div>
        </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 md:gap-6 xl:gap-8">
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
               
    </x-app-layout>