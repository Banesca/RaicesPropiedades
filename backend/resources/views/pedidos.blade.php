<html>
<head>

    <style>
        @font-face {
            font-family: 'OpenSans-Light';
        }

        * {
            margin: 0;
            padding: 0;
        }
        @page{
            margin-top:150px!important;
        }
        @page:first {
            margin-top: 8cm!important;
        }
       
       
       

        
        :root {
            --main-lines-color: #80ced6; /*  color de las lineas  */
            --tabla-text-color: #e97604; /* color para las letras de la tabla*/
        }

        h2 {
            font-style: italic;
            text-align: center;
            color: #e97604;

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
            top: -150px;
            right: 0px;
            height: 100px;

        }

        header h1 {
            margin: 10px 0;
            color: #e97604;
        }

        .header h2 {
            margin: 0 0 10px 0;
            color: #e97604;
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
            padding-top: 7%;
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

        table tr:nth-child(2n-1) td {
            background: #d5f4e6;
        }

        th {
            /*  border-bottom: var(--main-lines-color) solid 2px; */
            text-align: center;
            height: 20px;
            background-color: #3498DB;
            color: white;
            /* border: 1px solid ; */
        }

        tr {
            border: 1px solid;
            border-radius: 7px;
        }

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
        .test{
            vertical-align:middle;
        }
        body{
            height:400px;
            margin-top:100px!important;
            margin-bottom:250px!important;
        }
    
    </style>

</head>

<body>

<header >
   <div class="header">
    <img src = "{!! public_path('img/pedidos/RESUMEN-PEDIDOS-HEADER.jpg') !!}" alt = "" width = "100%" height = "200px"> 

    </div>
<div class="footer">
<img src = "{!! public_path('img/pedidos/RESUMEN-PEDIDOS-FOOTER.jpg') !!}" alt = "" width = "100%" height = "200px">

</div> 
</header>

<!--  cabecera  img  -->
<div class = "col-md-12 header ">

<!--      <img src = "{!! public_path('img/pedidos/RESUMEN-PEDIDOS-HEADER.jpg') !!}" alt = "" width = "100%" height = "200px"> 
 -->
</div>

<div class = " test container-fluid">
  
<div class="text"></div>
    <!--  -----------  -->

    <!-- cuerpo  -->
    <div class = "cuerpo">

        <h2><strong style = "font-weight: bold;">RESUMEN DE COMPRA</strong></h2>

        <div class = "row justify-content-center fecha ">
            <div class = "col-md-12 ">
                <!--  Tabla datos pedido -->
                <table>

                    <tr>
                        <th scope = "col"><strong>FECHA</strong></th>
                        <th scope = "col"><strong>NUMERO PEDIDO</strong></th>
                        <th scope = "col"><strong>DOMICILIO ENTREGA</strong></th>
                        <th scope = "col"><strong>FECHA ENTREGA</strong></th>
                        <th scope = "col"><strong>PERSONA AUTORIZADA</strong></th>
                    </tr>

                    <tr>
                        <td>{!! @$pedido->fecha !!}</td>
                        <td>N° {!! @$pedido->Numero_Pedido !!} </td>
                        <td>{!! @$pedido->Domicilio_Entrega !!}</td>
                        <td>{!! @$pedido->fecha_retiro !!}</td>
                        <td>{!! @$pedido->personasAutorizadas !!}</td>
                        >
                    </tr>

                </table>
            </div>

        </div>

        <div class = "row justify-content-center fecha ">
            <!--  Tabla de productos pedidos -->
            <table>
                <tr>
                    <th scope = "col"><strong>PRODUCTO</strong></th>
                    <th scope = "col"><strong>DESCRIPCIÓN</strong></th>
                    <th scope = "col"><strong>CANTIDAD</strong></th>
                    <th scope = "col"><strong>PRECIO</strong></th>
                    <th scope = "col"><strong>TOTAL</strong></th>
                </tr>
                @php
                    $suma_total=0;
                @endphp

                @foreach($pedido->orderBody as $elementos)

                    <tr>
                        <td>{!! $elementos->producto->nombre !!} </td>
                        <td>{!! $elementos->producto->titulo !!} </td>
                        <td>{!! $elementos->Cantidad_Producto !!} </td>
                        <td>$ {!! number_format($elementos->PrecioUnitario_Producto,null,',','.')!!} </td>
                        <td>$ {!! number_format($elementos->Cantidad_Producto*$elementos->PrecioUnitario_Producto,null,',','.') !!}   </td>

                    </tr>
                    @php
                        $suma_total=$suma_total+$elementos->Cantidad_Producto*$elementos->PrecioUnitario_Producto;
                    @endphp

                @endforeach

            </table>

        </div>

        <div class = "total-cont">
            <h3>TOTAL: <strong>$ {!! number_format($suma_total,null,',','.')!!} </strong></h3>
        </div>
     
        
        
    </div>
    <!-- ---------  -->
    <!-- footer img -->
   
    <!-- ---------  -->
</div>
</body>
<!-- <footer class = "">
  

        <img src = "{!! public_path('img/pedidos/RESUMEN-PEDIDOS-FOOTER.jpg') !!}" alt = "" width = "100%" height = "200px">
    </footer> -->

</html>