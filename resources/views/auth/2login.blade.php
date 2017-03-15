<!DOCTYPE html>
<html lang="en">
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
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body style="background:#f4f4f4 url('../../incs/images/NOUNGATE.jpg') 0 0 no-repeat;background-size:cover;">
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp col-md-offset-7">
        <div class="container aside-xxl"> <a class="navbar-brand block" href="index.html">Notebook</a>
            <section class="panel panel-default bg-white m-t-lg">
                <header class="panel-heading text-center"> <strong>Login to your account</strong> </header>
                <form action="{{url('/login')}}" method="POST" class="panel-body wrapper-lg">
                {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" placeholder="me@nda.gov.ng" class="form-control"> 
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" id="inputPassword" placeholder="Password" class="form-control">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif 
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me </label>
                    </div> <a href="{{ url('/password/reset') }}" class="pull-right m-t-xs"><small>Forgot password?</small></a>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    <div class="line line-dashed"></div>
                </form>
            </section>
            <br><br><br><br><br><br><br><br>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p> <small>Web app framework base on Bootstrap<br>&copy; 2013</small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
</body>

</html>
