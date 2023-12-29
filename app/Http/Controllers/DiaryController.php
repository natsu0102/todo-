<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;


class DiaryController extends Controller
{
    public function update(Request $request, Task $task)
    {
        $task->update([
            'diary_id' => $request->has('completed') ? auth()->user()->currentDiary->id : null,
        ]);
    
        return redirect()->back();
    }
}
