<x-app-layout>

        <h1 class='text-4xl'>今日のタスク</h1>
        <h2 class='date'>{{ date('Y-m-d') }}</h2>
        <a href='/'>タスク一覧</a>
        <div class='tasks grid grid-cols-2 grid-rows-2 w-[800px] h-[800px] bg-gray-300'>
            <div class="flex flex-col col-start-1 col-end-2 row-start-1 row-end-2 bg-red-100">
                @foreach ($tasks as $task)
                <div>
                <span class='name'>
                    <a href="/todo/{{ $task->id }}">{{ $task->name }}</a>
                </span>
                <span class='target_time'>{{$task->target_time}}</span>
                </div>
                @endforeach
            </div>
            <div class="col-start-2 col-end-3 row-start-1 row-end-2 bg-blue-100"></div>
            <div></div>
            <div></div>
            
        </div> 
        
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
        <form action="/pasts" method="POST">
        @csrf
        <div class='diary'>
            <h3>今日の反省</h3>
            <select name="diary[evaluation]">
            <option value="1">◎</option>
            <option value="2">◯</option>
            <option value="3">△</option>
          　</select>
          　<input type="text" name="diary[good_thing]" placeholder="良かった点"/>
          　<input type="text" name="diary[improvement]" placeholder="改善点"/>
        </div>
        <input type="submit" value="保存"/>
        </form>
</x-app-layout>