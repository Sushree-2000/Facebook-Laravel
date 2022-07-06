<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Middleware for authentication
Route::middleware('auth:api')->post('addAbout',[ApiController::class,'addAbout']);
Route::middleware('auth:api')->post('addPost',[ApiController::class,'addPost']);

Route::middleware('auth:api')->get('getPosts/{id?}',[ApiController::class,'getPosts']);
Route::middleware('auth:api')->get('getUsers/{id?}',[ApiController::class,'getUsers']);
Route::middleware('auth:api')->get('getAbouts/{id?}',[ApiController::class,'getAbouts']);
Route::middleware('auth:api')->get('searchUser/{email}',[ApiController::class,'searchUser']);
Route::middleware('auth:api')->get('searchPost/{user_id}',[ApiController::class,'searchPost']);
Route::middleware('auth:api')->get('searchAbout/{user_id}',[ApiController::class,'searchAbout']);
Route::middleware('auth:api')->put('updateUser',[ApiController::class,'updateUser']);
Route::middleware('auth:api')->post('updatePost/{id}',[ApiController::class,'updatePost']);
// Route::middleware('auth:api')->put('updatePost/{id}',[ApiController::class,'updatePost']);
// Route::middleware('auth:api')->put('updatePost',[ApiController::class,'updatePost']);
Route::middleware('auth:api')->put('updateAbout/{id}',[ApiController::class,'updateAbout']);
// Route::middleware('auth:api')->post('updateAbout/{id}',[ApiController::class,'updateAbout']);
Route::middleware('auth:api')->delete('deletePost/{id}',[ApiController::class,'deletePost']);
Route::middleware('auth:api')->delete('deleteAbout/{email}',[ApiController::class,'deleteAbout']);
// To get logout from the token
Route::middleware('auth:api')->post('logoutUser',[ApiController::class,'logoutUser']);

//TO GET DATAS
//To get Users data
// Route::get('getUsers/{id?}',[ApiController::class,'getUsers']);
//To get Posts data
// Route::get('getPosts/{id?}',[ApiController::class,'getPosts']);
//To get Abouts data
// Route::get('getAbouts/{id?}',[ApiController::class,'getAbouts']);

//TO SEARCH DATAS
//To search data in User
// Route::get('searchUser/{email}',[ApiController::class,'searchUser']);
//To search data in Post
// Route::get('searchPost/{user_id}',[ApiController::class,'searchPost']);
//To search data in About
// Route::get('searchAbout/{email}',[ApiController::class,'searchAbout']);

//TO ADD DATAS
Route::post('addUser',[ApiController::class,'addUser']);
Route::post('loginUser',[ApiController::class,'loginUser']);
// Route::post('addAbout',[ApiController::class,'addAbout']);
// Route::post('addPost',[ApiController::class,'addPost']);

//TO EDIT/UPDATE DATAS
// Route::put('updateUser',[ApiController::class,'updateUser']);
// Route::put('updatePost',[ApiController::class,'updatePost']);
// Route::put('updateAbout',[ApiController::class,'updateAbout']);

//TO DELETE DATAS
// Route::delete('deletePost/{id}',[ApiController::class,'deletePost']);
// Route::delete('deleteAbout/{email}',[ApiController::class,'deleteAbout']);
