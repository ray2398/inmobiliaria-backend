<!DOCTYPE html>
<html>
<body>
<style>
        body {
            margin: 1cm;
            font-family: "Century Gothic", CenturyGothic,  sans-serif;
        }

</style>

<h1>Inmueble</h1>
<h2>{{$inmueble->nombre}}</h2>
<p>Descripcion: {{$inmueble->descripcion}}</p>
<p>Dirección: {{$inmueble->direccion}}</p>
<img src="{{$inmueble->imagen}}" alt="" srcset="">

</body>
</html>
