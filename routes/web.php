<?php

use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', App\Http\Controllers\UserController::class)->middleware('is.admin');
Route::resource('posts', App\Http\Controllers\PostController::class);
Route::resource('themes', \App\Http\Controllers\ThemeController::class)->middleware(['auth','is.theme.manager']);
Route::get('changetheme/{id}', function($id){
   //dd($theme);
    // store theme id in a cookie
    return redirect()->back()->cookie('theme',$id, 63072000); // cookei name, variable passed, time until expires

})->name('changetheme');
