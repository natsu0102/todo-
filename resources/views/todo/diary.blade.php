<x-app-layout>

    <style>
       

        .arrow-container {
            position: relative;
            width: 100%;
            height: 100vh; /* 画面いっぱいにするための高さ指定 */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .arrow-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            border-right: 20px solid transparent;
            border-bottom: 40px solid #007bff; /* 矢印の色を指定 */
        }
    </style>

        <h1 class='text-4xl'>今日のタスク</h1>
        <h2 class='date'>{{ date('Y-m-d') }}</h2>
        <a href='/'>タスク一覧</a>
        <div class='tasks grid grid-cols-2 grid-rows-2 w-[800px] h-[800px] bg-gray-300'>
                <div class="flex flex-col col-start-1 col-end-2 row-start-1 row-end-2 bg-red-100">
                    @foreach ($tasks1 as $task1)
                    <div>
                    <span class='name'>
                        <a href="/todo/{{ $task1->id }}">{{ $task1->name }}</a>
                    </span>
                    <span class='target_time'>{{$task1->target_time}}</span>
                    </div>
                    @endforeach
                </div>
                <div class="col-start-2 col-end-3 row-start-1 row-end-2 bg-blue-100">
                    @foreach ($tasks2 as $task2)
                    <div>
                    <span class='name'>
                        <a href="/todo/{{ $task2->id }}">{{ $task2->name }}</a>
                    </span>
                    <span class='target_time'>{{$task2->target_time}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div>
                <div class="col-start-1 col-end-2 row-start-2 row-end-3 bg-green-100">
                    @foreach ($tasks3 as $task3)
                    <div>
                    <span class='name'>
                        <a href="/todo/{{ $task3->id }}">{{ $task3->name }}</a>
                    </span>
                    <span class='target_time'>{{$task3->target_time}}</span>
                    </div>
                    @endforeach
                </div>
                <div class="col-start-2 col-end-3 row-start-2 row-end-3 bg-red-100">
                    @foreach ($tasks4 as $task4)
                    <div>
                    <span class='name'>
                        <a href="/todo/{{ $task4->id }}">{{ $task4->name }}</a>
                    </span>
                    <span class='target_time'>{{$task4->target_time}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            
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