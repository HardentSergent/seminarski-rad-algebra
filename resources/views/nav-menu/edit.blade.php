@extends('layouts.app')

@section('content')
<a href="/nav-menu" class="btn btn-default">Nazad</a>
      <h1>Edit Navigation Item</h1>
      {!! Form::open(['action' => ['App\Http\Controllers\NavigationController@update', $navigation->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $navigation->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
          </div>

          <div class="form-group">
            {{Form::label('body', 'Description')}}
            {{Form::textarea('body', $navigation->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body text'])}}
          </div>

          <div class="form-group">
            <div class="col-sm-10">
                <label for="is_published">Status</label>
                  <select id="is_published" class="form-control"required name="is_published">
                  <option value="Show">Show</option>
                  <option value="Hide">Hide</option>
                  </select>
              </div>
            </div>
          
          {{Form::hidden('_method', 'PUT')}}
          {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
@endsection