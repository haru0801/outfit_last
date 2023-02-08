<x-app-layout>
　　<div class="container mx-auto">
      <div class="flex justify-center bg-gray-100 py-6 sm:py-8 lg:py-12 ">
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center bg-gray-100 text-gray-800 text-2xl lg:text-3xl font-bold mb-4 md:mb-6">新規投稿作成</h1>
            <div class="mb-6">
                <label for="title"　class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">投稿名</label>
                <input type="text" name="post[title]" placeholder="〇〇コーデ" value="{{ old('post.title') }}"　id="title" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="mb-6">
                <label for="body"　"block mb-2 text-sm font-medium text-gray-900 dark:text-white">説明</label>
                <textarea type="text" name="post[body]" placeholder="ダウンジャケットを使ったコーデ" value="{{ old('post.body') }}"　id="body" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="mb-6">
                <input type="file" name="image">
            </div>
            <input type="submit" value="保存" class="text-white item-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"/>
            <div class="mb-2 text-sm font-medium text-center text-gray-900 dark:text-white">
                    <a href="/posts/index">戻る</a>
            </div>
        </form>
            
      </div>
    </div>
</x-app-layout>
