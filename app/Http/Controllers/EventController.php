<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class EventController extends Controller
{
     // カレンダー表示
    public function show(){
        return view("calendars/calendar");
    }  
     // DBから予定取得
    public function get(Request $request, Diary $diary){
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer'
        ]);

        // 現在カレンダーが表示している日付の期間
        $start_date = date('Y-m-d', $request->input('start_date') / 1000); // 日付変換（JSのタイムスタンプはミリ秒なので秒に変換）
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);

        // 予定取得処理（これがaxiosのresponse.dataに入る）
        
        $diaries = $diary->query()->select(
            'id',
            'date as start', // カレンダーのstartにdateを使用
            'evaluation as title',// カレンダーのtitleにevaluationを使用
            'date as end'
            )
            // 表示されているカレンダーのeventのみをDBから検索して表示
            ->where('date', '>', $start_date)
            ->where('date', '<', $end_date) // AND条件
            ->whereNotNull('evaluation')
            ->get();
        foreach($diaries as $diary){
            if($diary->title==1){
                $diary->title="◎";
            }
            elseif($diary->title==2){
                $diary->title="◯";
            }
            else{
                $diary->title="△";
            }
        }
        return $diaries;
    }
//
}
