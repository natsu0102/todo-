<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;


class DiaryController extends Controller
{
    public function store(Request $request, Task $task, Diary $diary)
    {
        $today = now()->format('Y-m-d');//today現在（年月日）とする
        if (!Diary::where('date', $today)->exists()){//もし、今日を指定したdateがなかったら、
            $diary=new Diary(); //新しくdiaryテーブルを作る
            $diary->date = $today;//diaryテーブルのdateを今日にする
            $diary->save();
        }
        $diary_id = Diary::where('date', $today)->first()->id;//diaryテーブルのdateが今日のものをとってくる
        $tasks_id = $request['tasks'];//indexのnameと同じ。
        if($tasks_id){
            foreach($tasks_id as $task_id) {
                $task=Task::where('id', $task_id)->first();//idを探す。特定のidの中で初めのものをピックアップ
                $task->diary_id = $diary_id;//diary_idに今日のdiary_idを指定
                $task->save();
            }
        }
        $tasks=Task::where('elapsed_time', null)->get();
        foreach($tasks as $task){
            if($tasks_id){//tasks_id=チェックが入ったタスク
                if(!in_array($task->id, $tasks_id)){//$task->id=１つ１つのタスクのidで、$tasks_idに値するものを検索。
                    $task->diary_id = null;//チェックが入っていないtaskは、diary_idをnull
                    $task->save();
                } 
            }else{
                $task->diary_id = null;//チェックが入っていない（昨日のdiary_idが入っている等）場合はnull
                $task->save();
            }
        }
        return redirect('/today');
    }
        public function index(Task $task)
        {
            $today = now()->format('Y-m-d');
            $today_diary_id = Diary::where('date', $today)->first()->id;//今日のdiary_idを特定
            $task = Task::where('diary_id', $today_diary_id)->where('importance_urgency', 1)->get();//今日のdiary_idが保存されているタスクを$task
            return view('todo.diary',['tasks' => $task]);
        }
}
