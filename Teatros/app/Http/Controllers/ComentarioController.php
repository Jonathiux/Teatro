<?php

namespace App\Http\Controllers;

use App\Models\comentario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Comentario = Comentario::where('status', 1)->get();
        return view('comentario.index', ['funcion' => $this->cargarDT($Comentario)]);
        //
    }


    private function cargarDT($consulta)
    {
        $Comentario = [];
        foreach ($consulta as $key => $value) {
            $actualizar = route('comentario.edit', $value['id']);
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


            $Comentario[$key] = array(
                $acciones,
                $value['id'],
                $value['comentario'],
                $value['calificacion'],
                $value['fecha'],
                $value['status'],
            );
        }
        return $Comentario;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comentario.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comentario' => 'required',
            'calificacion' => 'required',
        ]);

        $Comentario = new Comentario();
        $Comentario->comentario = $request->input('comentario');
        $Comentario->calificacion = $request->input('calificacion');
        $Comentario->fecha = $request->input(Carbon::now());
        $Comentario->status = 1;
        $Comentario->save();
        return redirect()->route('comentario.index')->with(array(
            'message' => 'El comentario se ha guardado correctamente'
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
        $Comentario = Comentario::findOrFail($id);
        return view('comentario.edit', array(
            'comentario' => $Comentario
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
           'comentario' => 'required',
            'calificacion' => 'required',
        ]);

        $Comentario = Comentario::findOrFail($id);
        $Comentario->comentario = $request->input('comentario');
        $Comentario->calificacion = $request->input('calificacion');
        $Comentario->fecha = $request->input(Carbon::now());
        $Comentario->save();
        return redirect()->route('comentario.index')->with(array(
            'message' => 'El comentario se ha actualizado correctamente'
        ));
        //
    }

    public function delete($Comentario_id)
    {
        $Comentario = Comentario::find($Comentario_id);
        if ($Comentario) {
            $Comentario->status = 0;
            $Comentario->update();
            return redirect()->route('comentario.index')->with("message", "El comentario se ha eliminado correctamente");
        } else {
            return redirect()->route('comentario.index')->with("message", "El comentario que trata de eliminar no existe");
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
