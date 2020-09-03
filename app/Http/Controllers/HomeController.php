<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Inbox, Booking, Menu, Testi};
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inbox = Inbox::count();
        $booking = Booking::count();
        $menu = Menu::count();
        $testi = Testi::count();
        return view('home', compact('inbox','booking','menu','testi'));
    }
}
