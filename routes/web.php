<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DiaryController;

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
    Route::get('/todo/diary', [DiaryController::class, 'create']);
    Route::post('/todo', [TaskController::class, 'store']);
    Route::get('/todo/{task}', [TaskController::class ,'show']);
    Route::get('/todo/{task}/edit', [TaskController::class, 'edit']);//編集画面の表示
    Route::put('/todo/{task}', [TaskController::class, 'update']);//編集実行
    Route::delete('/todo/{task}', [TaskController::class,'delete']);//削除
    Route::post('/todo', [DiaryController::class, 'store']);//今日の分として保存
    Route::get('/todo/{diary}', [DiaryController::class ,'show']);
});



require __DIR__.'/auth.php';
