@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>{{$user->surname}}'s profile</p>
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
                                            <div class="thumb-lg"> 
												<?php $fpath = public_path().'/incs/images/usrs/'.Auth::user()->id.'.png' ;?>
									                    @if (file_exists($fpath))
									                        <img src="{{asset('incs/images/usrs/'.Auth::user()->id.'.png')}}" style="height: 140px; width: 190px;"> 
									                    @else
									                        <!-- <img src="{{asset('incs/images/usrs/'.Auth::user()->id.'.png')}}">  -->
									                        <img src="{{asset('incs/images/usrs/no-pic.jpg')}}" class="img-circle" style="height: 140px; width: 190px;"> 
									                    @endif
                                             </div>
											<hr>
                                            <div class="h4 m-t m-b-xs">{{$user->surname. ' '.$user->first_name. ' '.$user->middle_name}}</div> <small class="text-muted m-b"><i class="fa fa-map-marker"></i> {{$user->getBranch->address}}</small>  </div>
                                    </div>
                                </div>

                                <div class="c">
	                                <ul class="list-group no-radius">
	                                    <li class="list-group-item"> <span class="pull-right">{{isset($user->getDept) ? $user->getDept->dept_name : "Not set"}}</span>  Department: </li>
	                                    <li class="list-group-item"> <span class="pull-right">{{isset($user->getUnit) ? $user->getUnit->unit_name : "Not set"}}</span> Unit: </li>
	                                </ul>

                                </div>
                            </section>
                            <hr>
                            <div class="text-uc text-sm text-muted" align="center">
	                        	@if($user->status == 1)
	                            <span class="label bg-primary dker">  Active</span>
	                            @else
	                            <span class="label bg-danger dker"></i> Inactive</span>
	                            @endif
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
                    
		            <br>
                        <div class="col-md-6">
	                        <div class="row collapse" id="addRole">
				            	@include('system.users.addRole')
			            	</div>
			            	<div class="row collapse" id="editUser">
	                    	<!-- Include Edit User -->
					        </div>
				            <div class="row collapse" id="disable">
				            	<!-- Include Disable User -->
				            </div>
                        </div>
                    	<div class="col-md-6">
                    		<section class="panel panel-default">
					            <header class="panel-heading">User Roles/Permission <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
					            <div class="pull-right">
			                    @role('maintenance-admin|hr-admin')
			                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#addRole" aria-expanded="false" aria-controls="collapseExample">Add Role</button>
			                    <button class="btn btn-xs btn-warning" type="button" data-toggle="collapse" data-target="#newbranch" aria-expanded="false" aria-controls="collapseExample">Remove Role</button>
			                   	@endrole
			                </div>
					            </header>
					            <div class="panel-body">
					                <div class="table-responsive">
					                @if(count($user->getRoles()) > 0)
					                    <table class="table table" >
					                        <thead>
					                            <tr>
					                                <th>S/N</th>
					                                <th>Role</th>
					                            </tr>
					                        </thead>
					                        <tbody>
					                        <?php $sn = 1;?>
					                       	<?php $roles = $user->getRoles(); ?>
		                                        @if(count($roles)>0)
		                                            @foreach($roles as $role)
		                                            <tr>
		                                            	<td>{{$sn}}</td>
		                                            	<td>{{ UCfirst($role) }}</td><br />
		                                            </tr>
					                        		<?php $sn++;?>
		                                            @endforeach
		                                            @else
		                                            <h5>No Role(s) found for <strong>{{$user->surname}}</strong></h5>
		                                        @endif
					                        </tbody>
					                    </table>
					                    @else
					                    <h5>No Role(s) found for <strong>{{$user->surname}}</strong></h5>
					                    @endif
					                </div>
					            </div>
					        </section>
                    	</div>
                        <div class="col-md-12">

	                        <section class="panel panel-default">
                                <header class="panel-heading bg-light">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                                        <li><a href="#editProfile" data-toggle="tab">Edit Details</a></li>
                                        @role('hr-admin | administrator')<li><a href="#aLogs" data-toggle="tab">Activity Logs</a></li>@endrole
                                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home"
                                        	>home
                                        </div>
                                        
                                        <div class="tab-pane" id="editProfile"><br>
                                        	<p class="h4 text-center"> EDIT {{strtoupper($user->surname.' '.$user->first_name.' '. $user->middle_name)}}</p>
                                        	<hr>
                                        	<form method="POST" action="" role="form">
								                <div class="form-group col-lg-4">
								                    <label for="name" >Surname</label>
								                    <input type="text" class="form-control" id="name" name="surnname" value="{{$user->surname}}">
								                </div>
								                <div class="form-group col-lg-4">
								                    <label for="name" >Middle Name</label>
								                    <input type="text" class="form-control" id="name" name="middle_name" value="{{$user->middle_name}}">
								                </div>
								                <div class="form-group col-lg-4">
								                    <label for="name" >First Name</label>
								                    <input type="text" class="form-control" id="name" name="first_name" value="{{$user->first_name}}">
								                </div>
								                <div class="form-group col-lg-4">
								                  <label for="product_category_id">Phone</label>
								                    <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
								                </div>
								                 <div class="form-group col-lg-4">
								                  <label for="product_category_id">Email</label>
								                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
								                </div>
								                <div class="form-group col-lg-4">
								                    <label for="code" >Branch/Branch/Study Center</label>
								                  <select class="" name="branch_id" id="select2-option" style="width: 100%;">
								                      <option value="1">Select one</option>
								                      @foreach($branches as $branch)
								                      <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
								                      @endforeach
								                  </select>
								                </div>

								                <div class="form-group col-lg-6">
								                    <label for="code" >Role(s)</label>
								                  <select class="" name="role_id[]" id="select2-tags" style="width: 100%;" multiple="">
								                      @foreach($rolex as $rl)
								                      <option value="{{$rl->id}}">{{$rl->name}}</option>
								                      @endforeach
								                  </select>
								                </div>

								                <div class="form-group col-lg-6">
								                    <label for="code" >Permission(s)</label>
								                  <select class="form-control" name="perm_id[]" id="select2-option" style="width: 100%;" multiple="">
								                      @foreach($permissions as $prm)
								                      <option value="{{$prm->id}}">{{$prm->name}}</option>
								                      @endforeach
								                  </select>
								                </div>
								               
								                
								                <div class="form-group col-lg-12" align="center">
								                    <a href="{{url('/system/users/profile/'.$user->id)}}" class="btn btn-danger">Cancel</a>
								                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
								                </div>
								            </form>
                                        </div>
                                        <div class="tab-pane" id="aLogs">
											<div class="table-responsive">
						                @if(count($user->getLogs) > 0)
						                   <table class="table table-striped m-b-none" data-ride="datatables">
						                    <!-- <table class="table table-striped m-b-none" id="datatable"> -->
						                        <thead>
							                        <tr>
							                            <th>S/N</th>
							                            <th>Dated</th>
							                            <th>Action Group</th>
							                            <th>Activity</th>
							                            <th>Report</th>
							                        </tr>
							                    </thead>
						                        <tbody>
						                        <?php $no = 1;?>
						                        @foreach($user->getLogs as $logs)
							                        <tr>
						                        		<td>{{$no}}</td>
														<td>{{date_format($logs->created_at, "jS M, Y")}}</td>
														<td>{{$logs->action_group}}</td>
														<td>{{$logs->action}}</td>
														<td width="40%">{{$logs->comment}}</td>
							                        </tr>
							                    <?php $no++;?>
						                        @endforeach
						                        
						                        </tbody>
						                    </table>
						                    @else
						                    <p class="h5" align="center">No log(s) found for <b>{{$user->surname}}</b></p>
						                    @endif
						                </div>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                        	<p class="h4 text-center">Applying settings to {{$user->surname}}</p> <br><br>
                                        	<section class="panel">

                                        		<form action="" method="POST">
                                        			
                                        			<div class="form-group col-md-4">
                                        				<label for="">Enable/Disable Login</label> <br>
														<label class="switch">
                                                   		<input type="checkbox" value="1" id="" name=""> <span></span> </label>
                                                   		<p align="justify">If this option is selected or deselect, the user can either login or not being able to login to the system</p>
                                        			</div>
                                        			<div class="form-group col-md-4">
                                        				<label for="">Enable/Disable SMS Alert</label> <br>
														<label class="switch">
                                                   		<input type="checkbox" id="" name=""> <span></span> </label>
                                                   		<p align="justify">If this option is selected or deselect, the user can either recieve or not being able to recieve SMS alerts from the system</p>
                                        			</div>
                                        			<div class="form-group col-md-4">
                                        				<label for="">Enable/Disable eMail Alert</label> <br>
														<label class="switch">
                                                   		<input type="checkbox" id="" name=""> <span></span> </label>
                                                   		<p align="justify">If this option is selected or deselect, the user can either recieve or not being able to recieve email alerts from the system</p>
                                        			</div>

                                        			<div class="form-group col-md-12 " align="center">
                                        				<a href="{{url('/system/users/profile/'.$user->id)}}" class="btn btn-danger">Cancel</a>
                    									<button type="submit" id="register" class="btn btn-primary">Submit</button>
                                        			</div>

                                        		</form>
                                        	</section>
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