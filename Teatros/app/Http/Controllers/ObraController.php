<?php

namespace App\Http\Controllers;

use App\Models\obra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Obra = obra::where('status', 1)->get();
        return view('obra.index', ['obra' => $this->cargarDT($Obra)]);
        //
    }


    private function cargarDT($consulta)
    {
        $Obra = [];
        foreach ($consulta as $key => $value) {
            $actualizar = route('obra.edit', $value['id']);
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


            $Obra[$key] = array(
                $acciones,
                $value['id'],
                $value['titulo'],
                $value['descripcion'],
                $value['director'],
                $value['genero'],
                $value['status'],
            );
        }
        return $Obra;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obra.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required',
            'director' => 'required',
            'genero' => 'required',
        ]);

        $Obra = new Obra();
        $Obra->titulo = $request->input('titulo');
        $Obra->descripcion = $request->input('descripcion');
        $Obra->director = $request->input('director');
        $Obra->genero = $request->input('genero');
        $Obra->status = 1;
        $Obra->save();
        return redirect()->route('obra.index')->with(array(
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
        $Obra = Obra::findOrFail($id);
        return view('obra.edit', array(
            'obra' => $Obra
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
           'titulo' => 'required',
            'descripcion' => 'required',
            'director' => 'required',
            'genero' => 'required',
        ]);

        $Obra = Obra::findOrFail($id);
        $Obra->titulo = $request->input('titulo');
        $Obra->descripcion = $request->input('descripcion');
        $Obra->director = $request->input('director');
        $Obra->genero = $request->input('genero');
        $Obra->save();
        return redirect()->route('obra.index')->with(array(
            'message' => 'La obra se ha actualizado correctamente'
        ));
        //
    }

    public function delete($obra_id)
    {
        $Obra = Obra::find($obra_id);
        if ($Obra) {
            $Obra->status = 0;
            $Obra->update();
            return redirect()->route('obra.index')->with("message", "La obra se ha eliminado correctamente");
        } else {
            return redirect()->route('obra.index')->with("message", "La obra que trata de eliminar no existe");
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
