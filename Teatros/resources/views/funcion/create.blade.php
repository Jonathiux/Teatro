@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Crear una nueva Funcion</h2>
    </div>
    <div class="row">
        <form action="{{ route('funcion.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}" />
            </div>
            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" class="form-control" id="hora" name="hora" value="{{old('hora')}}">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="{{old('precio')}}">
            </div>
            <div class="form-group">
                <label for="disponibles">Disponibles</label>
                <input type="number" class="form-control" id="disponibles" name="disponibles" value="{{old('disponibles')}}">
            </div>
            <div class="form-group">
                <label for="vendidos">Vendidos</label>
                <input type="number" class="form-control" id="vendidos" name="vendidos" value="{{old('vendidos')}}">
            </div>"

            <button type="submit" class="btn btn-success">Guardar Funcion</button>
        </form>
    </div>
</div>
@endsection