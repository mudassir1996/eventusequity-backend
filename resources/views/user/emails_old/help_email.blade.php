<!doctype html>
<html>

<head>

    <title>Add Transaction</title>
    <meta charset="utf-8">
    <meta name='author' content='Najeeb Shaukat, najeeb.shaukat@mwanmobile.com'>
    <meta name='designer' content='Najeeb Shaukat'>

    <style type="text/css">
        CLIENT-SPECIFIC STYLES body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 30px 0px;
            width: 100% !important;
        }

        a {
            text-decoration: none !important;
        }

        @font-face {
            font-family: Product sans bold;
            src: url('{{ asset('fonts/Produc-Sans-Bold.ttf') }}');
        }

        @font-face {
            font-family: Product sans;
            src: url('{{ asset('fonts/Product-Sans-Regular.ttff') }}');
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .mimeStatusWarning {
            background-color: #ffffff !important;
        }

        .spk_card {
            height: 200px;
        }

        p,
        ul li {
            /*font-weight: 500;*/
        }

        p,
        h1 {
            margin-top: 10px !important;
            margin-bottom: 0 !important;
        }

        .mob-row {
            display: none;
        }

        .btn-start:hover {
            background-color: #155763 !important;
            border-color: #155763 !important;
        }

        ul.f-list {
            padding-inline-start: 0px;
            margin-top: 4px;
        }

        ul.f-list li {
            display: inline-block;
            margin-right: 10px;
            font-size: 16px;
            font-weight: 400;
            list-style-type: none;
        }

        ul.f-list li a {
            color: #626262;
            font-size: 14px;
        }

        ul.f-list li a:hover {
            text-decoration: underline !important;
        }


        /* MOBILE STYLES */
        @media screen and (max-width: 600px) {
            .dsk-row {
                display: none;
            }

            .mob-row {
                display: block !important;
            }

            .img-max {
                width: 100 px !important;
                height: auto !important;
            }


            .img-maxx {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
            }

            .img-spk {
                width: 200px !important;
                max-width: 200px !important;
                height: auto !important;
            }

            .max-width {
                max-width: 100% !important;
            }

            .f_left {
                float: left !important
            }

            .mobile-wrapper {
                width: 85% !important;
                max-width: 85% !important;
            }

            .mobile-padding {
                padding-left: 5% !important;
                padding-right: 5% !important;
            }

            .full-width {
                width: 100% !important;
            }

            .half-width {
                width: 50% !important;
            }

            .spk_card {
                height: auto;
                margin-bottom: 20px;
                padding: 20px 10px !important;
            }

            .mobile_h3 {
                font-size: 16px !important;
                margin-bottom: 10px !important;
            }

            .spk_card p {
                font-size: 14px !important;
                line-height: 25px important;
                margin-left: 0px !important;
                -webkit-margin-befor: 0 !important;
            }

            .mobile-p {
                font-size: 15px !important;
                line-height: 20px !important;
                text-align: left !important;
            }

            .small-text {
                font-size: 15px !important;
            }

            .mob_p {
                margin-bottom: 10px !important;
                margin-top: 0px !important;
            }

            .pad-10 {
                padding: 0px 10px !important;
            }

            .pad-20 {
                padding: 0px 10px !important;
            }

            /*==new css ==*/
            .mob-center {
                text-align: center !important;
            }

            .dsk-logo {
                display: none;
            }

            .mob-logo {
                display: inline !important;
            }

            .mob-td {
                width: 100%;
                padding-left: 0px !important;
                padding-right: 0px !important;
                float: left;
                text-align: center !important;
            }

            ul.f-list li {
                margin-bottom: 10px;
                margin-right: 5px;
                margin-left: 5px;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="margin: 0 !important; background-color: #f4f4f4;" bgcolor="#f4f4f4">
    <!--main table -->

    <table border="0" cellpadding="10" cellspacing="0" width="100%">

        <tr>
            <td align="center" valign="top" width="100%" style="padding: 10px 0 10px 0;" class="mobile-padding">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" class="full-width"
                    bgcolor="ffffff" style="border-radius:0px;">
                    <td>

                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="20" class="full-width"
                                    bgcolor="#fff" style="border-radius:30px;">
                                    <tr>
                                        <td align="left">
                                            <table width="100%" align="center" cellspacing="0" cellpadding="20"
                                                class="full-width">

                                                <tr>

                                                    <td align="left" valign="top" style="padding: 0px 20px 0px 20px; text-align: center;
            background-color: #fff; overflow: hidden;border-bottom: 1px solid #E2E2E2;">
                                                        <img style=" width: 180px; margin-top:20px;margin-bottom:20px;"
                                                            alt="{{ env('APP_NAME') }}"
                                                            src="{{ asset('images/logo-dark.png') }}">
                                                    </td>

                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                    bgcolor="#fff" style="margin-bottom:60px;">
                                    <tr>
                                        <td align="left">
                                            <table width="100%" align="center" cellspacing="0" cellpadding="20"
                                                class="full-width">

                                                <tr>

                                                    <td class="mobile-p" align="left" style="padding:0px 40px 0px 40px;
             font-family: 'Product sans bold;line-height: 1.5;">
                                                        <h1
                                                            style="text-align:left;font-weight: 700; font-size:20px;color: {{ config('email_template.primary_color') }};font-family: 'Product sans bold', sans-serif;">
                                                            <span style="font-weight:500;">Message</span>
                                                        </h1>

                                                        <p class="mobile-p" align="left" style="font-weight: 400; margin-top:15px;
               margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">
                                                            {{ ucfirst($data['full_name']) }} wants to ask a question.
                                                            Please read the message below and respond accordingly.
                                                        </p>
                                                        <p class="mobile-p" align="left" style="font-weight: 400; margin-top:15px;
               margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">
                                                            <b>Email:</b> {{ $data['email'] }}
                                                        </p>

                                                        <p class="mobile-p" align="left" style="font-weight: 400; margin-top:15px;
               margin-bottom: 10px !important;font-size: 16px; color: #000;font-family: 'Product sans', sans-serif;">
                                                            <b>Message:</b> {{ $data['question'] }}
                                                        </p>

                                                    </td>

                                                </tr>


                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                    bgcolor="#fff">
                                    <tr>
                                        <td align="left">
                                            <table width="100%" align="center" cellspacing="0" cellpadding="0"
                                                class="full-width">

                                                <tr>

                                                    <td class="mobile-p" align="left" style="padding:0px 40px 0px 40px;
             font-family:
             verdana, sans-serif;line-height: 1.5; font-weight:400;">
                                                        <hr style="border-color: #DBDBDB;margin-block-end: 0px;
               margin-block-start: 0px;border:1px solid #dbdbdb;border-bottom: none;">
                                                    </td>

                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!--footer yaha say start ho raha ha ur sara footer new ha-->
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                    bgcolor="#fff" style="border-radius:30px;">
                                    <tr>
                                        <td align="left">
                                            <table width="100%" align="center" cellspacing="0" cellpadding="20"
                                                class="full-width">

                                                <tr>

                                                    <td align="center" height="100%" valign="top" width="100%"
                                                        class="mobile-padding" style="padding:0px;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0"
                                                            width="100%" class="full-width">
                                                            <tr>
                                                                <td class="mobile-p mob-td" align="left"
                                                                    style="padding:10px 40px 0px 40px; font-family: 'Product sans', sans-serif;line-height: 1.5; font-weight:400;font-size:14px;">
                                                                    <ul class="f-list">
                                                                        <li>
                                                                            <a style="color: {{ config('email_template.primary_color') }}"
                                                                                href="{{ config('email_template.website_link') }}">
                                                                                {{ config('email_template.website_name') }}
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td class="mobile-p mob-td" align="right"
                                                                    style="padding:10px 40px 0px 40px; font-family: 'Roboto', sans-serif;line-height: 1.5; font-weight:400;">
                                                                    @if (!empty(config('email_template.twitter')))
                                                                        <a href="{{ config('email_template.twitter') }}"
                                                                            style="margin-right:5px;">
                                                                            <img src="{{ asset('images/email/twitter.png') }}"
                                                                                alt="twitter-icon" width="40px">
                                                                        </a>
                                                                    @endif
                                                                    @if (!empty(config('email_template.instagram')))
                                                                        <a href="{{ config('email_template.instagram') }}"
                                                                            style="margin-right:5px;">
                                                                            <img src="{{ asset('images/email/instagram.png') }}"
                                                                                alt="instagram-icon" width="40px">
                                                                        </a>
                                                                    @endif
                                                                    @if (!empty(config('email_template.location')))
                                                                        <a href="{{ config('email_template.location') }}"
                                                                            style="margin-right:5px;">
                                                                            <img src="{{ asset('images/email/location.png') }}"
                                                                                alt="location-icon" width="40px">
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="mobile-p mob-td" align="left"
                                                                    style="padding:10px 40px 0px 40px; font-family: 'Roboto', sans-serif;line-height: 1.5; font-weight:400;">
                                                                    <p class="mobile-p" align="left"
                                                                        style="font-weight: 400;
                   margin-bottom: 5px !important;font-size: 14px; color: #626262;font-family: 'Product sans', sans-serif;">
                                                                        See our reviews on
                                                                    </p>
                                                                    <a href="{{ config('email_template.trustpilot') }}"
                                                                        style="margin-right:5px;">
                                                                        <img src="{{ asset('images/trust-pilot.png') }}"
                                                                            style="height:20px" alt="trust-pilot-icon">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" class="mobile-p mob-td" align="left"
                                                                    style="padding:10px 40px 0px 40px; font-family: 'Product sans', sans-serif;line-height: 1.5; font-weight:400;font-size:14px;">
                                                                    <p class="mobile-p" align="left"
                                                                        style="font-weight: 400; margin-top:15px;
                   margin-bottom: 10px !important;font-size: 14px; color: #626262;font-family: 'Product sans', sans-serif;">
                                                                        {{ config('email_template.footer_text') }}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>

                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!--footer yaha pe end ho rha ha-->

                        <tr>
                            <td align="center">

                                <table width="100%" border="0" cellspacing="20" cellpadding="0">
                                    <tr>
                                        <td align="center" style="padding: 10px 20px 10px 20px;">



                                        </td>
                                    </tr>

                                </table>

                            </td>
                        </tr>

                    </td>
                    <!--Main td-->
                </table>
            </td>
        </tr>

    </table>

</body>

</html>
