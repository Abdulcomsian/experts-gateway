<?php

use Illuminate\Support\Facades\Route;
use App\Models\ContactUs;

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
    $contact_us = ContactUs::first();
    return view('welcome' , compact('contact_us'));
})->name('landing-page');

Route::get('/contact-us', function () {
    $contact_us = ContactUs::first();
    return view('frontend.contact_us' , compact('contact_us'));
})->name('contact-us');

Route::post('newsletter',[App\Http\Controllers\NewsLetterController::class, 'store']);

Auth::routes(['verify' => true]);  

Route::get('/lawyer-login', function () {
    $contact_us = ContactUs::first();
    return view('auth/lawyer_login',compact('contact_us'));
})->name('lawyer-login');

Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about_us'])->name('about-us');

Route::get('/all-blogs', [App\Http\Controllers\blogController::class, 'blogs'])->name('all-blogs');
Route::get('/all-blog/{id}', [App\Http\Controllers\blogController::class, 'client_blog'])->name('all-blog');


Route::get('/lawyer-register', function () {
    $contact_us = ContactUs::first();
    if (Auth::check())
    {
       return redirect()->to('/lawyer/dashboard',compact('contact_us'));
    }
    else
    {
      return view('auth/lawyer_register',compact('contact_us'));  
    }
    
})->name('lawyer-register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*****************ADMIN ROUTES*******************/
Route::prefix('admin')->middleware(['auth','can:admin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\dashboardController::class, 'index'])->name('admin.dashboard');
    //Blogs
    Route::get('/blogs', [App\Http\Controllers\blogController::class, 'index'])->name('admin.blogs');
    Route::post('/update_blog_status/{id}', [App\Http\Controllers\blogController::class, 'update_blog_status'])->name('update-blog-status');   

    Route::get('/show/{id}', [App\Http\Controllers\blogController::class, 'show'])->name('blog.show');
    Route::get('/edit_blog/{id}', [App\Http\Controllers\blogController::class, 'edit'])->name('blog.edit');

    Route::put('/update-blog/{id}', [App\Http\Controllers\blogController::class, 'update'])->name('update-blog');
    Route::delete('/delete_blog/{id}', [App\Http\Controllers\blogController::class, 'destroy'])->name('blog.destroy');
    //endblog

    //language
    Route::resource('language', App\Http\Controllers\Admin\languageController::class);

    //expertise
    Route::resource('expertise', App\Http\Controllers\Admin\expertiseController::class);

    //about us
    Route::resource('about_us', App\Http\Controllers\Admin\aboutUsController::class);

    //contact us
    Route::resource('contact_us', App\Http\Controllers\Admin\ContactUsController::class);

    //lawyer_applications
    Route::get('/lawyer_applications', [App\Http\Controllers\Admin\dashboardController::class, 'lawyer_applications'])->name('admin.lawyer-applications');
    Route::post('/update_lawyer_status/{id}', [App\Http\Controllers\Admin\dashboardController::class, 'update_lawyer_status'])->name('update-lawyer-status');   

    Route::get('/LawyerProfileShow/{id}', [App\Http\Controllers\Admin\dashboardController::class, 'lawyer_profile_show'])->name('LawyerProfile.show');
    Route::get('/edit_lawyer_profile/{id}', [App\Http\Controllers\Admin\dashboardController::class, 'edit_lawyer_profile'])->name('LawyerProfile.edit');

    Route::put('/update-lawyer-profile/{id}', [App\Http\Controllers\Admin\dashboardController::class, 'update_lawyer_profile'])->name('update-lawyer-profile');

    //users
    Route::get('/users', [App\Http\Controllers\Admin\dashboardController::class, 'users'])->name('admin.users');
    Route::get('/user-show/{id}', [App\Http\Controllers\Admin\dashboardController::class, 'show_user'])->name('user.show');
    Route::get('/edit_user/{id}', [App\Http\Controllers\Admin\dashboardController::class, 'edit_user'])->name('user.edit');

    Route::put('/update-user/{id}', [App\Http\Controllers\Admin\dashboardController::class, 'update_user'])->name('update-user');

    //subscriber
    Route::get('/subscriber', [App\Http\Controllers\NewsLetterController::class, 'index'])->name('admin.subscriber');

});

/*****************User ROUTES*******************/
Route::prefix('user')->middleware(['auth','can:user'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\User\dashboardController::class, 'index'])->name('user.dashboard');
});


/*****************Lawyer ROUTES*******************/
Route::prefix('lawyer')->middleware(['auth','can:lawyer','verified'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Lawyer\dashboardController::class, 'index'])->name('lawyer.dashboard');
    Route::get('/profile', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile'])->name('lawyer.profile');
    Route::get('/blog/{id}', [App\Http\Controllers\blogController::class, 'blog'])->name('lawyer.blog');
    Route::get('/create', [App\Http\Controllers\blogController::class, 'create'])->name('create.blog');
    Route::post('/store', [App\Http\Controllers\blogController::class, 'store'])->name('blog.store');

    Route::post('/profile-store-1', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_store_1'])->name('profile.store_1');
    Route::post('/profile-update_1/{id}', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_update_1'])->name('profile.update_1');

    Route::post('/profile-store-2', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_store_2'])->name('profile.store_2');
    Route::post('/profile-update-2/{id}', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_update_2'])->name('profile.update_2');

    Route::post('/profile-store-3', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_store_3'])->name('profile.store_3');
    Route::post('/profile-update-3/{id}', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_update_3'])->name('profile.update_3');

    Route::post('/profile-store-4', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_store_4'])->name('profile.store_4');
    Route::post('/profile-update-4/{id}', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_update_4'])->name('profile.update_4');

    Route::post('/profile-store-5', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_store_5'])->name('profile.store_5');  
    Route::post('/submit_approval', [App\Http\Controllers\Lawyer\dashboardController::class, 'submit_approval'])->name('profile.submit-for-approval');  
    Route::post('/profile_update_5/{id}', [App\Http\Controllers\Lawyer\dashboardController::class, 'profile_update_5'])->name('profile.update_5');

    //edit lawyer profile
    Route::get('/edit-profile/{id}', [App\Http\Controllers\Lawyer\dashboardController::class, 'edit_profile'])->name('lawyer.edit-profile');
    Route::put('/update_lawyer_profile/{id}', [App\Http\Controllers\Lawyer\dashboardController::class, 'update_lawyer_profile'])->name('lawyer.update-lawyer-profile');
});

