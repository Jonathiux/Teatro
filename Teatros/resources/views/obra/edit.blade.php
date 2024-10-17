@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar Obra </h2>
       <form action="{{ route('obra.update', $obra->id
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
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{$obra->titulo}}" />
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{$obra->descripcion}}</textarea>
            </div>
            <div class="form-group">
                <label for="director">Director</label>
                <input type="text" class="form-control" id="director" name="director" value="{{$obra->director}}">
            </div>
            <div class="form-group">
                <label for="genero">Genero</label>
                <input type="text" class="form-control" id="genero" name="genero" value="{{$obra->genero}}">
            </div>
           <button type="submit" class="btn btn-success">Guardar Obra</button>
       </form>
   </div>
</div>
@endsection
