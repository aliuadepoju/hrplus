    


<?php $__env->startSection('content'); ?>
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>Document Centers <small>(Personnel)</small> 
            <p class="pull-right"> Total Personnel: <?php echo e(number_format(count(\App\Personnel::all()),0)); ?> &emsp; Total Documents: <?php echo e(number_format(count(\App\Document::all()),0)); ?> </p>
            }
        </p>
    </header>
    <section class="scrollable wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php $__currentLoopData = $personnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-sm-4">
                        <section class="panel panel-default">
                           <a href=""> 
                           <?php if($person->getNOUNInfos->status_id ==1): ?>
                           <header class="panel-heading bg-success lt no-border">
                            <?php elseif($person->getNOUNInfos->status_id ==2): ?>
                           <header class="panel-heading bg-primary lt no-border">
                            <?php elseif($person->getNOUNInfos->status_id ==3): ?>
                           <header class="panel-heading bg-warning lt no-border">
                            <?php else: ?>
                           <header class="panel-heading bg-danger lt no-border">
                           <?php endif; ?>
                                <div class="clearfix">
                                    <a href="#" class="pull-left thumb avatar b-3x m-r"> <img src="<?php echo e(asset('incs/images/personnel/'.$person->id.'.jpg')); ?>" class="img-circle"> </a>
                                    <div class="clear">
                                        <div class="h4 m-t-xs m-b-xs text-white"><a href="<?php echo e(url('/pim/employees/data/'.$person->id)); ?>"><?php echo e($person->title .' '.$person->surname.' '. $person->middle_name .' '.$person->first_name); ?> <i class="fa fa-eye text-white pull-right text-xs m-t-sm"> </i></a>  </div> <small class="text-muted"><?php echo e($person->getNOUNInfos->rank); ?></small> </div>
                                </div>
                            </header></a>
                            <div class="list-group no-radius alt">
                                <?php $__currentLoopData = $docClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dC): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <a class="list-group-item"> <span class="badge bg-success"><?php echo e($person->getDocuments->count()); ?></span> <i class="fa fa-file-o icon-muted"></i> <?php echo e($dC->classification_name); ?> </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                        </section>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                </div>
            </div>
        </div>
    </section>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>