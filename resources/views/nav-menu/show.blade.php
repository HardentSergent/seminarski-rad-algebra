@extends('layouts.app')

@section('content')
<a href="/nav-menu" class="btn btn-default">Nazad</a>
      <h1>{{$navigation->title}}</h1>
      <br>
      <div>
        {{!!$navigation->body!!}}
      </div>
      <hr>
      <a href="/nav-menu/{{$navigation->id}}/edit" class="btn btn-default">Edit</a>
      {!!Form::open(['action' =>['App\Http\Controllers\NavigationController@destroy', $navigation->id, 'method' => 'POST', 'class' => 'pull-right']])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
@endsection
