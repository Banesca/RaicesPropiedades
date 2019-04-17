<!doctype html>
<html lang = "es">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Reclamo y/o Sugerencia</title>
</head>
<body>
    <p>Su reclamo y/o sugerencia cambio de estatus con éxito a Status: <h1>{{ $r->status->descripcion }}</h1></p>

    <p>Número de ticket: {{ $r->numero_ticket }}

    <p>Título de reclamo / Sugerencia: {{ $r->titulo }}</p>

    <p> Descripción: {{ $r->descripcion }}</p>

</body>
</html>