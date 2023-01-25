<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>レビュー作成</title>
    </head>
    <body>
        <form action="/posts/review" method="POST">
            @csrf
            <div class="star">
                <h2>評価</h2>
                <input type="text" name="review[star]" placeholder="１～５" value="{{ old('review.star') }}"/>
                <p class="star__error" style="color:red">{{ $errors->first('review.star') }}</p>
            </div>
            <div class="comment">
                <h2>コメント</h2>
                <textarea name="review[comment]" placeholder="おしゃれです">{{ old('review.comment') }}</textarea>
                <p class="comment__error" style="color:red">{{ $errors->first('review.comment') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
                
        </div>
    </body>
</html>