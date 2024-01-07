<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;


class PastController extends Controller
{
    public function store(Request $request)
    {
        
        $input = $request['diary'];
        $input += ['user_id'=>Auth::id()];
                    
        $today = now()->format('Y-m-d');
        $today_diary = Diary::where('date', $today)->first();//今日のdiary_idを特定
        $today_diary->fill($input)->save();
        return redirect('/');
    }
}
