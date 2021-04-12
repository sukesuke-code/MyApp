<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyAppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('top');
})->name('top');

Route::get('/example', [MyAppController::class, 'test']);

Route::get('/', function () {
    return view('welcome');
});



//一覧表示
Route::get('/task/list', [TaskController::class, 'list'])->name("task_list");

//追加用フォーム
Route::get('/task/add', [TaskController::class, 'add'])->name("task_add");

//編集用フォーム
Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name("task_edit");

//削除確認用フォーム
Route::get('/task/delete/{id}', [TaskController::class, 'confirm'])->name("task_confirm");

//更新処理
Route::post('/task/update', [TaskController::class, 'update'])->name("task_update");

//削除処理
Route::post('/task/delete', [TaskController::class, 'delete'])->name("task_delete");

/*
changes
staged
commit
push
*/
