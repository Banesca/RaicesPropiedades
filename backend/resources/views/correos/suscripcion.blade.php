<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gracias por Suscribirse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'OpenSans-Light';
            src: url({{asset('fonts/OpenSans-Light.ttf')}});
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "OpenSans-Light";
        }

        .cuerpo {
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
        }

        .cuerpo-descripcion {
            font-size: 22px;
        }
    </style>
</head>

<body class="cuerpo" style="background-image: url( {{asset('img/cuerpo-email/FONDO.png')}} )">
<div class="container-fluid">

    <div class="row">
        <div class="col-md-10">
            <div class="titulo">
                <h2 class="pb-5" style="color:#E97604; "> Hola! {{$sus->email}} Se ha suscrito correctamente.</h2>
            </div>
            <div class="cuerpo-descripcion">
                <h1 class="pb-5" style="color:#E97604; "> Si desea cancelar la suscripcion siga el siguiente link</h1>
                http://depocentral.dyndns.org:8753/api/v1/cancelarSuscripcionTocken/{{ $sus->tocken }}
            </div>
        </div>
    </div>
    {{-- <div class = "row">
        <div class = "col-md-12 cuerpo" style = "background-image: url({{ asset('img/cuerpo-email/HEADER.png') }}); height: 664px;">
            <h1>Hola Gracias por registrarte con nosotros</h1>
        </div>
    </div>


    <div class = "row justify-content-center" style = "padding-bottom: 2%">
        <div class = "col-md-10">
            <div class = "titulo">
                <h2 class = "pb-5" style = "color:#E97604; "> Sigue el link para activar la cuenta</h2>
            </div>
            <div class = "cuerpo-descripcion">
                http://depocentral.dyndns.org:8753/{{ $token }}
            </div>
        </div>
    </div>
     --}}

    <div class="row">
        <div class="col-md-12 cuerpo" style="background-image: url({{ asset('img/cuerpo-email/FOOTER.png') }}); height: 494px;">

        </div>
    </div>

</div>
</body>
</html>
