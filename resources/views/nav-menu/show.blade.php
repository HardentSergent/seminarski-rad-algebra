@extends('layouts.app')

@section('content')

@can('edit-users')
<a href="/nav-menu" class="btn btn-default">Nazad</a>
@endcan

      @php
        $url = \URL::current();
        $slug = substr($url, (strrpos($url, "/") + 1));
      @endphp
      
      @foreach ($navigation as $navigation)
      @if ($navigation->slug == $slug)

      
      <h1>{{$navigation->title}}</h1>
      <br>
      <div>
        {!!$navigation->body!!}
      </div>

      <br>
      <hr>
      <small>Created on {{$navigation->created_at}}</small>
      <hr>
      @can('edit-users')
      <a href="/nav-menu/{{$navigation->id}}/edit" class="btn btn-default">Edit</a>
      {!!Form::open(['action' =>['App\Http\Controllers\NavigationController@destroy', $navigation->id, 'method' => 'POST', 'class' => 'pull-right']])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            @endcan
            @endif
            @endforeach
@endsection
