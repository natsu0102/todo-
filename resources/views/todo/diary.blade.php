<x-app-layout>
   
{{--<span class="dli-arrow-right"></span>--}}

        <h1 class='text-4xl'>今日のタスク</h1>
        <h2 class='date'>{{ date('Y-m-d') }}</h2>
        <a href='/'>タスク一覧</a>
        <div class="tasks grid grid-cols-2 grid-rows-2 w-[800px] h-[600px] bg-cover text-xl" style="background-image: url('/img/arrow_2.png');">
                <div class="flex flex-col col-start-1 col-end-2 row-start-1 row-end-2 pt-8 pl-8 pr-16 rounded-lg ">
                    @foreach ($tasks1 as $task1)
                    <div>
                    <span class='name'>
                        <a href="/todo/{{ $task1->id }}">{{ $task1->name }}</a>
                    </span>
                    <span class='target_time'>{{$task1->target_time}}</span>
                    </div>
                    @endforeach
                </div>
                <div class="col-start-2 col-end-3 row-start-1 row-end-2 pt-8 pr-16">
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
                <div class="col-start-1 col-end-2 row-start-2 row-end-3 pt-20 pl-8 pr-16">
                    @foreach ($tasks3 as $task3)
                    <div>
                    <span class='name'>
                        <a href="/todo/{{ $task3->id }}">{{ $task3->name }}</a>
                    </span>
                    <span class='target_time'>{{$task3->target_time}}</span>
                    </div>
                    @endforeach
                </div>
                <div class="col-start-2 col-end-3 row-start-2 row-end-3 pt-20 pr-16">
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