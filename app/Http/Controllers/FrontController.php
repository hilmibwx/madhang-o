<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{About, Banner, Booking, Event, Category, General, Menu, Special, Whyus};

class FrontController extends Controller
{
    public function home()
    {
        $about = About::find(1);
        $banner = Banner::all();
        $event = Event::all();
        $category = Category::all();
        $menu = Menu::orderBy('name','asc')->get();
        $general = General::find(1);
        $special = Special::all();
        $tabspecial = Special::all();
        $why = Whyus::orderBy('id','asc')->get();
        return view('homepage', compact('about','banner','event','category','general','menu','special','tabspecial','why'));
    }

    public function booking(Request $request)
    {
        $book = new Booking();
        $book->name = $request->name;
        $book->email = $request->email;
        $book->phone = $request->phone;
        $book->date = $request->date;
        $book->time = $request->time;
        $book->people = $request->people;
        $book->message = $request->message;
        if ($book->save()) {
            return redirect()->back()->with('success', 'Booking successfully');
           } else {
            return redirect()->back()->with('error', 'Booking failed');
           }
    }
}
