@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>{{$ticket->title}}'s profile</p>
         
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
                                            <div class="h4 m-t m-b-xs"></div> 
                                            <!-- <small class="text-muted m-b"><i class="fa fa-map-marker"></i> </small>   -->
                                        </div>
                                    </div>
                                </div>
	                                @if($ticket->status == 4)
	                                <footer class="panel-footer bg-primary text-center">
	                                @elseif($ticket->status == 3)
	                                <footer class="panel-footer bg-info text-center">
	                                @elseif($ticket->status == 2)
	                                <footer class="panel-footer bg-warning text-center">
	                                @else
	                                <footer class="panel-footer bg-danger text-center">
	                                @endif
                                    <div class="row pull-out">
                                        <div class="col-xs-12">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">{{$ticket->getCat->name}}</span> <small class="text-muted">Ticket Category</small> </div>
                                        </div>
                                    </div>

                                </footer>

                            </section>
                            <hr>
                            <div class="" align="center">
                            	 @role('administrator|maintenance-admin')
                            	 @if($ticket->status !== 4 )
                            	 @if(isset($ticket->getAssignedUser))
				                    <button class="btn btn-xs btn-warning" type="button" data-toggle="collapse" data-target="#assgignT" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-user"> </i> Re-Assign Ticket</button>
				                 @else
				                    <button class="btn btn-xs btn-warning" type="button" data-toggle="collapse" data-target="#assgignT" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-user"> </i> Assign Ticket</button>
				                 @endif

				                    <button class="btn btn-xs btn-info" type="button" data-toggle="collapse" data-target="#addStakeholder" aria-expanded="false" aria-controls="collapseExample2"> <i class="fa fa-user"> </i> Add Stakeholder</button>
				                    <br><br>
				                    <button class="btn btn-xs btn-primary btn-block" type="button" data-toggle="collapse" data-target="#processT" aria-expanded="false" aria-controls="collapseExample2"> <i class="fa fa-cogs"> </i> Process Ticket</button>
				                    <hr>
				                    @if($ticket->status !== 3)
				                    @else
				                    <button class="btn btn-xs btn-success btn-block" type="button" data-toggle="collapse" data-target="#closeT" aria-expanded="false" aria-controls="collapseExample2"> <i class="fa fa-check"> </i> Close Ticket</button>
				                    @endif
				                    @else
				                    <button class="btn btn-xs btn-success " type="button" data-toggle="collapse" data-target="#reopenT" aria-expanded="false" aria-controls="collapseExample2"> <i class="fa fa-question-circle"> </i> Re-Open Ticket</button>
				                    @endif
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
			            <br>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" style="height: ; width: ">
                                    	<table class="table">
	                                    	<thead>
	                                    		<tr>
	                                    		<th colspan="2" style="text-align: center;">TICKET DATA</th>
	                                    		</tr>
	                                    	</thead>
	                                    	<tbody>
												<tr>
	                                    			<td>Title:</td>
	                                    			<td>{{$ticket->title}}</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td>Branch:</td>
	                                    			<td><strong>{{$ticket->getCreator->getBranch->branch_name}}</strong></td>
	                                    		</tr>
												<tr>
	                                    			<td>Dated:</td>
	                                    			<td><strong>{{date_format($ticket->created_at, "jS F, Y" )}}</strong></td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td>Status</td>
	                                    			<td>{{$ticket->getStatus->name}}</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td>Description</td>
	                                    			<td><p>{{$ticket->description}}</p></td>
	                                    		</tr>
	                                    	</tbody>
                                    	</table>
						            </div>
						        </section>
                        	</div>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" align="right" style="height: ; width: ">
						                {!!DNS2D::getBarcodeHTML($ticket->id, "QRCODE", 8,8);!!}
						            </div>
						        </section>
                        	</div>
                        <div class="col-md-12">
                        	<div class="row collapse" id="assgignT">
					            @include('system.tickets.modals.assign')
					        </div>
					        <div class="row collapse" id="addStakeholder">
					            @include('system.tickets.modals.addStakeholder')
					        </div>
					        <div class="row collapse" id="processT">
					            @include('system.tickets.modals.process')
					        </div>
					        <div class="row collapse" id="closeT">
					            @include('system.tickets.modals.close')
					        </div>
					        <div class="row collapse" id="reopenT">
					            @include('system.tickets.modals.re-open')
					        </div>
                        		<section class="panel panel-success">
						            <header class="panel-heading"> Ticket Advance Data <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
                                        <div class="p col-md-12">
                                        
	                                        <div class="col-md-6">
			                                    @if(count($ticket->getStakeholders) > 0)
	                                         	<table class="table">
			                                    	<thead>
			                                    		<tr>
			                                    			<th colspan="3" style="text-align: center;">TICKET STAKEHOLDERS</th>
			                                    		</tr>
			                                    		<tr>
			                                    			<th>#</th>
			                                    			<th>Name</th>
			                                    			<th>Phone No.</th>
			                                    		</tr>
			                                    	</thead>
			                                    	<tbody>
			                                    	<?php $no = 1; ?>
														@foreach($ticket->getStakeholders as $stakeH)
														<tr>
			                                    			<td>{{$no}}</td>
			                                    			<td><strong>{{$stakeH->getStakeholder->surname.' '.$stakeH->getStakeholder->other_names}}</strong></td>
			                                    			<td><strong>{{$stakeH->getStakeholder->phone_no}}</strong></td>
			                                    		</tr>
			                                    		<?php $no++; ?>
			                                    		@endforeach
			                                    	</tbody>
			                                    </table>
	                                    		@else
	                                    		<h5 align="center"><br><br><br> No stakeholder(s) on this ticket. Add one or more for efficient management of this ticket for quick response.</h5>
	                                    		@endif
	                                        </div>

	                                        <div class="col-md-6">
	                                         	<table class="table">
			                                    	<thead>
			                                    		<tr>
			                                    		<th colspan="2" style="text-align: center;">TICKET ASSIGNEMT</th>
			                                    		</tr>
			                                    	</thead>
			                                    	<tbody>
														<tr>
			                                    			<td>Assigned To:</td>
			                                    			<td><strong>{{isset($ticket->getAssignedUser) ? $ticket->getAssignedUser->surname. ' '.$ticket->getAssignedUser->first_name. ' '.$ticket->getAssignedUser->middle_name : "Not Assgigned to user yet"}}</strong></td>
			                                    		</tr>
			                                    		<tr>
			                                    			<td>Assigned On:</td>
			                                    			<td><strong>{{isset($ticket->date_assigned) ? $ticket->date_assigned : "Not set"}}</strong></td>
			                                    		</tr>
														<tr>
			                                    			<td>Assigned By:</td>
			                                    			<td><strong>{{isset($ticket->getAssignedBy) ? $ticket->getAssignedBy->surname. ' '.$ticket->getAssignedBy->first_name. ' '.$ticket->getAssignedBy->middle_name : "Not set"}}</strong></td>
			                                    		</tr>
			                                    		<tr>
			                                    			<td>Expected Delivery:</td>
			                                    			<td><strong>{{isset($ticket->expected_delivery) ? $ticket->expected_delivery.' Days' : "Not set"}}</strong></td>
			                                    		</tr>
			                                    	</tbody>
			                                    </table>
	                                        </div>   
                                        </div>
						            </div>
						        </section>

						        <section class="panel">
						            <!-- <header class="panel-heading"> Ticket Processed Data <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>  -->
						            </header>
						            <div class="panel-body">
                                        <div class="p col-md-12">
                                        @if(count($ticket->getProcesses) > 0)
                                         	<table class="table">
		                                    	<thead>
		                                    		<tr>
		                                    		<th colspan="5" style="text-align: center;">TICKET PROCESSES</th>
		                                    		</tr>
		                                    		<tr>
		                                    			<th>#</th>
		                                    			<th>Dated</th>
		                                    			<th>User</th>
		                                    			<th>Action</th>
		                                    			<th>Status</th>
		                                    		</tr>
		                                    	</thead>
		                                    	<tbody>
		                                    		<?php $no = 1 ?>
			                                    	@foreach($ticket->getProcesses as $tProcess)
														<tr>
															<td>{{$no}}</td>
															<td>{{date_format($tProcess->created_at, "jS F, Y")}}</td>
															<td>{{$tProcess->getUser->surname.' '.$tProcess->getUser->first_name.' '.$tProcess->getUser->middle_name}}</td>
															<td>{{$tProcess->action}}</td>
															<td>{{$tProcess->getStat->name}}</td>
														</tr>
													<?php $no++ ?>
			                                    	@endforeach
		                                    	</tbody>
		                                    </table>
		                                    @else
		                                    <h5 align="center"><br> No processes on this ticket yet. You can either assign the ticket to a service desk or a developer first.</h5>
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