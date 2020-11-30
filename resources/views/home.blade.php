@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> --}}
                <div class="panel-body">
                    <br>
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <hr>
                    <h3>Your Blog Posts</h3>

                    @if (count($posts)>0)
                       <table class="table table-stripped">
                         <tr>
                             <th>Title List</th>
                             <th></th>
                             <th></th>
                         </tr>

                        @foreach ($posts as $post)
                           <tr>
                               <td>{{$post->title}}</td>
                               <td><button type="button" class="btn btn-outline-secondary"><a href="/posts/{{$post->id}}/edit">Edit</a></button></td>
                               <td>
                                   {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                   {{Form::hidden('_method', 'DELETE')}}
                                   {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                   {!! Form::close()!!}
                               </td>
                           </tr>    
                        @endforeach
                       </table>    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
