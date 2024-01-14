<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>タスクの詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="edit"><a href="/todo/{{ $task->id }}/edit">編集</a></div>
        <h1 class="title">
            <span class='name'>{{$task->name}}</span>
            <span class='target_time'>{{$task->target_time}}分</span>
            <span class='task[elapsed_time'>{{$task->elapsed_time}}分</span>
            @if($task->importance_urgency === 1)
                <span class='importance_urgency'>緊急!重要!</span>
            @elseif($task->importance_urgency === 2)
                <span class='importance_urgency'>重要</span>
            @elseif($task->importance_urgency === 3)
                <span class='importance_urgency'>緊急</span>
            @elseif($task->importance_urgency === 4)
                <span class='importance_urgency'>緊急でも重要でもない</span>
            @endif
        </h1>
        <div class="category">
            <span class='category_id'>{{$task->category_id}}</span>
        </div>
        <div class="body">
            <span class='detail'>{{$task->detail}}</span>
            <h2>モチベーション</h2>
            <span class='purpose'>{{$task->purpose}}</span>
            <span class='good_future'>{{$task->good_future}}</span>
            <span class='bad_future'>{{$task->bad_future}}</span>
            <span class='reward'>{{$task->reward}}</span>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>