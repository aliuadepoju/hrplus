@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>{{$salCat->category_name}}'s profile</p>
         
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
                                <div class="panel-body">
                                    <div class="clearfix text-center m-t">
                                        <div class="inline">
                                            <div class="thumb-lg"> <img src="{{asset('incs/images/hr_logobig.png')}}" class=""> </div>
                                            <hr>
                                            <div class="h4 m-t m-b-xs">{{$salCat->category_name}}</div> 
                                            <!-- <small class="text-muted m-b"><i class="fa fa-map-marker"></i> </small>   -->
                                        </div>
                                    </div>
                                </div>
                                @if($salCat->status == 1)
                                <footer class="panel-footer bg-info text-center">
                                @elseif($salCat->status == 2)
                                <footer class="panel-footer bg-warning text-center">
                                @else
                                <footer class="panel-footer bg-danger text-center">
                                @endif
                                    <div class="row pull-out">
                                        <div class="col-xs-6">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">{{$salCat->getScales->count()}}</span> <small class="text-muted">Salary Scales</small> </div>
                                        </div>

                                        <div class="col-xs-6">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">
                                                 @foreach($salCat->getScales as $scales)
                                                        @foreach($scales->getPersonnel as $person)
                                                        @endforeach
                                                    @endforeach
                                                    
                                                    @if($salCat->id == 1)
                                                        {{number_format(2429, 0)}}
                                                    @elseif($salCat->id == 2)
                                                        {{number_format(319, 0)}}
                                                    @else
                                                        {{number_format(0, 0)}}
                                                    @endif
                                            </span> <small class="text-muted">Staff</small> </div>
                                        </div>
                                    </div>
                                </footer>

                            </section>
                            <hr>
                        </div>
                        <div class="" align="center">
                        <br>
                            @role('hr-admin | administrator')
                            <button class="btn btn-xs btn-success" type="button" data-toggle="collapse" data-target="#editsalCat" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> Edit</button>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" data-target="#deactivate" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-times"> </i> Disable</button>
                            @endrole
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
                    <div class="row collapse" id="editsalCat">
                    <!-- include Edit salCat -->
                    @include('system.salary-scales.edit')
                    </div>
                    <div class="row collapse" id="deactivate">
                        <!-- include Deactivate salCat -->
                    @include('system.salary-scales.deactivate')
		            </div>
		            <br>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" style="height: ; width: ">
						            <p>Study Center: <br> {{$salCat->category_name}} </p>
						            </div>
						        </section>
                        	</div>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" align="right" style="height: ; width: ">
						                {!!DNS2D::getBarcodeHTML($salCat->id, "QRCODE", 3,3);!!}
						            </div>
						        </section>
                        	</div>
                        <div class="col-md-12">
                        		<section class="panel panel-success">
						            <header class="panel-heading"> Category Data <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
                                        <div class="p col-md-6">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Salary Scale</th>
                                                            <th style="text-align: center;">No of Personnel</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no = 1;?>
                                                    @foreach($salCat->getScales as $scale)
                                                        <tr>
                                                            <td>{{$no}}</td>
                                                            <td>{{$scale->scale}}</td>
                                                            <td align="Center">{{$scale->getPersonnel->count()}}</td>
                                                            <td>
                                                                @if($scale->status == 1)
                                                                    <span class="label bg-primary">Active</span>
                                                                @elseif($scale->status == 2)
                                                                    <span class="label bg-info">Suspended</span>
                                                                @else
                                                                    <span class="label bg-danger">Inactive</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    
                                                    <?php $no++;?>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="p col-md-6">
                                            <div class="table-responsive">
                                                <table class="table" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Personnel</th>
                                                            <th>Scale</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no = 1;?>
                                                    @foreach($salCat->getScales as $scales)
                                                        @foreach($scales->getPersonnel as $person)
                                                        @foreach($person->personnels as $prsn)
                                                        <tr>
                                                            <td>{{$no}}</td>
                                                            <td><a href="{{url('/pim/employees/data/'. $prsn->id)}}">{{$prsn->surname. ' ' .$prsn->first_name.' '.$prsn->middle_name}}</a></td>
                                                            <td>{{$prsn->getNounInfos->getScale ? $prsn->getNounInfos->getScale->scale : "Not set"}}</td>
                                                        </tr>
                                                    <?php $no++;?>
                                                    @endforeach
                                                        @endforeach
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
						                
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