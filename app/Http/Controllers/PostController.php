<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use DB;


class PostController extends Controller
{
    //

    public function index(){


        //$posts = Post::latest()->get(); //Lazy Loading take a time and memory allocate
        $posts = Post::latest()->with(['category','user'])->get(); // eager loading  time saving and less than memory allocate insted of  lazy loading
        //$posts = Post::all();  view file in get post, category, and also user

    //   dd($posts);
        // $posts = DB::table('posts')
        // ->select('posts.*','categories.name as cname')
        // ->leftjoin('categories', 'posts.category_id', '=', 'categories.id')
        // ->get();

        

       
       return view('post',compact('posts'));

    }

    public function Userpost(Request $request,$userName){

      
        $posts = Post::latest()->with(['category', 'user'])->whereHas("user",function($q) use ($userName){
            $q->where("userName","=",$userName);
        })->get();

     

        return view('Userpost',compact('posts'));

    }
}
