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
                        <span class='name'>
                            <a href="/todo/{{ $task->id }}">{{ $task->name }}</a>
                        </span>
                        <span class='target_time'>{{$task->target_time}}</span>
                        @if($task->importance_urgency === 1)
                            <span class='importance_urgency'>緊急!重要!</span>
                        @elseif($task->importance_urgency === 2)
                            <span class='importance_urgency'>重要</span>
                        @elseif($task->importance_urgency === 3)
                            <span class='importance_urgency'>緊急</span>
                        @elseif($task->importance_urgency === 4)
                            <span class='importance_urgency'>緊急でも重要でもない</span>
                        @endif
                    </div>
                @endforeach
        </div>
    </body>
</html>