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
        <link rel="stylesheet" href="{{ asset('assets/css/500.css') }}">
    </head>
    <body class="hold-transition lockscreen" style="background-color: #fff;">
        <div class="container">
            <div class="error">
                <h1 style="color: #413c69">500</h1>
                <h2 style="color: #413c69">error</h2>
                <p style="color: #413c69">We are working towards creating something better. We won't be long.<br><span>Thanks.<br><br>Team MoneyTransfer</span></p>
            </div>
            <div class="stack-container">
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 125px; --scaledist: .75; --vertdist: -25px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 100px; --scaledist: .8; --vertdist: -20px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist:75px; --scaledist: .85; --vertdist: -15px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 50px; --scaledist: .9; --vertdist: -10px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 25px; --scaledist: .95; --vertdist: -5px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="perspec" style="--spreaddist: 0px; --scaledist: 1; --vertdist: 0px;">
                        <div class="card">
                            <div class="writing">
                                <div class="topbar">
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                                <div class="code">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/500.js') }}"></script>
    </body>
</html>
