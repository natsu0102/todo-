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
        <div class='tasks'>
            @foreach ($tasks as $task)
                <div class='task'>
                    <span class='name'>{{$task->name}}</span>
                    <span class='target_time'>{{$task->target_time}}</span>
                    <span class='importance_urgency'>{{$task->importance_urgency}}</span>
                </div>
            @endforeach
        </div>
    <!--<a href='/posts/create'>create</a> -->
    </body>
</html>