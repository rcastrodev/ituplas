<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function content()
    {
        $categories = Category::where('name', '<>', 'ituagua')->orderBy('order', 'ASC')->get();
        return view('administrator.sub-category.content', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image')) 
            $data['image'] = $request->file('image')->store('images/sub-category', 'custom');
        
        SubCategory::create($data);

        return response()->json(['tableReload' => true],201);
    }

    public function update(Request $request)
    {
        $element = SubCategory::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/sub-category','custom');
        }        

        $element->update($data);
    }

    public function findContent($id)
    {
        $content = SubCategory::find($id);
        return response()->json(['content' => $content]);
    }

    public function getCategory($id)
    {
        $category = SubCategory::find($id)->category;
        return response()->json(['category' => $category]);
    }
    public function destroy($id)
    {
        $element = SubCategory::find($id);

        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();

        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $sliders = SubCategory::where('name', '<>', 'ituagua')->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('category', function($slider){
            return $slider->category->name;    
        })
        ->editColumn('image', function($slider){
            if ($slider->image) 
                return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
            
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
