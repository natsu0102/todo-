<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>今日のタスク</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='text-4xl'>今日のタスク</h1>
        <a href='/'>タスク一覧</a>
        <div class='tasks'>
                @foreach ($tasks as $task)
                    <div class='tasks'>
                        <span class='name'>{{ $task->name }}</span>
                        <span class='target_time'>{{$task->target_time}}</span>
                        <span class='importance_urgency'>{{$task->importance_urgency}}</span>
                    </div>
                @endforeach
        </div>
    </body>
</html>