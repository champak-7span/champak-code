
@extends('layout')
@section('style')
<link href="/custom.css" rel="stylesheet">
@endsection
@section('content')
 
<div class="row">
    <div class="container">
    <form method="GET" action="/posts">
    <div class="category col-md-6 py-4">
    @if (isset($categories) && empty(!$categories))
    
    
        <select name="category" class="form-control">
        <option value=''  selected>All</option>
        @foreach($categories as $category)
        
        <option value="{{$category->slug}}">{{$category->name}}</option>
        @endforeach
        </select>
    
    
    @endif
    
    </div>
    
    <div class="col-md-6 py-4">
      
        <input type="text" name="search" value="{{ request('search') }}" placeholder="search here.." class="form-control">
        
    </div>  
    </form>
    @if (isset($posts) &&  $posts->count() > 0)

    @foreach($posts as $post)
    <div class="All_post">
    <h4>Category Name: {{$post->category->name}}</h4>
    <div><a href="/author/{{$post->user->userName}}"><h5>User:   {{$post->user->name}} </h5></a></div>
    <h5><br>Title: {{$post->title}}<br></h5>

    <p>{{$post->body}}</p>
    
    </div>
    <a href="/" class="btn btn-sm btn-primary">Back</a>
    
    @endforeach
    @else
    <h2>Record Not Found.</h2>
    @endif
</div>
</div>
@endsection

