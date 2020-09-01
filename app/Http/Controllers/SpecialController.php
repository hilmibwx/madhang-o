<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Special;

class SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $special = Special::orderBy('id','desc')->get();
        return view ('admin.special.index', compact('special'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.special.create');
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
            "title" => "required",
            "cover" => "required",
            "desc"  => "required",
            "subject" => "required"
        ])->validate();

        $special = new Special();
        $special->title  = $request->title;
        $special->subject  = $request->subject;
        $special->desc   = $request->desc;

        $cover = $request->file('cover');
        if($cover){
        $cover_path = $cover->store('images/special', 'public');
        $special->cover = $cover_path;
        }

        if ($special->save()) {
            return redirect()->route('special.index')->with('success', 'special added successfully');
           } else {
            return redirect()->route('special.create')->with('error', 'special failed to add');
    
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
        $special = Special::findOrFail($id);
        return view ('admin.special.edit', compact('special'));
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
            "title" => "required",
            "desc"  => "required",
            "subject" => "required"
        ])->validate();

        $special = Special::findOrFail($id);
        $special->title  = $request->title;
        $special->subject  = $request->subject;
        $special->desc   = $request->desc;

        $new_cover = $request->file('cover');
        if($new_cover){
        if($special->cover && file_exists(storage_path('app/public/' . $special->cover))){
            \Storage::delete('public/'. $special->cover);
        }

        $new_cover_path = $new_cover->store('images/special', 'public');

        $special->cover = $new_cover_path;
    }   
    // dd($special);
        if ($special->update()) {
            return redirect()->route('special.index')->with('success', 'special updated successfully');
           } else {
            return redirect()->route('special.edit')->with('error', 'special failed to update');
    
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
        $special = Special::findOrFail($id);

        $special->delete();
        
        return redirect()->route('special.index')->with('success', 'special deleted successfully');
    }
}
