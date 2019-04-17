<!doctype html>
<html lang = "es">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Reclamo y/o Sugerencia</title>
</head>
<body>
    <p>Buen Día! Su reclamo y/o sugerencia fue enviada con éxito, Nos comunicaremos con usted en la brevedad posible</p>

    <p>Número de ticket: {{ $reclamoSugerencia->numero_ticket }}

    <p>Título de reclamo/Sugerencia: {{ $reclamoSugerencia->titulo }}</p>

    <p> Descripción: {{ $reclamoSugerencia->descripcion }}</p>

</body>
</html>