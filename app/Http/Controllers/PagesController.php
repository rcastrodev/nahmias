<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Product;
use App\Application;
use Illuminate\Http\Request;
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
        if ($page) {
            SEO::setDescription($page->description);
        }

        /** Secciones de página */
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2  = $sections->where('name', 'section_2')->first()->contents()->first();
        $products   = Product::orderBy('order', 'ASC')->where('outstanding', 1)->get();
  
        return view('paginas.index', compact('section1s', 'section2', 'products'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        if ($page) {
            SEO::setTitle('empresa');
            SEO::setDescription($this->data->description);
        }

        /** Secciones de página */
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first(); // section1 == sección de slider
        $section2 = $sections->where('name', 'section_2')->first(); // section2 == sección de ribbon
        $sliders = $company = null;
        if ($section1)  $sliders = $section1->contents()->orderBy('order', 'ASC')->get();
        if ($section2)  $company = $section2->contents()->first();
        
        return view('paginas.empresa', compact('sliders',  'company', 'page'));
    }

    public function productos(Request $request)
    {
        if($request->get('b'))
            $products = Product::where('name', 'like', '%'.$request->get('b').'%')->get();
        else
            $products = Product::orderBy('outstanding', 'DESC')->orderBy('order', 'ASC')->get();

        SEO::setTitle('productos');
        SEO::setDescription($this->data->description);
            
        return view('paginas.productos', compact('products'));
    }

    public function producto(Product $product)
    {
        SEO::setTitle($product->name);
        SEO::setDescription($this->data->description);
        $products = Product::where('id', '<>', $product->id)->inRandomOrder()->get();
        $relatedProducts = [];
        foreach ($product->applications as $ap) {
            $relatedProducts = $ap->products;
        }
    
        $relatedProducts = collect($relatedProducts)->where('id'< '<>', $product->id)->take(3);
        return view('paginas.producto', compact('product', 'products', 'relatedProducts'));
    }

    public function aplicaciones()
    {
        SEO::setTitle('aplicaciones');
        SEO::setDescription(strip_tags($this->data->description));
        $applications = Application::orderBy('order', 'ASC')->get();
        return view('paginas.aplicaciones', compact('applications'));
    }

    public function cartaDeColores()
    {
        SEO::setTitle('carta de colores');
        SEO::setDescription($this->data->description);
        $colors = Color::orderBy('order', 'ASC')->take(30)->get();
        return view('paginas.carta-de-colores', compact('colors'));
    }

    public function obtenerCartaDeColores()
    {
        return response()->json(['colores' => Color::orderBy('order', 'ASC')->get()], 200);
    }

    public function sulicitudPresupuesto()
    {
        SEO::setTitle('solicitud de presupuesto');
        SEO::setDescription($this->data->description);
        return view('paginas.solicitud-de-presupuesto');
    }

    public function contacto()
    {
        SEO::setTitle("contacto");
        SEO::setDescription($this->data->description);   
        return view('paginas.contacto');
    }
}