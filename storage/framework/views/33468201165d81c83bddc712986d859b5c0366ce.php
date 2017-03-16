<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Employees</li>
        </ul>
        <div class="m-b-md">
            <!-- Notification -->
            <?php if(session()->has('flash_notification.message')): ?>
                <div class="alert alert-<?php echo e(session('flash_notification.level')); ?>">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo session('flash_notification.message'); ?>

                </div>
            <?php endif; ?>
            <!-- /Notification -->
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Employees <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
            	<div class="pull-right">
		            <a href="<?php echo e(url('/pim/employees/register/'.\Crypt::encrypt(5))); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Employee Registration</a> 
		            <!-- <a href="" class="btn btn-warning btn-xs"><i class="fa fa-share-square"></i> Export Report</a> -->
		            <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(url('/pim/reports/doPDF')); ?>">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
		        </div>
	        </header>
	        <div class="panel-body">
	            <div class="table-responsive">
	                <table class="table m-b-none" data-ride="datatables" >
	                    <thead>
	                        <tr>
	                            <th>S/N</th>
	                            <th>Staff No</th>
	                            <th>Surname</th>
	                            <th>First Name</th>
	                            <th>Middle Name</th>
	                            <th>Phone No</th>
	                            <th>e-Mail</th>
	                            <th>State</th>
	                            <th>LGA</th>
	                            <th>Sal. Scale</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php $sn = 1;?>
	                    <?php $__currentLoopData = $personnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prsn): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                    	<tr>
	                    		<td><?php echo e($sn); ?></td>
	                    		<td>NOUN/<?php echo e($prsn->unique_id); ?></td>
	                    		<td><a href="<?php echo e(url('/pim/employees/data/'.\Crypt::encrypt($prsn->id))); ?>" class="link"> <?php echo e($prsn->title .' '.$prsn->surname); ?></a></td>
	                    		<td><?php echo e($prsn->first_name); ?></td>
	                    		<td><?php echo e($prsn->middle_name); ?></td>
	                    		<td><?php echo e($prsn->phone_no); ?></td>
	                    		<td><?php echo e($prsn->email); ?></td>
	                    		<td><?php echo e($prsn->getState->state); ?></td>
	                    		<td><?php echo e(isset($prsn->getLga) ? $prsn->getLga->lga_name : "Not set"); ?></td>
	                    		<td><?php echo e($prsn->scale); ?></td>
	                    	</tr>
	                    <?php $sn++;?>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                    </tbody>
	                </table>
	            </div>
            </div>
        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>