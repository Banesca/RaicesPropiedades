<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Bienvenida</title>
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin = "anonymous">

    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    td {
        text-align: center;
    }
    @media screen and (max-width: 600px) {
        table {
            width:100%;
        }
        thead {
            display: none;
        }
        tr:nth-of-type(2n) {
            background-color: inherit;
        }
        tr td:first-child {
            background: #f0f0f0;
            font-weight:bold;
            font-size:1.3em;
        }
        tbody td {
            display: block;
            text-align:center;
        }
        tbody td:before {
            content: attr(data-th);
            display: block;
            text-align:center;
        }
    }

</style>

<body class = "cuerpo" style = "background-image: url( {{asset('img/cuerpo-email/FONDO.png')}} )">

<table style = "max-width: 1000px; padding: 10px; margin:0 auto; border-collapse: collapse;">

    <tr>
        <td colspan = "4">

            <h1 style = "text-align: center">Te damos la Bienvenida!</h1>

            @if($PerAccUserAprobAdmin!=1)
                <p style = "font-size: 18px;text-align: center;">
                    Por favor, dar click en el siguiente link para activar la cuenta
                    <a href = "http://depocentral.dyndns.org:8753/api/v1/activarCuenta/{!! $token!!}">Aquí</a>
                </p>

                <p style = "font-size: 16px;text-align: center;">
                    Si deseas cancelar la suscripción a nuestro Newsletter, puedes hacer click <br>
                <div style = "width: 100%; text-align: center">
                    <a style = "text-decoration: none; text-align: center; border-radius: 5px; padding: 11px 10px; color: white; background-color: #3498db" href = "http://depocentral.dyndns.org:8753/formCancelarSuscripcion/{!! $tockenCancelarSuscripcion !!}">Cancelar Suscripción</a>
                </div>


                <br> Recuerda que dejaras de recibir promociones y novedades.</p>
            @elseif($PerAccUserAprobAdmin!=0)

                <p style = "font-size: 18px;text-align: center;">
                    Gracias por registrarte. La cuenta será activada por nuestro equipo en un plazo aproximado de 24 hs. Recibiras un mail con el acceso muy pronto
                </p>

            @endif
        </td>
    </tr>


    <br>
    <br>
    <br>

    <tr style="text-align: center">
        <td>
            <a href = "{!! $redes->url_face !!}"><img src = "{!! $message->embed(public_path('img/redes/face.png'))!!}" alt = "" width = "50px" height = "50px"></a>
        </td>
        <td>
            <a href = "{!! $redes->url_twit !!}"><img src = "{!! $message->embed(public_path('img/redes/twitter.png'))!!}" alt = "" width = "50px" height = "50px"></a>
        </td>
        <td>
            <a href = "{!! $redes->url_inst !!}"><img src = "{!! $message->embed(public_path('img\\redes\\instagram.png'))!!}" alt = "" width = "50px" height = "50px"></a>
        </td>
        <td>
            <a href = "{!! $redes->url_what !!}"><img src = "{!! $message->embed(public_path('img\\redes\\wha.png'))!!}" alt = "" width = "50px" height = "50px"></a>

        </td>
    </tr>

</table>
<div class = " cuerpo" style = "background-image: url({{ asset('img/cuerpo-email/FOOTER.png') }}); height: 494px;"></div>
</body>

</html>
