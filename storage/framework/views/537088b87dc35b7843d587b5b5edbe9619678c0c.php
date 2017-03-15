<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="index.html"><i class="fa fa-user"></i> Employees</a></li>
            <li class="active">Leaves</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Employee Leaves <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
            	<div class="pull-right">
		            <!-- <a href="<?php echo e(url('/pim/employees/register')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Employee Registration</a>  -->
		            <!-- <a href="" class="btn btn-warning btn-xs"><i class="fa fa-share-square"></i> Export Report</a> -->
		            <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
		        </div>
	        </header>
	        <div class="panel-body">
	            <div class="table-responsive">
	                <table class="table table m-b-none" data-ride="datatables">
	                    <thead>
	                        <tr>
	                            <th>S/N</th>
	                            <th>Leave Code/No</th>
	                            <th>Personel No</th>
	                            <th>Personel Full Names</th>
	                            <th>No of Leaves</th>
	                            <th>Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php $sn = 1;?>
	                    <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                    	<tr>
	                    		<td><?php echo e($sn); ?></td>
	                    		<td><a href="<?php echo e(url('/pim/employees/leaves/data/'.\Crypt::encrypt($leave->id))); ?>">	<?php echo e($leave->unique_code); ?> </a></td>
	                    		<td>NOUN/<?php echo e($leave->getPersonnel->unique_id); ?></td>
	                    		<td><a href="<?php echo e(url('/pim/employees/data/'.$leave->getPersonnel->id)); ?>" class="link"> <?php echo e($leave->getPersonnel->title .' '.$leave->getPersonnel->surname.' '.$leave->getPersonnel->first_name .' '.$leave->getPersonnel->middle_name); ?></a></td>
	                    		<td align="center"><?php echo e($leave->getPersonnel->getLeaves->count()); ?></td>
	                    		<td>

	                    		<?php $__currentLoopData = $leave->getPersonnel->getLeaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pleaves): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                    		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                    		<?php if($pleaves->status == 1): ?>
						            <span class="label bg-primary">Some New Leave(s)</span>
	                    		<?php elseif($pleaves->status == 2): ?>
						            <span class="label bg-info">Awaiting approval</span>
						        <?php else: ?>
						            <span class="label bg-danger">Cancelled</span>
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
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>