<!DOCTYPE html>
<html lang="en">
<head>

    @include('usuario/template_usuario/template_ruta')
    <title>Support Sync | Panel de Usuario </title>

    <link rel="stylesheet" href="assets/css/Usuario/panel_estilo.css">
    
    <style>
        body {
            background-image: url('assets/img/img_7.PNG');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>

</head>

<img src="assets/img/scotia.png" class="marca_agua" alt="Marca de agua">


@include('usuario/template_usuario/template_menu_coordinador')

    <section class="box_contenedor_general">
        <div class="mensaje_bienvenida">
            <h2>Bienvenido a SupportSync {{ Auth::user()->name }}</h2>
         
        </div>
    </section>

</body>
</html>
