<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    public function content()
    {   
        return view('administrator.color.content');
    }

    public function store(Request $request)
    {
        $request->validate(['color.required'],['Imagen del color es requerida']);
        $data = $request->all();
        $data['color'] = $request->file('color')->store('images/color', 'public');
        Color::create($data);

        return response()->json([
            'tableReload' => true,
        ],201);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $element = Color::find($request->input('id'));
        
        if($request->hasFile('color')){
            if(Storage::disk('public')->exists($element->color))
                Storage::disk('public')->delete($element->color);
            
            $data['color'] = $request->file('color')->store('images/color','public');
        }  
        $element->update($data);

        return response()->json(['tableReload' => true,],200);
    }

    public function destroy($id)
    {
        $element = Color::find($id);

        if(Storage::disk('public')->exists($element->color))
            Storage::disk('public')->delete($element->color);

        $element->delete();
        return response()->json(['tableReload' => true],200);
    }

    public function find($id)
    {
        return response()->json(['content'=> Color::find($id)], 200);
    }

    public function getList()
    {
        return DataTables::of(Color::orderBy('order', 'ASC'))
        ->editColumn('color', function($element){
            return "<img src='".asset($element->color)."' style='height:50px; width:100px;'>";
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'color'])
        ->make(true);
    }
}
