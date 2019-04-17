<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Producto reservado </title>
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin = "anonymous">

    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    td {
        text-align: center;
    }
</style>

<body class = "cuerpo" style = "background-image: url( {{asset('img/cuerpo-email/FONDO.png')}} )">

<table style = "max-width: 1000px; padding: 10px; margin:0 auto; border-collapse: collapse;">

    <tr>
        <td colspan = "4">

            <h1 style = "text-align: center">CUANDO TENGAMOS EL PRODUCTO EN STOCK, TE AVISAREMOS PARA QUE PUEDAS REALIZAR LA COMPRA</h1>

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
            <a href = "{!! $redes->url_inst !!}"><img src = "{!! $message->embed(public_path('img/redes/instagram.png'))!!}" alt = "" width = "70px" height = "70px"></a>
        </td>
        <td>
            <a href = "{!! $redes->url_what !!}"><img src = "{!! $message->embed(public_path('img/redes/wha.png'))!!}" alt = "" width = "60px" height = "60px"></a>
        </td>
    </tr>

</table>
<div class = " cuerpo" style = "background-image: url({{ asset('img/cuerpo-email/FOOTER.png') }}); height: 494px;"></div>
</body>

</html>