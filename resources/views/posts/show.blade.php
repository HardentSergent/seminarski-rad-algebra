@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-default">Nazad</a>
      <h1>{{$post->title}}</h1>
      <img style="width:65%" src="/storage/cover_images/{{$post->cover_image}}">
      <br><br>
      <div>
        {!!$post->body!!}
      </div>
      <hr>
      <small>Created on {{$post->created_at}} by {{$post->user->name}}</small>
      <hr>
      @if (!Auth::guest())
            @if (Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' =>['App\Http\Controllers\PostsController@destroy', $post->id, 'method' => 'POST', 'class' => 'pull-right']])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            @endif
      @endif
@endsection