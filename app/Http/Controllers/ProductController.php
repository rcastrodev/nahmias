<?php

namespace App\Http\Controllers;

use App\Color;
use App\Product;
use App\Category;
use App\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $applications = Application::all();
        $colors = Color::all();
        return view('administrator.product.create', compact('applications', 'colors'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if($request->has('outstanding'))
            $data['outstanding'] = 1;
        else 
            $data['outstanding'] = 0;

        $product = Product::create($data);

        if ($request->has('colors')) {
            if($request->input('colors'))
                $product->colors()->attach($request->input('colors'));
        }

        if($request->input('applications'))
            $product->applications()->attach($request->input('applications'));
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'public')
                ]);
            }
        }

        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $applications = Application::all();
        $colors = Color::all();
        $product = Product::findOrFail($id);
        $numberOfImagesAllowed = 7 - $product->images()->count();
        return view('administrator.product.edit', compact('product', 'colors', 'applications', 'numberOfImagesAllowed'));
    }

    public function update(ProductRequest $request)
    {        
        $data = $request->all();
        if($request->has('outstanding'))
            $data['outstanding'] = 1;
        else 
            $data['outstanding'] = 0;
        $product = Product::find($request->input('id'));

        if($request->hasFile('data_sheet')){
            if (Storage::disk('public')->exists($product->data_sheet))
                    Storage::disk('public')->delete($product->data_sheet);
            
            $data['data_sheet'] = $request->file('data_sheet')->store('images/data-sheet', 'public');
        }

        $product->update($data);
        $applications = $product->applications;
        
    
        if($request->input('applications')){
            $product->applications()->wherePivotNotIn('application_id', $request->input('applications'))->detach();

            foreach ($request->input('applications') as $application_id) {
                if(! in_array($application_id, $applications->pluck('id')->toArray()))
                    $product->applications()->attach($application_id);
            }
        }else{
            $product->applications()->detach();
        }

        $colors = $product->colors;
        if ($request->has('colors')) {
            if($request->input('colors')){
                $product->colors()->wherePivotNotIn('color_id', $request->input('colors'))->detach();
    
                foreach ($request->input('colors') as $color_id) {
                    if(! in_array($color_id, $colors->pluck('id')->toArray()))
                        $product->colors()->attach($color_id);
                }
            }else{
                $product->colors()->detach();
            }
        }
            
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'public')
                ]);
            }
        }
                        
        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        $element = Product::find($id);
        $images = $element->images;

        foreach ($images as $v) {
            if(Storage::disk('public')->exists($v))
                Storage::disk('public')->delete($v);
        } 

        $element->delete();
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        return DataTables::of(Product::orderBy('order', 'ASC'))
        ->editColumn('description', function ($product) {
            return Str::limit($product->description, 100);
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'description'])
        ->make(true);
    }
}
