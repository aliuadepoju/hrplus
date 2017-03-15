@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>{{$branch->branch_name}}'s profile</p>
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
                                            <div class="h4 m-t m-b-xs">{{$branch->branch_name}}</div> 
                                            <small class="text-muted m-b"><i class="fa fa-map-marker"></i> {{$branch->address}}</small> 
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer bg-info text-center">
                                    <div class="row pull-out">
                                        <div class="col-xs-4">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">{{$branch->getStaff->count()}}</span> <small class="text-muted">Staff</small> </div>
                                        </div>
                                        <div class="col-xs-4 dk">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">{{$branch->getDepts->count()}}</span> <small class="text-muted">Depts.</small> </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="padder-v"> 
                                            <span class="m-b-xs h3 block text-white">
                                            @foreach($branch->getDepts as $depts)
					                        	@foreach($depts->getUnits as $dptUnits)
							                		{{ $dptUnits ? $dptUnits->count() : "Nil" }} 
					                        	@endforeach
					                        @endforeach
                                            </span> <small class="text-muted">Units</small> </div>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                            <hr>
                            <div class="text-uc text-sm text-muted" align="center">
                            	 @if($branch->status == 1)
                                    <span class="label bg-primary">  Active</span>
                                    @else
                                    <span class="label bg-danger"></i> Inactive</span>
                                    @endif
                                    <hr>

                            </div>
                            <div class="" align="center">
                            	 @role('hr-admin | administrator')
				                    <button class="btn btn-xs btn-warning" type="button" data-toggle="collapse" data-target="#editbranch" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> Edit Center</button>
				                    <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" data-target="#deactivate" aria-expanded="false" aria-controls="collapseExample2"> <i class="fa fa-times"> </i> Deactivate Center</button>
				                @endrole
                            </div>
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
			             @include('branch.edit')
			        </div>
		            <div class="row collapse" id="deactivate">
			             @include('branch.deactivate')
		            </div>
		            <br>
                    	<div class="col-md-6">
                    		<section class="panel panel-default">
					            <header class="panel-heading">Branch Departments <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
					            </header>
					            <div class="panel-body">
					            @if(count($branch->getDepts) > 0)
					                <div class="table-responsive">
					                    <table class="table table-striped m-b-none" data-ride="">
					                        <thead>
					                            <tr>
					                                <th>S/N</th>
					                                <th>Department </th>
					                                <th>Status</th>
					                            </tr>
					                        </thead>
					                        <tbody>
					                        <?php $sn = 1;?>
					                        @foreach($branch->getDepts as $dept)
					                            <tr>
					                                <td>{{$sn}}</td>
					                                <td><a href="#" class="link"> {{$dept->dept_name}}</a></td>
					                                <td>
					                                    @if($dept->status == 1)
					                                    <span class="label bg-primary">Active</span>
					                                    @else
					                                    <span class="label bg-danger">Inactive</span>
					                                    @endif
					                                </td>
					                            </tr>
					                        <?php $sn++;?>
					                        @endforeach
					                        </tbody>
					                    </table>
					                </div>
					                @else
					                <h5>No Departments found for <strong>{{$branch->branch_name}}</strong>. </h5>
					                @endif
					            </div>
					        </section>
                    	</div>
                    	<div class="col-md-6">
                    		<section class="panel panel-default">
					            <header class="panel-heading">Branch Units <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
					            </header>
					            <div class="panel-body">
					                <div class="table-responsive">
					                @if(count($branch->getDepts) > 0)
					                    <!-- <table class="table table-striped m-b-none" data-ride="datatables"> -->
					                        <thead>
					                            <tr>
					                                <th>S/N</th>
					                                <th>Units</th>
					                                <th>Status</th>
					                            </tr>
					                        </thead>
					                        <tbody>
					                        <?php $sn = 1;?>
					                        @foreach($branch->getDepts as $depts)
					                        	@foreach($depts->getUnits as $dptUnits)
							                        <tr>
							                        	<td>{{$sn}}</td>
														<td>{{$dptUnits->unit_name}}</td>
							                        	<td>
							                        	 	@if($dptUnits->status == 1)
						                                   		<span class="label bg-primary">Active</span>
						                                    @else
						                                    	<span class="label bg-danger">Inactive</span>
						                                    @endif
						                                </td>
							                        </tr>
					                        	<?php $sn++;?>
					                        	@endforeach
					                        @endforeach
					                        </tbody>
					                    </table>
					                    @else
					                    <h5>No Units found for <strong>{{$branch->branch_name}}</strong></h5>
					                    @endif
					                </div>
					            </div>
					        </section>
                    	</div>
                        <div class="col-md-12">
                        		<section class="panel panel-success">
						            <header class="panel-heading"> Personnel <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
						                <div class="table-responsive">
						                @if(count($branch->NounInfos) > 0)
						                   <table class="table table-striped m-b-none" data-ride="datatables">
						                    <!-- <table class="table table-striped m-b-none" id="datatable"> -->
						                        <thead>
							                        <tr>
							                            <th>S/N</th>
							                            <th>Staff No</th>
							                            <th>Full Name</th>
							                            <th>Phone No</th>
							                            <th>State</th>
							                            <th>LGA</th>
							                            <th>Sal. Scale</th>
							                        </tr>
							                    </thead>
						                        <tbody>
						                        <?php $no = 1;?>
						                        @foreach($branch->NounInfos as $personnel)
							                        <tr>
							                        	@foreach($personnel->personnels as $person)
							                        		<td>{{$no}}</td>
															<td>NOUN/{{$person->unique_id}}</td>
															<td> <a href="{{url('/pim/employees/data/'.$person->id)}}">{{$person->surname.' '.$person->first_name.' '.$person->middle_name}}</a></td>
															<td>{{$person->phone_no}}</td>
															<td>{{$person->getState->state}}</td>
	                    									<td>{{isset($person->getLga) ? $person->getLga->lga_name : "Not set"}}</td>
															<td>{{$person->getNounInfos->getScale ? $person->getNounInfos->getScale->scale : "Not set"}}</td>
							                        	@endforeach
							                        </tr>
							                    <?php $no++;?>
						                        @endforeach
						                        
						                        </tbody>
						                    </table>
						                    @else
						                    <p class="h5" align="center">No personnel found for <b>{{$branch->branch_name}}</b></p>
						                    @endif
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