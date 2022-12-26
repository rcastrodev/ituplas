<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogisticsController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'logistica')->first();
    }


    public function content()
    {
        $sections   = $this->page->sections;
        $section1   = $sections->where('name', 'section_1')->first()->contents()->first();
        return view('administrator.logistics.content', compact('section1'));
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();    
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/logistics','custom');
        } 
        $element->update($data);
        return back()->with('mensaje', 'Contenido actualizado');
    }

    public function destroy($id)
    {
        $element = Content::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }
}
