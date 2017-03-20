<?php $__env->startSection('content'); ?>
<section id="content">
        <div class="row m-n">
            <div class="col-sm-4 col-md-12 col-md-offset-0">
                <div class="text-center m-b-lg">
                <br>
                <img src="<?php echo e(asset('incs/images/hr_logobig.png')); ?>" class="" style="height: 100px;">
                    <h1 class="text-primary animated fadeInDownBig">USER ACCOUNT VERIFICATION</h1> 
                </div>
                <p align="justify" class="h4 text-center">Verify your account with the one time opt code sent to your mobile phone. The code expires in 30 minutes; make sure you complete the process on time </p><br>
               
                <form action="<?php echo e(url('/system/user/account/verification/'.\Crypt::encrypt(Auth::user()->id))); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="user" value="<?php echo e(Auth::user()->id); ?>">
                    <div class="form-group col-md-6 " >
                        <label for="">One Time Opt Code <div class="error"></div></label>
                        <input type="text" name="code" class="form-control" style="text-align: center;" required="">
                        <br>
                    <div class="form-group col-md-12" align="center">
                        <button type="submit" class="btn btn-primary btn-sm text-center">Verify Account</button>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                         <?php if(Session::has('alert')): ?>
                        <div class="alert alert-danger" align="center">
                            <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Ops!</strong> The code you entered <b>'<?php echo e(Session::get('error')); ?>'</b> does not match the code sent to your phone please verify from the SMS sent to you and try again  <a href="#" class="alert-link"></a>. 
                        </div> 
                        <?php endif; ?>
                         <?php if(Session::has('error')): ?>
                        <div class="alert alert-danger" align="center">
                            <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Ops!</strong> The code you entered <b>'<?php echo e(Session::get('error')); ?>'</b> does not match the code sent to your phone please verify from the SMS sent to you and try again  <a href="#" class="alert-link"></a>. 
                        </div> 
                        <?php endif; ?>

                        <div class=""> Didn't get the code or the code has expired? Dont worry you can resend new one here<a href="<?php echo e(url('/sendCode')); ?>" style="color: blue;"> here</a>
                        </div>

                    </div>
                    <div class="form-group col-md-6" align="center">
                        
                    </div>

                </form>
            </div>
        </div>
    </section>
    <br><br><br><br>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p> <small>National Open University of Nigeria<br>&copy; <?php echo e(date('Y')); ?>. </small> All Rigths reserved </p>
        </div>
    </footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>