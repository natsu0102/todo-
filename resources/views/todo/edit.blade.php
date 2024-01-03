<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>タスクの編集</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>タスクの編集</h1>
        <form action="/todo/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <input type='text' name='task[name]' value="{{ $task->name }}">
                <input type='text' name='task[target_time]' value="{{ $task->target_time }}">
                <input type="text" name="task[elapsed_time]" placeholder="かかった時間"/>
                      　<select name="task[importance_urgency]">
                            <option value="1">緊急！重要！</option>
                            <option value="2">重要だけど緊急じゃない</option>
                            <option value="3">緊急だけど重要じゃない</option>
                            <option value="4">緊急でも重要でもない</option>
                      　</select>
            </div>
            <div>
                <select name="task[category_id]">
                    @foreach($categories as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="body">
                <input type='text' name='task[detail]' value="{{ $task->detail }}">
                <h2>モチベーション</h2>
                <input type='text' name='task[purpose]' value="{{ $task->purpose }}">
                <input type='text' name='task[good_future]' value="{{ $task->good_future }}">
                <input type='text' name='task[bad_future]' value="{{ $task->bad_future }}">
                <input type='text' name='task[reward]' value="{{ $task->reward }}">
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>