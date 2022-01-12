
@extends('layout')
@section('style')
<link href="/custom.css" rel="stylesheet">
@endsection
@section('content')
 

<div class="row">
    <div class="container">

    <div class="logout">
      @admin
      
      <form method="POST">
        @csrf
      <A href="logout" class="btn btn-priamry btn-lg">Logout</a>
      </form>
   @endadmin
    </div>
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
    <table class="table">
  <caption>List of posts</caption>
  <thead>
    <tr>
      <th scope="col">Sr no</th>
      <th scope="col">Category Name</th>
      <th scope="col">Title</th>
      <th scope="col">User Name</th>
      <th scope="col">Body</th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>

  <tbody>
  @if (isset($posts) &&  $posts->count() > 0)
  @php $i = 1; @endphp
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$post->category->name}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->body}}</td>
      <td><img src="/storage/{{$post->thumbnail}}" style="width:150px; height:150px; border-radius:20px;" /></td>
      <td><a href="admin/posts/{{$post->id}}/edit" class="">Edit</a></td>
      <td><form method="post" action="admin/posts/{{$post->id}}/delete" > @csrf @method('DELETE')<button class="btn btn-primary">Delete</button></form></td>
    </tr>


    @endforeach
    @endif
 
  </tbody>
</table>
{{$posts->links()}}



    <!-- @if (isset($posts) &&  $posts->count() > 0)

    @foreach($posts as $post)
    <div class="All_post">
        <img src="/storage/{{$post->thumbnail}}" style="width:150px; height:150px; border-radius:20px;" />
    <h4>Category Name: {{$post->category->name}}</h4>
    <div><a href="/posts/?author={{$post->user->userName}}"><h5>User:   {{$post->user->name}} </h5></a></div>
 

    <h5><br>Title: {{$post->title}}<br></h5>

    <p>{{$post->body}}</p>
    
    </div>
    <a href="/" class="btn btn-sm btn-primary">Back</a>
    
    @endforeach
    {{$posts->links()}}
    @else
    <h2>Record Not Found.</h2>
    @endif
</div>
</div> -->
@endsection

