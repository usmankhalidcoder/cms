<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\user\UserController ;
use App\Http\Controllers\Auth\admin\adminController ;
use App\Http\Controllers\Auth\admin\LoginController ;
use App\Http\Controllers\Auth\admin\RegisterController ;
use App\Models\User ;
use App\Models\Role ;

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

Auth::routes();
Route::get('query', function (){
    // dd(User::all());
    $user = User::find(52);
    $res = $user->role->role;
    dd($res);
});

Route::get('/home' ,[UserController::class , 'index' ])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->namespace('admin')->group(function (){
    Route::get('adminregister', [RegisterController::class,'showRegistrationForm'])->name('adminregister');
    Route::post('adminregister', [RegisterController::class ,'register']);
    Route::get('adminlogin', [LoginController::class ,'showLoginForm'])->name('adminlogin');
    Route::post('adminlogin', [LoginController::class,'login']);
    Route::get('adminhome' ,[adminController::class , 'index' ])->name('adminhome');

});
Route::post('adminlogout', [LoginController::class ,'logout'])->name('adminlogout');

