<div class="col-md-12">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h5 class="panel-title">Closing <?php echo e($ticket->title); ?></h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/system/tickets/'.$ticket->id.'/close')); ?>" method="POST">
                <input type="hidden" name="ticketID" value="<?php echo e($ticket->id); ?>" > 

            <?php echo e(csrf_field()); ?>

                <div class="form-group col-md-5">
                        <label>Status</label>
                        <select name="status" class="form-control" required="">
                            <option value="">Select task</option>
                            <option value="1">Open</option>
                        </select>
                    </div>
                 <div class="form-group col-md-7">
                  <label for="product_category_id">Note</label>
                    <textarea name="process_note" id="" class="form-control" rows="3"></textarea>
                </div>
               
                
                <div class="form-group col-md-12" align="center">
                    <a href="<?php echo e(url('/system/rbac/roles')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <p align="center">Be aware that this action could cause a lot of missleading interpretation about this ticket. You may wish to continue.</p>
        </div>
    </div>
</div>