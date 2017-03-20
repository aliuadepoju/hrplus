  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Leave Form</h5>
        </div>
        <div class="panel-body">
           <form action="<?php echo e(url('/pim/employees/leave/new')); ?>" method="post" role="form">
           <?php echo e(csrf_field()); ?>

           <input type="hidden" name="personnel_id" value="<?php echo e($person->id); ?>">
          <div class="col-md-12">
            
            <div class="form-group col-md-3">
                <label for="">Leave Type </label>
                <select id="" class="form-control" style="width:100%;" name="lType" data-required="true" >
                   <option value="">Select Type</option>
                    <?php $__currentLoopData = $leavetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lT): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($lT->id); ?>"><?php echo e($lT->type_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="">Date Resumed Duty from previous leave</label>
                <input name="drdfpl" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2016" data-date-format="dd-mm-yyyy" style="width:100%;">
            </div>
            <div class="form-group col-md-4"  >
                <label for="">Date Proceeding on Leave</label>
                <input name="dpol" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2017" data-date-format="dd-mm-yyyy" style="width:100%;">
            </div>
            <div class="form-group col-md-4">
                <label for="">Date Leave Ends</label>
                <input name="dle" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2017" data-date-format="dd-mm-yyyy" style="width:100%;">
            </div>
            <div class="form-group col-md-4">
                <label for="">Date of Resumption of Duty</label>
                <input name="dorod" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2017" data-date-format="dd-mm-yyyy" style="width:100%;">
            </div>

            <div class="form-group col-md-4">
                <label for="" class="text-xs">Person responsible for duties during absence <small>(If Applicable)</small></label>
                <select name="personInAbsence" id="select2-option" style="width: 100%;">
                    <?php $__currentLoopData = $myTeam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php $__currentLoopData = $team->personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tP): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($tP->id); ?>"><?php echo e($tP->surname .' '.$tP->first_name. ' '.$tP->middle_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
                <!-- <input name="tLeaves" class="form-control text-center" readonly="" type="text" value="<?php echo e($person->getLeaves->count()); ?>" align="center"> -->
            </div>

            <!-- <div class="form-group col-md-4">
                <label for="">Your Total Leaves</label>
                <input name="tLeaves" class="form-control text-center" readonly="" type="text" value="<?php echo e($person->getLeaves->count()); ?>" align="center">
            </div> -->
            <hr>
            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> Submit </button>
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