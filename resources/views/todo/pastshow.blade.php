<!DOCTYPE html>
<?php
$count = 0
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>過去のタスク</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h2 class='date'>{{ date('Y-m-d') }}</h2>
        <div class="evaluation">
            {{ $diary->evaluation }}
        </div>
        <div class=good_thing&improvement>
            {{ $diary->good_thing }}
            {{ $diary->improvement}}
        </div>
        {{--<a href='/'>タスク一覧</a>--}}
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>