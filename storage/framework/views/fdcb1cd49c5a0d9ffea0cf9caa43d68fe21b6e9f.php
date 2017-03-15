<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo e(url('/branches')); ?>"><i class="fa fa-cogs"></i> System Preference</a></li>
            <li class="active">Users</li>
        </ul>
        <div class="m-b-md">
            <?php if(Session::has('message')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Thank you.</strong> You successfully added <a href="#" class="alert-link"><?php echo e(Session::get('message')); ?></a>. 
            </div> 
            <?php endif; ?>
        </div>
        <div class="row collapse" id="newuser">
                 <?php echo $__env->make('system.users.new', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Branches <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newuser" aria-expanded="false" aria-controls="collapseExample">Add New User</button>
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
                    <table class="table table-striped m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Full Names </th>
                                <th>Branch/Center</th>
                                <th>Phone Number</th>
                                <th>e-Mail</th>
                                <th>Role(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($sn); ?></td>
                                <td><a href="<?php echo e(url('/system/users/profile/'.\Crypt::encrypt($user->id))); ?>" class="link"> <?php echo e($user->surname .' '.$user->first_name.' '.$user->middle_name); ?></a></td>
                                <td><?php echo e($user->getBranch->branch_name); ?></td>
                                <td><?php echo e($user->phone); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td align="left">
                                    <?php $roles = $user->getRoles(); ?>
                                        <?php if(count($roles)>0): ?>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php echo e(UCfirst($role)); ?><br />
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <?php else: ?>
                                            N/A
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
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>