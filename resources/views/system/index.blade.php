
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">System Preference</li>
        </ul>
        <div class="m-b-md">
            @if(Session::has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Thank you.</strong> You successfully added <a href="#" class="alert-link">{{Session::get('message')}}</a>. 
            </div> 
            @endif
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> System Preference <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
            </header>
            <div class="panel-body">
                <div class="row tab-v3">
					<div class="col-sm-3">
						<ul class="nav nav-stacked">
							<li class="active"><a href="#home-2" data-toggle="tab" aria-expanded="true"><i class="fa fa-home"></i> Home</a></li>
							<li class=""><a href="#license" data-toggle="tab" aria-expanded="false"><i class="fa fa-credit-card"></i> License</a></li>
							<li class=""><a href="#tickets" data-toggle="tab" aria-expanded="false"><i class="fa fa-folder-open"></i> Tickets</a></li>
							<li class=""><a href="#stakeholders" data-toggle="tab" aria-expanded="false"><i class="fa fa-users"></i> Tickets Stakeholders</a></li>
							<li class=""><a href="#settings-2" data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> Pref. Settings</a></li>
							<li class=""><a href="#settings-2" data-toggle="tab" aria-expanded="false"><i class="fa fa-sitemap"></i> Designations Setup</a></li>
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="tab-content">
							<div class="tab-pane fade active in" id="home-2">
								<h4>Heading Sample 1</h4>
								<p align="justify">Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum <strong>ivamus imperdiet</strong> condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc.</p>
								<p align="justify">Pellentesque <strong>fermentum vivamus</strong> imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac felis consectetur id. Donec eget orci metusvivamus imperdiet.</p>
								<p align="justify">Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum <strong>ivamus imperdiet</strong> condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc.</p>
								
								<p align="justify">Pellentesque <strong>fermentum vivamus</strong> imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac felis consectetur id. Donec eget orci metusvivamus imperdiet.</p>
								<p align="justify">Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum <strong>ivamus imperdiet</strong> condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc.</p>
								<p align="justify">Pellentesque <strong>fermentum vivamus</strong> imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac felis consectetur id. Donec eget orci metusvivamus imperdiet.</p>
							</div>
							<div class="tab-pane fade" id="license">
								<h4 align="center">{{strtoupper('System License(s)')}}</h4><br>
								<!-- <p align="justify">Your licence(s) data are detailed below: </p> -->
								<div class="table-responsive">
								@if(count($license)> 0)
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>License Type</th>
												<th>License Key</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th>Validity</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php $no = 1; ?>
										@foreach($license as $lic)
											<tr>
												<td>{{$no}}</td>
												<td>{{$lic->getType->type_name}}</td>
												<td>{{$lic->license_key}}</td>
												<td>{{$lic->start_date}}</td>
												<td>{{$lic->start_date}}</td>
												<td>
													<?php 
													    $from = new DateTime($lic->start_date);
													    $end = new DateTime($lic->end_date);
													    $to   = new DateTime('today');
													?>
													 <!-- {{$from->diff($to)->y}}Yrs, {{$from->diff($to)->m}} Months, --> {{$from->diff($to)->d}} Days 
												</td>
												<td>
													@if($lic->status == 1)
													<span class="label label-success">Active</span>
													@elseif($lic->status == 2)
													<span class="label label-warning">Trial Period</span>
													@else
													<span class="label label-danger">Expired</span>
													@endif
												</td>
												<td>
												@if($lic->status == 3)
													<a href="#" class="btn btn-info btn-xs">Renew License</a>
												@else
													<a href="#" class="btn btn-primary btn-xs">Extend License</a>
												@endif
												</td>
											</tr>
											<?php $no++; ?>
										@endforeach
										</tbody>
										@else
									<p class="h3" align="center"> You have no license key or file associated with this system. You are hereby encouraged to buy a license as your trier period expires in 14 days from now. Thank you</p>
									@endif
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="messages-2">
								<h4>Heading Sample 3</h4>
								<p><img alt="" class="pull-right rgt-img-margin img-width-200" src="assets/img/main/img13.jpg"> <strong>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id.</strong> Donec eget orci metus, Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, consectetur id. Donec eget orci metus, ac adipiscing nunc. <strong>Pellentesque fermentum</strong>, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper.</p>
							</div>
							<div class="tab-pane fade" id="settings-2">
								<img alt="" class="pull-left lft-img-margin img-width-200" src="assets/img/main/img10.jpg">
								<h4>Heading Sample 4</h4>
								<p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec eget orci metus, <strong>ac adipiscing nunc.</strong> Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac <strong>interdum ullamcorper.</strong></p>
							</div>

							<div class="tab-pane fade" id="tickets">
								<h4 align="center">{{strtoupper('System Tickets')}}</h4>
								<!-- <p align="justify">Your licence(s) data are detailed below: </p> -->
								<br>
								<div class="table-responsive">
								@if(count($tickets) > 0)
									<table class="table">
										<thead>
				                            <tr>
				                                <th>#</th>
				                                <th>Ticket #</th>
				                                <th>Ticket Title</th>
				                                <th>Branch</th>
				                                <th>User</th>
				                                <th>Category</th>
				                                <th>Priority</th>
				                                <th>Status</th>
				                            </tr>
				                        </thead>
										<tbody>
										<?php $count = 1; ?>
				                           @foreach($tickets as $ticket)
				                            <tr>
				                                <td>{{$count}}</td>
				                                <td>{{$ticket->serial}}</td>
				                                <td><a href="{{url('/system/tickets/view/'.\Crypt::encrypt($ticket->id))}}" style="color: #369;"><b>{{$ticket->title}}</b></a></td>
				                                <td align="left">{{$ticket->getCreator->getBranch->branch_name}}</td>
				                                <td align="left">{{$ticket->getCreator->surname.' '.$ticket->getCreator->first_name.' '.$ticket->getCreator->middle_name}}</td>
				                                <td>{{$ticket->getCat->name}}</td>
				                                <td class="">
				                                    @if($ticket['priority'] == 1)
				                                        <span class="">Normal Issue</span>
				                                    @elseif($ticket['priority'] == 2)
				                                        <span class="">Standard Issue</span>
				                                     @elseif($ticket['priority'] == 3)
				                                        <span class="">Needing Urgent Attention</span>
				                                         @elseif($ticket['priority'] == 4) 
				                                        <span class="">Immediate Attention</span>
				                                        @elseif($ticket['priority'] == 5) 
				                                        <span class="">Instant Integration</span>
				                                    @endif
				                                </td>
				                                <td class="">
				                                    @if($ticket['status'] == 1)
				                                        <span class="badge badge-info">Open Ticket</span>
				                                    @elseif($ticket['status'] == 2)
				                                        <span class="badge badge-inverse">Assigned Ticket</span>
				                                     @elseif($ticket['status'] == 3)
				                                        <span class="badge badge-warning">Awaiting Test</span>
				                                         @elseif($ticket['status'] == 4) 
				                                        <span class="badge badge-warning">Passed Testing</span>
				                                        @elseif($ticket['status'] == 5) 
				                                        <span class="badge badge-success">Ticket Closed</span>
				                                    @endif
				                                </td>
				                            </tr>
				                            <?php $count++; ?>
				                           @endforeach
										</tbody>
									</table>
									@else
									<p class="h3" align="center"> No Ticket has been submited on the system. Thank you</p>
									@endif
								</div>
							</div>

							<div class="tab-pane fade" id="stakeholders">
								<h4>Ticket Stakeholders</h4>
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Full Names</th>
											<th>Phone No</th>
											<th>e-Mail Add.</th>
											<th>Tickets Staked In</th>
										</tr>
									</thead>
									<tbody>
									<?php $no = 1; ?>
									@foreach($stakeholders as $stkholder)
										<tr>
											<td>{{$no}}</td>
											<td>{{$stkholder->surname.' '.$stkholder->other_names}}</td>
											<td>{{$stkholder->phone_no}}</td>
											<td>{{$stkholder->email}}</td>
											<td>
												@foreach($stkholder->tickets as $holderT)
													<ul>
														<li><a href="{{url('/system/tickets/view/'.\Crypt::encrypt($holderT->getTicket->id))}}">{{$holderT->getTicket->title}}</a><br></li>
													</ul>
												@endforeach
											</td>
										</tr>
									<?php $no++; ?>
									@endforeach
									</tbody>
									
								</table>
							</div>

						</div>
					</div>
				</div>
            </div>
        </section>
    </section>
</section>

@endsection