@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <?php $persons = \App\Personnel::all(); ?>
    <header class="header bg-white b-b b-light">
        <p>{{$zone->zone_name}}'s profile 
            <div class="pull-right">
            	<br><br>
            </div>
        </p>
    </header>
    <section class="scrollable">
        <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r">
                <section class="vbox">
                    <section class="panel panel-default">
                        @if($zone->status == 1)
                        <header class="panel-heading bg-primary dk no-border">
                        @elseif($zone->status == 2)
                        <header class="panel-heading bg-info dk no-border">
                        @elseif($zone->status == 3)
                        <header class="panel-heading bg-warning dk no-border">
                        @else
                        <header class="panel-heading bg-danger dk no-border">
                        @endif

                            <div class="clearfix">
                                <a href="#" class="pull-left thumb avatar b-4x m-r"> 
                                   <img src="{{asset('incs/images/seal.jpg')}}" class="img-circle"> 
                                </a>
                                <div class="clear">
                                    <div class="h4 m-t-xs m-b-xs text-white"> {{$zone->zone_name}} <i class="fa fa-circle text-white pull-right text-xs m-t-sm"></i> </div> <small class="text-white">{{$zone->code}}</small> 
                                    <br> 
                                     {!!DNS1D::getBarcodeHTML('45785452239-NOUN', "C128A",1);!!}
                                </div>
                            </div>
                        </header>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="text-align: center;">{{strtoupper('Zonal Statistics')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                   <tr>
                                       <td>States</td>
                                       <td>{{$zone->getStates->count()}}</td>
                                   </tr>
                                   <tr>
                                       <td>Study Centers</td>
                                       <td>
                                      		50
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>Indegenous Personnel</td>
                                       <td>{{number_format('1103',0)}}</td>
                                   </tr>
                                   <tr>
                                       <td> Non Indegenous Personnel within the Zone</td>
                                       <td>89</td>
                                   </tr>
                                   <tr>
                                       <td>Indegenous Professors</td>
                                       <td>30</td>
                                   </tr>
                               </tbody>   
                        </table>
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

                <div class="row collapse" id="editState">
                    <!-- include edit page -->
                </div>
                <div class="row collapse" id="disableState">
                    <!-- include disable page -->
                </div>
             <!-- Page Options  -->
             <!-- /Page Options -->
             <section class="panel col-md-12">
                <div class="col-md-10">

                <br><br>
                
                    <section class="panel ">
                        <div class="panel-body" style="height: ; width: ">
                        <?php $zones = \App\State::all(); $branches = \App\Branch::all(); ?>
                        <p class="h5 "><b>Employee Percentage Overall:</b> 1%<br>  </p> <br>
                        <p class="h5 "> <b>Study Center Percentage Overall: </b> 2%<br></p>
                        </div>
                    </section>
                </div>
                <div class="col-md-2    ">
                    <section class="panel ">
                        <div class="panel-body" align="right">
                            <center>{!!DNS2D::getBarcodeHTML($zone->zone_name, "QRCODE", 3,3);!!}     {{strtoupper($zone->code)}}</center>
                        </div>
                    </section>
                </div>
             </section>
                <!-- Remaining content goes here! -->
                <section class="panel panel-default">
                    <header class="panel-heading bg-light">
                        <ul class="nav nav-tabs nav-white nav-justify">
                            <li class="active"><a href="#home" data-toggle="tab"> <i class="fa fa-home"></i> Home</a></li>
                            <li class=""><a href="#states" data-toggle="tab"> <i class="fa fa-sitemap"></i> States</a></li>
                            <li class=""><a href="#studyCenters" data-toggle="tab"> <i class="fa fa-file"></i> Study Centers</a></li>
                            <li class=""><a href="#indegenous" data-toggle="tab"><i class="fa fa-users"></i> Indegenous Personnel</a></li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                 <div class="col-md-12">
                                        
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="states">
                                <h3>States</h3>
                                <div class="table-responsive">
                                    <table class="table table m-b-none" data-ride="datatables">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>State Name </th>
                                                <th>Personnel</th>
                                                <th>Percent</th>
                                                <th>Study Centers</th>
                                                <th>Percentage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $sn = 1;?>
                                        @foreach($zone->getStates as $state)
                                            <tr>
                                                <td>{{$sn}}</td>
                                                <td width="42%"><a href="{{url('/state/data/'.\Crypt::encrypt($state->id))}}" class="link"> {{$state->state}}</a></td>
                                                <td align="center">{{$state->getPersonnel->count()}}</td>
                                                <td align="center">{{number_format($state->getPersonnel->count()/$persons->count()*100, 2)}}</td>
                                                <td align="center">{{$state->getBranches->count()}}</td>
                                                <td align="center">12.1%</td>
                                            </tr>
                                        <?php $sn++;?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            	<div class="line line-dashed"></div>
                            </div>

                            <div class="tab-pane" id="studyCenters">
                                <h3>Study Centers</h3>
                                <div class="table-responsive">
                                    <table class="table table m-b-none" data-ride="datatables">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Branch Name </th>
                                                <th>Personnel</th>
                                                <th>Percent</th>
                                                <th>Departments</th>
                                                <th>e-Mail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $sn = 1;?>
                                        @foreach($zone->getStates as $state)
                                            <tr>
                                                <td>{{$sn}}</td>
                                                <td width="42%"><a href="{{url('/branches/data/'.\Crypt::encrypt($state->id))}}" class="link"> {{$state->state}}</a></td>
                                                <td align="center">{{$state->getPersonnel->count()}}</td>
                                                <td align="center">{{number_format($state->getPersonnel->count()/$persons->count()*100, 2)}}</td>
                                            </tr>
                                        <?php $sn++;?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            	<div class="line line-dashed"></div>
                            </div>


                            <div class="tab-pane" id="indegenous">
                                <div class="col-md-12">
                                   <div class="table-responsive">
                                        <table class="table m-b-none" data-ride="datatables" >
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Staff No</th>
                                                    <th>Full Names</th>
                                                    <th>Phone No</th>
                                                    <th>e-Mail</th>
                                                    <th>State</th>
                                                    <th>LGA</th>
                                                    <th>Sal. Scale</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $sn = 1;?>


                                               
                                            <?php $sn++;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>

                            <div class="tab-pane" id="indegenousprofs">
                                 <center><h3></h3></center>
                                <div class="col-md-12">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
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