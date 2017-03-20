<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo e(url('/branches')); ?>"><i class="fa fa-cogs"></i> System Preference</a></li>
            <li class="active">Roles</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="row collapse" id="newrole">
                 <?php echo $__env->make('system.acl.roles.new', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Roles <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                <?php if (Auth::check() && Auth::user()->hasRole('hr-admin | administrator')): ?>
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newrole" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-plus-square"> </i> Setup New System Role</button>
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
                    <table class="table table m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Role </th>
                                <th style="text-align: center;">Users in Role</th>
                                <th>Role Permissions</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($sn); ?></td>
                                <td><a href="<?php echo e(url('/system/rbac/role/data/'.\Crypt::encrypt($role->id))); ?>" class="link"> <?php echo e($role->name); ?></a></td>
                                <td align="center"><?php echo e($role->users->count()); ?></td>
                                <td align="left">
                                        <!-- if(count($perms)>0)
                                            foreach(perms as perm)
                                             UCfirst($perm) <br />
                                            endforeach
                                            else
                                            N/A
                                        endif -->
                                </td>
                                <td>
                                    <?php if($role->status == 1): ?>
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
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>