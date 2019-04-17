<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title>Cancelar Suscripción</title>
    <style>

        .box {

            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 30%;
            height: 30%;
            margin: auto;
            padding-right: 15%;
            padding-top: 15%

        }

        .contenedor {
            width: 100%;
            position: relative;
        }

        .formulario {
            -webkit-box-shadow: 1px 4px 7px 2px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 1px 4px 7px 2px rgba(0, 0, 0, 0.75);
            box-shadow: 1px 4px 7px 2px rgba(0, 0, 0, 0.75);
            width: 100%;
            padding: 50px;
            margin: 30px;
        }

        p {
            text-align: center;
            font: bold;
            font-size: 24px;
            color: #e97504;
        }

        select {
            border: 1px solid #e97504;
            height: 30px;
            border-radius: 5%;
        }

        textarea {
            border: 1px solid #e97504;
            width: 100%;
            height: 60%;
            border-radius: 5%;
        }

        .sugerencias {
            text-align: center;
            width: 100%;
        }

        input {
            width: 100%;
            height: 50%;
        }

        .opciones {
            width: 100%;
        }

        button {
            height: 50px;
            width: 130px;
            padding: 10px;
            border: border: 1px solid #e97504;
            background-color: #e97504;
            border-radius: 5%;
            color: white;
            font-size: 20px;
            margin-top: 20px;
        }

        select:focus {
            border: border: 2px solid #e97504;
        }
    </style>

    <link rel = "stylesheet" type = "text/css" href = "{!! asset('js/sweealert/sweetalert2.css') !!}">
</head>
<body>
<div class = "contenedor">
    <div id="contUI" class = "text-center box">
        {!! Form::open(['class'=>['text-center formulario'],'id'=>'idForm']) !!}

        <p>
            ¿Porque desea dejar de recibir correos?:
        </p>
        <div class = "opciones">
            <select name = "motivoDeCancelacion" class = "opciones" required>
                <option value = "No me interesa">No me interesa</option>
                <option value = "Recibo demaciados mails">Recibo demaciados mails</option>
                <option value = "Otros">Otros</option>
            </select>
        </div>

        <br>
        <p>Sugerencias</p>
        <div class = "sugerencias">
            <textarea name = "sugerencia" rows = "10" cols = "30" required></textarea>
            <div class = "sugerencias">
                <button id="bcancelar" type = "button" onClick = "cancelar('{!!  $tocken !!}')">Enviar</button>
            </div>

        </div>
        {!! Form::close() !!}
    </div>
</div>
<script type = "text/javascript" src = "{!!   asset('js/jQuery/jQuery-2.1.4.min.js') !!}"></script>
<script type = "text/javascript" src = "{!!  asset('js/sweealert/promise.min.js') !!}"></script>
<script type = "text/javascript" src = "{!! asset('js/sweealert/sweetalert2.js') !!}"></script>
<script>
    var ruta = "{!!  url('/') !!}";
</script>
<script type = "text/javascript" src = "{!!  asset('js/cancelarSuscripcion.js') !!}"></script>
</body>

</html>