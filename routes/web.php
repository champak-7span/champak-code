<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

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



Route::get('/', function () {
    
    return view('welcome');
});

Route::get('/posts/{slug?}', 'PostController@index');
Route::get('/search', 'PostController@Filterpost');
Route::get('/register','RegisterController@index')->name('register')->middleware('guest');
Route::get('login','RegisterController@Logincreate')->middleware('guest')->name('login');
Route::post('login','RegisterController@Loginstore')->middleware('guest');
Route::get('logout','RegisterController@Logout');
Route::get('/admin/posts', 'PostController@Addpost')->middleware(['auth','admin']);
Route::get('/admin/posts/{post}/edit', 'PostController@Edit')->middleware(['auth','admin']);
Route::patch('/admin/posts/{post}', 'PostController@Update')->middleware(['auth','admin']);
Route::delete('/admin/posts/{post}/delete', 'PostController@Destroy')->middleware(['auth','admin']);
Route::post('/admin/posts/create', 'PostController@Storepost')->name('createpost')->middleware(['auth','admin']);


Route::post('/register', [RegisterController::class, 'customRegistration'])->name('register.custom')->middleware('guest');; 
// Route::get('/author/{userName?}', 'PostController@index')->name('author');
// Route::get('/author/{author:userName}', 'PostController@Userpost');


// Route::get('/posts/{post}',function($slug){

//     $path = resource_path("posts/{$slug}.html");


//     if(! file_exists($path)){
//         abort(404);

//     }
//      //$post = file_get_contents($path);

//     $post = Cache::remember('posts', 5, function () use ($path) {
//         var_dump('here');
//        return file_get_contents($path);
//     });

//     return view('post',[
//         'post'=>$post
//     ]);

// });

Route::get('/regex/{string}',function($slug){
    $str = "Vodka";
    $pattern = "/[@0-9a-z]/";

   
   $result = preg_match($pattern, $str); 
   
   if (preg_match("/\bvodka\b|\bvodkas\b|\b0\|@|\b/i", "PHP is the vodk@")) {
    echo "A match was found.";
} else {
    echo "A match was not found.";
}

    // if($result){
    //     echo "match successfully!";
    // }else{
    //     echo "match Not found!";
    // }



});
