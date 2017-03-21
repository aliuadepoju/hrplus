<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Adding Stakeholder(s) to <?php echo e($ticket->title); ?></h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/system/tickets/'.$ticket->id.'/add-stakeholder')); ?>" method="POST">
                <input type="hidden" name="ticketID" value="<?php echo e($ticket->id); ?>" > 
            <?php echo e(csrf_field()); ?>

                <div class="form-group col-md-4">
                    <label>Stakeholder </label>
                    <select name="stakeholder" id="select2-option" style="width: 100%;" >
                        <option value="">Select Stakeholder</option>
                        <?php $__currentLoopData = $stakeholders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stkhd): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($stkhd->id); ?>"><?php echo e($stkhd->surname .' '.$stkhd->other_names); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select>
                </div>
                <!-- <div class="form-group col-md-6">
                    <label>Other Names</label>
                    <input type="text" class="form-control" name="othernames">
                </div>
                <div class="form-group col-md-6">
                    <label>Phone Number </label>
                    <input type="text" class="form-control" name="phoneNo">
                </div>
                <div class="form-group col-md-6">
                    <label>e-Mail Address</label>
                    <input type="email" class="form-control" name="email">
                </div> -->

                <div class="form-group col-md-8">
                  <label for="product_category_id">Reason for Addition</label>
                    <textarea name="reason_for_addition" id="" class="form-control" rows="3"></textarea>
                </div>
                
                <div class="form-group col-md-12" align="center">
                    <a href="<?php echo e(url('/system/rbac/roles')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>