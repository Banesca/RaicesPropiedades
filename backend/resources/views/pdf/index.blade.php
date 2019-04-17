
<html>

<head>
    <style>
      
        body{
            font-family: sans-serif;
        }
        @page {
            margin: 160px 50px;
        }
        header { position: fixed;
            left: 0px;
            top: -160px;
            right: 0px;
            height: 100px;

        }
        header img{
            margin-left: 13%;
         
      
        }
        footer img{
            margin-left: 13%;
         
      
        }
        h3{
            
            
            text-align:center;
            color: #e97604;
        }
        header h2{
            margin: 0 0 10px 0;
            color: #e97604;
        }
        footer {
            position: fixed;
            left: 0px;
            bottom: -105px;
            right: 0px;
            height: 40px;
          /*   border-bottom: 2px solid #ddd; */
        }
       /*  footer .page:after {
            content: counter(page);
        } */
    /*     footer table {
            width: 100%;
        } */
        footer p {
            text-align: right;
            color: #e97604;
        }
        footer .izq {
            text-align: left;
        }
        .img-cupon{
            margin-top: 30px;
            margin-bottom: 30px;
            display:block;
            margin:auto!important;
            padding-top: 30px;
            text-align: center;
            max-width: 500px;
            max-height:196px;
        }
        .descripcion{
            text-align: center;
            color: #e97604;
            font-style: italic;
            margin-right:13%;
            margin-left:13%;
            
        }
        #content{
            color: #e97604;
            font-style: italic;
            margin-right:20px;
            margin-left:20px;
        }
        .footer-img{
            height:482px;
            width:2551px;
        }
        button{
            background-color: #e97604;
            color:white;
            font-style: italic;
            border:1px solid #e97604;
            border-radius:10px;
            text-align: center;
            width:46%;
            margin-left:26%;
            padding:10px;
        }
        .text{
            margin-left:13%;
        }
     
    </style>
<body>

<header>
    <img src = "{!! public_path('img/pdfCupones/HEADER.jpg')!!}" alt="" width = "74%" height = "115px">
</header>

<footer>


    <img src = "{!! public_path('img/pdfCupones/FOOTER.jpg')!!}" alt=""  width = "74%" height = "95px" >

</footer>
<div id="content">
    <p class="mainText">
    <h3> <span style="font-weight: light;">CUPÓN</span><span style="font-weight: bold;"> DE COMPRA</span> </h3>
    </p>
    
    <p class="text">
        
       <span style="font-weight: bold;">Código del Cupón:</span>  {!! $coupons['codeCoupns'] !!}
    </p>
    <p class="text">
    <span style="font-weight: bold;">Fecha Compra:</span>  {!! $created_at  !!}  <!-- Colocar Fecha de Compra, es la fecha en la que se adquirio el cupon -->
    </p>
    <p class="text">
    <span style="font-weight: bold;">Nombre del Cliente:</span>  {!! $user['name'] !!} - {!! $user['userName']!!}<!-- Colocar del cliente que la posee el cupon -->
    </p>
 
    <div class="img-cupon">

        <img src="{!! public_path('storage/coupons/'.$coupons['imagen'])!!}" width = "100%" height = "100%"  alt="" >

    </div>
    <p class="descripcion">
       {!! $coupons['description'] !!}
    </p>
    <p class="descripcion">
       <span style="font-weight: bold;">Válido hasta</span> {!! $coupons['dateExpired']!!}
    </p>


</div>
</body>

</html>