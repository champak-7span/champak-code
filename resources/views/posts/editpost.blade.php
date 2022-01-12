@extends('layout')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Update Post</h3>
                    <div class="card-body">

                        <form action="/admin/posts/{{$post->id}}" method="POST" enctype='multipart/form-data'>
                            
                            @csrf
                            @method('PATCH')
                            @foreach($errors->all() as $error)
                            <li class="text-danger text-xs">{{$error}}</li>
                            @endforeach
                            <div class="form-group mb-3">
                                
                                <input type="text" placeholder="Title" value="{{ old('title',$post->title) }}"  id="title" class="form-control" name="title"
                                     autofocus>
                                @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Slug" value="{{ old('slug',$post->slug) }}" id="slug" class="form-control" name="slug"
                                     autofocus>
                                @if ($errors->has('slug'))
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="excerpt" value="{{ old('excerpt',$post->excerpt) }}" id="excerpt" class="form-control" name="excerpt"
                                     autofocus>
                                @if ($errors->has('excerpt'))
                                <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>thumbnail</label>
                                <input type="file"  id="thumbnail" class="form-control" value="old('thumbnail',$post->thumbnail)" name="thumbnail"
                                     autofocus>

                                     <img src="/storage/{{$post->thumbnail}}" style="width:150px; height:150px; border-radius:20px;" />
                                
                            </div>
                            <div class="form-group mb-3">
                            <textarea id="body" name="body" rows="4" cols="50" >{{old('body',$post->body)}}</textarea>

                                @if ($errors->has('body'))
                                <span class="text-danger">{{ $errors->first('body') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <select name="category_id" class="form-control">

                                @if(isset($categories))
                                @foreach($categories as $category)
                                
                                <option value="{{$category->id}}" {{old('category_id',$post->category_id)  == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                                @endif
                                </select>
                                @if ($errors->has('excerpt'))
                                <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                                @endif
                            </div>


                 



                          

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Update Post</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection