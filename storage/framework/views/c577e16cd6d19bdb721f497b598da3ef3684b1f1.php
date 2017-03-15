<?php $__env->startSection('content'); ?>
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p><?php echo e($role->name); ?>'s profile</p>
    </header>
    <section class="scrollable">
        <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r col-md-6">
                <section class="vbox">
                    <section class="scrollable">
                        <div class="wrapper ">
                            <div class="clearfix m-b">
                                <div class="clear">
                                    <div class="h3 m-t-xs m-b-xs"><?php echo e($role->name); ?></div> <small class="text-muted"><i class="fa fa-map-marker"></i> <?php echo e($role->name); ?></small> 
                                </div>
                            </div>
                            
                            <div class="panel wrapper panel-success">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6">
                                        <a href="#"> <center><span class="m-b-xs h5 block" >  <?php echo e($role->users->count()); ?></span> <small class="text-muted">Users</small></center> </a>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <a href="#"><center> <span class="m-b-xs h5 block"><?php echo e($role->id); ?></span> <small class="text-muted">Permissions</small> </center></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- <div class="btn-group btn-group-justified m-b">
                                <a class="btn btn-primary btn-rounded" data-toggle="button"> <span class="text"> <i class="fa fa-eye"></i> Follow </span> <span class="text-active"> <i class="fa fa-eye-slash"></i> Following </span> </a>
                                <a class="btn btn-dark btn-rounded" data-loading-text="Connecting"> <i class="fa fa-comment-o"></i> Chat </a>
                            </div> -->
                            <div> <small class="text-uc text-xs text-muted">about: <strong><?php echo e($role->name); ?></strong></small>
                                <p></p> <small class="text-uc text-xs text-muted">info</small>
                                <p><?php echo e($role->description); ?></p>
                            </div>
                            <hr>
                            <div class="text-uc text-sm text-muted" align="center">
                            	 <?php if($role->status == 1): ?>
                                    <span class="label bg-primary">  Active</span>
                                    <?php else: ?>
                                    <span class="label bg-danger"></i> Inactive</span>
                                    <?php endif; ?>
                                    <hr>

                            </div>
                            <div class="" align="center">
                            	 <?php if (Auth::check() && Auth::user()->hasRole('hr-admin | administrator')): ?>
				                    <button class="btn btn-xs btn-warning" type="button" data-toggle="collapse" data-target="#editrole" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> Edit Role</button>
				                    <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" data-target="#deleterole" aria-expanded="false" aria-controls="collapseExample2"> <i class="fa fa-trash-o"> </i> Delete Role</button>
				                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                </section>
            </aside>
            <aside class="bg-white">
                <section class="vbox">
                   
                    <section class="scrollable">
                    <div class="row collapse" id="editrole">
		                <?php echo $__env->make('system.acl.roles.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		            </div>
		            <div class="row collapse" id="deleterole">
		                <?php echo $__env->make('system.acl.roles.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		            </div>
		            <br>
                        	<div class="col-md-6">
                        		<section class="panel panel-default">
						            <header class="panel-heading"> Users <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
						            <?php if(count($role->users) > 0): ?>
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
						                        <?php $__currentLoopData = $role->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						                            <tr>
						                                <td><?php echo e($sn); ?></td>
						                                <td><a href="<?php echo e(url('/system/users/profile/'.\Crypt::encrypt($user->id))); ?>" class="link"> <?php echo e($user->surname.' '.$user->first_name.' '.$user->middle_name); ?></a></td>
						                                <td><?php echo e($user->phone); ?></td>
						                                <td>
						                                    <?php if($user->status == 1): ?>
						                                    <span class="label bg-primary">Active</span>
						                                    <?php else: ?>
						                                    <span class="label bg-danger">Inactive</span>
						                                    <?php endif; ?>
						                                </td>
						                            </tr>
						                        <?php $sn++;?>
						                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						                        </tbody>
						                    </table>
						                </div>
						                <?php else: ?>
						                <h5>No User(s) found for <strong><?php echo e($role->name); ?></strong>. <br> You can assign this role to uses <a href="<?php echo e(url('/system/users')); ?>" style="color: blue;">here</a></h5>
						                <?php endif; ?>
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
						                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						                            <tr>
						                                <td><?php echo e($sn); ?></td>
						                                <td><a href="#" class="link"> <?php echo e($perm->name); ?></a></td>
						                                <td>
						                                    <?php if($perm->status == 1): ?>
						                                    <span class="label bg-primary">Active</span>
						                                    <?php else: ?>
						                                    <span class="label bg-danger">Inactive</span>
						                                    <?php endif; ?>
						                                </td>
						                            </tr>
						                        <?php $sn++;?>
						                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>