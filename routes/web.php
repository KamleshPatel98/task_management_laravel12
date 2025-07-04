<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\support\Facades\Notification;
use App\Notifications\TestNotification;

Route::get('/', function () {
    Notification::route('slack', env('SLACK_URL'))->notify(new TestNotification);
    return view('welcome');
});

Route::resource('users',UserController::class);
Route::resource('projects',ProjectController::class);