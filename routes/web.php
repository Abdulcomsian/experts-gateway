<?php

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

Route::get('/lawyer-login', function () {
    return view('auth/lawyer_login');
})->name('lawyer-login');

Route::get('/all-blogs', [App\Http\Controllers\blogController::class, 'blogs'])->name('all-blogs');
Route::get('/all-blog/{id}', [App\Http\Controllers\blogController::class, 'client_blog'])->name('all-blog');


Route::get('/lawyer-register', function () {
    if (Auth::check())
    {
       return redirect()->to('/lawyer/dashboard');
    }
    else
    {
      return view('auth/lawyer_register');  
    }
    
})->name('lawyer-register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*****************ADMIN ROUTES*******************/
Route::prefix('admin')->middleware(['auth','can:admin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\dashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/blogs', [App\Http\Controllers\blogController::class, 'index'])->name('admin.blogs');
});

/*****************User ROUTES*******************/
Route::prefix('user')->middleware(['auth','can:user'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\User\dashboardController::class, 'index'])->name('user.dashboard');
});


/*****************Lawyer ROUTES*******************/
Route::prefix('lawyer')->middleware(['auth','can:lawyer'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Lawyer\dashboardController::class, 'index'])->name('lawyer.dashboard');
    Route::get('/profile', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile'])->name('lawyer.profile');
    Route::get('/blog/{id}', [App\Http\Controllers\blogController::class, 'blog'])->name('lawyer.blog');
    Route::get('/create', [App\Http\Controllers\blogController::class, 'create'])->name('create.blog');
    Route::post('/store', [App\Http\Controllers\blogController::class, 'store'])->name('blog.store');
});

