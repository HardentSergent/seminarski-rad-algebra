<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class NavigationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navigation = Navigation::orderBy('id', 'asc')->get();

        return view('nav-menu.index')->with('navigation', $navigation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nav-menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required',
           'body' => 'required',
           
       ]);

       $navigation = new Navigation;
       $navigation->title = $request->input('title');
       $navigation->slug = \Str::slug($request->title);
       $navigation->is_published = $request->is_published;
       $navigation->body = $request->input('body');
       $navigation->save();

       return redirect('/nav-menu')->with('success', 'Navigation Item Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $navigation = Navigation::where('slug', '=', $slug)->first();
          
            return view('nav-menu.show')->with(['nav-menu' => $navigation]);
        //return view('nav-menu.show')->withNavigation($navigation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $navigation = Navigation::find($id);

        return view('nav-menu.edit')->with('navigation', $navigation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
 
        $navigation = Navigation::find($id);
        $navigation->title = $request->input('title');
        $navigation->body = $request->input('body');
        $navigation->is_published = $request->input('is_published');
        $navigation->save();
 
        return redirect('/nav-menu')->with('success', 'Navigation Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $navigation = Navigation::find($id);
        
        $navigation->delete();
        return redirect('/nav-menu')->with('success', 'Navigation Item Removed');
    }
    
}
