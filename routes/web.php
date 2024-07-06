<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    $id = 1;
    $user_id = 2;
    $user_id1 = $user_id ? $user_id : $id;
    // echo "User ID: " .  . "\n";
    return dump($user_id1);

});

Route::get('/tests', function () {

    // echo "User ID: " . $user_id . "\n";

});
