<?php

namespace App\Http\Controllers;

use App\Models\funciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FuncionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Funcion = Funciones::where('status', 1)->get();
        return view('funcion.index', ['funcion' => $this->cargarDT($Funcion)]);
        //
    }


    private function cargarDT($consulta)
    {
        $Funcion = [];
        foreach ($consulta as $key => $value) {
            $actualizar = route('funcion.edit', $value['id']);
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


            $Funcion[$key] = array(
                $acciones,
                $value['id'],
                $value['fecha'],
                $value['hora'],
                $value['precio'],
                $value['disponibles'],
                $value['vendidos'],
                $value['status'],
            );
        }
        return $Funcion;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcion.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required',
            'hora' => 'required',
            'precio' => 'required',
            'disponibles' => 'required',
            'vendidos' => 'required',
        ]);

        $Funcion = new Funciones();
        $Funcion->fecha = $request->input('fecha');
        $Funcion->hora = $request->input('hora');
        $Funcion->precio = $request->input('precio');
        $Funcion->disponibles = $request->input(key: 'disponibles');
        $Funcion->vendidos = $request->input('vendidos');
        $Funcion->status = 1;
        $Funcion->save();
        return redirect()->route('funcion.index')->with(array(
            'message' => 'La obra se ha guardado correctamente'
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
        $Funcion = funciones::findOrFail($id);
        return view('funcion.edit', array(
            'funcion' => $Funcion
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
           'fecha' => 'required',
            'hora' => 'required',
            'precio' => 'required',
            'disponibles' => 'required',
            'vendidos' => 'required',
        ]);

        $Funcion = funciones::findOrFail($id);
        $Funcion->fecha = $request->input('fecha');
        $Funcion->hora = $request->input('hora');
        $Funcion->precio = $request->input('precio');
        $Funcion->disponibles = $request->input(key: 'disponibles');
        $Funcion->vendidos = $request->input('vendidos');
        $Funcion->save();
        return redirect()->route('funcion.index')->with(array(
            'message' => 'La funcion se ha actualizado correctamente'
        ));
        //
    }

    public function delete($Funcion_id)
    {
        $Funcion = funciones::find($Funcion_id);
        if ($Funcion) {
            $Funcion->status = 0;
            $Funcion->update();
            return redirect()->route('funcion.index')->with("message", "La funcion se ha eliminado correctamente");
        } else {
            return redirect()->route('funcion.index')->with("message", "La funcion que trata de eliminar no existe");
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
