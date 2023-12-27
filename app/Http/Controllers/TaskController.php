<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index(Task $task)
    {
        return view('todo.index')->with(['tasks' => $task->get()]);
    }
    public function addition(Category $category)
    {
        return view('todo.addition')->with(['categories' => $category->get()]);
    }
    public function store(Request $request, Task $task)
    {
        $input = $request['task'];
        $input += ['user_id'=>Auth::id()];
        $task->fill($input)->save();
        return redirect('/');
    }
    public function show(Task $task)
    {
        return view('todo.show')->with(['task' => $task]);
     //'task'はbladeファイルで使う変数。中身は$taskはid=1のTaskインスタンス。
    }
    public function edit(Task $task, Category $category)
    {
        return view('todo.edit')->with(['task' => $task, 'categories' => $category->get()]);
    }
}
