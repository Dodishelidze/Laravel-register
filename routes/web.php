<?php


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
// user registration
Route::post('/registration', [UserController::class, "Registration"]);
// email verify
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/users');
})->middleware(['signed', 'auth'])->name('verification.verify');
// home page
Route::get('/', [Controller::class, "Home"]);
// users list
Route::get('/users', [Controller::class, "Users"])->name("users");
