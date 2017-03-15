@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>{{$role->name}}'s profile</p>
    </header>
    <section class="scrollable">
        <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r col-md-6">
                <section class="vbox">
                    <section class="scrollable">
                        <div class="wrapper ">
                            <div class="clearfix m-b">
                                <div class="clear">
                                    <div class="h3 m-t-xs m-b-xs">{{$role->name}}</div> <small class="text-muted"><i class="fa fa-map-marker"></i> {{$role->name}}</small> 
                                </div>
                            </div>
                            
                            <div class="panel wrapper panel-success">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6">
                                        <a href="#"> <center><span class="m-b-xs h5 block" >  {{$role->users->count()}}</span> <small class="text-muted">Users</small></center> </a>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <a href="#"><center> <span class="m-b-xs h5 block">{{$role->id}}</span> <small class="text-muted">Permissions</small> </center></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- <div class="btn-group btn-group-justified m-b">
                                <a class="btn btn-primary btn-rounded" data-toggle="button"> <span class="text"> <i class="fa fa-eye"></i> Follow </span> <span class="text-active"> <i class="fa fa-eye-slash"></i> Following </span> </a>
                                <a class="btn btn-dark btn-rounded" data-loading-text="Connecting"> <i class="fa fa-comment-o"></i> Chat </a>
                            </div> -->
                            <div> <small class="text-uc text-xs text-muted">about: <strong>{{$role->name}}</strong></small>
                                <p></p> <small class="text-uc text-xs text-muted">info</small>
                                <p>{{$role->description}}</p>
                            </div>
                            <hr>
                            <div class="text-uc text-sm text-muted" align="center">
                            	 @if($role->status == 1)
                                    <span class="label bg-primary">  Active</span>
                                    @else
                                    <span class="label bg-danger"></i> Inactive</span>
                                    @endif
                                    <hr>

                            </div>
                            <div class="" align="center">
                            	 @role('hr-admin | administrator')
				                    <button class="btn btn-xs btn-warning" type="button" data-toggle="collapse" data-target="#editrole" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> Edit Role</button>
				                    <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" data-target="#deleterole" aria-expanded="false" aria-controls="collapseExample2"> <i class="fa fa-trash-o"> </i> Delete Role</button>
				                @endrole
                            </div>
                        </div>
                    </section>
                </section>
            </aside>
            <aside class="bg-white">
                <section class="vbox">
                   
                    <section class="scrollable">
                    <div class="row collapse" id="editrole">
		                @include('system.acl.roles.edit')
		            </div>
		            <div class="row collapse" id="deleterole">
		                @include('system.acl.roles.delete')
		            </div>
		            <br>
                        	<div class="col-md-6">
                        		<section class="panel panel-default">
						            <header class="panel-heading"> Users <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
						            @if(count($role->users) > 0)
						                <div class="table-responsive">
						                    <table class="table table-striped m-b-none" data-ride="datatables">
						                        <thead>
						                            <tr>
						                                <th>S/N</th>
						                                <th>Full Name </th>
						                                <th>Phone No. </th>
						                                <th>Status</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                        <?php $sn = 1;?>
						                        @foreach($role->users as $user)
						                            <tr>
						                                <td>{{$sn}}</td>
						                                <td><a href="#" class="link"> {{$user->surname.' '.$user->first_name.' '.$user->middle_name}}</a></td>
						                                <td>{{$user->phone}}</td>
						                                <td>
						                                    @if($user->status == 1)
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
						                <h5>No User(s) found for <strong>{{$role->name}}</strong>. <br> You can assign this role to uses <a href="{{url('/system/users')}}" style="color: blue;">here</a></h5>
						                @endif
						            </div>
						        </section>
                        	</div>
                        	<div class="col-md-6">
                        		<section class="panel panel-default">
						            <header class="panel-heading"> Permissions <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
						                <div class="table-responsive">
						                    <table class="table table-striped m-b-none" data-ride="datatables">
						                        <thead>
						                            <tr>
						                                <th>S/N</th>
						                                <th>Role Permissions</th>
						                                <th>Status</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                        <?php $sn = 1;?>
						                        @foreach($permissions as $perm)
						                            <tr>
						                                <td>{{$sn}}</td>
						                                <td><a href="#" class="link"> {{$perm->name}}</a></td>
						                                <td>
						                                    @if($perm->status == 1)
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