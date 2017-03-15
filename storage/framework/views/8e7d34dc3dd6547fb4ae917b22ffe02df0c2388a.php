<?php $__env->startSection('content'); ?>
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p><?php echo e($salCat->category_name); ?>'s profile</p>
         
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
                                            <div class="h4 m-t m-b-xs"><?php echo e($salCat->category_name); ?></div> 
                                            <!-- <small class="text-muted m-b"><i class="fa fa-map-marker"></i> </small>   -->
                                        </div>
                                    </div>
                                </div>
                                <?php if($salCat->status == 1): ?>
                                <footer class="panel-footer bg-info text-center">
                                <?php elseif($salCat->status == 2): ?>
                                <footer class="panel-footer bg-warning text-center">
                                <?php else: ?>
                                <footer class="panel-footer bg-danger text-center">
                                <?php endif; ?>
                                    <div class="row pull-out">
                                        <div class="col-xs-6">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white"><?php echo e($salCat->getScales->count()); ?></span> <small class="text-muted">Salary Scales</small> </div>
                                        </div>

                                        <div class="col-xs-6">
                                            <div class="padder-v"> <span class="m-b-xs h3 block text-white">
                                                 <?php $__currentLoopData = $salCat->getScales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scales): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php $__currentLoopData = $scales->getPersonnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    
                                                    <?php if($salCat->id == 1): ?>
                                                        <?php echo e(number_format(2429, 0)); ?>

                                                    <?php elseif($salCat->id == 2): ?>
                                                        <?php echo e(number_format(319, 0)); ?>

                                                    <?php else: ?>
                                                        <?php echo e(number_format(0, 0)); ?>

                                                    <?php endif; ?>
                                            </span> <small class="text-muted">Staff</small> </div>
                                        </div>
                                    </div>
                                </footer>

                            </section>
                            <hr>
                        </div>
                        <div class="" align="center">
                        <br>
                            <?php if (Auth::check() && Auth::user()->hasRole('hr-admin | administrator')): ?>
                            <button class="btn btn-xs btn-success" type="button" data-toggle="collapse" data-target="#editsalCat" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> Edit</button>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" data-target="#deactivate" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-times"> </i> Disable</button>
                            <?php endif; ?>
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
                    <div class="row collapse" id="editsalCat">
                    <!-- include Edit salCat -->
                    <?php echo $__env->make('system.salary-scales.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="row collapse" id="deactivate">
                        <!-- include Deactivate salCat -->
                    <?php echo $__env->make('system.salary-scales.deactivate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		            </div>
		            <br>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" style="height: ; width: ">
						            <p>Study Center: <br> <?php echo e($salCat->category_name); ?> </p>
						            </div>
						        </section>
                        	</div>
                        	<div class="col-md-6">
                        		<section class="panel ">
						            <div class="panel-body" align="right" style="height: ; width: ">
						                <?php echo DNS2D::getBarcodeHTML($salCat->id, "QRCODE", 3,3);; ?>

						            </div>
						        </section>
                        	</div>
                        <div class="col-md-12">
                        		<section class="panel panel-success">
						            <header class="panel-heading"> Category Data <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
						            </header>
						            <div class="panel-body">
                                        <div class="p col-md-6">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Salary Scale</th>
                                                            <th style="text-align: center;">No of Personnel</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no = 1;?>
                                                    <?php $__currentLoopData = $salCat->getScales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scale): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($no); ?></td>
                                                            <td><?php echo e($scale->scale); ?></td>
                                                            <td align="Center"><?php echo e($scale->getPersonnel->count()); ?></td>
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
                                                    
                                                    <?php $no++;?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="p col-md-6">
                                            <div class="table-responsive">
                                                <table class="table" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Personnel</th>
                                                            <th>Scale</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no = 1;?>
                                                    <?php $__currentLoopData = $salCat->getScales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scales): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php $__currentLoopData = $scales->getPersonnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php $__currentLoopData = $person->personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prsn): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($no); ?></td>
                                                            <td><a href="<?php echo e(url('/pim/employees/data/'. $prsn->id)); ?>"><?php echo e($prsn->surname. ' ' .$prsn->first_name.' '.$prsn->middle_name); ?></a></td>
                                                            <td><?php echo e($prsn->getNounInfos->getScale ? $prsn->getNounInfos->getScale->scale : "Not set"); ?></td>
                                                        </tr>
                                                    <?php $no++;?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tbody>
                                                </table>
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