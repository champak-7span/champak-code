<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\RegisterapiController;
use App\Http\Controllers\api\ProductController;

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

Route::get('/posts', 'api\PostController@index');
Route::post('/posts/create', 'api\PostController@store');
Route::delete('posts/{post}', 'api\PostController@Destroy');
Route::resource('category', api\CategoryController::class);


// For demo project use (Standrd Code)
Route::post('login', 'api\RegisterapiController@Customlogin');
Route::post('register', 'api\RegisterapiController@customRegistrationapi');
Route::resource('product', api\ProductController::class);
Route::resource('orders', api\OrderController::class);