@extends('layout')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Add Post</h3>
                    <div class="card-body">

                        <form action="{{ route('createpost') }}" method="POST" enctype='multipart/form-data'>
                            
                            @csrf
                            @foreach($errors->all() as $error)
                            <li class="text-danger text-xs">{{$error}}</li>
                            @endforeach
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Title" value="{{ old('title') }}" id="title" class="form-control" name="title"
                                     autofocus>
                                @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Slug" value="{{ old('slug') }}" id="slug" class="form-control" name="slug"
                                     autofocus>
                                @if ($errors->has('slug'))
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="excerpt" value="{{ old('excerpt') }}" id="excerpt" class="form-control" name="excerpt"
                                     autofocus>
                                @if ($errors->has('excerpt'))
                                <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>thumbnail</label>
                                <input type="file"  id="thumbnail" class="form-control" name="thumbnail"
                                     autofocus>
                                
                            </div>
                            <div class="form-group mb-3">
                            <textarea id="body" name="body" rows="4" cols="50" value="{{old('body')}}"></textarea>

                                @if ($errors->has('body'))
                                <span class="text-danger">{{ $errors->first('body') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <select name="category_id" class="form-control">

                               
                                @foreach($categories as $category)
                                
                                <option value="{{$category->id}}" {{old('category_id')  == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('excerpt'))
                                <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                                @endif
                            </div>


                 



                          

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Create Post</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection