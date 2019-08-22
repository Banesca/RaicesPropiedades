<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title>Document</title>
</head>
<body>
<img src = "{{asset('img/prueba-mapa.jpg')}}" alt = "Prueba de mapa de imágenes" width = "300" height = "214" border = "0" usemap = "#billar">

<map name = "billar">

    <area alt = "Si clícas aquí irás a la página de inicio del tutorial de html" shape = "circle" coords = "148,154,44" href = "/curso-de-html/">

    <area alt = "Si clías aquí irás a la página de inicio del tutorial de css" shape = "poly" coords = "148,59,142,49,135,41,128,38,121,34,125,25,135,16,155,11,177,19,188,27,187,36,177,39,168,46,162,52,160,61" href = "/curso-de-css/">

    <area alt = "Si clías aquí irás a la portada" shape = "rect" coords = "11,77,288,105" href = "/">

</map>

</body>
</html>