<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>カテゴリー作成</title>
    </head>
    <body>
        <h1>カテゴリー作成</h1>
        <form action="/categories" method="POST">
            @csrf
            <div class="title">
                {{--今あるカテゴリー表示--}}
                <h2>新しいカテゴリー</h2>
                <input type="text" name="categories[name]" placeholder="カテゴリー"/>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>