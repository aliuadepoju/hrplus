<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New Branch</h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/branches')); ?>" method="POST" role="form">
            <?php echo e(csrf_field()); ?>

                <div class="form-group col-lg-4">
                    <label for="name" >Branch Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Branch Name">
                </div>
                <div class="form-group col-lg-4">
                  <label for="product_category_id">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="08012345678">
                </div>
                 <div class="form-group col-lg-4">
                  <label for="product_category_id">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="branch@noun.edu.ng">
                </div>
                <div class="form-group col-lg-4">
                    <label for="code" >Resident State</label>
                  <select class="" name="state_id" id="select2-option" style="width: 100%;">
                      <option value="1">Select A State</option>
                      <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($st->id); ?>"><?php echo e($st->state); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="code" >Resident LGA</label>
                  <select class="form-control" name="lga" id="lga" style="width: 100%;">
                      
                  </select>
                </div>

                <div class="form-group col-lg-4">
                    <label for="code" >Center Cordinator</label>
                  <select class="form-control" name="cord_id" id="select2-option" style="width: 100%;">
                      <option value="1">Select Cordinator</option>
                      <?php $__currentLoopData = $cords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($cd->id); ?>"><?php echo e($cd->surname); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>

                <div class="form-group col-lg-12">
                  <label for="description">Address</label>
                  <textarea  class="form-control" name="address" rows="3" placeholder="Address"></textarea>
                </div>
                <div class="form-group col-lg-12" align="center">
                    <a href="<?php echo e(url('/branches')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>