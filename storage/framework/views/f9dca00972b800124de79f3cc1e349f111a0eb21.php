<?php $__env->startSection('content'); ?>
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p><?php echo e($leave->getPersonnel->surname.' '.$leave->getPersonnel->firstname.' '.$leave->getPersonnel->middle_name); ?> Leave's history</p>
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
                                            <div class="thumb-lg"> <img src="<?php echo e(asset('incs/images/personnel/'.$leave->getPersonnel->id.'.jpg')); ?>" class=""> </div>
											<hr>
                                            <div class="h4 m-t m-b-xs"><?php echo e($leave->getPersonnel->surname.' '.$leave->getPersonnel->firstname.' '.$leave->getPersonnel->middle_name); ?>'s</div> <small class="text-muted m-b"> <?php echo e($leave->getPersonnel->rank); ?></small>  </div>
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
			             <?php echo $__env->make('pim.leaves.process', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
						            <?php if(count($leave->getPersonnel->getLeaves) > 0): ?>
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
						                        <?php $__currentLoopData = $leave->getPersonnel->getLeaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pLeaves): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						                            <tr>
						                                <td><?php echo e($sn); ?></td>
						                                <td><a href="#" class="link" type="button" data-toggle="collapse" data-target="#process" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-pencil"> </i> <?php echo e($pLeaves->unique_code); ?></a></td>
						                                <td><?php echo e($pLeaves->getParent->type_name); ?></td>
						                                <td><?php echo e($pLeaves->start_date); ?></td>
						                                <td> <?php echo e($pLeaves->end_date); ?></td>
						                                <td align="center"> 10 </td>
						                                <td>
						                                    <?php if($pLeaves->status == 1): ?>
						                                    <span class="label bg-primary">New Appl.</span>
						                                	<a href="" class="btn btn-xs btn-info">Print Form</a>
						                                    <?php else: ?>
						                                    <span class="label bg-danger">Rejected</span>
						                                	<a href="" class="btn btn-xs btn-info">Print Form</a>
						                                    <?php endif; ?>
						                                </td>
						                            </tr>
						                        <?php $sn++;?>
						                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						                        </tbody>
						                    </table>
						                </div>
						                <?php else: ?>
						                <h5>No leave(s) found for <strong><?php echo e($leave->getPersonnel->surname.' '.$leave->getPersonnel->firstname.' '.$leave->getPersonnel->middle_name); ?></strong>. </h5>
						                <?php endif; ?>
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