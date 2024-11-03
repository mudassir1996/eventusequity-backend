<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>{{env("APP_NAME")}}</title>
    <meta name="description" content="Add Client">
    <link
        href="{{config('email_template.font_link')}}"
        rel="stylesheet">
    <style type="text/css">
    a:hover {
        color: #455056;
    }
    a {
        color: {{config('email_template.primary_color')}};
        text-decoration: none !important;
    }
    </style>
    <style type="text/css">
    @media screen and (max-device-width: 600px),
    screen and (max-width: 600px) {
        .wrapto100pc {
            width: 100% !important;
            height: auto !important;
        }

        .nomob {
            display: none !important;
            width: 0px !important;
            height: 0px !important;
        }
    }
    </style>

    <style type="text/css">
    @supports (-webkit-overflow-scrolling:touch) and (color:#ffff) {
        div>u~div .gmailbutton {
            width: 100% !important;
        }
    }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!-- 100% body table -->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="font-family: 'Nunito Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:650px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="{{config('email_template.website_link')}}" title="logo" target="_blank">
                                <img width="30%" src="{{config('email_template.logo')}}"
                                    title="logo" alt="logo">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1
                                            style="color:{{config('email_template.primary_color')}}; font-weight:700; margin:0;font-size:22px;font-family:'Rubik',sans-serif;">
                                            {{ $transaction_data['transaction_type'] == 'withdraw' ? 'Withdrawal Requested' : 'Deposit Successful' }}
                                        </h1>
                                        <p style="font-size:15px; color:#455056; margin:30px 0px 30px 0px; line-height:24px;">
                                            <b> Hello {{ ucfirst($transaction_data['full_name']) }}</b>
                                        </p>
                                        @if ($transaction_data['transaction_type'] == 'deposit')
                                            <p
                                                style="color:#455056;line-height:24px; margin:20px auto; font-weight: 500; text-align:center">
                                                Your payment of <strong>{{$transaction_data['currency_symbol']." ". number_format($transaction_data['transaction_amount'], 2) }}</strong> has been confirmed with {{ env('APP_NAME') }}.  It has now been added to your investment account with {{ env('APP_NAME') }}.
                                                If you have any questions, we're always happy to help out, just email us.
                                            </p>
                                        @else
                                            <p
                                                style="color:#455056;line-height:24px; margin:20px auto; font-weight: 500; text-align:center">
                                                Your wthdrawal of <strong>{{$transaction_data['currency_symbol']." ". number_format($transaction_data['transaction_amount'], 2) }}</strong> has been initiated with {{ env('APP_NAME') }}. It will now be passed to your Account Manager {{env('ACCOUNT_MANAGER')}}.
                                                If you have any questions, we're always happy to help out, just email us.
                                            </p>
                                        @endif
                                        <p
                                            style=" font-size: 14px;color:#455056;line-height:24px; margin:40px 0px 20px 0px; font-weight: 500; text-align:center">
                                            Regards, <br>
                                            {{ env('APP_NAME') }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                     <tr>
                        <td style="text-align:center;">
                            <p
                                style="font-size:14px; color:{{config('email_template.primary_color')}}; line-height:18px; margin:0 0 0;">
                            </p>
                            <u style="text-decoration: none;list-style: none;display: inline-flex; font-size:13px;">
                                {{-- <a href="{{config('email_template.linkedin')}}">
                                    <li style="padding: 6px;">Linkedin</li>
                                </a> --}}
                                <a href="{{config('email_template.twitter')}}">
                                    <li style="padding: 6px;">Twitter</li>
                                </a>
                                {{-- <a href="{{config('email_template.instagram')}}">
                                    <li style="padding: 6px;">Instagram</li>
                                </a>
                                <a href="{{config('email_template.rumble')}}">
                                    <li style="padding: 6px;">Rumble</li>
                                </a> --}}
                                <a href="{{config('email_template.trustpilot')}}">
                                    <li style="padding: 6px;">Reviews</li>
                                </a>

                            </u>
                            <p>
                                <span
                                    style="display:inline-block; vertical-align:middle; margin:0px 0 10px; border-bottom:1px solid rgba(0,0,0,.20); width:100px;"></span>
                            </p>
                            <p
                                style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">
                                &copy; <strong>{{config('email_template.website_name')}}</strong> </p>

                            <p
                                style="padding:16px; color: rgba(69, 80, 86, 0.74);line-height:16px;font-size: 11px;margin:0; font-weight: 500; text-align:center">
                                {{ config('email_template.footer_text') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>
