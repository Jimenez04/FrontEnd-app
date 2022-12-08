<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="image_src" href="https://www.ucr.ac.cr/plantillas/ucr_4/imagenes/firma-ucr-ico.png">
    <link rel="icon" href="https://www.ucr.ac.cr/plantillas/ucr_4/imagenes/favicon.png" type="image/png">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.ucr.ac.cr/plantillas/ucr_4/imagenes/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <script type="text/javascript" src="{{ asset('js/checkbox.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/funciones.js') }}"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
    
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <!--CSS-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/olvidoclave.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nueva_clave.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ver_perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editar_perfil.css') }}">

    <link rel="stylesheet" href="{{ asset('css/paginaprincipalUsuarios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lista.css') }}">
    <link rel="stylesheet" href="{{ asset('css/solicitud_adecuacion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nueva_adecuacion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/necesidad_apoyo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/institucion_procedencia.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/beca.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grupo_familiar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/archivos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bitacora.css') }}">


    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <title>@yield('title')</title>
</head>

<body>
    @include('header')
    @yield('content')
    @include('footer')

</body>

</html>
