<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::orderBy('id','desc')->get();
        return view('admin.event.index',compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
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
            "price" => "required"
        ])->validate();

        $event = new Event();
        $event->title  = $request->title;
        $event->price  = $request->price;
        $event->desc   = $request->desc;
        $event->status = "AKTIF";

        $cover = $request->file('cover');
        if($cover){
        $cover_path = $cover->store('images/event', 'public');
        $event->cover = $cover_path;
        }

        if ($event->save()) {
            return redirect()->route('event.index')->with('success', 'Event added successfully');
           } else {
            return redirect()->route('event.create')->with('error', 'Event failed to add');
    
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
        $event = Event::findOrFail($id);
        return view('admin.event.edit',compact('event'));
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
            "price" => "required"
        ])->validate();

        $event = Event::findOrFail($id);
        $event->title  = $request->title;
        $event->price  = $request->price;
        $event->desc   = $request->desc;
        $event->status = $request->status;

        $new_cover = $request->file('cover');
        if($new_cover){
        if($event->cover && file_exists(storage_path('app/public/' . $event->cover))){
            \Storage::delete('public/'. $event->cover);
        }

        $new_cover_path = $new_cover->store('images/event', 'public');

        $event->cover = $new_cover_path;
    }   
    // dd($event);
        if ($event->update()) {
            return redirect()->route('event.index')->with('success', 'Event updated successfully');
           } else {
            return redirect()->route('event.edit')->with('error', 'Event failed to update');
    
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
        $event = Event::findOrFail($id);

        $event->delete();
        
        return redirect()->route('event.index')->with('success', 'event deleted successfully');
    }
}
