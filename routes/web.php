<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PastController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/', [TaskController::class, 'index']); 
    Route::get('/todo/addition', [TaskController::class, 'addition']);
    Route::post('/todo', [TaskController::class, 'store']);
    Route::get('/todo/{task}', [TaskController::class ,'show']);
    Route::get('/todo/{task}/edit', [TaskController::class, 'edit']);//編集画面の表示
    Route::put('/todo/{task}', [TaskController::class, 'update']);//編集実行
    Route::delete('/todo/{task}', [TaskController::class,'delete']);//削除
    Route::post('/today/', [DiaryController::class, 'store']);//今日の分のタスクを保存
    Route::get('/today', [DiaryController::class, 'index']); //今日の分のタスクを表示
    Route::get('/calendar', [EventController::class, 'show'])->name("show"); // カレンダー表示
    Route::post('/pasts', [PastController::class, 'store']);
    Route::post('/calendar/get',  [EventController::class, 'get'])->name("get"); // DBに登録した予定を取得
});



require __DIR__.'/auth.php';
