@extends('layouts.masterpage')

@section('content')
<?php 
    $from = new DateTime($person->getNounInfos->date_of_entry);
    $to   = new DateTime('today');

?> 
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>{{$person->surname}}'s profile</p>
         <div class="pull-right">
            <br>
                <div class="btn-group">
                    <button class="btn btn-warning btn-xs btn-flat ">Personnel Actions</button>
                    <button class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a class="" data-toggle="collapse" data-target="#" aria-expanded="false" aria-controls="collapseExample">Edit Records</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#cCenter" aria-expanded="false" aria-controls="collapseExample">Change Study Center</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#lga" aria-expanded="false" aria-controls="collapseExample">Change LGA</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#lga" aria-expanded="false" aria-controls="collapseExample">Suspend Personnel</a></li>
                        <li class="divider"></li>
                        <li><a class="" data-toggle="collapse" data-target="#upload" aria-expanded="false" aria-controls="collapseExample">Upload Document</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#report" aria-expanded="false" aria-controls="collapseExample">Export Report</a></li>
                    </ul>
                </div>
                <button class="btn btn-xs btn-success" type="button" data-toggle="collapse" data-target="#email" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-envelope"> </i> Send e-Mail</button>
                <button class="btn btn-xs btn-dark" type="button" data-toggle="collapse" data-target="#sms" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-envelope-o"> </i> Send SMS</button>

                <a href="#" class="btn btn-info btn-xs"> <i class="fa fa-user"></i> My Appraisal </a> 
                <a class="btn btn-info btn-xs" data-toggle="collapse" data-target="#leavesform" aria-expanded="false" aria-controls="collapseExample">Leave Form</a> <br>

            </div>
    </header>
    <section class="scrollable">
        <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r col-md-6">
                <section class="vbox">
                    <section class="scrollable">
                        <div class="wrapper ">
                        <div class="col-md-12" id="edit">
                        	
                        </div>
                         <section class="panel panel-default">
	                        @if($person->status == 1)
	                        <header class="panel-heading bg-primary lt no-border">
	                        @elseif($person->status == 2)
	                        <header class="panel-heading bg-info lt no-border">
	                        @else
	                        <header class="panel-heading bg-warning lt no-border">
	                        @endif
	                            <div class="clearfix">
	                                <a href="#" class="pull-left thumb avatar b-3x m-r"> <img src="{{asset('incs/images/personnel/'.$person->id.'.jpg')}}" class="img-circle"> </a>
	                                <div class="clear">
	                                    <div class="h4 m-t-xs m-b-xs text-white"> {{$person->surname.' '.$person->middle_name. ' '.$person->first_name}} <i class="fa fa-circle text-white pull-right text-xs m-t-sm"></i> </div> <small class="text-muted">{{$person->getNounInfos->rank}}</small> 
	                                    <br> 
	                                </div>
	                            </div>
	                        </header>
	                        <div class="list-group no-radius alt">
	                            <ul class="list-group no-radius">
	                                <li class="list-group-item"><i class="fa fa-home"></i> <b> Study Cetner: </b><br> <br>
	                                </li>
	                                <li class="list-group-item"> <i class="fa fa-phone"></i> <b> Phone Numbers: </b><br> {{$person->phone_no.', '.$person->alternate_phone_no}}</li>
	                                <li class="list-group-item"> <i class="fa fa-envelope"></i> <b> e-Mail Address: </b><br> {{$person->email}}</li>
	                                <li class="list-group-item"> <i class="fa fa-user"></i> <b> State of Origin/LGA: </b><br> {{$person->getState->state .' - '.$person->getLga->lga_name}}</li>
	                                <li class="list-group-item"> <i class="fa fa-sitemap"></i> <b> Department: </b><br> {{$person->getNounInfos->getDept->dept_name}}</li>
	                                <li class="list-group-item"> <i class="fa fa-sitemap"></i> <b> Unit: </b><br> {{$person->getNounInfos->getUnit->unit_name}}</li>
	                                <li class="list-group-item"> <i class="fa fa-clock-o"></i> <b> In Service Since: </b><br> {{$from->format('d M, Y')}} ({{$from->diff($to)->y}}Yrs, {{$from->diff($to)->m}} Months)</li>
	                                <li class="list-group-item text-center" ></li>
	                            </ul>
	                        </div>
                           </section>
                        </div>
                    </section>
                </section>
            </aside>
            <aside class="bg-white">
            
                <section class="vbox">
                 <br>
                 <br>
                 <br>
                   
                    <section class="scrollable">
                    <div class="row collapse" id="editbranch">
                    <!-- include Edit person -->
			        </div>
		            <div class="row collapse" id="deactivate">
                    	<!-- include Deactivate person -->
		            </div>
		            <br>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" style="height: ; width: ">
						            <p>Study Center: <br> {{$person->getNounInfos->getBranch->branch_name}} </p>
						            </div>
						        </section>
                        	</div>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" align="right" style="height: ; width: ">
						                {!!DNS2D::getBarcodeHTML($person->surname, "QRCODE", 3,3);!!}
						            </div>
						        </section>
                        	</div>
                        <div class="col-md-12">
                        		<section class="panel panel-success">
						            <header class="panel-heading"> Personnel <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
						                
						            </div>
						        </section>
                        	</div>
                    </section>
                </section>
            </aside>
        </section>
    </section>
</section>
@endsection