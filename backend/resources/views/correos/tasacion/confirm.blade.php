<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Email</title>
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
            width: 100%; }
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
            width: 100%; }
        .btn > tbody > tr > td {
            padding-bottom: 15px; }
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
<span class="preheader">Recibimos su tasación</span>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
        <td>&nbsp;</td>
        <td class="container">
            <div class="content">

                <!-- START HEADER IMAGE CONTAINER -->
                <img class="header" src="{!! $message->embed(public_path('img/raices/header.jpg'))!!}" alt="">
                <!-- START HEADER IMAGE CONTAINER -->

                <!-- START CENTERED WHITE CONTAINER -->
                <table role="presentation" class="main">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <h2>Recibimos su tasación</h2>
                                        <hr>
                                        <p>
                                            Hola! {{$tasacion->nombre_apellido}} Se ha recibido su tasacion titulada: {{$tasacion->titulo}}.
                                        </p>
                                        <h5>www.raicespropiedades.com</h5>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- END CENTERED WHITE CONTAINER -->

                <!-- START FOOTER -->
                <div class="wrapper-footer">
                    <img src="{!! $message->embed(public_path('img/raices/footer-o.jpg'))!!}" alt="" class="footer">
                    {{--<div class="wrapper-footer-social">
                        <a target="_blank" href="https://facebook.com">
                            <img class="item-a" src="{!! $message->embed(public_path('img/raices/facebook.jpg'))!!}" alt="">
                        </a>

                        <a target="_blank" href="https://twitter.com">
                            <img class="item-b" src="{!! $message->embed(public_path('img/raices/twitter.jpg'))!!}" alt="">
                        </a>
                        <a target="_blank" href="https://instagram.com">
                            <img class="item-c" src="{!! $message->embed(public_path('img/raices/instagram.jpg'))!!}" alt="">
                        </a>
                        <a target="_blank" href="https://main.com">
                            <img class="item-d" src="{!! $message->embed(public_path('img/raices/main.jpg'))!!}" alt="">
                        </a>
                    </div>
                    --}}
                </div>
                <!-- END FOOTER -->
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>
