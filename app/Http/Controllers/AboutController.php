<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::find(1);
        return view ('admin.about', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::findOrFail(1);
        $about->title  = $request->title;
        $about->link   = $request->link;
        $about->desc   = $request->desc;

        $new_cover = $request->file('cover');
        if($new_cover){
        if($about->cover && file_exists(storage_path('app/public/' . $about->cover))){
            \Storage::delete('public/'. $about->cover);
        }

        $new_cover_path = $new_cover->store('images/about', 'public');

        $about->cover = $new_cover_path;
    }   
    // dd($about);
        if ($about->update()) {
            return redirect()->route('about.edit')->with('success', 'about updated successfully');
           } else {
            return redirect()->route('about.edit')->with('error', 'about failed to update');
    
           }
    }
}
