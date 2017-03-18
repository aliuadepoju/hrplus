<?php $__env->startSection('content'); ?>
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p><?php echo e($user->surname); ?>'s profile</p>
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
									                    <?php if(file_exists($fpath)): ?>
									                        <img src="<?php echo e(asset('incs/images/usrs/'.Auth::user()->id.'.png')); ?>" style="height: 140px; width: 190px;"> 
									                    <?php else: ?>
									                        <!-- <img src="<?php echo e(asset('incs/images/usrs/'.Auth::user()->id.'.png')); ?>">  -->
									                        <img src="<?php echo e(asset('incs/images/usrs/no-pic.jpg')); ?>" class="img-circle" style="height: 140px; width: 190px;"> 
									                    <?php endif; ?>
                                             </div>
											<hr>
                                            <div class="h4 m-t m-b-xs"><?php echo e($user->surname. ' '.$user->first_name. ' '.$user->middle_name); ?></div> <small class="text-muted m-b"><i class="fa fa-map-marker"></i> <?php echo e($user->getBranch->address); ?></small>  </div>
                                    </div>
                                </div>

                                <div class="c">
	                                <ul class="list-group no-radius">
	                                    <li class="list-group-item"> <span class="pull-right"><?php echo e(isset($user->getDept) ? $user->getDept->dept_name : "Not set"); ?></span>  Department: </li>
	                                    <li class="list-group-item"> <span class="pull-right"><?php echo e(isset($user->getUnit) ? $user->getUnit->unit_name : "Not set"); ?></span> Unit: </li>
	                                </ul>

                                </div>
                            </section>
                            <hr>
                            <div class="text-uc text-sm text-muted" align="center">
	                        	<?php if($user->status == 1): ?>
	                            <span class="label bg-primary dker">  Active</span>
	                            <?php else: ?>
	                            <span class="label bg-danger dker"></i> Inactive</span>
	                            <?php endif; ?>
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
				            	<?php echo $__env->make('system.users.addRole', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
			                    <?php if (Auth::check() && Auth::user()->hasRole('maintenance-admin|hr-admin')): ?>
			                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#addRole" aria-expanded="false" aria-controls="collapseExample">Add Role</button>
			                    <button class="btn btn-xs btn-warning" type="button" data-toggle="collapse" data-target="#newbranch" aria-expanded="false" aria-controls="collapseExample">Remove Role</button>
			                   	<?php endif; ?>
			                </div>
					            </header>
					            <div class="panel-body">
					                <div class="table-responsive">
					                <?php if(count($user->getRoles()) > 0): ?>
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
		                                        <?php if(count($roles)>0): ?>
		                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		                                            <tr>
		                                            	<td><?php echo e($sn); ?></td>
		                                            	<td><?php echo e(UCfirst($role)); ?></td><br />
		                                            </tr>
					                        		<?php $sn++;?>
		                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		                                            <?php else: ?>
		                                            <h5>No Role(s) found for <strong><?php echo e($user->surname); ?></strong></h5>
		                                        <?php endif; ?>
					                        </tbody>
					                    </table>
					                    <?php else: ?>
					                    <h5>No Role(s) found for <strong><?php echo e($user->surname); ?></strong></h5>
					                    <?php endif; ?>
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
                                        <?php if (Auth::check() && Auth::user()->hasRole('hr-admin | administrator')): ?><li><a href="#aLogs" data-toggle="tab">Activity Logs</a></li><?php endif; ?>
                                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home"
                                        	>home
                                        </div>
                                        
                                        <div class="tab-pane" id="editProfile"><br>
                                        	<p class="h4 text-center"> EDIT <?php echo e(strtoupper($user->surname.' '.$user->first_name.' '. $user->middle_name)); ?></p>
                                        	<hr>
                                        	<form method="POST" action="" role="form">
								                <div class="form-group col-lg-4">
								                    <label for="name" >Surname</label>
								                    <input type="text" class="form-control" id="name" name="surnname" value="<?php echo e($user->surname); ?>">
								                </div>
								                <div class="form-group col-lg-4">
								                    <label for="name" >Middle Name</label>
								                    <input type="text" class="form-control" id="name" name="middle_name" value="<?php echo e($user->middle_name); ?>">
								                </div>
								                <div class="form-group col-lg-4">
								                    <label for="name" >First Name</label>
								                    <input type="text" class="form-control" id="name" name="first_name" value="<?php echo e($user->first_name); ?>">
								                </div>
								                <div class="form-group col-lg-4">
								                  <label for="product_category_id">Phone</label>
								                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e($user->phone); ?>">
								                </div>
								                 <div class="form-group col-lg-4">
								                  <label for="product_category_id">Email</label>
								                    <input type="text" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>">
								                </div>
								                <div class="form-group col-lg-4">
								                    <label for="code" >Branch/Branch/Study Center</label>
								                  <select class="" name="branch_id" id="select2-option" style="width: 100%;">
								                      <option value="1">Select one</option>
								                      <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								                      <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
								                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								                  </select>
								                </div>

								                <div class="form-group col-lg-6">
								                    <label for="code" >Role(s)</label>
								                  <select class="" name="role_id[]" id="select2-tags" style="width: 100%;" multiple="">
								                      <?php $__currentLoopData = $rolex; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								                      <option value="<?php echo e($rl->id); ?>"><?php echo e($rl->name); ?></option>
								                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								                  </select>
								                </div>

								                <div class="form-group col-lg-6">
								                    <label for="code" >Permission(s)</label>
								                  <select class="form-control" name="perm_id[]" id="select2-option" style="width: 100%;" multiple="">
								                      <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								                      <option value="<?php echo e($prm->id); ?>"><?php echo e($prm->name); ?></option>
								                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								                  </select>
								                </div>
								               
								                
								                <div class="form-group col-lg-12" align="center">
								                    <a href="<?php echo e(url('/system/users/profile/'.$user->id)); ?>" class="btn btn-danger">Cancel</a>
								                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
								                </div>
								            </form>
                                        </div>
                                        <div class="tab-pane" id="aLogs">
											<div class="table-responsive">
						                <?php if(count($user->getLogs) > 0): ?>
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
						                        <?php $__currentLoopData = $user->getLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logs): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							                        <tr>
						                        		<td><?php echo e($no); ?></td>
														<td><?php echo e(date_format($logs->created_at, "jS M, Y")); ?></td>
														<td><?php echo e($logs->action_group); ?></td>
														<td><?php echo e($logs->action); ?></td>
														<td width="40%"><?php echo e($logs->comment); ?></td>
							                        </tr>
							                    <?php $no++;?>
						                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						                        
						                        </tbody>
						                    </table>
						                    <?php else: ?>
						                    <p class="h5" align="center">No log(s) found for <b><?php echo e($user->surname); ?></b></p>
						                    <?php endif; ?>
						                </div>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                        	<p class="h4 text-center">Applying settings to <?php echo e($user->surname); ?></p> <br><br>
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
                                        				<a href="<?php echo e(url('/system/users/profile/'.$user->id)); ?>" class="btn btn-danger">Cancel</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>