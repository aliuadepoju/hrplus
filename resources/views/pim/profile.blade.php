@extends('layouts.masterpage')

<?php 
    $from = new DateTime($person->getNounInfos->date_of_entry);
    $dob = new DateTime($person->dob);
    $to   = new DateTime('today');

?>  
@section('content')
<section class="vbox">
    
    <header class="header bg-white b-b b-light">
        <p>{{$person->surname.' '.$person->first_name .' '.$person->middle_name}}'s profile 
            <!-- <div class="pull-right"> -->
            <!-- <br> -->
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  
                <div class="btn-group">
                    <button class="btn btn-warning btn-xs btn-flat ">Personnel Actions</button>
                    <button class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a class="" data-toggle="collapse" data-target="#edit" aria-expanded="false" aria-controls="collapseExample">Edit Records</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#cCenter" aria-expanded="false" aria-controls="collapseExample">Change Study Center</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#lga" aria-expanded="false" aria-controls="collapseExample">Change LGA</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#suspend" aria-expanded="false" aria-controls="collapseExample">Suspend Personnel</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#nok" aria-expanded="false" aria-controls="collapseExample">Update NOK</a></li>
                        <li class="divider"></li>
                        <li><a class="" data-toggle="collapse" data-target="#upload" aria-expanded="false" aria-controls="collapseExample">Upload Document</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#report" aria-expanded="false" aria-controls="collapseExample">Export Report</a></li>
                    </ul>
                </div>
                <button class="btn btn-xs btn-success" type="button" data-toggle="collapse" data-target="#email" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-envelope"> </i> Send e-Mail</button>
                <button class="btn btn-xs btn-dark" type="button" data-toggle="collapse" data-target="#sms" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-envelope-o"> </i> Send SMS</button>

                <a href="#" class="btn btn-info btn-xs"> <i class="fa fa-user"></i> My Appraisal </a> 
                
                <button class="btn btn-info btn-xs" data-toggle="collapse" data-target="#leavesform" aria-expanded="false" aria-controls="collapseExample">Leave Form</button>
                 <?php $fpath = public_path().'/incs/images/personnel/'.$person->id.'.png' ;?>
                @if(!file_exists($fpath))
                    <button class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#uploadImage" aria-expanded="false" aria-controls="collapseExample">Change Image</button>
                @endif
                 <br>

            <!-- </div> -->
        </p>
    </header>
    <section class="scrollable">
        <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r">
                <section class="vbox">
                    <section class="panel panel-default">
                    @if($person->status == 1)
                        <header class="panel-heading bg-primary dker no-border">
                    @elseif($person->status == 2)
                        <header class="panel-heading bg-info dk no-border">
                    @elseif($person->status == 3)
                        <header class="panel-heading bg-warning dk no-border">
                    @else
                        <header class="panel-heading bg-danger dk no-border">
                    @endif
                            <div class="clearfix">
                                <a href="#" class="pull-left thumb avatar b-3x m-r"> 
                                
                                    @if (file_exists($fpath))
                                        <img src="{{asset('incs/images/personnel/'.$person->id.'.png')}}" class="img-circle"> 
                                    @else
                                        <img src="{{asset('incs/images/personnel/no-pic.jpg')}}" class="img-circle"> 
                                    @endif
                                </a>
                                <div class="clear">
                                    <div class="h4 m-t-xs m-b-xs text-white"> {{$person->surname.' '.$person->middle_name. ' '.$person->first_name}} <i class="fa fa-circle text-white pull-right text-xs m-t-sm"></i> </div> <small class="text-muted">{{$person->getNounInfos->rank}}</small> 

                                    <br> 
                                </div>
                            </div>
                        </header>
                        <div class="list-group no-radius alt">
                            <ul class="list-group no-radius">
                                <li class="list-group-item"> <i class="fa fa-phone"></i> <b> Phone Numbers: </b><br> {{$person->phone_no.', '.$person->alternate_phone_no}}</li>
                                <li class="list-group-item"> <i class="fa fa-envelope"></i> <b> e-Mail Address: </b><br> {{$person->email}}</li>
                                <li class="list-group-item"> <i class="fa fa-user"></i> <b> State of Origin/LGA: </b><br> {{$person->getState->state}} &emsp;- &emsp; {{isset($person->getLga) ? $person->getLga->lga_name: "Not set"}}</li>
                                <li class="list-group-item"> <i class="fa fa-sitemap"></i> <b> Department: </b><br> {{$person->getNounInfos->getDept->dept_name}}</li>
                                <li class="list-group-item"> <i class="fa fa-sitemap"></i> <b> Unit: </b><br> {{$person->getNounInfos->getUnit->unit_name}}</li>
                                <li class="list-group-item"> <i class="fa fa-clock-o"></i> <b> In Service Since: </b><br> {{$from->format('d M, Y')}} ({{$from->diff($to)->y}}Yrs, {{$from->diff($to)->m}} Months)</li>
                                <li class="list-group-item"> <i class="fa fa-clock-o"></i> <b> Date of Birth: </b><br> {{$dob->format('d M, Y')}} ({{$dob->diff($to)->y}}Yrs, {{$dob->diff($to)->m}} Months)</li>
                                <li class="list-group-item"> <i class="fa fa-clock"></i> <b> Retirement by Birth: </b><br> precise date</li>
                                <li class="list-group-item"> <i class="fa fa-clock"></i> <b> Retirement by Employment: </b><br> precise date</li>
                            </ul>
                        </div>
                    </section>
                </section>
            </aside>
            <aside class="bg-white">
            <!-- Notification -->
            @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {!! session('flash_notification.message') !!}
                </div>
            @endif
            <!-- /Notification -->

             <!-- Page Options  -->
                <div class="row collapse" id="leavesform">
                    @include('pim.options.leaveForm')
                </div>
                <div class="row collapse" id="nok">
                    @include('pim.options.nok')
                </div>
                <div class="row collapse" id="lga">
                    @include('pim.options.editLGA')
                </div>
                <div class="row collapse" id="sms">
                    @include('pim.sms')
                </div>
                <div class="row collapse" id="cCenter">
                    @include('pim.options.editBranch')
                </div>
                <div class="row collapse" id="email">
                    @include('pim.email')
                </div>
                <div class="row collapse" id="upload">
                    @include('pim.documentCenter.personDocument')
                </div>
                <div class="row collapse" id="report">
                    @include('pim.reportCriteria')
                </div>
                <div class="row collapse" id="suspend">
                    @include('pim.options.disablePerson')
                </div>
                <div class="row collapse" id="edit">
                    @include('pim.options.edit')
                </div>
                <div class="row collapse" id="uploadImage">
                    @include('pim.options.uploadImage')
                </div>
                <div class="row collapse" id="sScale">
                    @include('pim.options.editSalaryScale')
                </div>
             <!-- /Page Options -->
             <section class="panel col-md-12">
                <div class="col-md-10">
                    <section class="panel ">
                        <div class="panel-body" style="height: ; width: ">
                        <p class="h5 "><b>Rank:</b> <br> {{$person->getNounInfos->rank}}  &emsp;&emsp;&emsp;&emsp;&emsp; <b>Salary Scale: &emsp;&emsp; {{isset($person->getNounInfos->getScale)? $person->getNounInfos->getScale->scale : "Not set"}} 

                        @if(!$person->getNounInfos->getScale)
                        <a class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#sScale" aria-expanded="false" aria-controls="collapseExample">Edit</a>
                        @else
                        @endif
                        </b></p> <br>
                        <p class="h5 "> <b>Study Center: </b><br>{{$person->getNounInfos->getBranch->branch_name}}</p>
                        </div>
                    </section>
                </div>
                <div class="col-md-2">
                    <section class="panel ">
                        <div class="panel-body" align="right" style="height: ; width: ">
                            {!!DNS2D::getBarcodeHTML($person->surname.' '.$person->first_name.' '.$person->middle_name, "QRCODE", 2,2);!!} NOUN/{{$person->unique_id}}
                        </div>
                    </section>
                </div>
             </section>
                <!-- Remaining content goes here! -->
                <section class="panel panel-default">
                    <header class="panel-heading bg-light">
                        <ul class="nav nav-tabs nav-white">
                            <li class="active"><a href="#home" data-toggle="tab"> <i class="fa fa-home"></i> Home</a></li>
                            <li class=""><a href="#qual" data-toggle="tab"> <i class="fa fa-certificate"></i> Qualifications & Dates</a></li>
                            <li class=""><a href="#salaryhistory" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> Promotions</a></li>
                            <li class=""><a href="#documentCenter" data-toggle="tab"><i class="fa fa-folder-open"></i> Doc. Center</a></li>
                            <li class=""><a href="#jobhistory" data-toggle="tab"> <i class="fa fa-file"></i> Job History</a></li>
                            <li class=""><a href="#leaves" data-toggle="tab"> <i class="fa fa-file-o"></i> Leaves</a></li>
                            <li class=""><a href="#disciplinary" data-toggle="tab"> <i class="fa fa-gavel"></i> Disciplinary Activities</a></li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                 <div class="col-md-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading"> Appraisal Center <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                                            <div class="pull-right">Total Questions: <b>65</b>, Total feedback replied: <b>45</b>, feedback left: <b>20</b>  </div> 
                                            </header>
                                            <div class="panel-body">
                                            <div class="panel-group m-b" id="accordion2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> Element #1  <small>Job Knowledge</small></a> </div>
                                                <div id="collapseOne" class="panel-collapse in">
                                                    <div class="panel-body text-sm">
                                                        <ul>
                                                            <li> <a href=""> How long have you been in the service of NOUN</a></li>
                                                            <li><a href=""> What training or development recommendations did you agree on?</a></li>
                                                        </ul> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo"> Element #2 <small>Team manship</small></a> </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="panel-body text-sm">
                                                        <ul>
                                                            <li> <a href=""> Do you play along with other members of your department/unit?</a></li>
                                                            <li> <a href=""> Do you always seek advice from other members of your unit to carryout certian task?</a></li>
                                                            <li> <a href=""> Are you comfortable working alone with the other members of your unit to carryout certian task?</a></li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree"> Element #3 <small>Leadership abilities</small></a> </div>
                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="panel-body text-sm"> 
                                                        <ul>
                                                            <li> <a href=""> what is the question?</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="qual">
                                <center><h3>Personnel Qualifications</h3></center>
                                    <div class="line line-dashed"></div>
                            </div>
                            <div class="tab-pane" id="jobhistory">
                                <!-- <div class="text-center wrapper"> </div> -->
                                @if($person->gender == 1)
                                <h4 align="center"> No Job history found. This personnel is still at his first call branch/study center.</h4>
                                 @else   
                                <h4 align="center"> No Job history found. This personnel is still at her first call branch/study center.</h4>
                                @endif    
                                <div class="line line-dashed"></div>
                            </div>

                            <div class="tab-pane" id="salaryhistory">
                                <div class="col-md-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> Promotions/Salary History <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                                        </header>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                @if(count($person->getPromotions) >0)
                                                <table class="table table-striped m-b-none" data-ride="datatables">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Unique Code</th>
                                                            <th>Type</th>
                                                            <th>Title</th>
                                                            <th>Issuing Authority </th>
                                                            <th>Expiry Date <small>*** if Any ***</small> </th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $sn = 1;?>
                                                    @foreach($person->getPromotions as $promo)
                                                        <tr>
                                                            <td>{{$sn}}</td>
                                                            <td><a href="{{url('/pim/employees/document/one/'.\Crypt::encrypt($promo->id))}}" class="link"> {{$promo->unique_code}}</a></td>
                                                            <td>{{$promo->id}}</td>
                                                            <td>{{$promo->title}}</td>
                                                            <td>{{$promo->issuing_authority}}</td>
                                                            <td>{{$promo->expiration}}</td>
                                                            <td>
                                                                @if($promo->status == 1)
                                                                <span class="label bg-primary">  Valid</span>
                                                                @else
                                                                <span class="label bg-danger">  Expired</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    <?php $sn++;?>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                @else
                                                <h4 align="center"> No promotion record(s) found for this personnel yet.</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>

                            <div class="tab-pane" id="documentCenter">
                                 <center><h3></h3></center>
                                <div class="col-md-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> Documents Center <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                                        </header>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                @if(count($person->getDocuments) >0)
                                                <table class="table table-striped m-b-none" data-ride="datatables">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Unique Code</th>
                                                            <th>Type</th>
                                                            <th>Title</th>
                                                            <th>Issuing Authority </th>
                                                            <th>Expiry Date <small>*** if Any ***</small> </th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $sn = 1;?>
                                                    @foreach($person->getDocuments as $docs)
                                                        <tr>
                                                            <td>{{$sn}}</td>
                                                            <td><a href="{{url('/pim/employees/document/one/'.\Crypt::encrypt($docs->id))}}" class="link"> {{$docs->unique_code}}</a></td>
                                                            <td>{{$docs->getParent->classification_name}}</td>
                                                            <td>{{$docs->title}}</td>
                                                            <td>{{$docs->issuing_authority}}</td>
                                                            <td>{{$docs->expiration}}</td>
                                                            <td>
                                                                @if($docs->status == 1)
                                                                <span class="label bg-primary">  Valid</span>
                                                                @else
                                                                <span class="label bg-danger">  Expired</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    <?php $sn++;?>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                @else
                                                <h4 align="center"> No document uploaded for this personnel yet.</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>

                            <div class="tab-pane" id="disciplinary">
                                
                                <center><h3></h3></center>
                                <div class="col-md-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> Disciplinary Activities <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                                        </header>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                               
                                                <h4 align="center"> No disciplinary action taken by the management against this personnel yet.</h4>
                                               
                                            </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>

                            <div class="tab-pane" id="leaves">
                                <center><h3></h3></center>
                                <div class="col-md-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> Leaves <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                                        </header>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                @if(count($person->getLeaves) >0)
                                                <table class="table table-striped m-b-none" data-ride="datatables">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Unique Code</th>
                                                            <th>Leave Type</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $sn = 1;?>
                                                    @foreach($person->getLeaves as $leaves)
                                                        <tr>
                                                            <td>{{$sn}}</td>
                                                            <td><a href="{{url('/pim/employees/leaves/'.$leaves->id)}}" class="link"> {{$leaves->unique_code}}</a></td>
                                                            <td>{{$leaves->getParent->type_name}}</td>
                                                            <td>{{$leaves->start_date}}</td>
                                                            <td>{{$leaves->end_date}}</td>
                                                            <td>
                                                                @if($leaves->status == 1)
                                                                 <span class="label bg-primary">  New</span>
                                                                @elseif($leaves->status == 2)
                                                                 <span class="label bg-info">Seen & Attended to avaiting approval</span>
                                                                @elseif($leaves->status == 3)
                                                                 <span class="label bg-warning">Cancelled</span>
                                                                @else
                                                                 <span class="label bg-success">Approved</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    <?php $sn++;?>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                @else
                                                <h4 align="center"> No leave applications made by thie personnel yet.</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
        </section>
    </section>
</section>
@endsection