@extends('layout')
@section('style')
<link href="/custom.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
<div class="rows">
    
            {{-- <h5>How are you</h5> --}}
            <!-- <h4>Hii hello</h4> -->
            <div class="col-md-12">
        
               
                {{-- @foreach($posts->skip(1) as $post) --}}
                @if (isset($posts) &&  $posts->count() > 0)
                @foreach($posts as $post) 

            
                    <div class="{{$loop->iteration <= 3 ? 'All_post' : 'Post_All'}}">
                 
                        <h4>Category Name: {{$post->category->name}}</h4>
                        <div><h5>User:    {{$post->user->name}}</h5></div>
                        <h5><br>Title: {{$post->title}}<br></h5>
                        <p>{{$post->body}}</p>
                        <a href="/posts" class="btn btn-sm btn-primary">Back</a>
                    </div>
                
            
                @endforeach
                @else
                <h2>Record Not Found.</h2>
                @endif
                        
            </div>
    </div>
</div>
@endsection

