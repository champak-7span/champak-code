<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return $this->Showall($category);
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
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|min:4|max:255', Rule::unique('categories', 'name'),
            'name' => 'required|min:4|max:255|unique:categories,name',
            'slug' => ['required', Rule::unique('categories', 'slug')],
        ]);
        if($validator->fails()){
            return $this->Erroresponse($validator->errors(),422);
        }
        $category = Category::create($request->all());
       

       

        $cat = Category::find($category->id);
  
        return $this->Showone($cat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Category $category)
    {    
    //    $category = Category::find($category);  
    
       $category =  DB::table('categories')->where('id',$category->id)->first();
       
       return $this->Showone(collect($category));
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
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', Rule::unique('categories', 'name')->ignore($category->id)],
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category->id)],
  
        ]);
        if($validator->fails()){
            return $this->Erroresponse($validator->errors(),422);
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return $this->Showone((collect($category)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->Successmessage('Category Deleted Successfully!');
    }
}
