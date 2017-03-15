<?php $__env->startSection('content'); ?>
<?php echo e(csrf_field()); ?>

<section id="content">
        <div class="row m-n">
        
            <div class="col-sm-12 col-md-12 col-md-offset-0">
                <br><br>
                <div class="text-center m-b-lg">
                	<img src="<?php echo e(asset('incs/images/hr_logobig.png')); ?>" class="" style="height: 180px;">
                    <h1 class="h text-danger animated fadeInDownBig">  ACCESS DENIED!</h1> 
                </div>
                <p align="justify" class="h4 text-center">You have insufficient permissions and privileges to access this resources,  you are thereby blocked out of this resources. Contact the System Administrator. </p><br>
                <div class="list-group m-b-sm bg-white m-b-lg">
                    <a href="#" class="list-group-item"> <i class="fa fa-chevron-right icon-muted"></i> <span class="badge">08165420728</span> <i class="fa fa-fw fa-phone icon-muted"></i> Call the admin </a>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p> <small>National Open University of Nigeria<br>&copy; <?php echo e(date('Y')); ?>. </small> All Rigths reserved </p>
        </div>
    </footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>