  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo e($person->surname); ?>'s Change LGA</h5>
        </div>
        <div class="panel-body">
           <form action="<?php echo e(url('/pim/employees/data/editLGA')); ?>" method="post" role="form">
           <?php echo e(csrf_field()); ?>

           <input type="hidden" name="personnel_id" value="<?php echo e($person->id); ?>">
          <div class="col-md-12">
            
            <div class="form-group col-md-6">
                <label for="">State of Origin </label>
                <select id="state" style="width:100%;" name="state" data-required="true" class="form-control">
                    <option value="<?php echo e($person->getState->id); ?>"><?php echo e($person->getState->state); ?></option>
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($st->id); ?>"><?php echo e($st->state); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="">LGA of Origin</label>
                <select name="lga" id="lga" class="form-control"></select>
            </div>
            <hr>
            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> Change LGA </button>
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