  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Update <?php echo e($person->surname); ?>'s Salary Scale</h5>
        </div>
        <div class="panel-body">
          <form action="<?php echo e(url('/pim/employees/data/editSalaryScale')); ?>" method="post" enctype="multipart/form-data" >
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="pID" value="<?php echo e($person->id); ?>">
            <div class="col-md-6">
              <div class="row">
                
              <div class="form-group col-md-12">
                  <label for="">Select Desired Scale </label>
                  <select name="salary_scale" class="form-control" >
                    <option value="">Select Salary Scale</option>
                    <?php $__currentLoopData = $sScale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scale): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($scale->id); ?>"><?php echo e($scale->scale); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>
              </div>
              <div class="form-group col-md-12" align="center">
                  <button type="submit" class="btn btn-sm btn-primary"> Update Scale </button>
              </div>
              </div>
            </div>
          </form>

            <div class="form-group col-md-6">
                <p align="justify">
                <?php if($person->gender = 1): ?>
                  <b>Note</b> that if this personnel Salary Scale is not updated, his salary structure is questionable and is not visible to this system. The system can only read his information but could not make any intelligent informed decision about him. It is therefore adivised you upload his passport photograph. 
                <?php else: ?>
                  Note that if this personnel have no image, his identity is questionable and is not visible to this system. The system can only read her information but could not make any intelligent informed decision about her. It is therefore adivised you upload her passport photograph.
                <?php endif; ?>    
                </p>
            </div>
        </div>
    </div>
</div>
