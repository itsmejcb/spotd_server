<?php

use App\Http\Controllers\Create\PostController;
use App\Http\Controllers\Follow\FollowController;
use App\Http\Controllers\Forgot\ChangePasswordController;
use App\Http\Controllers\Forgot\EmailController as ForgotEmailController;
use App\Http\Controllers\Forgot\SendCodeController;
use App\Http\Controllers\Forgot\VerifyCodeController;
use App\Http\Controllers\Home\FollowingController;
use App\Http\Controllers\Home\ForyouController;
use App\Http\Controllers\Profile\ProfileController as ProfileProfileController;
use App\Http\Controllers\React\ReactController;
use App\Http\Controllers\SignIn\AuthController;
use App\Http\Controllers\SignUp\EmailController;
use App\Http\Controllers\SignUp\FullNameController;
use App\Http\Controllers\SignUp\ProfileController;
use App\Http\Controllers\SignUp\UsernameController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// to test only the user
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// auth login for user
Route::post('/auth', [AuthController::class, 'auth']);
// auth logout for user
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// sign up for new users
Route::group(['prefix' => 'signup'], function () {
    // to create email account
    Route::post('/email', [EmailController::class, 'email']);
    // to create user credentials
    Route::post('/fullname', [FullNameController::class, 'fullname'])->middleware('auth:sanctum');
    // to create username
    Route::post('/username', [UsernameController::class, 'username'])->middleware('auth:sanctum');
    // to create profile picture
    Route::post('/profile', [ProfileController::class, 'profile'])->middleware('auth:sanctum');
});
// forgot password
Route::group(['prefix' => 'forgot'], function () {
    // validate email address
    Route::get('/email', [ForgotEmailController::class, 'forgotEmail']);
    // send otp code
    Route::post('/send', [SendCodeController::class, 'forgotSendCode'])->middleware('auth:sanctum');
    // resend otp code
    Route::post('/resend', [SendCodeController::class, 'forgotSendCode'])->middleware('auth:sanctum');
    // verify otp code
    Route::post('/verify', [VerifyCodeController::class, 'forgotVerifyCode'])->middleware('auth:sanctum');
    // change new password
    Route::post('/password', [ChangePasswordController::class, 'forgotChangePassword'])->middleware('auth:sanctum');
});

// user Account
Route::group(['prefix' => 'user'], function () {
    // get user profile such as username,fullname,profile,bio and many more
    Route::post('/profile', [ProfileProfileController::class, 'fetchProfile'])->middleware('auth:sanctum');
    // get user post
    Route::post('/post', [ProfileProfileController::class, 'fetchPost'])->middleware('auth:sanctum');
    // follow new user
    Route::post('/follow', [FollowController::class, 'follow'])->middleware('auth:sanctum');
    // unfollow old user
    Route::post('/unfollow', [FollowController::class, 'unfollow'])->middleware('auth:sanctum');
    // edit user profile such as username,fullname,profile,bio
    Route::post('/edit', [EditController::class, 'editProfile'])->middleware('auth:sanctum');
});

// create post
Route::group(['prefix' => 'create'], function () {
    // create new post
    Route::post('/post', [PostController::class, 'post'])->middleware('auth:sanctum');

});

// react post
Route::group(['prefix' => 'post'], function () {
    // react post
    Route::post('/react', [ReactController::class, 'reactPost'])->middleware('auth:sanctum');
    // unreact post
    Route::post('/unreact', [ReactController::class, 'unreactPost'])->middleware('auth:sanctum');

});

// user home
Route::group(['prefix' => 'home'], function () {
    // user foryou compose of user following/interaction,user interest,user post suggestion
    Route::post('/foryou', [ForyouController::class, 'homeForyou'])->middleware('auth:sanctum');
    // user following focus favorite user or most interaction make by user
    Route::post('/following', [FollowingController::class, 'homeFollowing'])->middleware('auth:sanctum');
});

// search
Route::group(['prefix' => 'search'], function () {
    // user search compose of search user, search post, and search hashtag
    Route::post('/', [SearchController::class, 'search'])->middleware('auth:sanctum');
    // list of user suggestion based on user interest
    Route::post('/suggestion', [SuggestionController::class, 'searchSuggestion'])->middleware('auth:sanctum');
});

// user notification
Route::group(['prefix' => 'notification'], function () {
    // user log
    Route::post('/', [NotificationController::class, 'notification'])->middleware('auth:sanctum');
});
