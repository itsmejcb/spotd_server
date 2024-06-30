<?php

use App\Http\Controllers\SignIn\AuthController;
use App\Http\Controllers\SignUp\EmailController;
use App\Http\Controllers\SignUp\FullNameController;
use App\Http\Controllers\SignUp\ProfileController;
use App\Http\Controllers\SignUp\UsernameController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    // return $request->user();
    $user = User::find(1);

    if ($user) {
        $user->delete();
        // Upon deletion, all related records in `user_credentials` with this `$userId` will also be deleted
    }
})->middleware('auth:sanctum');

// Define your routes inside the group
Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'signup'], function () {
    // Define your routes inside the group
    Route::post('/email', [EmailController::class, 'email']);
    Route::post('/fullname', [FullNameController::class, 'fullname'])->middleware('auth:sanctum');
    Route::post('/username', [UsernameController::class, 'username'])->middleware('auth:sanctum');
    Route::post('/profile', [ProfileController::class, 'profile'])->middleware('auth:sanctum');
});
