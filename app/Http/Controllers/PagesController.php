<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description)); 
        $sections   = $page->sections;
        $sliders    = Content::where('section_id', 1)->orderBy('order', 'ASC')->get();
        $section2   = Content::where('section_id', 2)->first();
        $news       = Content::where('section_id', 5)->where('content_5', '1')->orderBy('order', 'ASC')->get();
        $products   = Product::where('outstanding', '1')->orderBy('order', 'ASC')->get();
        return view('paginas.index', compact('sliders', 'section2', 'news', 'products'));
    }

    public function empresa()
    {
        SEO::setTitle('empresa');
        SEO::setDescription(strip_tags($this->data->description));
        $section1  = Content::where('section_id', 3)->first();
        $sections2 = Content::where('section_id', 4)->orderBy('order', 'ASC')->get();
        return view('paginas.empresa', compact('section1', 'sections2'));
    }

    public function productos(Request $request)
    {
        SEO::setTitle('produtos');
        SEO::setDescription(strip_tags($this->data->description)); 
        $categorias = Category::orderBy('order', 'ASC')->get();
        if ($request->get('producto'))
            $productos = Product::where('name', 'like', "%{$request->get('producto')}%")->orderBy('order', 'ASC')->get();
        else
            $productos = Product::orderBy('order', 'ASC')->get();
        
        
        return view('paginas.productos', compact('productos', 'categorias'));
    }

    public function categoria($id)
    {
        SEO::setTitle('categorías');
        SEO::setDescription(strip_tags($this->data->description)); 
        $categoria = Category::findOrFail($id);
        $categorias = Category::orderBy('order', 'ASC')->get();
        $productos = $categoria->products()->orderBy('order', 'ASC')->get();
        return view('paginas.categoria', compact('productos', 'categorias', 'categoria'));
    }

    public function producto($id)
    {
        $producto = Product::findOrFail($id);
        SEO::setTitle($producto->name);
        SEO::setDescription(strip_tags($producto->description)); 
        return view('paginas.producto', compact('producto'));
    }

    public function novedades()
    {
        SEO::setTitle('novedades');
        SEO::setDescription(strip_tags($this->data->description)); 
        $news = Content::where('section_id', 5)->orderBy('order', 'ASC')->get();
        return view('paginas.novedades', compact('news'));
    }

    public function novedad($id)
    {
        $new = Content::findOrFail($id);
        SEO::setTitle($new->content_1);
        SEO::setDescription(strip_tags($new->content_3)); 
        return view('paginas.novedad', compact('new'));
    }

    public function descargas()
    {
        SEO::setTitle('descargas');
        SEO::setDescription(strip_tags($this->data->description)); 
        $descargas = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();
        return view('paginas.descargas', compact('descargas'));
    }

    public function contacto()
    {
        $content = Content::where('section_id', 9)->where('content_1', 'Contacto')->first();
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("contacto");
        return view('paginas.contacto', compact('content'));
    }

    public function descargarArchivo($id, $reg)
    {
        $content = Content::findOrFail($id);  
        if (Storage::disk('public')->exists($content->$reg)) {
            return Response::download($content->$reg);  
        }else{
            return back();  
        }
        
    }

}
