<?php

use App\Http\Controllers\Create\PostController;
use App\Http\Controllers\Forgot\ChangePasswordController;
use App\Http\Controllers\Forgot\EmailController as ForgotEmailController;
use App\Http\Controllers\Forgot\SendCodeController;
use App\Http\Controllers\Forgot\VerifyCodeController;
use App\Http\Controllers\SignIn\AuthController;
use App\Http\Controllers\SignUp\EmailController;
use App\Http\Controllers\SignUp\FullNameController;
use App\Http\Controllers\SignUp\ProfileController;
use App\Http\Controllers\SignUp\UsernameController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
    // $user = User::find(1);

    // if ($user) {
    //     $user->delete();
    //     // Upon deletion, all related records in `user_credentials` with this `$userId` will also be deleted
    // }
})->middleware('auth:sanctum');

// auth login for user
Route::post('/auth', [AuthController::class, 'auth']);
// auth logout for user
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// sign up for new users
Route::group(['prefix' => 'signup'], function () {
    Route::post('/email', [EmailController::class, 'email']);
    Route::post('/fullname', [FullNameController::class, 'fullname'])->middleware('auth:sanctum');
    Route::post('/username', [UsernameController::class, 'username'])->middleware('auth:sanctum');
    Route::post('/profile', [ProfileController::class, 'profile'])->middleware('auth:sanctum');
});
// forgot password
Route::group(['prefix' => 'forgot'], function () {
    Route::post('/user', function (Request $request) {
        return $request->email;
    });

    Route::get('/email', [ForgotEmailController::class, 'forgotEmail']);
    Route::post('/send', [SendCodeController::class, 'forgotSendCode'])->middleware('auth:sanctum');
    Route::post('/resend', [SendCodeController::class, 'forgotSendCode'])->middleware('auth:sanctum');
    Route::post('/verify', [VerifyCodeController::class, 'forgotVerifyCode'])->middleware('auth:sanctum');
    Route::post('/password', [ChangePasswordController::class, 'forgotChangePassword'])->middleware('auth:sanctum');
});
// create post
Route::post('/create/post', [PostController::class, 'post'])->middleware('auth:sanctum');
