<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Error</title>
        <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/et-line-font/et-line-font.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/themify-icons/themify-icons.css') }}">
    </head>
    <body class="hold-transition lockscreen" style="background-color: #fff;">
        <div style="margin-top: 200px;">
            <div class="error-page text-center">
                <h2 class="headline text-purple"> 404</h2>
                <div>
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                <p> We could not find the page you were looking for.
                    Meanwhile, you may return Home. </p>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/niche.js') }}"></script>
    </body>
</html>
