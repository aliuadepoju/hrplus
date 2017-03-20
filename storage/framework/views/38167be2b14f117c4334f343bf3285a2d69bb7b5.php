  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo e($person->surname); ?>'s Document Upload</h5>
        </div>
        <div class="panel-body">
           <form action="<?php echo e(url('/pim/employees/data/documents/upload')); ?>" method="post" enctype="multipart/form-data" >
           <?php echo e(csrf_field()); ?>

           <input type="hidden" name="personnel_id" value="<?php echo e($person->id); ?>">
           <input type="hidden" name="personnel_names" value="<?php echo e($person->surname.'_'.$person->first_name.'_'.$person->middle_name); ?>">
          <div class="col-md-12">
            
            <div class="form-group col-md-4">
                <label for="">Document Title</label>
                <input type="text" name="title" class="form-control" placeholder="B. Sc Certificate ">
            </div>
            <div class="form-group col-md-4">
                <label for="">Issuing Authority</label>
                <input type="text" name="issuingauth" class="form-control" placeholder="Federal Univerity of Technology, Minna">
            </div>
            <div class="form-group col-md-4">
                <label for="">Document No.</label>
                <input type="text" name="docNo" class="form-control" placeholder="0001221/06">
            </div>

            <div class="form-group col-md-4">
                <label for="">Document Type </label>
                <select name="docType" id="select2-option" class="form-control" style="width: 100%;" required="">
                    <option value="">Select Type</option>
                    <?php $__currentLoopData = $doctypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->classification_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="">Expiration <small><i> (if any)</i></small></label>
                <input name="expiration" class="input-sm input-s datepicker-input form-control" size="16" type="text" value="12-02-1995" data-date-format="dd-mm-yyyy" style="width:100%;"> 
            </div> 

            <div class="form-group col-md-4">
                <label for="">Upload File </label>
                <input type="file" name="document" class="form-control">
            </div> 

            <div class="form-group col-md-12">
                <label for="">File Description </label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>  

            <div class="form-group pull-right">
                <!-- <button class="btn btn-xs btn-primary" type="button" onclick="doAlert();"> <i class="fa fa-plus"></i> </button> -->
            </div>

            <hr>
            <div class="form-group col-md-12" align="center">
                <a href="" class="btn btn-sm btn-danger"> Cancel </a>
                <button type="submit" class="btn btn-sm btn-primary"> Upload </button>
            </div>

          </div>
      </form>
        </div>
    </div>
</div>

