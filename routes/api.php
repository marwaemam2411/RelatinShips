<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskCotroller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::post('tasks',[TaskCotroller::class,'store']);//create
//Route::get('tasks',[TaskCotroller::class,'index']);//read
//Route::put('tasks/{id}',[TaskCotroller::class,'update']);//update
//Route::get('tasks/{id}',[TaskCotroller::class,'show']);//show at specific id
//Route::delete('tasks/{id}',[TaskCotroller::class,'destroy']);//delete/

Route::apiResource('tasks',TaskController::class);
//Route::post('profile',ProfileController::class);
Route::post('profile', [ProfileController::class, 'store']);
Route::get('profile/{id}', [ProfileController::class, 'show']);
Route::get('user/{id}/profile', [UserController::class, 'getprofile']);
Route::get('user/{id}/tasks', [UserController::class, 'getusertasks']);
Route::get('task/{id}/user', [TaskController::class, 'gettaskuser']);


Route::post('tasks/{taskid}/categories',[TaskController::class,'addcategorisetotask']);






