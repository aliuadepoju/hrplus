<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo e(url('/branches')); ?>"><i class="fa fa-sitemap"></i> Branches</a></li>
            <li><a href="<?php echo e(url('/branches/departments')); ?>"><i class="fa fa-cubes"></i> Departments</a></li>
            <li class="active">Units</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="row collapse" id="newunit">
             <?php echo $__env->make('branch.units.new', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Units <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                    <!-- <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newunit3" aria-expanded="false" aria-controls="collapseExample">Setup New Unit</button> -->
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newunit" aria-expanded="false" aria-controls="collapseExample">Setup New Unit</button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
                    <a href="" class="btn btn-xs btn-info" type="button" data-toggle="collapse">View Unit Tree</a>
                </div>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Unit </th>
                                <th>Parent Department</th>
                                <th>Parent Branch</th>
                                <th style="text-align: center;">Staff Strenght</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($sn); ?></td>
                                <td><a href="<?php echo e(url('/branches/departments/units/data/'.\Crypt::encrypt($unit->id))); ?>" class="link"> <?php echo e($unit->unit_name); ?></a></td>
                                <td><?php echo e($unit->getDept->dept_name); ?></td>
                                <td><?php echo e($unit->getDept->getBranch->branch_name); ?></td>
                                <td align="center"><?php echo e($unit->getPersonnel->count()); ?></td>
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