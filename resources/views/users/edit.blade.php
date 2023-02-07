
<x-app-layout>
　　<div class="container mx-auto">
    　<div class="flex justify-center items-center bg-gray-100 py-6 sm:py-8 lg:py-12 ">
        <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                <h1 class="text-center bg-gray-100 text-gray-800 text-2xl lg:text-3xl font-bold mb-4 md:mb-6">プロフィール編集</h1>
                <div class="mb-6">
                    <label for="nickname"　class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ニックネーム</label>
                    <input type="text" name="user[nickname]" placeholder="タロウ" value="{{ $user->nickname }}"　id="nickname" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                </div>
                <div class="mb-6">
                    <label for="body"　"block mb-2 text-sm font-medium text-gray-900 dark:text-white">説明</label>
                    <input type="text" name="user[description]" placeholder="趣味、好きな服装" value="{{ $user->description }}"　id="description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                </div>
                <input type="submit" value="保存" class="text-white item-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"/>
         </form>
      </div>
    </div>
</x-app-layout>