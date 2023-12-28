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
        <a href='/todo/diary'>create</a>
        <form action="/diary" method="POST">
            @csrf
            <div class='tasks'>
                @foreach ($tasks as $task)
                    <div class='task'>
                        <input type="checkbox"  value="{{ $task->id }}">
                        <span class='name'>
                            <a href="/todo/{{ $task->id }}">{{ $task->name }}</a>
                        </span>
                        <span class='target_time'>{{$task->target_time}}</span>
                        <span class='importance_urgency'>{{$task->importance_urgency}}</span>
                    </div>
                    <form action="/todo/{{ $task->id }}" id="form_{{ $task->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $task->id }})">削除</button> 
                    </form>
                @endforeach
            </div>
            <input type="submit" value="今日のタスク"/>
        </form>
            <script>
                function deletePost(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
    </body>
</html>