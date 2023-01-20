<x-app-layout>
    <body>
        <h1 class="title">プロフィール画面</h1>
        <div class="content">
            <form action="/users/{{ $user->id }}" method="USER">
                @csrf
                @method('PUT')
                <div class='nickname'>
                    <h2>表示名</h2>
                    <input type='text' name='user[nickname]' value="{{ $user->nickname }}">
                </div>
                <div class='description__user'>
                    <h2>自己紹介文</h2>
                    <input type='text' name='user[description]' value="{{ $user->description }}">
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
    </body>
</x-app-layout>