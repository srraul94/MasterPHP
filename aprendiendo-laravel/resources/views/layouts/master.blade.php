<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Titulo - @yield('titulo') </title>
</head>
<body>
    @section('header')
        <h1>
            Cabecera de la web (master)
        </h1>
    @show
    <hr>

    <div class="container">
        @yield('content')
    </div>

    <hr>
    @section('footer')
        <h4>
            Pie de pagina de la web (master)
        </h4>
    @show
    <hr>
</body>
</html>