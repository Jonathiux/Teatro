@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Crear una nueva Obra</h2>
    </div>
    <div class="row">
        <form action="{{ route('obra.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}" />
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
            </div>
            <div class="form-group">
                <label for="director">Director</label>
                <input type="text" class="form-control" id="director" name="director" value="{{old('director')}}">
            </div>
            <div class="form-group">
                <label for="genero">Genero</label>
                <input type="text" class="form-control" id="genero" name="genero" value="{{old('genero')}}">
            </div>
            <button type="submit" class="btn btn-success">Guardar Obra</button>
        </form>
    </div>
</div>
@endsection