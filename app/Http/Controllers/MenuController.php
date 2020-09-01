<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Menu};

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $menu     = Menu::orderBy('id','desc')->get();
        return view('admin.menu.index', compact('category','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.menu.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "name" => "required",
            "category" => "required",
            "desc"  => "required",
            "price" => "required"
        ])->validate();

        $menu               = new Menu();
        $menu->name         = $request->name;
        $menu->slug         = \Str::slug(request('name'));
        $menu->price        = $request->price;
        $menu->category_id  = $request->category;
        $menu->desc         = $request->desc;
        $menu->ingredient   = $request->ingredient;
        $menu->status       = "AKTIF";
        $cover = $request->file('cover');

        if($cover){
        $cover_path = $cover->store('images/menu', 'public');
        $menu->cover = $cover_path;
        }
        if ($menu->save()) {
            return redirect()->route('menu.index')->with('success', 'menu added successfully');
           } else {
            return redirect()->route('menu.create')->with('error', 'menu failed to add');
    
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu     = Menu::findOrFail($id); 
        $category = Category::all();
        return view('admin.menu.edit', compact('category','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            "name" => "required",
            "category" => "required",
            "desc"  => "required",
            "price" => "required"
        ])->validate();

        $menu               = Menu::findOrFail($id);
        $menu->name         = $request->name;
        $menu->slug         = \Str::slug(request('name'));
        $menu->price        = $request->price;
        $menu->category_id  = $request->category;
        $menu->desc         = $request->desc;
        $menu->ingredient   = $request->ingredient;
        $menu->status       = $request->status;
        $new_cover = $request->file('cover');

        if($new_cover){
        if($menu->cover && file_exists(storage_path('app/public/' . $menu->cover))){
            \Storage::delete('public/'. $menu->cover);
        }

        $new_cover_path = $new_cover->store('images/menu', 'public');

        $menu->cover = $new_cover_path;
        }
        
        if ($menu->update()) {
            return redirect()->route('menu.index')->with('success', 'menu updated successfully');
           } else {
            return redirect()->route('menu.edit')->with('error', 'menu failed to update');
    
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        $menu->delete();
        
        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully');
    }
}
