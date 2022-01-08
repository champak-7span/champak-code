
@extends('layout')
@section('style')
<link href="" rel="stylesheet">
@endsection
@section('content')
 
<div class="row">
    <div class="container">


    @empty(!$posts)
    @foreach($posts as $post)
    <div class="All_post">
    <h4>Category Name: {{$post->category->name}}</h4>
    <div><a href="/author/{{$post->user->userName}}"><h5>User:   {{$post->user->name}} </h5></a></div>
    <h5><br>Title: {{$post->title}}<br></h5>

    <p>{{$post->body}}</p>
    
    </div>
    <a href="/" class="btn btn-sm btn-primary">Back</a>
    
    @endforeach


    @endempty
</div>
</div>
@endsection

