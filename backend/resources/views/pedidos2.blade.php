<html>
<head>

    <style>

        * {
            margin: 0;
            padding: 0;
        }

        :root {
            --main-lines-color: #80ced6; /*  color de las lineas  */
            --tabla-text-color: #66757F; /* color para las letras de la tabla*/
        }

        body {
            font-size: 15px;
        }

        .cabecera {
            height: 15vh;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
            /*background-image: url("
        {!! public_path('img/pedidos/RESUMEN-PEDIDOS-HEADER.jpg')!!} ");*/

        }

        .footer {
            width: 100%;
            position: relative;
            padding-top: 15%;
            bottom: 0;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
            /*background-image: url("
        {!! public_path('img/pedidos/RESUMEN-PEDIDOS-FOOTER.jpg') !!} ");*/
        }

        .cuerpo {
            padding-top: 7%;
            padding-left: 10%;
            padding-right: 10%;
        }

        .recibo {
            padding-bottom: 30px;
            color: #55ACEE;

        }

        .comprador {
            padding-bottom: 10px;
            padding-top: 10px;
            border-bottom: var(--main-lines-color) solid 2px;
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
            border-top: var(--main-lines-color) solid 2px;
        }

        table tr:nth-child(2n-1) td {
            background: #d5f4e6;
        }

        th {
            border-bottom: var(--main-lines-color) solid 2px;
            text-align: center;
            height: 40px;
        }

        td {
            text-align: center;
            height: 50px;
            max-width: 100px;

        }

    </style>
</head>

<body>

<!--  cabecera  img  -->
<div class = "col-md-12 cabecera " >
    <img src = "{!! public_path('img\\pedidos\\RESUMEN-PEDIDOS-HEADER.jpg')!!}" alt=""  width = "100%" height = "115px" >
</div>
<div class = "container-fluid">
    <!--  -----------  -->

    <!-- cuerpo  -->
    <div class="cuerpo">
    <div class = "row justify-content-center " style=" " >
        <div class = "col-md-12 " >
            <div  class="" >
                    <h3 class="recibo"><strong> RECIBO N° {!! $pedido->Numero_Pedido !!}</strong></h3>
                </div>
            </div>
        </div>
    <div class = "row justify-content-center  comprador" >
        <div class = "col-sm-6 " >
                <div>
                    Nombre del Comprador:
                    <br>
                    <strong>{!! @$pedido->user->name !!}</strong>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div >
                    ID:
                    <br>
                    <strong>1231</strong>
                </div>
            </div>
        </div>
    <div class = "row justify-content-center fecha " >
        <div class = "col-md-12 " >
                <div>
                    Fecha:
                    <br>
                    <strong>fecha</strong>
                </div>
            </div>

        </div>
        <!--  Tabla de pedidos -->
    <div class = "row justify-content-center fecha "  >
            <table>
                <tr>
                    <th scope="col"><strong>PRODUCTO</strong></th>
                    <th scope="col"><strong>DESCRIPCION</strong></th>
                    <th scope="col"><strong>CANTIDAD</strong></th>
                    <th scope="col"><strong>PRECIO</strong></th>
                    <th scope="col"><strong>TOTAL</strong></th>
                </tr>
                @php
                    $suma_total=0;
                @endphp

                @foreach($pedido->orderBody as $elementos)
                    <tr>
                        <td>{!! $elementos->producto->nombre !!}</td>
                        <td>{!! $elementos->producto->titulo !!}</td>
                        <td>{!! $elementos->Cantidad_Producto !!}</td>
                        <td>$ {!! $elementos->PrecioUnitario_Producto !!}</td>
                        <td>$ {!! $p=($elementos->Cantidad_Producto*$elementos->PrecioUnitario_Producto) !!}</td>
                        @php
                            $suma_total+=$p;
                        @endphp
                    </tr>

                @endforeach

            </table>

        </div>

    <div class="row justify-content-end total">
            <h3>TOTAL: <strong>{!! $suma_total !!}</strong></h3>
        </div>


    </div>

</div>
<!-- ---------  -->
<!-- footer img -->
<div class = "row ">
    <div class = "col-md-12  footer " >
        <img src = "{!! public_path('img\\pedidos\\RESUMEN-PEDIDOS-FOOTER.jpg')!!}" alt=""  width = "100%" height = "115px" >
    </div>
</div>
<!-- ---------  -->

</body>
</html>