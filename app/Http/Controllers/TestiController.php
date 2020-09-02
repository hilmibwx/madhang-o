<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testi;

class TestiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testi = Testi::orderBy('id','desc')->get();
        return view('admin.testi.index', compact('testi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.testi.create');
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
            "desc" => "required",
            "star"  => "required",
            "from" => "required"
        ])->validate();

        $testi = new Testi();
        $testi->name  = $request->name;
        $testi->address  = $request->address;
        $testi->star   = $request->star;
        $testi->desc   = $request->desc;
        $testi->from   = $request->from;
        $testi->status   = $request->status;

        $cover = $request->file('photo');
        if($cover){
        $cover_path = $cover->store('images/testi', 'public');
        $testi->photo = $cover_path;
        }

        if ($testi->save()) {
            return redirect()->route('testi.index')->with('success', 'testi added successfully');
           } else {
            return redirect()->route('testi.create')->with('error', 'testi failed to add');
    
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
        $testi = Testi::findOrFail($id);
        return view ('admin.testi.edit', compact('testi'));
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
            "desc" => "required",
            "star"  => "required",
            "from" => "required"
        ])->validate();

        $testi = Testi::findOrFail($id);
        $testi->name  = $request->name;
        $testi->address  = $request->address;
        $testi->star   = $request->star;
        $testi->desc   = $request->desc;
        $testi->from   = $request->from;
        $testi->status   = $request->status;

        $new_cover = $request->file('photo');
        if($new_cover){
        if($testi->photo && file_exists(storage_path('app/public/' . $testi->photo))){
            \Storage::delete('public/'. $testi->photo);
        }

        $new_cover_path = $new_cover->store('images/testi', 'public');

        $testi->photo = $new_cover_path;
    }   

        if ($testi->save()) {
            return redirect()->route('testi.index')->with('success', 'testi updated successfully');
           } else {
            return redirect()->route('testi.edit')->with('error', 'testi failed to update');
    
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
        $testi = Testi::findOrFail($id);
        $testi->delete();
        return redirect()->back()->with('success', 'testi deleted successfully');
    }
}
