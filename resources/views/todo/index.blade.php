<!DOCTYPE html>
<?php
$count = 0
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>タスク一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='text-4xl'>タスク一覧</h1>
        <a href='/todo/addition'>追加</a>
        <div class='tasks'>
            @foreach ($tasks as $task)
                <div class='task'>
                    <input type="checkbox"/>
                    <span class='name'>
                        <a href="/todo/{{ $task->id }}">{{ $task->name }}</a>
                    </span>
                    <span class='target_time'>{{$task->target_time}}</span>
                    <span class='importance_urgency'>{{$task->importance_urgency}}</span>
                </div>
            @endforeach
        </div>
    </body>
</html>