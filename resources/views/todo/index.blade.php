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
        <a href='/today'>今日のタスク一覧</a>
        <form action="/today/" method="post">
            <div class='tasks grid grid-cols-2 grid-rows-2 w-full h-full'>
                
                    @csrf
                    <div class="col-start-1 col-end-2 row-start-1 row-end-2">
                        
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                 
                    <button type="submit" value="今日のタスク">今日のタスクとして保存</button>
               
            </div> 
        </form>
           @foreach ($tasks as $task)
                　　@if($task->elapsed_time === null)
                        <div class='task'>
                            <input type="checkbox" name="tasks[]" value="{{ $task->id }}" {{$task->diary_id === $today_diary_id ? 'checked' : ''}}>
                            {{--nameはチェック項目の名前。複数のタスクがあるから[]。valueで、taskテーブルのidをコントローラーに送る。--}}
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
                    @endif
                @endforeach
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