<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Comment;
use Auth;
use Gate;
use Storage;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $posts = Post::latest()->filter(['search'=>$request->search,'category'=>$request->category,'author'=>$request->author])->with(['category','user','comments'])->get();  


        return $this->Showall($posts);
        // return response()->json(['data' => $posts],200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //    $validator = Validator::make($request->all(), [
    //     'title'=>'required|min:4|max:100'
    // ]);

    // if ($validator->fails()) {
    //     // get first error message
    //     $error = $validator->errors()->first();
    //     // get all errors 
    //     $errors = $validator->errors()->all();
    // }

       $validator = Validator::make($request->all(), [
            'title' => 'required|min:4|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'category_id' => ['required',Rule::exists('categories', 'id')],
            'body' => 'required',
            // 'thumbnail' =>'required|mimes:jpeg,bmp,png,gif,svg,pdf|max:2000',
            'thumbnail' =>'required|mimes:jpeg,bmp,png,gif|max:2000',
            'excerpt'=>'required|max:255',
            'user_id'   =>'required',
        ]);

     
       
        if($validator->fails()){
        
            // here we return all the errors message
            // return response()->json(['errors' => $validator->errors()], 422);
            // $message = ['errors' => $validator->errors()];
            return $this->Erroresponse($validator->errors(),422);

            
        }

        // if ($validator->fails()) {
        //     return response()->json(['erros'=>validator])
        //     return redirect('post/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }


        $data = $request->all();
        // $data['user_id'] = Auth::user()->id;
        // $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        $data['thumbnail'] = Storage::putFile('thumbnails', $request->file('thumbnail'));
        $post = Post::create($data);
        if($post){
            $message = 'Post Added Successfully!';
            $postdata = $this->Dataresponse($data,$message,200);
        }else{
            $message = 'Post Not Added!';
            $postdata = $this->Dataresponse($data,$message,204);
        }
        return $postdata;
       
    }

    public function Dataresponse($data = null,$message=null,$statuscode){

        return response()->json(['data' => $data,'message'=>$message],$statuscode);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Destroy(Post $post){
        $post->delete();
        return $this->Successmessage('Post Deleted Successfully!');

    }
}
