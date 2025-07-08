<?php

use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/user_profiles');

Route::get('/user_profiles/new', [UserProfileController::class, 'create']);
Route::post('/user_profiles/new', [UserProfileController::class, 'store']);

Route::get('/user_profiles', [UserProfileController::class, 'index']);

Route::get('/user_profiles/edit/{id}', [UserProfileController::class, 'edit']);
Route::post('/user_profiles/edit', [UserProfileController::class, 'update']);

Route::delete('/user_profiles/delete/{id}', [UserProfileController::class, 'destroy']);
