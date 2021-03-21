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

/*
changes
staged
commit
push
*/
