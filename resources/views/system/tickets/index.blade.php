
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> System</a></li>
            <li class="active">Tickets</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> System Ticketing  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
            	<div class="pull-right">
	            @if(count($tickets) > 0)
		            <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/doPDF')}}">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
                    @endif
		        </div>
	        </header>
	        <div class="panel-body">
	            <div class="table-responsive">
	            @if(count($tickets) > 0)
	                <table class="table m-b-none" data-ride="datatables" id="datatables" >
	                    <thead>
	                        <tr>
	                           <th>#</th>
                                <th>Dated</th>
                                <th>Ticket #</th>
                                <th>Ticket Title</th>
                                <th>Category</th>
                                <th>Priority</th>
                                <th>Study Center</th>
                                <th>Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php $sn = 1;?>
	                    @foreach($tickets as $ticket)
	                    	<tr>
	                    		<td>{{$sn}}</td>
	                    		<td>{{date_format($ticket->created_at, "jS F, Y" )}}</td>
	                    		<td><a href="{{url('/system/tickets/view/'.\Crypt::encrypt($ticket->id))}}" class="link">HRPLUS/TCKT/{{$ticket->serial}}</a></td>
	                    		<td><a href="{{url('/system/tickets/view/'.\Crypt::encrypt($ticket->id))}}" class="link"> {{$ticket->title}}</a></td>
	                    		<td>{{$ticket->getCat->name}}</td>
	                    		<td>
	                    			@if($ticket->priority == 1)
	                    			<span class="label label-danger">High demanding issue </span>
	                    			@elseif($ticket->priority == 2)
	                    			<span class="label label-info">Medium demanding Issue </span>
	                    			@elseif($ticket->priority == 3)
	                    			<span class="label label-warning">Needing Urgent attention </span>
	                    			@elseif($ticket->priority == 4)
	                    			<span class="label label-inverse">Needing Immediate attention </span>
									@else 
	                    			<span class="label label-danger">ASAP & Instant attention </span>
									@endif
	                    		</td>
	                    		
	                    		<td>{{$ticket->getCreator->getBranch->branch_name}}</td>
	                    		<td>{{$ticket->getStatus->name}}</td>
	                    	</tr>
	                    <?php $sn++;?>
	                    @endforeach
	                    </tbody>
	                </table>
	                @else
	                <h4 align="Center">There are no ticket(s) on the system.</h4>
	                @endif
	            </div>
            </div>
        </section>
    </section>
</section>

@endsection