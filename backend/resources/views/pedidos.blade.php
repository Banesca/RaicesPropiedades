<html>
<head>

    <style>
        @font-face {
            font-family: 'OpenSans-Light';
        }

        * {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica' !important;
        }

        @page {
            margin-top: 100px !important;

        }

        @page :first {
            margin-top: 5cm !important;
        }

        :root {
            --main-lines-color: #80ced6; /*  color de las lineas  */
            --tabla-text-color: #e97604; /* color para las letras de la tabla*/
        }

        h1 {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
        }

        h2 {
            font-weight: bold;
            font-size: 20px;
        }

        body {
            font-family: "OpenSans-Light";
            font-size: 12px;
        }

        strong {
            font-weight: 1000;
        }

        header {
            position: fixed;
            left: 0px;
            top: -100px;
            right: 0px;
            height: 100px;

        }

        header h1 {
            margin: 10px 0;
            color: #e97604;
        }

        .header h2 {
            margin: 0 0 10px 0;
            /*color: #e97604;*/
        }

        .footer {
            position: fixed;
            left: 0px;
            bottom: 200px;
            right: 0px;
            height: 0px;
            margin-top: 15%;
            /*margin: 0;*/
            /*  border-bottom: 2px solid #ddd; */
        }

        /*   footer .page:after {
              content: counter(page);



          } */

        .footer table {
            width: 100%;
        }

        .footer p {
            text-align: right;
            color: #e97604;
        }

        .footer .izq {
            text-align: left;
        }

        .cuerpo {
            padding-top: 1%;
            padding-left: 10%;
            padding-right: 10%;

            /*margin-bottom: 5%;*/
        }

        .recibo {
            padding-bottom: 30px;
            color: #55ACEE;

        }

        .comprador {
            padding-bottom: 10px;
            padding-top: 10px;
            /*             border-bottom: var(--main-lines-color) solid 2px;
             */
        }

        .fecha {
            padding: 10px 0px;
        }

        .total {
            padding-top: 20px;
            padding-bottom: 50px;
        }

        table {
            width: 100%;
            /*             border-top: var(--main-lines-color) solid 2px;
             */
        }

        /*table tr:nth-child(2n-1) td {
            background: #d5f4e6;
        }*/

        th {
            /*  border-bottom: var(--main-lines-color) solid 2px; */
            text-align: center;
            font-size: 17px;
            /*background-color: #3498DB;*/
            color: #636363;
            text-align: justify;
            /* border: 1px solid ; */
        }

        /*tr {
            border: 1px solid;
            border-radius: 7px;
        }*/

        td {
            text-align: center;
            height: 50px;
            max-width: 100px;

        }

        .total-cont {
            height: 30px;
            background-color: #3498DB;
            color: white !important;
            text-align: right !important;
            border: 1px solid;
            border-radius: 3px;
        }

        .total-cont strong {
            font-size: 20px;
        }

        .total-cont h3 {
            margin-right: 15px;
        }

        .logo {
            left: 80px;
            top: 400px;
            right: 0px;
            height: 50px;
            margin-left: 80px;
        }

        .test {
            vertical-align: middle;
        }

        body {
            height: 400px;
            margin-top: 60px !important;
            margin-bottom: 250px !important;
        }

    </style>

</head>

<body>

<header>
    <div class = "header">
        <img src = "{!! public_path('img/pedidos/RESUMEN-PEDIDOS-HEADER.jpg') !!}" alt = "" width = "100%" height = "200px">

    </div>
    <div class = "footer">
        <img src = "{!! public_path('img/pedidos/RESUMEN-PEDIDOS-FOOTER.jpg') !!}" alt = "" width = "100%" height = "200px">
    </div>
</header>

<div class = " test container-fluid">

    <div class = "text"></div>
    <!--  -----------  -->

    <!-- cuerpo  -->
    <div class = "cuerpo">
        <br>
        <br> <br>
        <br> <br>
        <br> <br>
        <h1><strong style = "font-weight: bold;">{{strtoupper($ficha->titulo)}}</strong></h1>
        <h1 style = "font-size: 20px"><strong style = "font-weight: bold;">{{strtoupper($ficha->ubicacion)}}</strong>
        </h1>
        <br>
        <br>
        <div class = "row justify-content-center fecha ">
            <div class = "col-md-12">
                <h2>Ubicación:</h2>
                <br>
                <table>
                    <tr>
                        <th>{{$ficha->ubicacion}}</th>
                    </tr>
                </table>
                <br>
                <br>
                <h2>Características:</h2>
                <br>
                <table>
                    <tr>
                        <th>{{$ficha->caracteristica}}<</th>
                    </tr>
                </table>
                <br>
                <br>
                <h2>Valor:</h2>
                <br>
                <table>
                    <tr>
                        <th>${{$ficha->valor}}</th>
                    </tr>
                </table>
                <br>
                <br>
                <h2>Comisión Imobiliaria:</h2>
                <br>
                <table>
                    <tr>
                        <th>{{$ficha->comision}}</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    {{--SALTO DE PAGINA --}}
    <div style = "page-break-after:always;"></div>
    {{--SALTO DE PAGINA --}}
    <br>
    <br>
    <br>
    <br>
    {{-- SECCION DE LAS IMAGENES--}}
    <div class = "cuerpo">
        <div class = "row justify-content-center ">
            <!--  Tabla de imagenes-->
            <table cellspacing = 15>
                <tr>
                    <td>
                        <img src = "{!! !is_null($ficha->img1fa) ? public_path('storage/fichaPropiedad/'.$ficha->img1fa) : null !!}" alt = "" width = "500px" height = "250px">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src = "{!! !is_null($ficha->img2pr) ? public_path('storage/fichaPropiedad/'.$ficha->img2pr) : null !!}" alt = "" width = "500px" height = "250px">
                    </td>
                </tr>
            </table>
        </div>
    </div>
    {{--SALTO DE PAGINA --}}
    <div style = "page-break-after:always;"></div>
    {{--SALTO DE PAGINA --}}
    <br>
    <br>
    <br>
    <br>
    {{-- SECCION DE LAS IMAGENES--}}
    <div class = "cuerpo">
        <div class = "row justify-content-center ">
            <!--  Tabla de imagenes-->
            <table cellspacing = 15>
                <tr>
                    <td>
                        <img src = "{!! !is_null($ficha->img3pl) ? public_path('storage/fichaPropiedad/'.$ficha->img3pl) : null !!}" alt = "" width = "500px" height = "250px">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src = "{!! !is_null($ficha->img3pl) ? public_path('storage/fichaPropiedad/'.$ficha->img3pl) : null !!}" alt = "" width = "500px" height = "250px">
                    </td>
                </tr>
            </table>

        </div>
    </div>
    {{--SALTO DE PAGINA --}}
    <div style = "page-break-after:always;"></div>
    {{--SALTO DE PAGINA --}}
    <br>
    <br>
    <br>
    <br>
    <br>
    {{-- SECCION DE LAS IMAGENES--}}
    <div class = "cuerpo">
        <div class = "row justify-content-center ">
            <!--  Tabla de imagenes-->
            <table cellspacing = 15>

                <tr>
                    <td>
                        <img src = "{!! !is_null($ficha->img5sa) ? public_path('storage/fichaPropiedad/'.$ficha->img5sa) : null !!}" alt = "" width = "500px" height = "250px">
                    </td>

                </tr>
                <tr>
                    <td>
                        <img src = "{!! !is_null($ficha->img6sa) ? public_path('storage/fichaPropiedad/'.$ficha->img6sa) : null !!}" alt = "" width = "500px" height = "250px">
                    </td>
                </tr>

            </table>

        </div>
    </div>

</div>
<!-- ---------  -->
<!-- footer img -->

<!-- ---------  -->
</body>
<!-- <footer class = "">
  

        <img src = "{!! public_path('img/pedidos/RESUMEN-PEDIDOS-FOOTER.jpg') !!}" alt = "" width = "100%" height = "300px">
    </footer> -->

</html>