<?php

use Illuminate\Support\Facades\Route;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\NavigationController;
use App\Models\Navigation;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ ', 'App\Http\Controllers\PagesController@index');

Route::get('/about', 'App\Http\Controllers\PagesController@about');

Route::resource('posts', 'App\Http\Controllers\PostsController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace("App\Http\Controllers\Admin")->prefix("admin")->name("admin.")->group(function (){
  Route::resource("users",UsersController::class,["except"=>["show","create","store"]]);
});


Route::resource('nav-menu', 'App\Http\Controllers\NavigationController');

Route::post('/', function () {
  App\Models\Navigation::create(['title' => request('title')]);
  return redirect()->back();  
});
Route::get('check_slug', function () {
  $slug = SlugService::createSlug(App\Models\Navigation::class, 'slug', request('title'));
  return response()->json(['slug' => $slug]);
});
//Route::get('/nav-menu/{$slug}', 'App\Http\Controllers\NavigationController@show');
Route::get('/{$slug}', 'App\Http\Controllers\NavigationController@show');