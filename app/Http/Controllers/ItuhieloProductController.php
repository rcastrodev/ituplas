<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ItuhieloProductController extends Controller
{
    public function content()
    {        
        $page = Page::where('name', 'ituhielo')->first();
        $section1 = $page->sections()->first()->contents()->first();
        return view('administrator.ituhielo-product.content', compact('section1'));
    }

    public function create()
    {
        $category = Category::where('name', 'ituhielo')->first();
        $subCategories = $category->subCategories;   
        return view('administrator.ituhielo-product.create', compact('subCategories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('extra')) 
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');

        if($request->has('outstanding')) 
            $data['outstanding']  = 1;
        else
            $data['outstanding']  = 0;

        if($request->has('offers')) 
            $data['offers']  = 1;
        else
            $data['offers']  = 0;

        $product = Product::create($data);                    
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }
 
        return redirect()
            ->route('ituhielo-product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $category = Category::where('name', 'ituhielo')->first();
        $subCategories = $category->subCategories;   
        $product = Product::findOrFail($id);
        $numberOfImagesAllowed = 3 - $product->images()->count();
        return view('administrator.ituhielo-product.edit', compact('product', 'subCategories', 'numberOfImagesAllowed'));
    }

    public function update(ProductRequest $request)
    {   

        $data = $request->all();

        if($request->has('outstanding')) 
            $data['outstanding']  = 1;
        else
            $data['outstanding']  = 0;

        if($request->has('offers')) 
            $data['offers']  = 1;
        else
            $data['offers']  = 0;

        $product = Product::find($request->input('id'));

        if($request->hasFile('extra')){
            if (Storage::disk('custom')->exists($product->extra))
                    Storage::disk('custom')->delete($product->extra);
            
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');
        }

        $product->update($data);        
                    
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }

        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }


    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/products','custom');
        }   

        $element->update($data);
        
        return back()->with('mensaje', 'Contenido actualizado');
    }


    public function getList()
    {
        $category = Category::where('name', 'ituhielo')->first();
        $subCategories = $category->subCategories()->pluck('id')->toArray();
        $products = Product::whereIn('sub_category_id', [$subCategories])->orderBy('order', 'ASC');

        return DataTables::of($products)
        ->editColumn('description', function($product) {
            return $product->description;
        })
        ->addColumn('subCategory', function($product) {
            return $product->subCategory->name;
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('ituhielo-product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'description'])
        ->make(true);
    }
}
