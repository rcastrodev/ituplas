<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Content;
use App\Product;
use App\Category;
use Carbon\Carbon;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));

        /** Secciones de página */
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $products   = Product::where('outstanding', 1)->orWhere('offers', 1)->orWhere('created_at', '>', Carbon::now()->add(-21, 'day')->format('Y-m-d'))->orderBy('order', 'ASC')->get();

        return view('paginas.index', compact('section1s', 'section2', 'products'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections = $page->sections;
        $sliders = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3 = $sections->where('name', 'section_3')->first()->contents()->first();
        $section4s = $sections->where('name', 'section_4')->first()->contents()->orderBy('order', 'ASC')->get();
        SEO::setTitle('nosotros');
        return view('paginas.empresa', compact('sliders', 'section2', 'section3', 'section4s'));
    }

    public function categoriaProductos ()
    {
        $category = Category::where('name', 'PRODUCTOS')->first();
        $subCategories = [];
        if ($category) 
            if (count($category->subCategories)) 
                $subCategories = $category->subCategories()->orderBy('order', 'ASC')->get();

        SEO::setTitle('productos');    
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.categoria-productos', compact('subCategories'));
    }

    public function subcategoriaProductos($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $products = [];
        $subcategories = [];

        if (count($subCategory->products)) {
            $products = $subCategory->products()->orderBy('order', 'ASC')->get();
            SEO::setTitle($subCategory->name);    
            SEO::setDescription(strip_tags($this->data->description)); 
        }

        if ($subCategory->category) 
            $subcategories = $subCategory->category->subCategories()->orderBy('order', 'ASC')->get(); 
        
        return view('paginas.subcategoria-productos', compact('subCategory', 'subcategories', 'products'));
    }

    public function producto(Product $product)
    {
        if ($product){
            SEO::setTitle($product->name);
            SEO::setDescription(strip_tags($product->description));
        }
        $category = Category::where('name', 'PRODUCTOS')->first();
        $subcategories = $category->subCategories()->orderBy('order', 'ASC')->get();
        return view('paginas.producto', compact('product', 'subcategories'));
    }

    public function ituhielo()
    {
        $page       = Page::where('name', 'ituhielo')->first();
        $section1   = $page->sections()->first()->contents()->first();

        $category   = Category::where('name', 'ituhielo')->first();
        $subCategories = [];
        if ($category) 
            if (count($category->subCategories)) 
                $subCategories = $category->subCategories()->orderBy('order', 'ASC')->get();

        SEO::setTitle('ituhielo');    
        SEO::setDescription(strip_tags($this->data->description));

        return view('paginas.categoria-ituhielo', compact('section1', 'subCategories'));
    }

    public function subcategoriaItuhielo($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $products = [];
        $subcategories = [];

        if (count($subCategory->products)) {
            $products = $subCategory->products()->orderBy('order', 'ASC')->get();
            SEO::setTitle($subCategory->name);    
            SEO::setDescription(strip_tags($this->data->description)); 
        }

        if ($subCategory->category) 
            $subcategories = $subCategory->category->subCategories()->orderBy('order', 'ASC')->get(); 
        
        return view('paginas.subcategoria-ituhielo', compact('subCategory', 'subcategories', 'products'));
    }

    public function subcategoriaItuhieloProducto(Product $product)
    {

        if ($product){
            SEO::setTitle($product->name);
            SEO::setDescription(strip_tags($product->description));
        }

        $category = Category::where('name', 'ituhielo')->first();
        $subcategories = $category->subCategories()->orderBy('order', 'ASC')->get();
        return view('paginas.producto-ituhielo', compact('product', 'subcategories'));
    }

    public function ituagua()
    {
        $page       = Page::where('name', 'ituagua')->first();
        $section1   = $page->sections()->first()->contents()->first();

        $category = Category::where('name', 'ituagua')->first();
        $products = $category->subCategories()->first()->products;

        SEO::setTitle('ituagua');    
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.categoria-ituagua', compact('section1', 'products'));
    }

    public function subcategoriaItuagua($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $products = [];
        $subcategories = [];

        if (count($subCategory->products)) {
            $products = $subCategory->products()->orderBy('order', 'ASC')->get();
            SEO::setTitle($subCategory->name);    
            SEO::setDescription(strip_tags($this->data->description)); 
        }

        if ($subCategory->category) 
            $subcategories = $subCategory->category->subCategories()->orderBy('order', 'ASC')->get(); 
        
        return view('paginas.subcategoria-ituagua', compact('subCategory', 'subcategories', 'products'));
    }

    public function subcategoriaItuaguaProducto(Product $product)
    {

        if ($product){
            SEO::setTitle($product->name);
            SEO::setDescription(strip_tags($product->description));
        }

        $category = Category::where('name', 'ituagua')->first();
        $products = $category->subCategories()->first()->products;
        return view('paginas.producto-ituagua', compact('product', 'products'));
    }

    public function productos(Request $request)
    {
        if (! $request->get('b')) return back(); 
        $b = $request->get('b');
        $products = Product::where('name', 'like', "%{$b}%")->get();        
        return view('paginas.productos', compact('products'));
    }

    public function ofertas()
    {
        $products   = Product::orWhere('offers', 1)->orderBy('order', 'ASC')->get();
        
        return view('paginas.ofertas', compact('products'));
    }

    public function logistica()
    {
        $page = Page::where('name', 'logistica')->first();
        $section1   = $page->sections()->first()->contents()->first();
        return view('paginas.logistica', compact('section1'));
    }
    
    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto"); 
        SEO::setDescription(strip_tags($this->data->description));      
        return view('paginas.contacto');
    }

}
