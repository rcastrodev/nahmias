<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ApplicationRequest;

class ApplicationController extends Controller
{

    public function content()
    {
        return view('administrator.application.content');
    }

    public function store(ApplicationRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/applications', 'public');
        Application::create($data);

        return response()->json([
            'tableReload' => true,
        ],201);
    }

    public function update(ApplicationRequest $request)
    {
        $element = Application::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/applications','public');
        }   

        $element->update($data);
    }

    public function destroy($id)
    {
        $element = Application::find($id);

        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        $element->delete();
    }

    public function find($id)
    {
        return response()->json(['content' => Application::find($id)]);
    }

    public function getList()
    {
        $applications = Application::orderBy('order', 'ASC');

        return DataTables::of($applications)
        ->editColumn('image', function($application){
            return '<img src="'.asset($application->image).'" width="200">';
        })
        ->addColumn('actions', function($application) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$application->id.')"><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$application->id.')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
