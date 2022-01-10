<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use DB;


class PostController extends Controller
{
    //post Filter and Display all post 

    public function index(Request $request){
        $categories = Category::all();
        //$posts = Post::latest()->get(); //Lazy Loading take a time and memory allocate

        //$posts = Post::latest()->with(['category','user'])->get(); // eager loading  time saving and less than memory allocate insted of  lazy loading
        //$posts = Post::all();  view file in get post, category, and also user


        // if($request->search){
        //     $posts =  Post::where('title', 'like', '%' . $request->search . '%')
        //     ->orWhere('body', 'like', '%' . $request->search . '%')
        //     ->get();
        // }    
            
         $posts = Post::latest()->filter(['search'=>$request->search,'category'=>$request->category,'author'=>$request->author])->with(['category','user']);  
        
        // if($request->search){
        //     $posts->where('title', 'like', '%' . $request->search . '%')
        //     ->orWhere('body', 'like', '%' . $request->search . '%');
        // }    
        
        $posts = $posts->paginate(3)->withQueryString();      

        // $posts = DB::table('posts')
        // ->select('posts.*','categories.name as cname')
        // ->leftjoin('categories', 'posts.category_id', '=', 'categories.id')
        // ->get();   
       return view('post',compact('posts','categories'));

    }


        //Filter Post for another query
        public function Filterpost(Request $request){   
                $categories = Category::all();
                $posts =  Post::where('title', 'like', '%' . $request->search . '%')->get();
                return view('post',compact('posts','categories'));
        }

    public function Userpost(Request $request,$userName){

      
        $posts = Post::latest()->with(['category', 'user'])->whereHas("user",function($q) use ($userName){
            $q->where("userName","=",$userName);
        })->get();

     

        return view('Userpost',compact('posts'));

    }

   
}
