@extends('layouts.base')

@section('content')
{{ csrf_field() }}
<section id="content">
        <div class="row m-n">
        
            <div class="col-sm-4 col-md-8 col-md-offset-0">
                <div class="text-center m-b-lg">
                <br>
                    <h1 class="h text-warning animated fadeInDownBig"> <img src="{{asset('incs/images/hr_logobig.png')}}" class="" style="height: 180px;"> OPS!</h1> 
                </div>
                <p align="justify" class="h4 text-center">The resources you are trying to access does not exist or is been under maintenance temporary at the moment </p><br>
                <div class="list-group m-b-sm bg-white m-b-lg">
                    <a href="{{url('/home')}}" class="list-group-item"> <i class="fa fa-chevron-right icon-muted"></i> <i class="fa fa-fw fa-home icon-muted"></i> Goto homepage </a>
                    <a href="#" class="list-group-item"> <i class="fa fa-chevron-right icon-muted"></i> <span class="badge">08165420728</span> <i class="fa fa-fw fa-phone icon-muted"></i> Call the admin </a>
                    <a href="{{url('system/ticket/new')}}" class="list-group-item"> <i class="fa fa-chevron-right icon-muted"></i> <span class="badge"></span> <i class="fa fa-fw fa-question icon-muted"></i> Create a ticket </a>
                    <a href="{{url('/')}}" class="list-group-item"> <i class="fa fa-chevron-right icon-muted"></i> <span class="badge"></span> <i class="fa fa-fw fa-reply icon-muted"></i> Go back to previous page </a>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-md-offset-0">
                <div class="m-b-lg">
                 <br><br>
                 
                </div>
                <p align="justify" class="h5 text-center"><h1>Possible causes of this </h1></p>
                <p>This kind of error hapens only when any of these happens:</p>
                <div class="panel-group m-b" id="accordion2">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> Resourse not found #1<small></small></a> </div>
                        <div id="collapseOne" class="panel-collapse in">
                            <div class="panel-body text-sm">
                            <p align="justify" class=""> This kind of error occurs only when any of the following conditions is met:</p>
                                <ul>
                                    <li> The resources looked for does not exist.</li>
                                    <li>Invalid url or link visited. The link showing at the address bar does not exist or any resource(s) associated with it on the system</li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo"> Wrong Method call #2 <small></small></a> </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body text-sm">
                                <ul>
                                    <li> The method that call the page or resource visited is wrongly called.</li>
                                    <li> The parameters supplied for the link are invalid or it does not exist.</li>
                                    <li> The database connection is refused by the server. Any attempt to force the connection open is rejected by the server hence this error.</li>
                                    <li>Your privileges are limited to view this resources</li>
                                </ul>  
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree"> Resources under construction #3 </a> </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body text-sm"> 
                                <ul>
                                    <li> The Administrator has decide to put the system under maintenance mode.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p> <small>National Open University of Nigeria<br>&copy; {{date('Y')}}. </small> All Rigths reserved </p>
        </div>
    </footer>
@endsection