<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;


class DiaryController extends Controller
{
    public function create(Task $task, Diary $diary)
    {
        return view('todo.diary')->with(['tasks' => $task, 'diaries' => $diary]);;
    }
    public function store(Request $request,Task $task, Diary $diary)
    {
        $input = $request['diary'];
        $diary->fill($input)->save();
        return redirect('/todo/' . $diary->id)->with(['tasks' => $task, 'diaries' => $diary]);;
    }
    public function show(Task $task, Diary $diary)
    {
        return view('todo.diary')->with(['tasks' => $task, 'diaries' => $diary]);
    }
}
