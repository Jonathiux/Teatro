@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar Teatro </h2>
       <form action="{{ route('teatro.update', $teatro->id
) }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
           @method('PUT')
           @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <div class="form-group">
                <label for="nombre">nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$teatro->nombre}}" />
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicacion</label>
                <textarea class="form-control" id="ubicacion" name="ubicacion">{{$teatro->ubicacion}}</textarea>
            </div>
            <div class="form-group">
                <label for="descripcion">descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{$teatro->descripcion}}</textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="text" class="form-control" id="imagen" name="imagen" value="{{$teatro->imagen}}">
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad</label>
                <input type="text" class="form-control" id="capacidad" name="capacidad" value="{{$teatro->capacidad}}">
            </div>
           <button type="submit" class="btn btn-success">Guardar Editorial</button>
       </form>
   </div>
</div>
@endsection
