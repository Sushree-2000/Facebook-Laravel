<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ValidController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;

//
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\VueController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('SocialMedia');
});

Route::view('/login','login');
Route::view('/register','register');

Route::get('/home',[PostController::class, 'home'])->middleware('MustLogin');   //
Route::get('/profile',[PostController::class, 'profile'])->middleware('MustLogin');
Route::get('/editpost/{id}',[PostController::class, 'editpost'])->middleware('MustLogin');
Route::post('/updatepost/{id}',[PostController::class, 'updatepost'])->middleware('MustLogin');

Route::get('/editdetail/{id}',[ValidController::class, 'editdetail'])->middleware('MustLogin');
Route::post('/updatedetail/{id}',[ValidController::class, 'updatedetail'])->middleware('MustLogin');

Route::get('/delete/{id}',[PostController::class, 'delete'])->middleware('MustLogin');
// Route::get('/profile',[PostController::class, 'profile'])->middleware('MustLogin');

Route::get('/about',[PostController::class, 'about'])->middleware('MustLogin');
Route::get('/contact',[PostController::class, 'contact'])->middleware('MustLogin');
Route::get('/setting',[PostController::class, 'setting'])->middleware('MustLogin');
Route::view('/createpost','Media.createpost')->middleware('MustLogin');

Route::post('create', [ValidController::class, 'create'])->name('created'); /*for register page   */
Route::post('check', [ValidController::class, 'check'])->name('checked'); /*for login page   */
Route::get('logout', [ValidController::class, 'logout']);

Route::post('post', [PostController::class, 'post'])->name('posted'); /*To post*/

Route::post('storeabout', [AboutController::class, 'storeabout'])->name('aboutstored'); /*To add about details*/
Route::post('updateabout/{id}', [AboutController::class, 'updateabout']); /*To update about details*/
Route::get('deleteabout/{id}', [AboutController::class, 'deleteabout']); /*To delete about details*/
// Route::post('/aboutupdate/{id}', [AboutController::class, 'aboutupdate'])->name('aboutupdated'); /*To update about details*/

Route::get('xprofile/{id}', [PostController::class, 'xprofile']);

//Routes for like an ddislike
Route::get('like/{id}', [PostController::class, 'like']);
Route::get('dislike/{id}', [PostController::class, 'dislike']);


//////
Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/new', [VueController::class, 'api']);
Route::any('{slug}', function(){
    return redirect('home');
});
