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
        <div class="row collapse" id="newstate">

        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> States of the Federation <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                    <!-- <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newstate" aria-expanded="false" aria-controls="collapseExample">Setup New State</button> -->
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
                    <table class="table table" data-ride="myTable1" id="myTable1">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>State Code</th>
                                <th>State Name </th>
                                <th>Geo Zone </th>
                                <th>Indegenous Personnel</th>
                                <th>Percent</th>
                                <th>Study Centers</th>
                                <th>Percent</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($sn); ?></td>
                                <td width=""><?php echo e($state->code); ?></td>
                                <td width=""><a href="<?php echo e(url('/state/data/'.\Crypt::encrypt($state->id))); ?>" class="link"> <?php echo e($state->state); ?></a></td>
                                <td align=""><?php echo e($state->getZone->zone_name); ?></td>
                                <td align="center"><?php echo e($state->getPersonnel->count()); ?> out of ... </td>
                                <td align="center"><?php echo e(number_format(($state->getPersonnel->count()/$state->count())*100/100, 2)); ?>%</td>
                                <td align="center"><?php echo e(number_format($state->getBranches->count(), 0)); ?></td>
                                <td align="center"><?php echo e(number_format($state->getBranches->count()/$branch->count()*100, 2)); ?>%</td>
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