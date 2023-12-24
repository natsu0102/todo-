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
}
