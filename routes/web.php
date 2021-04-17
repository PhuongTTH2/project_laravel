<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');

Route::get('/crud', [App\Http\Controllers\CrudController::class, 'index'])->name('crud-name');
Route::post('/todo', [App\Http\Controllers\CrudController::class, 'store'])->name('todo-name');
Route::put('/todo/{id}', [App\Http\Controllers\CrudController::class, 'edit'])->name('edit-name');
Route::delete('/destroy/{id}', [App\Http\Controllers\CrudController::class, 'destroy'])->name('destroy-name');
// Route::get('delete-todo/{id?}', [App\Http\Controllers\CrudController::class, 'delete']);
// Route::resource('todo', CrudController::class);
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('shop-name');


//ChatApp
Route::get('/chatapp', [App\Http\Controllers\ChatAppController::class, 'index'])->name('chat-index');
Route::get('/search', [App\Http\Controllers\ChatAppController::class, 'search'])->name('chat-search');
Route::post('/chatbox', [App\Http\Controllers\ChatAppController::class, 'chatBox'])->name('chat-box');
Route::post('/add-messages', [App\Http\Controllers\ChatAppController::class, 'addMessages'])->name('add-messages');


// test case
Route::get('/chatapp', function () {
    return view('chatapp.chat');
});
