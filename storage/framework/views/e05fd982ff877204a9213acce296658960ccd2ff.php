<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Editing <?php echo e($role->name); ?></h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/system/rbac/role/edit')); ?>" method="POST">
            <input type="hidden" class="form-control" id="role_id" name="role_id" value="<?php echo e($role->id); ?>">
            <?php echo e(csrf_field()); ?>

                <div class="form-group col-lg-4">
                    <label for="name" >Role Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e($role->name); ?>">
                </div>
                <div class="form-group col-lg-4">
                    <label for="name" >Role Slug</label>
                    <input type="text" class="form-control" id="name" name="slug" value="<?php echo e($role->slug); ?>">
                </div>

                <div class="form-group col-lg-4">
                    <label for="code" >Permission(s)</label>
                  <select class="" name="perm_id[]" id="select2-tags" style="width: 100%;" multiple="">
                      <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($prm->id); ?>"><?php echo e($prm->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>
                 <div class="form-group col-lg-12">
                  <label for="product_category_id">Description</label>
                    <textarea name="description" id="" class="form-control" rows="3"><?php echo e($role->description); ?></textarea>
                </div>
               
                
                <div class="form-group col-lg-12" align="center">
                    <a href="<?php echo e(url('/system/users')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>