  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo e($person->surname); ?>'s Change Study Center</h5>
        </div>
        <div class="panel-body">
           <form action="<?php echo e(url('/pim/employees/data/editBranch')); ?>" method="post" role="form">
           <?php echo e(csrf_field()); ?>

           <input type="hidden" name="personnel_id" value="<?php echo e($person->id); ?>">
          <div class="col-md-12">
            <div class="row">
              
            <div class="form-group col-md-6">
                <label for="">New Branch </label>
                <select id="" class="form-control" style="width:100%;" name="branch" data-required="true" >
                    <option value="">Select new branch</option>
                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Department </label>
                <select id="dept" style="width:100%;" name="dept" data-required="true" class="form-control">
                </select>
            </div>
            
            <div class="row col-md-12">
                <div class="panel">
                <div class="panel-header">
                  <header></header>
                </div>
                <div class="panel-body">
                  <div class="">
                    <p class="h4 "> <b style="color: red"> ***Warning:</b> Once this staff staff station is changed, all his records will be moved to the newly selected center. </p>
                  </div>
                </div>
              </div>
            </div>

            </div>
            

            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> Change Branch </button>
            </div>

          </div>
      </form>
        </div>
    </div>
</div>

<script>
  function doAlert() {
    alert('It worked');
  }
</script>