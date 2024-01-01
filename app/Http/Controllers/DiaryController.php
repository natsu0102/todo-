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
        foreach($tasks_id as $task_id) {
            $task=Task::where('id', $task_id)->first();//idを探す。特定のidの中で初めのものをピックアップ
            $task->diary_id = $diary_id;//diary_idに今日のdiary_idを指定
            $task->save();
        }
        return redirect('/today');
    }
        public function index(Task $task)
        {
            $today = now();
            $task = Task::where('diary_id', 2)->get();
            return view('todo.diary',['tasks' => $task]);
        }
}
