<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 20px;
        }

        #primero {
            background-color: #ccc;
        }

        #segundo {
            color: #44a359;
        }

        #tercero {
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <h1>Teatro : {{$teatro->nombre}}</h1>
    <table id="teatro" class="table table-striped table-bordered" style="width:100%" border="1" bordercolor="#0000FF" ">
        <thead>
            <tr>
                <th>Id Teatro</th>
                <th>Nombre</th>
                <th>Ubicacion</th>
                <th>Descripcion</th>
                <th>Capacidad</th>
            </tr>
        </thead>
        <tbody style="text-align: center;"> 
            <td>{{$teatro->id}}</td>
            <td>{{$teatro->nombre}}</td>
            <td>{{$teatro->ubicacion}}</td>
            <td>{{$teatro->descripcion}}</td>
            <td>{{$teatro->capacidad}}</td> 
        </tbody>
    </table>
</body>

</html>