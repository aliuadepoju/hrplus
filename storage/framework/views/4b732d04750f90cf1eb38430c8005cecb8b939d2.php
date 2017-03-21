<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> System</a></li>
            <li class="active">Tickets</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> System Ticketing  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
            	<div class="pull-right">
	            <?php if(count($tickets) > 0): ?>
		            <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(url('/doPDF')); ?>">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
                    <?php endif; ?>
		        </div>
	        </header>
	        <div class="panel-body">
	            <div class="table-responsive">
	            <?php if(count($tickets) > 0): ?>
	                <table class="table m-b-none" data-ride="datatables" id="datatables" >
	                    <thead>
	                        <tr>
	                           <th>#</th>
                                <th>Dated</th>
                                <th>Ticket #</th>
                                <th>Ticket Title</th>
                                <th>Category</th>
                                <th>Priority</th>
                                <th>Study Center</th>
                                <th>Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php $sn = 1;?>
	                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                    	<tr>
	                    		<td><?php echo e($sn); ?></td>
	                    		<td><?php echo e(date_format($ticket->created_at, "jS F, Y" )); ?></td>
	                    		<td><a href="<?php echo e(url('/system/tickets/view/'.\Crypt::encrypt($ticket->id))); ?>" class="link">HRPLUS/TCKT/<?php echo e($ticket->serial); ?></a></td>
	                    		<td><a href="<?php echo e(url('/system/tickets/view/'.\Crypt::encrypt($ticket->id))); ?>" class="link"> <?php echo e($ticket->title); ?></a></td>
	                    		<td><?php echo e($ticket->getCat->name); ?></td>
	                    		<td>
	                    			<?php if($ticket->priority == 1): ?>
	                    			<span class="label label-danger">High demanding issue </span>
	                    			<?php elseif($ticket->priority == 2): ?>
	                    			<span class="label label-info">Medium demanding Issue </span>
	                    			<?php elseif($ticket->priority == 3): ?>
	                    			<span class="label label-warning">Needing Urgent attention </span>
	                    			<?php elseif($ticket->priority == 4): ?>
	                    			<span class="label label-inverse">Needing Immediate attention </span>
									<?php else: ?> 
	                    			<span class="label label-danger">ASAP & Instant attention </span>
									<?php endif; ?>
	                    		</td>
	                    		
	                    		<td><?php echo e($ticket->getCreator->getBranch->branch_name); ?></td>
	                    		<td><?php echo e($ticket->getStatus->name); ?></td>
	                    	</tr>
	                    <?php $sn++;?>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                    </tbody>
	                </table>
	                <?php else: ?>
	                <h4 align="Center">There are no ticket(s) on the system.</h4>
	                <?php endif; ?>
	            </div>
            </div>
        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>