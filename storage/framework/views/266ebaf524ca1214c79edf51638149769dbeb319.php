<?php $__env->startSection('content'); ?>
<!-- <body class="bg-light" style="background:#f4f4f4 url('../../incs/images/login_bg_1.jpg') 0 0 no-repeat;background-size:cover;"> -->
<section id="content" class="m-t-lg wrapper-md animated fadeInUp col-md-offset-7" >
        <div class="container aside-xxl"> <a class="navbar-brand block" href=""><img src="<?php echo e(asset('incs/images/hr_logo.png')); ?>" alt="" ></a>
            <section class="panel bg-white m-t-lg">
                <header class="panel-heading text-center"> <strong>System Login</strong> </header>
                <form action="<?php echo e(url('/login')); ?>" method="POST" class="panel-body wrapper-lg">
                <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" placeholder="me@noun.edu.ng" class="form-control"> 
                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" id="inputPassword" placeholder="Password" class="form-control">
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?> 
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me </label>
                    </div> <a href="<?php echo e(url('/password/reset')); ?>" class="pull-right m-t-xs"><small>Forgot password?</small></a>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    <div class="line line-dashed"></div>
                    <!-- footer -->
                    <footer id="footer" class="col-md-offset-0">
                        <div class="text-center padder">
                            <p> <small>National Open University of Nigerian <br>&copy; <?php echo e(date('Y')); ?></small> All rights reserved. </p>
                        </div>
                    </footer>
                </form>
            </section>
        </div>
        <br><br><br><br><br><br><br><br><br>
    
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>