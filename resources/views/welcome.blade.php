<!-- 08072628363 Joy Cook -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>{{ config('app.name', 'Laravel') }} | Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- <link rel="stylesheet" href="{{asset('incs/css/app.v1.css')}}" type="text/css" /> -->
        <link type="image/x-icon" href="{{asset('incs/images/hr_logobig.png')}}" rel="shortcut icon"/>



        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 90px;
                color: green;

            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <!--  -->
    <body >
    <!-- style="background:#f4f4f4 url('{{asset('incs/images/NOUNGATE.jpg')}}') 0 0 no-repeat;background-size:cover; align-content: center;" -->
        <div class="flex-center position-ref full-height">
           <!--  @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                </div>
            @endif -->

            <div class="content">
            <!-- <img src="{{asset('/incs/hr_logo.png')}}" alt=""> -->
                <div class="title m-b-md">
                <!-- NOUN -->
                </div>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                    <a href="{{url('/login')}}" class="btn btn-success btn-sm">Launch Portal</a>
                <br>
                <p></p>
            </div>
        </div>
        <!-- <script src="{{asset('incs/js/app.v1.js')}}"></script> -->
    </body>
</html>
