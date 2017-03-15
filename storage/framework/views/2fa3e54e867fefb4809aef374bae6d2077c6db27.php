<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New System User</h5>
        </div>
        <div class="panel-body">
            <form method="POST" action="<?php echo e(url('/system/users')); ?>">
            <?php echo e(csrf_field()); ?>

                <div class="form-group col-lg-3">
                    <label for="name" >Surname</label>
                    <input type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
                </div>
                <div class="form-group col-lg-3">
                    <label for="name" >Middle Name</label>
                    <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
                </div>
                <div class="form-group col-lg-3">
                    <label for="name" >First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                </div>
                <div class="form-group col-lg-3">
                  <label for="product_category_id">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="08012345678">
                </div>
                 <div class="form-group col-lg-4">
                  <label for="product_category_id">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="user@noun.edu.ng">
                </div>
                <div class="form-group col-lg-3">
                    <label for="code" >Branch/Branch/Study Center</label>
                  <select class="" name="branch_id" id="select2-option" style="width: 100%;">
                      <option value="1">Select one</option>
                      <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>
                <div class="form-group col-lg-3">
                    <label for="code" >Department</label>
                  <select class="form-control" name="dept_id" id="" style="width: 100%;">
                      <option value="1">Select one</option>
                      <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($dept->id); ?>"><?php echo e($dept->dept_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>
                <div class="form-group col-lg-3">
                    <label for="code" >Unit</label>
                  <select class="form-control" name="unit_id" id="" style="width: 100%;">
                      <option value="1">Select one</option>
                      <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($unit->id); ?>"><?php echo e($unit->unit_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>

                <div class="form-group col-lg-6">
                    <label for="code" >Role(s)</label>
                  <select class="" name="role_id[]" id="select2-tags" style="width: 100%;" multiple="">
                      <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($rl->id); ?>"><?php echo e($rl->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>

                <div class="form-group col-lg-6">
                    <label for="code" >Permission(s)</label>
                  <select class="form-control" name="perm_id[]" id="select2-option" style="width: 100%;" multiple="">
                      <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($prm->id); ?>"><?php echo e($prm->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>
               
                
                <div class="form-group col-lg-12" align="center">
                    <a href="<?php echo e(url('/system/users')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>