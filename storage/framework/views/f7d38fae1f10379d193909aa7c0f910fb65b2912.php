<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New Unit</h5>
        </div>
        <div class="panel-body">
            <form>
                <div class="form-group col-lg-4">
                    <label for="code" >Parent Department</label>
                  <select class="" name="branch_id" id="select2-option" style="width: 100%;">
                      <option value=""><?php echo e($unit->getDept->dept_name); ?></option>
                      <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpt): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($dpt->id); ?>"><?php echo e($dpt->dept_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="name" >Unit Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e($unit->unit_name); ?>">
                </div>
                <div class="form-group col-lg-4">
                  <label for="product_category_id">Unit Tree</label>
                  <select name="u_tree" id="" class="form-control" required="">
                    <option value=""><?php echo e($unit->unit_tree); ?></option>
                    <option value="1">1: One </option>
                    <option value="2">2: Two </option>
                    <option value="3">3: Three </option>
                    <option value="4">4: Four </option>
                    <option value="5">5: Five </option>
                  </select>
                </div>
                <div class="form-group col-lg-12">
                  <label for="description">Description</label>
                  <textarea  class="form-control" name="description" rows="3" placeholder="Description of the unit"><?php echo e($unit->description); ?></textarea>
                </div>
                <div class="form-group col-lg-12" align="center">
                    <a href="<?php echo e(url('/branches/departments/units/1')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>