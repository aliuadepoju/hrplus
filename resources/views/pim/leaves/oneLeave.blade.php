@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>{{$leave->getPersonnel->surname.' '.$leave->getPersonnel->firstname.' '.$leave->getPersonnel->middle_name}} Leave's history</p>
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
                                            <div class="thumb-lg"> <img src="{{asset('incs/images/personnel/'.$leave->getPersonnel->id.'.jpg')}}" class=""> </div>
											<hr>
                                            <div class="h4 m-t m-b-xs">{{$leave->getPersonnel->surname.' '.$leave->getPersonnel->firstname.' '.$leave->getPersonnel->middle_name}}'s</div> <small class="text-muted m-b"> {{$leave->getPersonnel->rank}}</small>  </div>
                                    </div>
                                </div>
                                <footer class="panel-footer bg-info text-center">
                                    <div class="row pull-out">
                                        <div class="col-xs-4">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">1</span> <small class="text-muted">Leaves</small> </div>
                                        </div>
                                        <div class="col-xs-4 dk">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">0</span> <small class="text-muted">Approved</small> </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="padder-v"> 
                                            <span class="m-b-xs h3 block text-white">0
                                            </span> <small class="text-muted">Cancelled</small> </div>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                            
                            <hr>
                            
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
                    <div class="row collapse" id="process">
			             @include('pim.leaves.process')
			        </div>
		            <div class="row collapse" id="deleterole">
		                <!-- include editpage -->
		            </div>
		            <br>
                        	<div class="col-md-12">
                        		<section class="panel panel-default">
						            <header class="panel-heading">All Leaves <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
						            @if(count($leave->getPersonnel->getLeaves) > 0)
						                <div class="table-responsive">
						                    <table class="table table-striped m-b-none" data-ride="">
						                        <thead>
						                            <tr>
						                                <th>S/N</th>
						                                <th>Leave Code/No </th>
						                                <th>Leave Tppe </th>
						                                <th>Start Date </th>
						                                <th>End Date </th>
						                                <th>No of Days </th>
						                                <th colspan="2" style="text-align: center;">Status</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                        <?php $sn = 1;?>
						                        @foreach($leave->getPersonnel->getLeaves as $pLeaves)
						                            <tr>
						                                <td>{{$sn}}</td>
						                                <td><a href="#" class="link" type="button" data-toggle="collapse" data-target="#process" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> {{$pLeaves->unique_code}}</a></td>
						                                <td>{{$pLeaves->getParent->type_name}}</td>
						                                <td>{{$pLeaves->start_date}}</td>
						                                <td> {{$pLeaves->end_date}}</td>
						                                <td align="center"> 10 </td>
						                                <td>
						                                    @if($pLeaves->status == 1)
						                                    <span class="label bg-primary">New Appl.</span>
						                                	<a href="" class="btn btn-xs btn-info">Print Form</a>
						                                    @else
						                                    <span class="label bg-danger">Rejected</span>
						                                	<a href="" class="btn btn-xs btn-info">Print Form</a>
						                                    @endif
						                                </td>
						                            </tr>
						                        <?php $sn++;?>
						                        @endforeach
						                        </tbody>
						                    </table>
						                </div>
						                @else
						                <h5>No leave(s) found for <strong>{{$leave->getPersonnel->surname.' '.$leave->getPersonnel->firstname.' '.$leave->getPersonnel->middle_name}}</strong>. </h5>
						                @endif
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