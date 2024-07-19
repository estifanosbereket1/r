<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

//room routes



Route::get('/',[RoomController::class,'index']);

Route::get('/rooms/create', [RoomController::class,'create'])->middleware('auth');

Route::post('/rooms', [RoomController::class,'store'])->middleware('auth');

Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->middleware('auth');

Route::put('/rooms/{room}', [RoomController::class, 'update'])->middleware('auth');

Route::delete('/rooms/{room}',[RoomController::class,'destroy'])->middleware('auth');

Route::get('/rooms/manage',[RoomController::class, 'manage'])->middleware('auth');

Route::get('/rooms/{room}',[RoomController::class,'show']);






//User routes
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users',[UserController::class,'store']);

Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');

Route::get('/auth/google/callback',[GoogleAuthController::class,'callbackGoogle']);



//reservation 

Route::post('/reservations/rooms/{room}/', [ReservationController::class, 'store'])->middleware('auth');

Route::get('/reservations',[ReservationController::class,'index'])->middleware('auth');

Route::delete('/reservations/{reservation}', [ReservationController::class,'destroy'])->middleware('auth');


