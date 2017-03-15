@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>{{$sScale->scale}}'s profile</p>
         <div class="pull-right">
            <br>
                @role('hr-admin | administrator')
                <button class="btn btn-xs btn-success" type="button" data-toggle="collapse" data-target="#edit" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> Edit</button>
                <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" data-target="#dnperisable" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-times"> </i> Disable</button>
                @endrole
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
                                <div class="panel-body">
                                    <div class="clearfix text-center m-t">
                                        <div class="inline">
                                            <div class="thumb-lg"> <img src="{{asset('incs/images/hr_logobig.png')}}" class=""> </div>
                                            <hr>
                                            <div class="h4 m-t m-b-xs">{{$sScale->scale}}</div> 
                                            <!-- <small class="text-muted m-b"><i class="fa fa-map-marker"></i> </small>   -->
                                        </div>
                                    </div>
                                </div>
                                @if($sScale->status == 1)
                                <footer class="panel-footer bg-info text-center">
                                @elseif($sScale->status == 2)
                                <footer class="panel-footer bg-warning text-center">
                                @else
                                <footer class="panel-footer bg-danger text-center">
                                @endif
                                    <div class="row pull-out">
                                        <div class="col-xs-6">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">{{$sScale->getParent->category_name}}</span> <small class="text-muted">Parent Category</small> </div>
                                        </div>

                                        <div class="col-xs-6">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">
                                                {{number_format($sScale->getPersonnel->count(), 0)}}
                                            </span> <small class="text-muted">Staff</small> </div>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                            <hr>
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
                    <div class="row collapse" id="editsScale">
                    <!-- include Edit sScale -->
			        </div>
		            <div class="row collapse" id="deactivate">
                    	<!-- include Deactivate sScale -->
		            </div>
		            <br>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" style="height: ; width: ">
                                    <p class="h5">Max. Salary Range (Annual) : <b>&#8358; {{number_format($sScale->max_sal_range,2)}}</b> </p> <hr>
						            <p class="h5">Min. Salary Range (Annual) : <b> &#8358;{{number_format($sScale->min_sal_range, 2)}}</b> </p>
						            </div>
						        </section>
                        	</div>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" align="right" style="height: ; width: ">
						                {!!DNS2D::getBarcodeHTML($sScale->id, "QRCODE", 3,3);!!}
						            </div>
						        </section>
                        	</div>
                        <div class="col-md-12">
                        		<section class="panel panel-success">
						            <header class="panel-heading"> Category Data <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
                                        <div class="p col-md-12">
                                        @if(count($sScale->getPersonnel) > 0)
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Personnel</th>
                                                            <th>Study Center</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no = 1;?>
                                                    @foreach($sScale->getPersonnel as $scale)
                                                        <tr>
                                                        @foreach($scale->personnels as $person)

                                                            <td>{{$no}}</td>
                                                            <td><a href="{{url('/pim/employees/data/'.$person->id)}}">{{$person->surname. ' '.$person->first_name. ' '.$person->middle_name}}</a></td>
                                                            <td>{{$person->getNOUNInfos->getBranch->branch_name}}</td>
                                                            <!-- <td>{{isset($person->getNOUNInfos->getBranch->getDept ) ? $person->getNOUNInfos->getBranch->getDept->dept_name : "Not set"}}</td> -->
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
                                                    @endforeach
                                                    <?php $no++;?>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                @else
                                                <p class="h4 text-center" align="justify"> No personnel associated with this salary scale</p>
                                                @endif
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