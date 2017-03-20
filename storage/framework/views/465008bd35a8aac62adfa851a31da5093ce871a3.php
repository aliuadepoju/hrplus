<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Salary Scales Categories</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="col-md-12">
        <div class="row collapse" id="newcat">
             <?php echo $__env->make('system.salary-scales.newCat', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Salary Scale Categories <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                <?php if (Auth::check() && Auth::user()->hasRole('hr-admin | administrator')): ?>
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newcat" aria-expanded="false" aria-controls="collapseExample">  </i> New Category</button>
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
                                <th> Code </th>
                                <th> Name </th>
                                <th style="text-align: center;">Sal. Scales</th>
                                <th style="text-align: center;">Personnel</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        <?php $__currentLoopData = $salCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($sn); ?></td>
                                <td><a href="<?php echo e(url('/system/salary-structures/categories/data/'.\Crypt::encrypt($cat->id))); ?>" class="link"> <?php echo e($cat->code); ?></a></td>
                                <td><a href="<?php echo e(url('/system/salary-structures/categories/data/'.\Crypt::encrypt($cat->id))); ?>" class="link"> <?php echo e($cat->category_name); ?></a></td>
                                <td align="center"><?php echo e($cat->getScales->count()); ?></td>
                                <td align="center">
                                    <?php $__currentLoopData = $cat->getScales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catScales): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php echo e($catScales->count()); ?>

                                </td>
                                <td>
                                    <?php if($cat->status == 1): ?>
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