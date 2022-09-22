<?php

//use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Livewire\Companies\Companies;
use App\Http\Livewire\Partners\Partners;
use App\Http\Livewire\Products\Products;
use App\Http\Livewire\Blogs\Blogs;
use App\Http\Livewire\Projects\Projects;

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
    return redirect()->route('profile');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('profile',function(){
    return view('adminDashboard.users.profile');
})->name('profile')->middleware('auth');

require __DIR__.'/auth.php';
require __DIR__.'/users.php';

require __DIR__ . '/categories.php';


Route::resource('category', App\Http\Controllers\categoryController::class);




require __DIR__.'/auth.php';



Route::resource('Category',App\Http\Controllers\Category\CategoryController::class)->middleware('auth');
Route::resource('contact',\App\Http\Controllers\ContactUsController::class)->middleware('auth');
Route::delete('/contact-clear',[\App\Http\Controllers\ContactUsController::class,'clear'])->name('contact.clear')->middleware('auth');
//Route::get('stripe', [StripePaymentController::class,'stripe']);
//Route::post('stripe', [StripePaymentController::class,'stripePost'])->name('stripe.post');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('send-email', [SendEmailController::class, 'index'])->name('send-email');
Route::get('editPassword/{admin}', [\App\Http\Controllers\Users\AdminController::class, 'editPassword'])->name('edit-reset')->middleware('auth');
Route::put('resetPassword/{admin}', [\App\Http\Controllers\Users\AdminController::class, 'resetPassword'])->name('admins.reset.password')->middleware('auth');
Route::put('newPassword/{admin}', [\App\Http\Controllers\Users\AdminController::class, 'newPassword'])->name('admins.new-password')->middleware('auth');


Route::get('products',Products::class)->name('products')->middleware('auth');
Route::get('projects',Projects::class)->name('projects')->middleware('auth');
Route::get('blogs',Blogs::class)->name('blogs')->middleware('auth');
Route::get('partners',Partners::class)->name('partners')->middleware('auth');
Route::get('company',Companies::class)->name('company')->middleware('auth');
