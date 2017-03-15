<?php $__env->startSection('content'); ?>
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p><?php echo e($sScale->scale); ?>'s profile</p>
         <div class="pull-right">
            <br>
                <?php if (Auth::check() && Auth::user()->hasRole('hr-admin | administrator')): ?>
                <button class="btn btn-xs btn-success" type="button" data-toggle="collapse" data-target="#edit" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> Edit</button>
                <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" data-target="#dnperisable" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-times"> </i> Disable</button>
                <?php endif; ?>
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
                                            <div class="thumb-lg"> <img src="<?php echo e(asset('incs/images/hr_logobig.png')); ?>" class=""> </div>
                                            <hr>
                                            <div class="h4 m-t m-b-xs"><?php echo e($sScale->scale); ?></div> 
                                            <!-- <small class="text-muted m-b"><i class="fa fa-map-marker"></i> </small>   -->
                                        </div>
                                    </div>
                                </div>
                                <?php if($sScale->status == 1): ?>
                                <footer class="panel-footer bg-info text-center">
                                <?php elseif($sScale->status == 2): ?>
                                <footer class="panel-footer bg-warning text-center">
                                <?php else: ?>
                                <footer class="panel-footer bg-danger text-center">
                                <?php endif; ?>
                                    <div class="row pull-out">
                                        <div class="col-xs-6">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white"><?php echo e($sScale->getParent->category_name); ?></span> <small class="text-muted">Parent Category</small> </div>
                                        </div>

                                        <div class="col-xs-6">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">
                                                <?php echo e(number_format($sScale->getPersonnel->count(), 0)); ?>

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
                                    <p class="h5">Max. Salary Range (Annual) : <b>&#8358; <?php echo e(number_format($sScale->max_sal_range,2)); ?></b> </p> <hr>
						            <p class="h5">Min. Salary Range (Annual) : <b> &#8358;<?php echo e(number_format($sScale->min_sal_range, 2)); ?></b> </p>
						            </div>
						        </section>
                        	</div>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" align="right" style="height: ; width: ">
						                <?php echo DNS2D::getBarcodeHTML($sScale->id, "QRCODE", 3,3);; ?>

						            </div>
						        </section>
                        	</div>
                        <div class="col-md-12">
                        		<section class="panel panel-success">
						            <header class="panel-heading"> Category Data <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
                                        <div class="p col-md-12">
                                        <?php if(count($sScale->getPersonnel) > 0): ?>
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
                                                    <?php $__currentLoopData = $sScale->getPersonnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scale): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <tr>
                                                        <?php $__currentLoopData = $scale->personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                            <td><?php echo e($no); ?></td>
                                                            <td><a href="<?php echo e(url('/pim/employees/data/'.\Crypt::encrypt($person->id))); ?>"><?php echo e($person->surname. ' '.$person->first_name. ' '.$person->middle_name); ?></a></td>
                                                            <td><?php echo e($person->getNOUNInfos->getBranch->branch_name); ?></td>
                                                            <!-- <td><?php echo e(isset($person->getNOUNInfos->getBranch->getDept ) ? $person->getNOUNInfos->getBranch->getDept->dept_name : "Not set"); ?></td> -->
                                                            <td>
                                                                <?php if($scale->status == 1): ?>
                                                                    <span class="label bg-primary">Active</span>
                                                                <?php elseif($scale->status == 2): ?>
                                                                    <span class="label bg-info">Suspended</span>
                                                                <?php else: ?>
                                                                    <span class="label bg-danger">Inactive</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php $no++;?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tbody>
                                                </table>
                                                <?php else: ?>
                                                <p class="h4 text-center" align="justify"> No personnel associated with this salary scale</p>
                                                <?php endif; ?>
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