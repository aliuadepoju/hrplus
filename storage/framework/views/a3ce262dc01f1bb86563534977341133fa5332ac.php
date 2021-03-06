<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Geo Political Zones Distributions</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="row collapse" id="newstate">

        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> National Geo Political Zones Distributions <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
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
                                <th>Zone Code</th>
                                <th>Zonal Name </th>
                                <th>Total States </th>
                                <th>Percent</th>
                                <th>Total Study Centers </th>
                                <th>Percent</th>
                                <th>Total Personnel</th>
                                <th>Percent</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($sn); ?></td>
                                <td width="" align="center"><?php echo e($zone->code); ?></td>
                                <td width=""><a href="<?php echo e(url('/pim/distribution/geo_pol_zones/data/'.\Crypt::encrypt($zone->id))); ?>" class="link"> <?php echo e($zone->zone_name); ?></a></td>
                                <td align=""><?php echo e($zone->getStates->count() .' out of '.'37'); ?></td>
                                <td align="center"><?php echo e(number_format($zone->getStates->count()/37 * 100, 2)); ?>% </td>
                                <td align="center"></td>
                                <td align="center">3%</td>
                                <td align="center">
                                    <!-- <?php $__currentLoopData = $zone->getStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zS): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php $__currentLoopData = $zS->getPersonnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zPrsn): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php $__currentLoopData = $zPrsn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php echo e($zp); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> -->
                                </td>
                                <td align="center">2%</td>
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