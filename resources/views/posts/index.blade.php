
    <x-app-layout>
        <form method="GET" action="{{ route('user.test') }}">
                @csrf
        
                <div class="form-group row">
                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                
                    <div class="col-md-6" style="padding-top: 8px">
                        <input id="gender-m" type="radio" name="gender" value="1">
                        <label for="gender-m">Male</label>
                        <input id="gender-f" type="radio" name="gender" value="2">
                        <label for="gender-f">Female</label>
                
                        @if ($errors->has('gender'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div>
                    <button type="submit">絞り込み</button>
                </div>
            </form>
            <h1>Blog Name</h1>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->user->name }}</a>
                        </h2>
                        <div>
                            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                        </div>
                        <p class='body'>{{ $post->body }}</p>
                        
                評価平均{{ $post->stars_review }}
                    </div>
                @endforeach
            </div>
            
            <form method="GET" action="{{ route('post.search') }}">
                <input type="search" placeholder="キーワードを入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div>
                    <button type="submit">検索</button>
                </div>
            </form>
            
                        <!--<a href='/posts/create'>create</a>-->
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
    </x-app-layout>