<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Recibimos tu propiedad</title>
    <style>
        /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */

        /*All the styling goes here*/

        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
        }

        body {
            background-color: rgb(163, 111, 23);
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%;
        }

        table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top;
        }

        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */

        .body {
            background-color: rgb(163, 111, 23);
            width: 100%;
        }

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 80%;
            padding: 10px;
            width: 80%;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            /* max-width: 580px; */
            max-width: 100%;
            padding: 10px;
        }

        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .main {
            background: #ffffff;
            width: 100%;
        }

        .wrapper {
            box-sizing: border-box;
            padding: 20px 60px;
        }

        .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .header,
        .footer {
            display: block;
            display: block;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
            max-width: 100%;
        }

        .wrapper-footer {
            position: relative;
        }

        .wrapper-footer-social {
            position: absolute;
            top: 50%;
            left: 5%;
        }

        .wrapper-footer .item-a,
        .wrapper-footer .item-b,
        .wrapper-footer .item-c,
        .wrapper-footer .item-d {
            height: 48px;
            max-height: 48px;
            padding-right: 20px;
        }

        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
            word-break: break-word;
            overflow-wrap: break-word;
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            text-transform: capitalize;
        }

        h2 {
            font-weight: 600;
            font-size: 26px;
            text-align: left;
            text-transform: capitalize;
        }

        h5 {
            font-size: 22px;
            color: rgb(94, 64, 65);
        }

        p,
        ul,
        ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px;
            word-break: break-word;
            overflow-wrap: break-word;
        }

        p li,
        ul li,
        ol li {
            list-style-position: inside;
            margin-left: 5px;
        }

        p {
            color: rgb(101, 101, 101);
        }

        a {
            text-decoration: none;
        }

        /* -------------------------------------
            BUTTONS
        ------------------------------------- */
        .btn {
            box-sizing: border-box;
            width: 100%;
        }

        .btn > tbody > tr > td {
            padding-bottom: 15px;
        }

        .btn table {
            width: auto;
        }

        .btn table td {
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center;
        }

        .btn a {
            background-color: #ffffff;
            border: solid 1px #3498db;
            border-radius: 5px;
            box-sizing: border-box;
            color: #3498db;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            margin: 0;
            padding: 12px 25px;
            text-decoration: none;
            text-transform: capitalize;
        }

        .btn-primary table td {
            background-color: #3498db;
        }

        .btn-primary a {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff;
        }

        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .align-center {
            text-align: center;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .clear {
            clear: both;
        }

        .mt0 {
            margin-top: 0;
        }

        .mb0 {
            margin-bottom: 0;
        }

        .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0;
        }

        .powered-by a {
            text-decoration: none;
        }

        .title h3 {
            color: #a6a285;
            font-weight: bold;
        }

        ul {
            list-style: none;
        }

        ul li:before {
            content: '✓';
            color: #a36f17;
            font-weight: bold;
            font-size: 18px;
            margin-right: 10px;

        }

        hr {
            border: 0;
            border-top: 3px solid #a6a285;
            margin-bottom: 20px;
        }

        /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 1250px) {
            .wrapper-footer-social {
                top: 50%;
                transform: translateY(0);
            }
        }

        @media only screen and (max-width: 998px) {
            .wrapper-footer-social {
                top: 50%;
                transform: translateY(-50%);
            }
        }

        @media only screen and (max-width: 768px) {
            .wrapper-footer-social {
                top: 50%;
                transform: translateY(-50%);
                left: 5%;
            }

            .wrapper-footer .item-a,
            .wrapper-footer .item-b,
            .wrapper-footer .item-c,
            .wrapper-footer .item-d {
                height: 32px;
                max-height: 32px;
            }

            table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }

            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
                font-size: 16px !important;
            }

            table[class=body] .wrapper,
            table[class=body] .article {
                padding: 10px !important;
            }

            table[class=body] .content {
                padding: 0 !important;
            }

            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
            }

            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }

            table[class=body] .btn table {
                width: 100% !important;
            }

            table[class=body] .btn a {
                width: 100% !important;
            }

            table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .wrapper-footer-social {
                top: 50%;
                transform: translateY(-50%);
                left: 2.5%;
            }

            .wrapper {
                padding: 20px 5px;
            }

            .wrapper-footer .item-a,
            .wrapper-footer .item-b,
            .wrapper-footer .item-c,
            .wrapper-footer .item-d {
                height: 32px;
                max-height: 32px;
            }
        }

        @media only screen and (max-width: 320px) {
            .wrapper-footer-social {
                top: 50%;
            }

            .wrapper {
                padding: 20px 10px;
            }

            .wrapper-footer .item-a,
            .wrapper-footer .item-b,
            .wrapper-footer .item-c,
            .wrapper-footer .item-d {
                height: 32px;
                max-height: 32px;
                padding-right: 5px;
            }
        }

        /* -------------------------------------
            PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
            }

            .btn-primary table td:hover {
                background-color: #34495e !important;
            }

            .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important;
            }
        }
    </style>
</head>

<body class="">
<span class="preheader">Recibimos tu propiedad</span>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
        <td class="container">
            <div class="content">

                <!-- START HEADER IMAGE CONTAINER -->
                <img class="header" src="{{ asset('img/raices/header.jpg') }}" alt="">
                <!-- START HEADER IMAGE CONTAINER -->

                <!-- START CENTERED WHITE CONTAINER -->
                <table role="presentation" class="main">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper">
                            <h1>Recibimos tu propiedad</h1>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <p>
                                        <strong>Nombre: </strong>{!! $contacto->nombre !!}
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <strong>Email: </strong>{!! $contacto->email !!}
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <strong>Teléfono: </strong>{!! $contacto->telefono !!}
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <strong>Mensaje: </strong>{!! $contacto->mensaje !!}
                                    </p>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- END CENTERED WHITE CONTAINER -->

                <!-- START CENTERED WHITE DATA PROPIEDAD -->
                <table role="presentation" class="main">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper">
                            <h2 style=" font-size: 15px;
                                        font-weight: 600;
                                        text-align: center;
                                        text-transform: capitalize;">
                                DATOS DE LA PROPIEDAD </h2>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="title">
                                        <h3>Ambientes</h3>
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <?php
                                $r = 0;
                                ?>
                                @foreach(json_decode(json_encode($contacto->propiedad), true) as $key=>$item)

                                    @if($key!='idPropiedad'
                                      && $key!='fk_idTipoPropiedad'
                                      && $key!='fk_Direccion_Barrio_Id'
                                      && $key!='fk_Direccion_Calle_Id'
                                      && $key!='fk_Direccion_Ciudad_Id'
                                      && $key!='fk_Direccion_Localidad_Id'
                                      && $key!='fk_Direccion_Pais_Id'
                                      && $key!='fk_Direccion_Partido_Id'
                                      && $key!='fk_Direccion_Provincia_Id'
                                      && $key!='fk_Direccion_SubBarrio_Id'
                                      && $key!='fk_Direccion_Region_Id'
                                      && $key!='fk_Disposicion'
                                      && $key!='fk_Estado'
                                      && $key!='fk_Orientacion'
                                      && $key!='fk_TipoAcceso'
                                      && $key!='fk_TipoAscensor'
                                      && $key!='fk_TipoBalcon'
                                      && $key!='fk_TipoBano'
                                      && $key!='fk_TipoCalefaccion'
                                      && $key!='fk_TipoCampo'
                                      && $key!='fk_TipoCobertura'
                                      && $key!='fk_TipoCoche'
                                      && $key!='fk_TipoCochera'
                                      && $key!='fk_TipoCosta'
                                      && $key!='fk_TipoEdificio'
                                      && $key!='fk_TipoExpensas'
                                      && $key!='fk_TipoFondoComercio'
                                      && $key!='fk_TipoFrente'
                                      && $key!='fk_TipoHotel'
                                      && $key!='fk_TipoLocal'
                                      && $key!='fk_TipoPendiente'
                                      && $key!='fk_TipoPiso'
                                      && $key!='fk_TipoPorton'
                                      && $key!='fk_TipoTecho'
                                      && $key!='fk_TipoTechoIndustrial'
                                      && $key!='fk_TipoTerreno'
                                      && $key!='fk_TipoUnidadCasa'
                                      && $key!='fk_TipoUnidadDepartamento'
                                      && $key!='fk_TipoVista'
                                      && $key!='fk_ficha2'
                                      && $key!='fk_estado_publicacion'
                                      && $key!='fk_idTipoOperaion'
                                      && $key!='fk_idMonedas'
                                      && $key!=''
                                      && $item!='')
                                        @if($r==0)
                                            <tr>
                                                @endif
                                                @if(!is_null($key) && $key!='' && !is_null($item) && $item!='' && $item!='0')
                                                    <td width="40%" align="left"
                                                        style="display:flex;font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                        <img class="img-fluid mt-3"
                                                             style="width: 25px;height: 25px;margin-right: 10px;"
                                                             src="{{asset('img/raices/Recurso_22.svg')}}"/>
                                                        <p>
                                                            <strong>

                                                                @switch($key)
                                                                @case('Agricultura') Agricultura
                                                                @break

                                                                @case('Ambientes_Altillo') Altillo
                                                                @break

                                                                @case('Ambientes_AnteCocina') Antecocina
                                                                @break

                                                                @case('Ambientes_Antesala') Antesala
                                                                @break

                                                                @case('Ambientes_Archivo') Archivo
                                                                @break

                                                                @case('Ambientes_Azotea') Azotea
                                                                @break

                                                                @case('Ambientes_Balcon') Balcón
                                                                @break

                                                                @case('Ambientes_Bano') Baño
                                                                @break

                                                                @case('Ambientes_Bar') Bar
                                                                @break

                                                                @case('Ambientes_Baulera') Baulera
                                                                @break

                                                                @case('Ambientes_Biblioteca') Biblioteca
                                                                @break

                                                                @case('Ambientes_Bodega') Bodega
                                                                @break

                                                                @case('Ambientes_Circulacion') Circulacion
                                                                @break

                                                                @case('Ambientes_Cochera') Cochera
                                                                @break

                                                                @case('Ambientes_Cocina') Cocina
                                                                @break

                                                                @case('Ambientes_CocinaComedor') Cocina Comedor
                                                                @break

                                                                @case('Ambientes_CocinaKitchinette') Cocina Kitchinette
                                                                @break

                                                                @case('Ambientes_Comedor') Comedor
                                                                @break

                                                                @case('Ambientes_ComedorDiario') Comedor Diario
                                                                @break

                                                                @case('Ambientes_CuartoDeHerramientas') Cuarto De
                                                                Herramientas
                                                                @break

                                                                @case('Ambientes_CuartoDePlanchar') Cuarto De Planchar
                                                                @break

                                                                @case('Ambientes_Dependencia') Dependencia
                                                                @break

                                                                @case('Ambientes_Deposito') Deposito
                                                                @break

                                                                @case('Ambientes_DependenciaDeServicio') Dependencia De
                                                                Servicio
                                                                @break

                                                                @case('Ambientes_Dormitorio') Dormitorio
                                                                @break

                                                                @case('Ambientes_Entrepiso') Entrepiso
                                                                @break

                                                                @case('Ambientes_Escritorio') Escritorio
                                                                @break

                                                                @case('Ambientes_Estudio') Estudio
                                                                @break

                                                                @case('Ambientes_FamilyRoom') Family Room
                                                                @break

                                                                @case('Ambientes_Galeria') Galería
                                                                @break

                                                                @case('Ambientes_Galpon') Galpón
                                                                @break

                                                                @case('Ambientes_Garage') Garage
                                                                @break

                                                                @case('Ambientes_Hall') Hall
                                                                @break

                                                                @case('Ambientes_Jardin') Jardín
                                                                @break

                                                                @case('Ambientes_Lavadero') Lavadero
                                                                @break

                                                                @case('Ambientes_Living') Living
                                                                @break

                                                                @case('Ambientes_LivingComedor') Living Comedor
                                                                @break

                                                                @case('Ambientes_Local') Local
                                                                @break

                                                                @case('Ambientes_Oficina') Oficina
                                                                @break

                                                                @case('Ambientes_Palier') Palier
                                                                @break

                                                                @case('Ambientes_Patio') Patio
                                                                @break

                                                                @case('piso_Radiante_Individual') Piso Radiante
                                                                Individual
                                                                @break

                                                                @case('piso_Radiante_Central') Piso Radiante Central
                                                                @break

                                                                @case('hidromasaje') Hidromasaje
                                                                @break

                                                                @case('Instalaciones_Radiadores') Radiadores
                                                                @break

                                                                @case('calefon') Calefón
                                                                @break

                                                                @case('Ambientes_Playroom') Playroom
                                                                @break

                                                                @case('Ambientes_Recepcion') Recepción
                                                                @break

                                                                @case('Ambientes_Quincho') Quincho
                                                                @break

                                                                @case('Ambientes_Sala') Sala
                                                                @break

                                                                @case('Ambientes_Sotano') Sótano
                                                                @break

                                                                @case('Ambientes_Suite') Suite
                                                                @break

                                                                @case('Ambientes_Terraza') Terraza
                                                                @break

                                                                @case('Ambientes_Toilette') Toilette
                                                                @break

                                                                @case('Ambientes_Vestibulo') Vestíbulo
                                                                @break

                                                                @case('Ambientes_Vestidor') Vestidor
                                                                @break

                                                                @case('Ambientes_Vestuario') Vestuario
                                                                @break

                                                                @endswitch
                                                            </strong>
                                                        </p>
                                                    </td>
                                                    <?php $r++ ?>
                                                @endif()
                                                @if($r==2)
                                            </tr>
                                        @endif
                                    @endif
                                    @if($r==2)
                                        <?php $r = 0; ?>
                                    @endif
                                @endforeach
                            </table>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="title">
                                        <h3>Instalaciones</h3>
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <?php $r = 0; ?>
                                @foreach(json_decode(json_encode($contacto->propiedad), true) as $key=>$item)
                                    @if($key!='idPropiedad'
                                         && $key!='fk_idTipoPropiedad'
                                         && $key!='fk_Direccion_Barrio_Id'
                                         && $key!='fk_Direccion_Calle_Id'
                                         && $key!='fk_Direccion_Ciudad_Id'
                                         && $key!='fk_Direccion_Localidad_Id'
                                         && $key!='fk_Direccion_Pais_Id'
                                         && $key!='fk_Direccion_Partido_Id'
                                         && $key!='fk_Direccion_Provincia_Id'
                                         && $key!='fk_Direccion_SubBarrio_Id'
                                         && $key!='fk_Direccion_Region_Id'
                                         && $key!='fk_Disposicion'
                                         && $key!='fk_Estado'
                                         && $key!='fk_Orientacion'
                                         && $key!='fk_TipoAcceso'
                                         && $key!='fk_TipoAscensor'
                                         && $key!='fk_TipoBalcon'
                                         && $key!='fk_TipoBano'
                                         && $key!='fk_TipoCalefaccion'
                                         && $key!='fk_TipoCampo'
                                         && $key!='fk_TipoCobertura'
                                         && $key!='fk_TipoCoche'
                                         && $key!='fk_TipoCochera'
                                         && $key!='fk_TipoCosta'
                                         && $key!='fk_TipoEdificio'
                                         && $key!='fk_TipoExpensas'
                                         && $key!='fk_TipoFondoComercio'
                                         && $key!='fk_TipoFrente'
                                         && $key!='fk_TipoHotel'
                                         && $key!='fk_TipoLocal'
                                         && $key!='fk_TipoPendiente'
                                         && $key!='fk_TipoPiso'
                                         && $key!='fk_TipoPorton'
                                         && $key!='fk_TipoTecho'
                                         && $key!='fk_TipoTechoIndustrial'
                                         && $key!='fk_TipoTerreno'
                                         && $key!='fk_TipoUnidadCasa'
                                         && $key!='fk_TipoUnidadDepartamento'
                                         && $key!='fk_TipoVista'
                                         && $key!='fk_ficha2'
                                         && $key!='fk_estado_publicacion'
                                         && $key!='fk_idTipoOperaion'
                                         && $key!='fk_idMonedas'
                                         && $key!=''
                                         && $item!='')

                                        @if($r==0)
                                            <tr>
                                                @endif
                                                @if(!is_null($key) && $key!='' && !is_null($item) && $item!='' && $item!='0')
                                                    <td width="40%" align="left"
                                                        style="display:flex;font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                        <img class="img-fluid mt-3"
                                                             style="width: 25px;height: 25px;margin-right: 10px;"
                                                             src="{{asset('img/raices/Recurso_22.svg')}}"/>
                                                        <p>
                                                            <strong>
                                                                @switch($key)
                                                                @case('Instalaciones_AguaCloaca') Agua Cloaca
                                                                @break

                                                                @case('Instalaciones_AguaCorriente') Agua Corriente
                                                                @break

                                                                @case('Instalaciones_AireAcondicionadoCentral') Aire
                                                                Acondicionado Central
                                                                @break

                                                                @case('Instalaciones_AireAcondicionadoIndividual') Aire
                                                                Acondicionado Individual
                                                                @break

                                                                @case('Instalaciones_AireCaliente') Aire Caliente
                                                                @break

                                                                @case('Instalaciones_Amoblado') Amoblado
                                                                @break

                                                                @case('Instalaciones_ArtefactosDeCocina') Artefactos De
                                                                Cocina
                                                                @break

                                                                @case('Instalaciones_Ascensor') Ascensor
                                                                @break

                                                                @case('Instalaciones_Cable') Cable
                                                                @break

                                                                @case('Instalaciones_CajaFuerte') Caja Fuerte
                                                                @break

                                                                @case('Instalaciones_Caldera') Caldera Individual
                                                                @break

                                                                @case('Instalaciones_Calefaccion') Calefacción
                                                                @break

                                                                @case('Instalaciones_CanchaFutbol') Cancha Futbol
                                                                @break

                                                                @case('Instalaciones_CanchaTenis') Cancha Tenis
                                                                @break

                                                                @case('Instalaciones_Desayunador') Desayunador
                                                                @break

                                                                @case('Instalaciones_Electricidad') Electricidad
                                                                @break

                                                                @case('Instalaciones_EspacioParaVehiculo') Espacio Para
                                                                Vehículo
                                                                @break

                                                                @case('Instalaciones_ExtractorDeAire') Extractor De Aire
                                                                @break

                                                                @case('Instalaciones_GasEnvasado') Gas Envasado
                                                                @break

                                                                @case('Instalaciones_GasNatural') Gas Natural
                                                                @break

                                                                @case('Instalaciones_Hidromasaje') Hidromasaje
                                                                @break

                                                                @case('Instalaciones_HogarALena') Losa Radiante
                                                                @break

                                                                @case('Instalaciones_LosaRadiante') Losa Radiante
                                                                @break

                                                                @case('Instalaciones_MovilidadReducida') Acceso Reducida
                                                                @break

                                                                @case('Instalaciones_MueblesDeCocina') Muebles De Cocina
                                                                @break

                                                                @case('Instalaciones_Pavimento') Pavimento
                                                                @break

                                                                @case('Instalaciones_Pileta') Pileta
                                                                @break

                                                                @case('Instalaciones_Radiadores') Radiadores
                                                                @break

                                                                @case('Instalaciones_Termotanque') Termotanque
                                                                @break

                                                                @endswitch
                                                            </strong>
                                                        </p>
                                                    </td>
                                                    <?php $r++; ?>
                                                @endif()
                                                @if($r==2)
                                            </tr>
                                        @endif
                                    @endif
                                    @if($r==2)
                                        <?php $r = 0;?>
                                    @endif
                                @endforeach
                            </table>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="title">
                                        <h3>Servicios</h3>
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <?php $r = 0; ?>
                                @foreach(json_decode(json_encode($contacto->propiedad), true) as $key=>$item)
                                    @if($key!='idPropiedad'
                                        && $key!='fk_idTipoPropiedad'
                                        && $key!='fk_Direccion_Barrio_Id'
                                        && $key!='fk_Direccion_Calle_Id'
                                        && $key!='fk_Direccion_Ciudad_Id'
                                        && $key!='fk_Direccion_Localidad_Id'
                                        && $key!='fk_Direccion_Pais_Id'
                                        && $key!='fk_Direccion_Partido_Id'
                                        && $key!='fk_Direccion_Provincia_Id'
                                        && $key!='fk_Direccion_SubBarrio_Id'
                                        && $key!='fk_Direccion_Region_Id'
                                        && $key!='fk_Disposicion'
                                        && $key!='fk_Estado'
                                        && $key!='fk_Orientacion'
                                        && $key!='fk_TipoAcceso'
                                        && $key!='fk_TipoAscensor'
                                        && $key!='fk_TipoBalcon'
                                        && $key!='fk_TipoBano'
                                        && $key!='fk_TipoCalefaccion'
                                        && $key!='fk_TipoCampo'
                                        && $key!='fk_TipoCobertura'
                                        && $key!='fk_TipoCoche'
                                        && $key!='fk_TipoCochera'
                                        && $key!='fk_TipoCosta'
                                        && $key!='fk_TipoEdificio'
                                        && $key!='fk_TipoExpensas'
                                        && $key!='fk_TipoFondoComercio'
                                        && $key!='fk_TipoFrente'
                                        && $key!='fk_TipoHotel'
                                        && $key!='fk_TipoLocal'
                                        && $key!='fk_TipoPendiente'
                                        && $key!='fk_TipoPiso'
                                        && $key!='fk_TipoPorton'
                                        && $key!='fk_TipoTecho'
                                        && $key!='fk_TipoTechoIndustrial'
                                        && $key!='fk_TipoTerreno'
                                        && $key!='fk_TipoUnidadCasa'
                                        && $key!='fk_TipoUnidadDepartamento'
                                        && $key!='fk_TipoVista'
                                        && $key!='fk_ficha2'
                                        && $key!='fk_estado_publicacion'
                                        && $key!='fk_idTipoOperaion'
                                        && $key!='fk_idMonedas'
                                        && $key!=''
                                        && $item!='')
                                        @if($r==0)
                                            <tr>
                                                @endif
                                                @if(!is_null($key) && $key!='' && !is_null($item) && $item!='' && $item!='0')
                                                    <td width="40%" align="left"
                                                        style="display:flex;font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                        <img class="img-fluid mt-3"
                                                             style="width: 25px;height: 25px;margin-right: 10px;"
                                                             src="{{asset('img/raices/Recurso_22.svg')}}"/>
                                                        <p>
                                                            <strong>
                                                                @switch($key)
                                                                @case('Servicios_ABL') ABL
                                                                @break

                                                                @case('Servicios_AguaCorriente') Agua Corriente
                                                                @break

                                                                @case('Servicios_Calefaccion') Calefacción
                                                                @break

                                                                @case('Baulera') Baulera
                                                                @break

                                                                @case('Servicios_Conmutador') Conmutador
                                                                @break

                                                                @case('Servicios_Electricidad') Electricidad
                                                                @break

                                                                @case('Servicios_GasEnvasado') Gas Envasado
                                                                @break

                                                                @case('Servicios_GasNatural') Gas Natural
                                                                @break

                                                                @case('Servicios_Internet') Internet
                                                                @break

                                                                @case('Servicios_Limpieza') Limpieza
                                                                @break

                                                                @case('Servicios_Refrigeracion') Refrigeración
                                                                @break

                                                                @case('Servicios_Rentas') Rentas
                                                                @break

                                                                @case('Servicios_RopaCama') Ropa Cama
                                                                @break

                                                                @case('Servicios_Seguridad') Seguridad
                                                                @break

                                                                @case('Servicios_Telefono') Teléfono
                                                                @break

                                                                @case('Servicios_Toallas') Toallas
                                                                @break

                                                                @case('Servicios_Videocable') Videocable
                                                                @break

                                                                @case('Servicios_Vigilancia') Vigilancia
                                                                @break


                                                                @endswitch
                                                            </strong>
                                                        </p>
                                                    </td>
                                                    <?php $r++;?>
                                                @endif()

                                                @if($r==2)
                                            </tr>
                                        @endif
                                    @endif
                                    @if($r==2)
                                        <?php $r = 0;?>
                                    @endif
                                @endforeach
                            </table>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="title">
                                        <h3>Descripción adicional</h3>
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <?php $r = 0; ?>
                                @foreach(json_decode(json_encode($contacto->propiedad), true) as $key=>$item)
                                    @if($key!='idPropiedad'
                                     && $key!='fk_idTipoPropiedad'
                                     && $key!='fk_Direccion_Barrio_Id'
                                     && $key!='fk_Direccion_Calle_Id'
                                     && $key!='fk_Direccion_Ciudad_Id'
                                     && $key!='fk_Direccion_Localidad_Id'
                                     && $key!='fk_Direccion_Pais_Id'
                                     && $key!='fk_Direccion_Partido_Id'
                                     && $key!='fk_Direccion_Provincia_Id'
                                     && $key!='fk_Direccion_SubBarrio_Id'
                                     && $key!='fk_Direccion_Region_Id'
                                     && $key!='fk_Disposicion'
                                     && $key!='fk_Estado'
                                     && $key!='fk_Orientacion'
                                     && $key!='fk_TipoAcceso'
                                     && $key!='fk_TipoAscensor'
                                     && $key!='fk_TipoBalcon'
                                     && $key!='fk_TipoBano'
                                     && $key!='fk_TipoCalefaccion'
                                     && $key!='fk_TipoCampo'
                                     && $key!='fk_TipoCobertura'
                                     && $key!='fk_TipoCoche'
                                     && $key!='fk_TipoCochera'
                                     && $key!='fk_TipoCosta'
                                     && $key!='fk_TipoEdificio'
                                     && $key!='fk_TipoExpensas'
                                     && $key!='fk_TipoFondoComercio'
                                     && $key!='fk_TipoFrente'
                                     && $key!='fk_TipoHotel'
                                     && $key!='fk_TipoLocal'
                                     && $key!='fk_TipoPendiente'
                                     && $key!='fk_TipoPiso'
                                     && $key!='fk_TipoPorton'
                                     && $key!='fk_TipoTecho'
                                     && $key!='fk_TipoTechoIndustrial'
                                     && $key!='fk_TipoTerreno'
                                     && $key!='fk_TipoUnidadCasa'
                                     && $key!='fk_TipoUnidadDepartamento'
                                     && $key!='fk_TipoVista'
                                     && $key!='fk_ficha2'
                                     && $key!='fk_estado_publicacion'
                                     && $key!='fk_idTipoOperaion'
                                     && $key!='fk_idMonedas'
                                     && $key!=''
                                     && $item!='')

                                        @if($r==0)
                                            <tr>
                                                @endif
                                                @if(!is_null($key) && $key!='' && !is_null($item) && $item!='' && $item!='0')
                                                    <td width="40%" align="left"
                                                        style="display:flex;font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                        <img class="img-fluid mt-3"
                                                             style="width: 25px;height: 25px;margin-right: 10px;"
                                                             src="{{asset('img/raices/Recurso_22.svg')}}"/>
                                                        <p>
                                                            <strong>
                                                                @switch($key)

                                                                @case('AltoEntrada') AltoEntrada:
                                                                @break

                                                                @case('Altura') Altura:
                                                                @break

                                                                @case('Ancho') Ancho:
                                                                @break

                                                                @case('AnchoEntrada') Ancho de la entrada:
                                                                @break

                                                                @case('AlturaTecho') Altura:
                                                                @break

                                                                @case('Antiguedad') Antiguedad:
                                                                @break

                                                                @case('AntiguedadComercio') Antiguedad del Comercio:
                                                                @break

                                                                @case('AptoCredito') Apto. Credito:
                                                                @break

                                                                @case('AptoProfesional') Apto. Profesional:
                                                                @break

                                                                @case('CantidadAmbientes') Cantidad de Ambientes:
                                                                @break

                                                                @case('CantidadBanos') Cantidad de Baños:
                                                                @break

                                                                @case('CantidadCocheras') Cantidad de Cocheras:
                                                                @break

                                                                @case('CantidadColumnas') Cantidad de Columnas:
                                                                @break

                                                                @case('CantidadDormitorios') Cantidad de Dormitorios:
                                                                @break

                                                                @case('CantidadEstrellas') Cantidad de Estrellas:
                                                                @break

                                                                @case('CantidadHabitaciones') Cantidad de Habitaciones:
                                                                @break

                                                                @case('CantidadHectareas') Cantidad de Hectareas:
                                                                @break

                                                                @case('CantidadNaves') Cantidad de Naves:
                                                                @break

                                                                @case('CantidadOficinas') Cantidad de Oficinas:
                                                                @break

                                                                @case('CantidadPersonal') Cantidad de Personal:
                                                                @break

                                                                @case('CantidadPisos') Cantidad de Pisos:
                                                                @break

                                                                @case('CantidadPlantas') Cantidad de Oficinas:
                                                                @break

                                                                @case('CantidadPlazas') Cantidad de Oficinas:
                                                                @break

                                                                @case('CasaCaseros') Casa para Caseros:
                                                                @break

                                                                @case('CasaPrincipal') Casa principal:
                                                                @break

                                                                @case('CocheraOptativa') Cochera Optativa:
                                                                @break

                                                                @case('Demolicion') Demolición:
                                                                @break

                                                                @case('DepartamentosPorPiso') Departamentos Por Piso:
                                                                @break

                                                                @case('Detalle') Detalle:
                                                                @break

                                                                @case('Direccion_Coordenadas_Latitud') Coordenadas
                                                                Latitud:
                                                                @break

                                                                @case('Direccion_Coordenadas_Longitud') Coordenadas
                                                                Longitud:
                                                                @break

                                                                @case('Direccion_Departamento') Direccion Departamento:
                                                                @break

                                                                @case('Direccion_Nombrecalle') Nombre de la calle:
                                                                @break

                                                                @case('Direccion_Departamento')Direccion Departamento:
                                                                @break

                                                                @case('Direccion_Numero') Direccion Número:
                                                                @break

                                                                @case('Direccion_Piso') Direccion Piso:
                                                                @break

                                                                @case('Disponibilidad') Disponibilidad:
                                                                @break

                                                                @case('DistanciaPavimento') Distancia Pavimento:
                                                                @break

                                                                @case('titulo') Titulo:
                                                                @break

                                                                @case('descipcion') Descripción:
                                                                @break

                                                                @endswitch
                                                            </strong>

                                                        </p>
                                                    </td>
                                                    <?php $r++; ?>
                                                @endif()

                                                @if($r==2)
                                            </tr>
                                        @endif
                                    @endif
                                    @if($r==2)
                                        <?php $r = 0; ?>
                                    @endif
                                @endforeach
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- END CENTERED WHITE DATA PROPIEDAD -->

                <!-- START FOOTER -->
                <div class="wrapper-footer">
                    <img src="{{ asset('img/raices/footer-o.jpg') }}" alt="" class="footer">
                </div>
                <!-- END FOOTER -->
            </div>
        </td>
    </tr>
</table>
</body>

</html>