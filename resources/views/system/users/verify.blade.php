@extends('layouts.base')

@section('content')
<section id="content">
        <div class="row m-n">
            <div class="col-sm-4 col-md-12 col-md-offset-0">
                <div class="text-center m-b-lg">
                <br>
                <img src="{{asset('incs/images/hr_logobig.png')}}" class="" style="height: 100px;">
                    <h1 class="text-primary animated fadeInDownBig">USER ACCOUNT VERIFICATION</h1> 
                </div>
                <p align="justify" class="h4 text-center">Verify your account with the one time opt code sent to your mobile phone. The code expires in 30 minutes; make sure you complete the process on time </p><br>
               
                <form action="{{url('/system/user/account/verification/'.\Crypt::encrypt(Auth::user()->id))}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="user" value="{{Auth::user()->id}}">
                    <div class="form-group col-md-6 " >
                        <label for="">One Time Opt Code <div class="error"></div></label>
                        <input type="text" name="code" class="form-control" style="text-align: center;" required="">
                        <br>
                    <div class="form-group col-md-12" align="center">
                        <button type="submit" class="btn btn-primary btn-sm text-center">Verify Account</button>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                         @if(Session::has('alert'))
                        <div class="alert alert-danger" align="center">
                            <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Ops!</strong> The code you entered <b>'{{Session::get('error')}}'</b> does not match the code sent to your phone please verify from the SMS sent to you and try again  <a href="#" class="alert-link"></a>. 
                        </div> 
                        @endif
                         @if(Session::has('error'))
                        <div class="alert alert-danger" align="center">
                            <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Ops!</strong> The code you entered <b>'{{Session::get('error')}}'</b> does not match the code sent to your phone please verify from the SMS sent to you and try again  <a href="#" class="alert-link"></a>. 
                        </div> 
                        @endif

                        <div class=""> Didn't get the code or the code has expired? Dont worry you can resend new one here<a href="{{url('/sendCode')}}" style="color: blue;"> here</a>
                        </div>

                    </div>
                    <div class="form-group col-md-6" align="center">
                        
                    </div>

                </form>
            </div>
        </div>
    </section>
    <br><br><br><br>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p> <small>National Open University of Nigeria<br>&copy; {{date('Y')}}. </small> All Rigths reserved </p>
        </div>
    </footer>
@endsection