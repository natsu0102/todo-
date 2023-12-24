<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Todo</title>
    </head>
    <body>
        <h1>タスクの追加</h1>
        <form action="/todo" method="POST">
            @csrf
            <div class="title">
                <input type="text" name="task[name]" placeholder="タスク名"/>
                <input type="text" name="task[target_time]" placeholder="目標時間"/>
                <input type="text" name="task[importance_urgency]" placeholder="緊急重要（後で選択式にする）"/>
            </div>
            <div>
                <select name="task[category_id]">
                    @foreach($categories as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="body">
                <textarea name="task[detail]" placeholder="具体的な内容を記入"></textarea>
                <h2>モチベーション</h2>
                <textarea name="task[purpose]" placeholder="目的"></textarea>
                <textarea name="task[good_future]" placeholder="良い未来"></textarea>
                <textarea name="task[bad_future]" placeholder="悪い未来"></textarea>
                <textarea name="task[reward]" placeholder="ご褒美"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>