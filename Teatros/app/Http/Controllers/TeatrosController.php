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
        $Teatro = Teatro::where('status', 1)->get();
        return view('teatro.index', ['teatro' => $this->cargarDT($Teatro)]);
        //
    }


    private function cargarDT($consulta)
    {
        $Teatro = [];
        foreach ($consulta as $key => $value) {
            $actualizar = route('teatro.edit', $value['id']);
            $acciones = '
           <div class="btn-acciones">
               <div class="btn-circle">
                   <a href="' . $actualizar . '" role="button" class="btn btn-success" title="Actualizar">
                       <i class="far fa-edit"></i>
                   </a>
                    <a role="button" class="btn btn-danger" onclick="modal(' . $value['id'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal"">
                       <i class="far fa-trash-alt"></i>
                   </a>
               </div>
           </div>';


            $Teatro[$key] = array(
                $acciones,
                $value['id'],
                $value['nombre'],
                $value['ubicacion'],
                $value['descripcion'],
                $value['imagen'],
                $value['capacidad'],
            );
        }
        return $Teatro;
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
        $this->validate($request, [
            'nombre' => 'required',
            'ubicacion' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'capacidad' => 'required',
        ]);

        $Teatro = new Teatro();
        $Teatro->nombre = $request->input('nombre');
        $Teatro->ubicacion = $request->input('ubicacion');
        $Teatro->descripcion = $request->input('descripcion');
        $Teatro->capacidad = $request->input(key: 'capacidad');
        $Teatro->imagen = $request->input('imagen');
        $Teatro->status = 1;
        $Teatro->save();
        return redirect()->route('teatro.index')->with(array(
            'message' => 'El teatro se ha guardado correctamente'
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
        $Teatro = Teatro::findOrFail($id);
        return view('teatro.edit', array(
            'teatro' => $Teatro
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'ubicacion' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'capacidad' => 'required',
        ]);

        $Teatro = Teatro::findOrFail($id);
        $Teatro->nombre = $request->input('nombre');
        $Teatro->ubicacion = $request->input('ubicacion');
        $Teatro->descripcion = $request->input('descripcion');
        $Teatro->capacidad = $request->input(key: 'capacidad');
        $Teatro->imagen = $request->input('imagen');
        $Teatro->save();
        return redirect()->route('teatro.index')->with(array(
            'message' => 'El teatro se ha actualizado correctamente'
        ));
        //
    }

    public function delete($Teatro_id)
    {
        $Teatro = Teatro::find($Teatro_id);
        if ($Teatro) {
            $Teatro->status = 0;
            $Teatro->update();
            return redirect()->route('teatro.index')->with("message", "El teatro se ha eliminado correctamente");
        } else {
            return redirect()->route('teatro.index')->with("message", "El teatro que trata de eliminar no existe");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
