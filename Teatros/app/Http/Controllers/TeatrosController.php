<?php

namespace App\Http\Controllers;

use App\Models\Teatro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TeatrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teatro.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'ubicacion' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'capacidad' => 'required',
        ]);

        $Teatro = new Teatro();
        $Teatro->nombre =  $request->input('nombre');
        $Teatro->ubicacion =  $request->input('ubicacion');
        $Teatro->descripcion =  $request->input('descripcion');
        $Teatro->capacidad =  $request->input('capacidad');
        $Teatro->imagen =  $request->input('imagen');
        $Teatro->status = 1;
        $Teatro->save();
        return redirect()->route('teatros.index')->with(array(
            'message' => 'La Editorial se ha guardado correctamente'
        ));
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
