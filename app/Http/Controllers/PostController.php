<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use DB;
use Illuminate\Validation\Rule;
use Auth;
use Gate;
use Storage;


class PostController extends Controller
{
    //post Filter and Display all post 

    public function index(Request $request){
       
        $categories = $this->Categories();    
      
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

        public function Categories(){
            return Category::all();
        }

        public function Userpost(Request $request,$userName){

      
        $posts = Post::latest()->with(['category', 'user'])->whereHas("user",function($q) use ($userName){
            $q->where("userName","=",$userName);
        })->get();
        return view('Userpost',compact('posts'));

        }

        public function Addpost(Request $request){
            $categories = $this->Categories();
        return view('posts.addpost',compact('categories'));
        }
        // Add Post
        public function Storepost(Request $request){
            $request->validate([
                'title' => 'required|min:4|max:255',
                'slug' => ['required', Rule::unique('posts', 'slug')],
                'category_id' => ['required',Rule::exists('categories', 'id')],
                'body' => 'required',
                'excerpt'=>'required|max:255',
                'thumbnail' =>'required|image',
            ]);
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            // $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = Storage::putFile('thumbnails', $request->file('thumbnail'));
            Post::create($data);
            return redirect("/posts")->with('success','posts successfully added!');

        }

        // Edit Post

        public function Edit(Post $post){
           
           
            return view('posts.editpost',['categories'=>$this->Categories(),'post'=>$post]);


        }
        public function Update(Post $post){
           
         
            $data = request()->validate([
                'title' => 'required|min:4|max:255',
                'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
                'category_id' => ['required',Rule::exists('categories', 'id')],
                'body' => 'required',
                'excerpt'=>'required|max:255',
                'thumbnail' =>'image',
            ]);
            if(isset($data['thumbnail'])){
                $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
            }
        
            $post->update($data);
            return back()->with('success','Post updated Successfully!');
            // return view('posts.editpost',['categories'=>$this->Categories(),'post'=>$post]);


        }

        public function Destroy(Post $post){
            $post->delete();
            return back()->with('success','Post Deleted Successfully!');

        }

        



   
}
