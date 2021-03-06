@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    
    <header class="header bg-white b-b b-light">
        <p>{{$state->state}} state's profile 
            <div class="pull-right">
            <br>
                <!-- <button class="btn btn-xs btn-success" type="button" data-toggle="collapse" data-target="#email" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> Edit State</button> -->
                <!-- <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" data-target="#sms" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-times"> </i> Disable State</button> -->
                <!-- <button class="btn btn-info btn-xs" data-toggle="collapse" data-target="#leavesform" aria-expanded="false" aria-controls="collapseExample"> -->

                <br>
            </div>
        </p>
    </header>
    <section class="scrollable">
        <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r">
                <section class="vbox">
                    <section class="panel panel-default">
                        @if($state->status == 1)
                        <header class="panel-heading bg-primary dk no-border">
                        @elseif($state->status == 2)
                        <header class="panel-heading bg-info dk no-border">
                        @elseif($state->status == 3)
                        <header class="panel-heading bg-warning dk no-border">
                        @else
                        <header class="panel-heading bg-danger dk no-border">
                        @endif

                            <div class="clearfix">
                                <a href="#" class="pull-left thumb avatar b-4x m-r"> 
                                   <img src="{{asset('incs/images/seal.jpg')}}" class="img-circle"> 
                                </a>
                                <div class="clear">
                                    <div class="h4 m-t-xs m-b-xs text-white"> {{$state->state}} State<i class="fa fa-circle text-white pull-right text-xs m-t-sm"></i> </div> <small class="text-white">{{$state->getZone->zone_name}}</small> 
                                    <br> 
                                     {!!DNS1D::getBarcodeHTML('45785452238-NOUN', "C128A",1);!!}
                                </div>
                            </div>
                        </header>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="text-align: center;">{{strtoupper('State Statistics')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                   <tr>
                                       <td>Study Centers</td>
                                       <td>{{$state->getBranches->count()}}</td>
                                   </tr>
                                   <tr>
                                       <td>Indegenous Personnel</td>
                                       <td>{{$state->getPersonnel->count()}}</td>
                                   </tr>
                                   <tr>
                                       <td> Non Indegenous Personnel within the state</td>
                                       <td>{{$state->staffInState->count()}}</td>
                                   </tr>
                                   <tr>
                                       <td>Indegenous Professors</td>
                                       <td>500</td>
                                   </tr>

                                   <tr>
                                       <td>Total Professors in the state</td>
                                       <td>500</td>
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
                        <?php $states = \App\State::all(); $branches = \App\Branch::all(); ?>
                        <p class="h5 "><b>Employee Percentage Overall:</b> {{number_format(($state->getPersonnel->count()/$states->count())*100/100, 2)}}%<br>  </p> <br>
                        <p class="h5 "> <b>Study Center Percentage Overall: </b> {{number_format($state->getBranches->count()/$branches->count()*100, 2)}}%<br></p>
                        </div>
                    </section>
                </div>
                <div class="col-md-2    ">
                    <section class="panel ">
                        <div class="panel-body" align="right">
                            <center>{!!DNS2D::getBarcodeHTML($state->state, "QRCODE", 3,3);!!}    {{strtoupper($state->code)}}</center>
                        </div>
                    </section>
                </div>
             </section>
                <!-- Remaining content goes here! -->
                <section class="panel panel-default">
                    <header class="panel-heading bg-light">
                        <ul class="nav nav-tabs nav-white nav-justify">
                            <li class="active"><a href="#home" data-toggle="tab"> <i class="fa fa-home"></i> Home</a></li>
                            <li class=""><a href="#studyCenters" data-toggle="tab"> <i class="fa fa-building"></i> Study Centers</a></li>
                            <li class=""><a href="#indegenous" data-toggle="tab"><i class="fa fa-users"></i> Indegenous Personnel</a></li>
                            <li class=""><a href="#indegenousprofs" data-toggle="tab"><i class="fa fa-users"></i> Indegenous Professors</a></li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                 <div class="col-md-12">
                                        
                                    <div class="line line-dashed"></div>
                                </div>
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
                                        @foreach($state->getBranches as $branch)
                                            <tr>
                                                <td>{{$sn}}</td>
                                                <td width="42%"><a href="{{url('/branches/data/'.\Crypt::encrypt($branch->id))}}" class="link"> {{$branch->branch_name}}</a></td>
                                                <td align="center">{{number_format($branch->NounInfos->count(), 0)}}</td>
                                                <td align="center">{{@number_format(count($branch)/$branch->NounInfos->count() *100, 2)}} %</td>

                                                <td align="center">{{$branch->getDepts->count()}}</td>
                                                <td>{{$branch->email}}</td>
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
                                            @foreach($state->getPersonnel as $prsn)
                                                <tr>
                                                    <td>{{$sn}}</td>
                                                    <td>NOUN/{{$prsn->unique_id}}</td>
                                                    <td><a href="{{url('/pim/employees/data/'.\Crypt::encrypt($prsn->id))}}" class="link"> {{$prsn->title .' '.$prsn->surname . ' '.$prsn->first_name .' '.$prsn->middle_name}}</a></td>
                                                    <td>{{$prsn->phone_no}}</td>
                                                    <td>{{$prsn->email}}</td>
                                                    <td>{{$prsn->getState->code}}</td>
                                                    <td>{{isset($prsn->getLga) ? $prsn->getLga->lga_name : "Not set"}}</td>
                                                    <td>{{isset($prsn->getNOUNInfos->getScale) ? $prsn->getNOUNInfos->getScale->scale : "Not set"}}</td>
                                                </tr>
                                            <?php $sn++;?>
                                            @endforeach
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