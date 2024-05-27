<!DOCTYPE html>
<html lang="en">
<head>

    @include('usuario/template_usuario/template_ruta')
    <title>Support Sync | Productos </title>

    <link rel="stylesheet" href="assets/css/Usuario/productos_estilo.css">

    
    <style>
        body {
            background-image: url('assets/img/img_7.PNG');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>

</head>
<body>
@include('usuario/template_usuario/template_menu_coordinador')

<div id="app">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
