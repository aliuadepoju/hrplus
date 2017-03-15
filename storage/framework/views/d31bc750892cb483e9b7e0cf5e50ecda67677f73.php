<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New Department</h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/branches/departments')); ?>" method="POST" role="form">
            <?php echo e(csrf_field()); ?>

                <div class="form-group col-lg-4">
                    <label for="code" >Parent Branch</label>
                  <select class="" name="branch_id" id="select2-option" style="width: 100%;">
                      <option value="1">Select A Branch</option>
                      <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brnc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($brnc->id); ?>"><?php echo e($brnc->branch_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="name" >Department Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Department Name">
                </div>
                <div class="form-group col-lg-4">
                  <label for="product_category_id">Email</label>
                    <input type="text" class="form-control" id="code" name="email" placeholder="Department email">
                </div>
                <div class="form-group col-lg-12">
                  <label for="description">Description</label>
                  <textarea  class="form-control" name="description" rows="3" placeholder="Description"></textarea>
                </div>
                <div class="form-group col-lg-12" align="center">
                    <a href="<?php echo e(url('/branches/departments')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>