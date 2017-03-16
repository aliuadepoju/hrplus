  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo e($person->surname); ?>'s Next of Kin</h5>
        </div>
        <div class="panel-body">
        
           <form action="<?php echo e(url('/pim/employees/data/nok_update')); ?>" method="post" role="form">
           <?php echo e(csrf_field()); ?>

           <input type="hidden" name="personnel_id" value="<?php echo e($person->id); ?>">
          <div class="col-md-12">
            <div class="row">
              <div class="form-group col-md-4">
                  <label for="">Full Names</label>
                  <input type="text" name="nok_name" class="form-control" value="<?php echo e(isset($person->getNOK) ? $person->getNOK->full_names : 'NA'); ?>">    
              </div>

              <div class="form-group col-md-3">
                  <label for="">Phone No </label>
                  <input type="text" name="nok_phone" class="form-control" value="<?php echo e(isset($person->getNOK) ? $person->getNOK->phone_no : 'NA'); ?>">    
              </div>

              <div class="form-group col-md-3">
                  <label for="">Relationship </label>
                  <select name="nokRel" id="" class="form-control" required="" >
                     <option value="">Select Relationship</option>  
                        <option value="1">Son</option>  
                        <option value="2">Daughter</option>  
                        <option value="3">Brother</option>  
                        <option value="4">Sister</option>  
                        <option value="5">Parent</option>  
                        <option value="500">Others (Specify)</option> 
                  </select>
                  <div class="" id="nok_other">
                      <label for="">Other Relationship</label>
                      <input type="text" name="nok_other_name" class="form-control" value="<?php echo e(isset($person->getNOK) ? $person->getNOK->relation_other_name : 'NA'); ?>" >    
                  </div>
              </div>
              <div class="form-group col-md-2">
                  <label for="">Gender </label>
                  <select name="nokRel" id="" class="form-control" required="" style="width: 100%;">
                     <option value="">Select Gender</option>  
                      <option value="1">Male</option>  
                      <option value="2">Female</option>  
                  </select>
              </div>
          </div>
            
          <div class="row">
              <div class="form-group col-md-3">
                  <label for="">Birth Date </label>
                  <input name="nok_dob" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-1985" data-date-format="dd-mm-yyyy" style="width:100%;">   
              </div>
              <div class="form-group col-md-3">
                  <label for="">Street No & Name</label>
                  <input type="text" class="form-control" name="nok_street_name_no" value="<?php echo e(isset($person->getNOK) ? $person->getNOK->street_name : 'NA'); ?>">
              </div>
              <div class="form-group col-md-3">
                  <label for="">Residence State </label>
                  <select id="nok_r_state" style="width:100%;" name="nok_r_state" data-required="true" class="form-control">
                      <option value="">Select State</option>
                      <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <option value="<?php echo e($st->id); ?>"><?php echo e($st->state); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </select>

              </div>

              <div class="form-group col-md-3">
                  <label for="">Residence LGA</label>
                  <select name="nok_r_lga" id="nok_r_lga" class="form-control"></select>
              </div>

              <div class="form-group col-md-12">
                  <label for="">Town/Locality </label>
                  <input type="text" name="nok_locality" class="form-control" value="<?php echo e(isset($person->getNOK) ? $person->getNOK->town: 'NA'); ?>">    
              </div>
          </div>


            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> Update Data </button>
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