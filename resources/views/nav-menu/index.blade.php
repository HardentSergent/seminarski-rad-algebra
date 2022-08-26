@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Navigation Managment') }}</div>
                <div class="card-body">
                  @can('edit-users')
                  <a href="nav-menu/create" class="btn btn-primary">Create Site</a>
                  @endcan
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($navigation as $navigation)
                      <tr>
                          <th scope="row">{{$navigation->id}}</th>
                          <td>{{$navigation->title}}</td>
                          <td>{{$navigation->slug}}</td>
                          <td>
                              @can('edit-users')
                              <a href="{{ route('nav-menu.edit', $navigation->id) }}"button type="button" class="btn btn-primary">Edit</button></a>
                              @endcan
                              @can('delete-users')
                              <form method='POST' action='{{route('nav-menu.destroy', $navigation->id)}}'>
                                  @csrf
                                  {{ method_field('DELETE') }}
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </form> 
                              @endcan
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection