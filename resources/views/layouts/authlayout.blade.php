<!DOCTYPE html>
<!-- <html lang="en" class="bg-dark"> -->
<html lang="en" >

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="National Open University of Nigeria Human Resource Portal v1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="Umoru Godfrey, E. Natview Technology, Abuja Nigeria" />
    <meta name="date" content="29th January, 2017" />
    <link rel="stylesheet" href="{{asset('incs/css/font.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('incs/css/app.v1.css')}}" type="text/css" />
    <link type="image/x-icon" href="{{asset('incs/images/hr_logobig.png')}}" rel="shortcut icon"/>
    
    <!--[if lt IE 9]> 
        <script src="js/ie/html5shiv.js"></script> 
        <script src="js/ie/respond.min.js"></script> 
        <script src="js/ie/excanvas.js"></script> 
    <![endif]-->
</head>

<body class="bg-light" style="background:#f4f4f4 url('../../incs/images/NOUNGATE.jpg') 0 0 no-repeat;background-size:cover;">

    @yield('content')
    
    
    <script src="{{asset('incs/js/app.v1.js')}}"></script>
    <script src="{{asset('incs/js/app.plugin.js')}}"></script>
</body>

</html>