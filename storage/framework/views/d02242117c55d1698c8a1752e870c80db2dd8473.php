<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Adding Role to <?php echo e($user->surname); ?></h5>
        </div>
        <div class="panel-body">
            <form method="POST" action="<?php echo e(url('/system/users/attach_role')); ?>" role="form">
                <div class="form-group col-lg-12">
                    <label for="code" >Select Role(s) from the dropdown box</label>
                  <select class="" name="role_id[]" id="select2-tags" style="width: 100%;" multiple="">
                      <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($rl->id); ?>"><?php echo e($rl->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>

                <div class="form-group col-lg-12" align="center">
                    <a href="<?php echo e(url('/system/users/profile/'.$user->id)); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>