<?php $__env->startSection('content'); ?>
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p><?php echo e($unit->unit_name); ?>'s profile</p>
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
                                            <div class="thumb-lg"> <img src="<?php echo e(asset('incs/images/hr_logobig.png')); ?>" class=""> </div>
											<hr>
											<p class=""></p>
                                            <div class="h5 m-t m-b-xs" align="left"><b><?php echo e(strtoupper('Parent Branch')); ?>:</b> <br><?php echo e($unit->getDept->getBranch->branch_name); ?></div>
                                            <hr> 
                                            <div class="h5 m-t m-b-xs" align="left"><b><?php echo e(strtoupper('Parent Department')); ?>:</b> <br><?php echo e($unit->getDept->dept_name); ?></div> 
                                            <!-- <small class="text-muted m-b"><i class="fa fa-map-marker"></i> <?php echo e($unit->address); ?></small>   -->
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer bg-info text-center">
                                    <div class="row pull-out">
                                        <div class="col-xs-12">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white"><?php echo e($unit->getPersonnel->count()); ?></span> <small class="text-muted">Staff</small> </div>
                                        </div>
                                        <!-- <div class="col-xs-6 dk">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white"><?php echo e($unit->id); ?></span> <small class="text-muted">Depts.</small> </div>
                                        </div> -->
                                    </div>
                                </footer>
                            </section>
                            <hr>
                            <div class="text-uc text-sm text-muted" align="center">

                            	 <?php if($unit->status == 1): ?>
                                    <span class="label bg-primary">  Active</span>
                                    <?php else: ?>
                                    <span class="label bg-danger"></i> Inactive</span>
                                    <?php endif; ?>
                                    <hr>

                            </div>
                            <div class="" align="center">
                            	 <?php if (Auth::check() && Auth::user()->hasRole('hr-admin | administrator')): ?>
				                    <button class="btn btn-xs btn-warning" type="button" data-toggle="collapse" data-target="#editunit" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> Edit Unit</button>
				                    <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" data-target="#deactivate" aria-expanded="false" aria-controls="collapseExample2"> <i class="fa fa-times"> </i> Deactivate Unit</button>
				                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                </section>
            </aside>
            <aside class="bg-white">
                <section class="vbox">
                 	<br><br><br>
                    <section class="scrollable">
                    <div class="row collapse" id="editunit">
			             <?php echo $__env->make('branch.units.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			             <!--  -->
			        </div>
		            <div class="row collapse" id="deactivate">
			             <?php echo $__env->make('branch.units.deactivate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		            </div>
		            <br>
                        <div class="col-md-12">
                    		<section class="panel panel-success">
					            <header class="panel-heading"> Personnel <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
					            </header>
					            <div class="panel-body">
					                <div class="table-responsive">
					                <?php if(count($unit->getPersonnel) > 0): ?>
					                   <table class="table m-b-none" data-ride="datatables">
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
					                        <?php $__currentLoopData = $unit->getPersonnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnel): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						                        <tr>
						                        	<?php $__currentLoopData = $personnel->personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						                        		<td><?php echo e($no); ?></td>
														<td>NOUN/<?php echo e($person->unique_id); ?></td>
														<td> <a href="<?php echo e(url('/pim/employees/data/'.\Crypt::encrypt($person->id))); ?>"><?php echo e($person->surname.' '.$person->first_name.' '.$person->middle_name); ?></a></td>
														<td><?php echo e($person->phone_no); ?></td>
														<td><?php echo e($person->getState->state); ?></td>
	                    								<td><?php echo e(isset($person->getLga) ? $person->getLga->lga_name : "Not set"); ?></td>
														<td><?php echo e($person->getNounInfos->getScale ? $person->getNounInfos->getScale->scale : "Not set"); ?></td>
						                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						                        </tr>
						                    <?php $no++;?>
					                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					                        
					                        </tbody>
					                    </table>
					                    <?php else: ?>
					                    <p class="h5" align="center">No personnel found for <b><?php echo e($unit->unit_name); ?></b></p>
					                    <?php endif; ?>
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