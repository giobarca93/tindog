@extends('layouts.app')

@section('content')
   <button type="button" class="btn btn-outline-secondary"><a href="/posts">Go Back</a></button>
   <div class="card-header">
       <h3>{{$post->title}}</h3> 
       <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
       <div>
           {!!$post->body!!}
       </div>
       <hr>
       <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
   </div>
   <hr>

   @if (!Auth::guest())
       @if (Auth::user()->id == $post->user_id)
          <button type="button" class="btn btn-outline-secondary"><a href="/posts/{{$post->id}}/edit">Edit</a></button>

          {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
               {{Form::hidden('_method', 'DELETE')}}
               {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
          {!! Form::close()!!}
        @endif
   @endif
   
@endsection

