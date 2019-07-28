<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{!! $sus->titulo !!}</title>
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
                <h2 class="pb-5" style="color:#E97604; "> Hola! {{$email}}</h2>
            </div>
            <div class="cuerpo-descripcion">
                <h1 class="pb-5" style="color:#E97604; ">{!! $sus->descripcion !!}</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 cuerpo" style="background-image: url({{ asset('img/cuerpo-email/FOOTER.png') }}); height: 494px;">

        </div>
    </div>

</div>
</body>
</html>
