<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Assigning <?php echo e($ticket->title); ?></h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/system/tickets/'.$ticket->id.'/assign')); ?>" method="POST">
                <input type="hidden" name="ticketID" value="<?php echo e($ticket->id); ?>" > 
            <?php echo e(csrf_field()); ?>

                <div class="form-group col-md-4">
                        <label>Responsible Person</label>
                        <select name="user" class="form-control" required="">
                            <option value="">Select user to assign task to</option>
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
                            <option value="<?php echo e($usr->id); ?>"><?php echo e($usr->surname .' '.$usr->first_name.' '.$usr->middle_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>To be resolved in... <small>days</small></label>
                        <input type="text" class="form-control" name="days">
                    </div>
                 <div class="form-group col-md-5">
                  <label for="product_category_id">Note</label>
                    <textarea name="assignement_note" id="" class="form-control" rows="3"></textarea>
                </div>
                 <div class="form-group col-md-12">
                  <label for="product_category_id">Process Note</label>
                    <textarea name="process_note" id="" class="form-control" rows="3"></textarea>
                </div>

               
                
                <div class="form-group col-md-12" align="center">
                    <a href="<?php echo e(url('/system/rbac/roles')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>