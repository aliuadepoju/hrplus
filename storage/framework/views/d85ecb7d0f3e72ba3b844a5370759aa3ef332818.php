<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo e(url('/branches')); ?>"><i class="fa fa-sitemap"></i> Brnanches</a></li>
            <li class="active">Departments</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="row collapse" id="newdept">
                 <?php echo $__env->make('branch.depts.new', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Departments <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newdept" aria-expanded="false" aria-controls="collapseExample">Setup New Department</button>
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
                                <th>Department </th>
                                <th>Parent Branch</th>
                                <th>Staff Strenght</th>
                                <th>Surbodinate Units</th>
                                <th>e-Mail</th>
                                <!-- <th>Phone No.</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($sn); ?></td>
                                <td><a href="#" class="link"> <?php echo e($dept->dept_name); ?></a></td>
                                <td><?php echo e($dept->getBranch->branch_name); ?></td>
                                <td align="center"><?php echo e($dept->getNounInfo->count()); ?></td>
                                <td align="center"><?php echo e($dept->getUnits ? $dept->getUnits->count() : "0"); ?></td>
                                <td><?php echo e($dept->email); ?></td>
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