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

        .header, .footer {
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
            font-size: 35px;
            font-weight: 300;
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
            font-size: 18px;
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

        hr {
            border: 0;
            border-bottom: 1px solid black;
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
                                    @foreach(json_decode(json_encode($contacto->propiedad), true) as $key=>$item)
                                        <p>
                                            <strong>
                                                {!! $key !!}
                                            </strong> : {!! $item !!}
                                        </p>
                                    @endforeach
                                </tr>

                                {{--<tr>
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







                                 <div class="container-fluid sec2 section-container">
                                    <div class="container" style="z-index: 3;">
                                        <div class="col-sm-12 ">
                                            <h3 class="text-center brown-text text-uppercase font-weight-extrabold">
                                                Descripción </h3>
                                            <div class="row justify-content-center">
                                                <div *ngIf="gPropiedades.SuperficieConstruible" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        {{gPropiedades.SuperficieConstruible}}
                                                    </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie construible </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficieCubierta" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        {{gPropiedades.SuperficieCubierta}}
                                                    </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie cubierta </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficieCubiertaCasa" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        {{gPropiedades.SuperficieCubiertaCasa}}
                                                    </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie cubierta de casa </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficieDeposito" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        {{gPropiedades.SuperficieDeposito}}
                                                    </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie deposito </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficieDescubierta" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        {{gPropiedades.SuperficieDescubierta}}
                                                    </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie descubierta </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficieLocal" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        {{gPropiedades.SuperficieLocal}}
                                                    </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie local </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficieOficina" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        {{gPropiedades.SuperficieOficina}}
                                                    </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie oficina </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficiePlanta=='1'" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        Valor unidad </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie planta </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficiePlaya=='1'" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        Valor unidad </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie playa </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficieTerreno=='1'" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        Valor unidad </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie terreno </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.SuperficieTotal=='1'" class="col-md-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="img-fluid mt-3" style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 19.svg"/>
                                                    </div>
                                                    <h4 class="yellow-text text-center font-weight-extrabold text-uppercase mt-3">
                                                        Valor unidad </h4>
                                                    <h6 class="text-center font-weight-extrabold text-uppercase mt-3">
                                                        Superficie total </h6>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="justify-content-center col-md-12">
                                            <div class="row justify-content-center">
                                                <div *ngIf="gPropiedades.tipo_propiedad" class="col-md-2 col-4 flex-column">
                                                    <div class="d-flex justify-content-center mt-4 mb-2">
                                                        <img style="width: 3rem; height: 3rem;" src="../../../../assets/images/icons/Recurso 18.svg" class="" alt=""/>
                                                    </div>
                                                    <h6 class="gray-icon-text text-center font-weight-bold">
                                                        {{gPropiedades.tipo_propiedad.descripcion}}
                                                    </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.tipo_opeacion" class="col-md-2 col-4 flex-column">
                                                    <div class="d-flex justify-content-center mt-4 mb-2">
                                                        <img style="width: 3rem; height: 3rem;" src="../../../../../../assets/images/icons/Recurso 8.svg" class="" alt=""/>
                                                    </div>
                                                    <h6 class="gray-icon-text text-center font-weight-bold">
                                                        {{gPropiedades.tipo_opeacion.descripcion}}
                                                    </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.CantidadDormitorios=='1'" class="col-md-2 col-4 flex-column">
                                                    <div class="d-flex justify-content-center mt-4 mb-2">
                                                        <img style="width: 3rem; height: 3rem;" src="../../../../assets/images/icons/Recurso 20.svg" class="" alt=""/>
                                                    </div>
                                                    <h6 class="gray-icon-text text-center font-weight-bold">
                                                        Valor </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.CantidadBanos=='1'" class="col-md-2 col-4 flex-column">
                                                    <div class="d-flex justify-content-center mt-4 mb-2">
                                                        <img style="width: 3rem; height: 3rem;" src="../../../../assets/images/icons/Recurso 9.svg" class="" alt=""/>
                                                    </div>
                                                    <h6 class="gray-icon-text text-center font-weight-bold">
                                                        Valor </h6>
                                                </div>
                                                <div *ngIf="gPropiedades.CantidadCocheras=='1'" class="col-md-2 col-4 flex-column">
                                                    <div class="d-flex justify-content-center mt-4 mb-2">
                                                        <img style="width: 3rem; height: 3rem;" src="../../../../assets/images/icons/Recurso 17.svg" class="" alt=""/>
                                                    </div>
                                                    <h6 class="gray-icon-text text-center font-weight-bold">
                                                        Valor </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container py-5">
                                            <div class="col-lg-12 my-5">
                                                <h6 class="gray-text col-lg-12 font-weight-bold">
                                                    Ambientes </h6>
                                                <hr class="my-1"/>
                                                <div class="container my-3 d-flex justify-content-center">
                                                    <div class="row d-flex">
                                                        <ng-container *ngFor="let ambiente of vista.ambientes">
                                                            <li *ngIf="ambiente.selected" class="my-3 d-flex gray-text font-semibold col-lg-3 text-center">
                                                                <img src="../../../../../assets/images/icons/Recurso 22.svg" class="mr-2 footer-contact-icons" alt=""/>{{ambiente.label}}
                                                            </li>
                                                        </ng-container>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 my-5">
                                                <h6 class="gray-text col-lg-12 font-weight-bold">Instalaciones</h6>
                                                <hr class="my-1"/>
                                                <div class="container my-3 d-flex justify-content-center">
                                                    <div class="row d-flex">
                                                        <ng-container *ngFor="let instalacion of vista.instalaciones">
                                                            <li *ngIf="instalacion.selected" class="my-3 d-flex gray-text font-semibold col-lg-3 text-center">
                                                                <img src="../../../../../assets/images/icons/Recurso 22.svg" class="mr-2 footer-contact-icons" alt=""/>{{instalacion.label}}
                                                            </li>
                                                        </ng-container>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 my-5">
                                                <h6 class="gray-text col-lg-12 font-weight-bold">
                                                    Servicios </h6>
                                                <hr class="my-1"/>
                                                <div class="container my-3 d-flex justify-content-center">
                                                    <div class="row d-flex">
                                                        <ng-container *ngFor="let servicio of vista.servicios">
                                                            <li *ngIf="servicio.selected" class="my-3 d-flex gray-text font-semibold col-lg-3 text-center">
                                                                <img src="../../../../../assets/images/icons/Recurso 22.svg" class="mr-2 footer-contact-icons" alt=""/>{{servicio.label}}
                                                            </li>
                                                        </ng-container>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 my-5" style="z-index: 3;">
                                                <h6 class="gray-text font-weight-bold col-lg-12">
                                                    Descripción Adicional </h6>
                                                <hr class="my-1"/>
                                                <div class="col-lg-12">
                                                    <p class="pt-4 gray-text font-weight-semibold">
                                                        {{gPropiedades.descipcion}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid sec3" style="background: #E6B706; padding-top: 5rem !important;">
                                    <div class="container  py-5 ">
                                        <div class="col-sm-12">
                                            <h3 class="font-weight-extrabold text-center text-white text-uppercase my-3">
                                                Contacto </h3>
                                            <h6 class="font-weight-semibold text-center text-white text-uppercase">
                                                horario </h6>
                                            <h5 class="font-weight-extrabold text-center text-white text-uppercase">
                                                08:00 AM - 07:00PM </h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 flex-column" style="z-index: 2;">
                                                <div class="d-flex justify-content-center mt-4 mb-2">
                                                    <img style="width: 6rem;" src="../../../../assets/images/icons/Recurso 14.svg" class="img-fluid" alt=""/>
                                                </div>
                                                <h5 class="text-white text-center font-weight-semibold">
                                                    Brandsen 805, C1161 CABA, Argentina </h5>
                                            </div>
                                            <div class="col-md-4 flex-column" style="z-index: 2;">
                                                <div class="d-flex justify-content-center mt-4 mb-2">
                                                    <img style="width: 6rem;" src="../../../../assets/images/icons/Recurso 16.svg" class="img-fluid" alt=""/>
                                                </div>
                                                <h5 class="text-white text-center font-weight-semibold">
                                                    +51 444222555 </h5>
                                            </div>
                                            <div class="col-md-4 flex-column" style="z-index: 2;">
                                                <div class="d-flex justify-content-center mt-4 mb-2">
                                                    <img style="width: 6rem;" src="../../../../assets/images/icons/Recurso 15.svg" class="img-fluid" alt=""/>
                                                </div>
                                                <h5 class="text-white text-center font-weight-semibold">
                                                    raices@example.org </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light sec1" style="padding-top: 5rem !important;">
                                    <div class="container-fluid d-flex align-items-center">
                                        <div class="container col-lg-4 col-md-6 py-5 ml-lg-5" style="z-index: 4;">
                                            <div class="col-sm-12">
                                                <h3 class="font-weight-light text-center text-md-left brown-text text-uppercase mb-3">
                                                    Dirección </h3>
                                            </div>
                                            <p class="col-sm-12 font-weight-semibold text-md-left text-center brown-text">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem aperiam obcaecati quas repellat quisquam consectetur explicabo dignissimos. </p>
                                        </div>
                                        <div class="col-md-8 d-none d-md-block"></div>
                                    </div>
                                </div>

                                --}}


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
