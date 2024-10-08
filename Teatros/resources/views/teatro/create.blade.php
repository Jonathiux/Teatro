# Vista para crear un nuevo teatro
@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Crear un nuevo teatro</h2>
    </div>
    <div class="row">
        <form action="{{ route('teatro.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
            @csrf
            <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
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
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" />
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicacion</label>
                <textarea class="form-control" id="ubicacion" name="ubicacion">{{old('ubicacion')}}</textarea>
            </div>
            <div class="form-group">
                <label for="descripcion">descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="text" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}">
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad</label>
                <input type="text" class="form-control" id="capacidad" name="capacidad" value="{{old('capacidad')}}">
            </div>
            <button type="submit" class="btn btn-success">Guardar Teatro</button>
        </form>
    </div>
</div>
@endsection