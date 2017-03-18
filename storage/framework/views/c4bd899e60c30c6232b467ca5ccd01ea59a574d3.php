<?php $__env->startSection('content'); ?>
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>Dashboard <p class="pull-right" ><strong>Total Employees: <?php echo e(number_format($personnel->count(), 0)); ?></strong></p>
        </p>
    </header>
    <section>
        <section class="hbox stretch">
            <section>
                <section class="vbox">
                    <section class="scrollable wrapper">
                        <div class=" col-md-6">
                        <section class="panel panel-default">
                            <div class="carousel slide auto panel-body" id="c-slide">
                                <ol class="carousel-indicators out">
                                    <li data-target="#c-slide" data-slide-to="0" class="active"></li>
                                    <li data-target="#c-slide" data-slide-to="1" class=""></li>
                                    <li data-target="#c-slide" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">

                                    <div class="item active">
                                       <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-graduation fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>
                                                    <?php $__currentLoopData = $acadStaff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $AcadSt): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php echo e(number_format($AcadSt->Nos, 0)); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                    </strong></span> <small class="text-muted text-uc">Academic Staff</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs">
                                                    <strong>
                                                <?php $__currentLoopData = $nonAcadStaff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noAcadSt): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php echo e(number_format($noAcadSt->Nos, 0)); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </strong></span> <small class="text-muted text-uc">Non Academic Staff</small> </a>
                                                </div>
                                           </div>
                                       </div> 
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>
                                                    <?php echo e(number_format($seniorStaff->count(),0)); ?>

                                                    </strong></span> <small class="text-muted text-uc">Senior Staff</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong><?php echo e(number_format($juniorStaff->count(),0)); ?></strong></span> <small class="text-muted text-uc">Junior Staff</small> </a>
                                                </div>
                                           </div>
                                       </div>
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>
                                                    <?php echo e(number_format($seniorStaff->count(),0)); ?>

                                                    </strong></span> <small class="text-muted text-uc">Senior Non Acad</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong><?php echo e(number_format($juniorStaff->count(),0)); ?></strong></span> <small class="text-muted text-uc">Junior Non Acaad</small> </a>
                                                </div>
                                           </div>
                                       </div>
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>
                                                    <?php echo e(number_format($seniorStaff->count(),0)); ?>

                                                    </strong></span> <small class="text-muted text-uc">Senior Non Acad</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong><?php echo e(number_format($juniorStaff->count(),0)); ?></strong></span> <small class="text-muted text-uc">Junior Non Acaad</small> </a>
                                                </div>
                                           </div>
                                       </div>
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong><?php echo e(number_format($fullTimeStaff->count(),0)); ?></strong></span> <small class="text-muted text-uc">Full Time Employment</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong><?php echo e(number_format($transientStaff->count(),0)); ?></strong></span> <small class="text-muted text-uc">Transient Staff</small> </a>
                                                </div>
                                           </div>
                                       </div>
                                    </div>

                                    <div class="item">
                                        <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong><?php echo e(number_format($male->count(), 0)); ?></strong></span> <small class="text-muted text-uc">Male</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong><?php echo e(number_format($female->count(), 0)); ?></strong></span> <small class="text-muted text-uc">Female</small> </a>
                                                </div>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#c-slide" data-slide="prev"> <i class="fa fa-angle-left"></i> </a>
                                <a class="right carousel-control" href="#c-slide" data-slide="next"> <i class="fa fa-angle-right"></i> </a>
                            </div>
                        </section>
                        <section class="panel">
                            <header class="panel-heading font-bold">Gender Distribution</header>
                            <div class="panel-body">
                                <div id="" style="width: 100%; height:300px"></div>
                            </div>
                        </section>

                        <section class="panel ">
                            <header class="panel-heading font-bold">Status Distribution</header>
                            <div class="panel-body">
                                <div id="" style="width: 100%; height:300px"></div>
                            </div>
                        </section>
                        <section class="panel panel-info">
                            <header class="panel-heading"> <h4> Departments Employment Distribution </h4><small>Drill Down of Employee Distribution in NOUN Departments</small></header>
                                <div class="table-responsive">
                                <h3></h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Department</th>
                                                <th style="text-align: center;">Employees</th>
                                                <th style="text-align: center;">Percent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $n = 1;?>
                                            <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($n); ?></td>
                                                    <td><a href=""><?php echo e($dept->dept_name); ?></a></td>
                                                    <td align="center"><?php echo e($dept->getNOUNInfo->count()); ?></td>
                                                    <td align="center">1%</td>
                                                </tr>
                                                
                                            <?php $n++;?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </section>

                            <section class="panel panel-warning">
                            <header class="panel-heading"> <h4> State of Origin Distribution </h4><small>Drill Down of Employee Distribution from each State</small></header>
                                <div class="table-responsive">
                                <h3></h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>State</th>
                                                <th style="text-align: center;" >Employees</th>
                                                <th style="text-align: center;">Branches</th>
                                                <th style="text-align: center;">Empl. %</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $n = 1;?>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($n); ?></td>
                                                    <td width="35%"><a href="<?php echo e(url('/state/data/'.\Crypt::encrypt($state->id))); ?>"><?php echo e($state->state); ?></a></td>
                                                    <td align="center"><?php echo e($state->getPersonnel->count()); ?></td>
                                                    <td align="center"><?php echo e($state->getBranches->count()); ?></td>
                                                    <td align="center"><?php echo e(@number_format(($state->getPersonnel->count()/$state->count())*100/100, 2)); ?>%</td>
                                                </tr>
                                                
                                            <?php $n++;?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                         <section class=""></section>   
                        </div>

                        <div class=" col-md-6">
                            <section class="panel panel-success">
                            <header class="panel-heading"> Date: <?php echo e(date('d-m-Y')); ?><h4> <strong>Top 5 Highest State Employment Distribution</strong></h4> </header>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>State</th>
                                                <th style="text-align: center;">Employees</th>
                                                <th style="text-align: center;">Percent</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $n = 1;?>
                                           <?php $__currentLoopData = $Hstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hst): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td><?php echo e($n); ?></td>
                                                <td><a href="<?php echo e(url('/state/data/'.\Crypt::encrypt($hst->state_id))); ?>"><?php echo e($hst->state); ?></a></td>
                                                <td align="center"><?php echo e(number_format($hst->Nos, 0)); ?></td>
                                                <td align="center"><?php echo e($hst->Nos*count($hst->state)/100); ?> %</td>
                                                <td><a href="<?php echo e(url('/state/data/'.\Crypt::encrypt($hst->state_id))); ?>" class="btn btn-success btn-xs ">View More</a></td>
                                            </tr>
                                            <?php $n++;?>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5"> <h4> <strong>Least 5 States Employment Distribution</strong></h4></td>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>State</th>
                                            <th style="text-align: center;">Employees</th>
                                            <th style="text-align: center;">Percent</th>
                                            <th></th>
                                        </tr>
                                           <?php $n = 1;?>
                                           <?php $__currentLoopData = $Lstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lst): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td><?php echo e($n); ?></td>
                                                <td><a href="<?php echo e(url('/state/data/'.\Crypt::encrypt($lst->state_id))); ?>"><?php echo e($lst->state); ?></a></td>
                                                <td align="center"><?php echo e(number_format($lst->Nos, 0)); ?></td>
                                                <td align="center"><?php echo e($lst->Nos*count($lst->state)/100); ?> %</td>
                                                <td><a href="<?php echo e(url('/state/data/'.\Crypt::encrypt($lst->state_id))); ?>" class="btn btn-success btn-xs ">View More</a></td>
                                            </tr>
                                            <?php $n++;?>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                                        </tfoot>
                                    </table>
                                </div>
                            </section>

                            <section class="panel panel-default">
                            <header class="panel-heading"> <h4> <strong>BRANCH DISTRIBUTION (EMPLOYEE)</strong></h4><small>Drill Down of Employee Distribution in NOUN Study Centers</small></header>
                                <div class="table-responsive">
                                <h3></h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Study Center</th>
                                                <th style="text-align: center;" width="10%">Employees</th>
                                                <th style="text-align: center;" width="10%">Percent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $n = 1;?>
                                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($n); ?></td>
                                                    <td><a href="<?php echo e(url('/branches/data/'.$branch->id)); ?>"><?php echo e($branch->branch_name); ?></a></td>
                                                    <td align="center"><?php echo e($branch->getStaff->count()); ?></td>
                                                    <td align="center"><?php echo e(@number_format(count($branch)/$branch->getStaff->count()*100, 2)); ?> %</td>
                                                </tr>
                                                
                                            <?php $n++;?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </section>
                </section>
            </section>
        </section>
    <hr>
    </section>
    <br>
    <!-- <footer class="footer bg-white b-t b-light">
        <p> @ <?php echo e(date('Y')); ?> Powered by: Natview Technology <p class="pull-right">Nigerian Defence Academy</p></p>
    </footer> -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>