<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New Salary Scale Category</h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/system/salary-structures/NewScales')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

                <div class="form-group col-lg-6">
                    <label for="name" >Parent Category</label>
                    <select class="" name="category" id="select2-option" style="width: 100%;" required="">
                      <option value=""> Select a category </option>
                    <?php $__currentLoopData = $salCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($cats->id); ?>"> <?php echo e($cats->category_name); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="name" >Scale Name</label>
                    <input type="text" class="form-control" id="name" name="scaleName" placeholder="CONTISS">
                </div>

                <div class="form-group col-lg-6">
                    <label for="name" >Min. Salary Range</label>
                    <input type="text" class="form-control" id="min_salary_range" name="min_salary_range" placeholder="1500565.65">
                </div>
                <div class="form-group col-lg-6">
                    <label for="name" >Max. Salary Range</label>
                    <input type="text" class="form-control" id="max_salary_range" name="max_salary_range" placeholder="1500565.65">
                </div>

                <div class="form-group col-lg-12">
                    <label for="code" >Category Type</label>
                    <select name="grouping" id="" class="form-control" required="">
                      <option value=""> Select a grouping </option>
                      <option value="1"> Junior </option>
                      <option value="2"> Senior </option>
                    </select>
                </div>

                <div class="form-group col-lg-12">
                  <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" rows="3" placeholder="CONTISS"></textarea>
                </div>
                  
                
                <div class="form-group col-lg-12" align="center">
                    <a href="<?php echo e(url('/system/salary-structures/_Scales')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>