<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Salary Scales</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>

         <div class="col-md-12">
            <div class="row collapse" id="newrscale">
                <?php echo $__env->make('system.salary-scales.newScale', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <section class="panel panel-success">
            <header class="panel-heading"> Salary Scales <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                <?php if (Auth::check() && Auth::user()->hasRole('hr-admin | administrator')): ?>
                <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newrscale" aria-expanded="false" aria-controls="collapseExample"> New Scale</button>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasRole('hr-admin | report-only')): ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                </div>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table m-b-none" data-ride="datatables" id="datatables">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Sale Name </th>
                                <th style="text-align: center;">Parent Category</th>
                                <th style="text-align: center;">Personnel</th>
                                <!-- <th style="text-align: center;">Percentage (%)</th> -->
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        <?php $__currentLoopData = $salScales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scale): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($sn); ?></td>
                                <td><a href="<?php echo e(url('/system/salary-structures/scales/data/'.\Crypt::encrypt($scale->id))); ?>" class="link"> <?php echo e($scale->scale); ?></a></td>
                                <td align="center"><?php echo e($scale->getParent->category_name); ?></td>
                                <td align="center"><?php echo e($scale->getPersonnel->count()); ?></td>
                                <!-- <td align="center"><?php echo e($scale->getPersonnel->count()); ?></td> -->
                                <td>
                                    <?php if($scale->status == 1): ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>