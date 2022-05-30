@extends('layouts.app')

@section('content')
<a href="/nav-menu" class="btn btn-default">Nazad</a>
      <h1>Create a Navigation Item</h1>
      {!! Form::open(['action' => 'App\Http\Controllers\NavigationController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug">
        </div>
          <div class="form-group">
            {{Form::label('body', 'Description')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body text'])}}
          </div>
          {{-- jQuery Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- Check Slug --}}
<script>
    $('#title').change(function(e) {
       $.get('{{ url('check_slug') }}', 
       { 'title': $(this).val() }, 
       function( data ) {
           $('#slug').val(data.slug);
       }
       );
    });
</script>
    <div class="form-group">
      <div class="col-sm-10">
          <label for="is_published">Status</label>
            <select id="is_published" class="form-control"required name="is_published">
            <option value="Show">Show</option>
            <option value="Hide">Hide</option>
            </select>
        </div>
      </div>
                
       
          {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
@endsection
