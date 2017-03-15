<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Branches</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="row collapse" id="newbranch">
             <?php echo $__env->make('branch.new', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Branches <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newbranch" aria-expanded="false" aria-controls="collapseExample">Setup New Branch</button>
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
                                <th>Branch Name </th>
                                <th>State</th>
                                <th>Personnel</th>
                                <th>Percent</th>
                                <th>Departments</th>
                                <th>e-Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($sn); ?></td>
                                <td width="42%"><a href="<?php echo e(url('/branches/data/'.$branch->id)); ?>" class="link"> <?php echo e($branch->branch_name); ?></a></td>
                                <td width="28%"><?php echo e($branch->getState->state); ?></td>
                                <td align="center"><?php echo e(number_format($branch->NounInfos->count(), 0)); ?></td>
                                <td align="center"><?php echo e(number_format(count($branch)/$branch->NounInfos->count() *100, 2)); ?> %</td>

                                <td align="center"><?php echo e($branch->getDepts->count()); ?></td>
                                <td><?php echo e($branch->email); ?></td>
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