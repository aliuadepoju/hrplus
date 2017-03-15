<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title" align="center"> DEACTIVATING <?php echo e($branch->branch_name); ?></h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/branches/data/deactivate/'.$branch->id)); ?>" method="POST" role="form" class="form">
            <?php echo e(csrf_field()); ?>

                <input type="hidden" class="form-control" id="branchId" name="branchId" value="<?php echo e($branch->id); ?>">
                
                <div class="form-group col-lg-12">
                 <p align="justify"> <b style="color: red;">Are you sure you want to deactivate this study center?</b> You are laible for this action and it is not revocable. All activities of staff and records to this study center are hereby termed floating once you complete this action.</p>
               </div>

                <div class="form-group col-lg-12">
                  <label for="description">Reason for deactivation</label>
                  <textarea  class="form-control" name="reason" rows="3" placeholder=""></textarea>
                </div>
                <div class="form-group col-lg-12" align="center">
                    <a href="<?php echo e(url('/branches/data/'.$branch->id)); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>