  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo e($leave->getParent->type_name); ?>'</h5>
        </div>
        <div class="panel-body">
           <form action="" method="" >
          <div class="col-md-12">
            
            <div class="form-group col-md-6">
                <label for="">Element 1</label>
                <input type="text" name="numbers" class="form-control" value="">
            </div>

            <div class="form-group col-md-6">
                <label for="">Element 2</label>
                <input type="text" name="numbers" class="form-control" value="">
            </div>

            <div class="form-group col-md-4">
                <label for="">Commencement Date</label>
                <input name="commencement" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-1985" data-date-format="dd-mm-yyyy" style="width:100%;">    
            </div>

            <div class="form-group col-md-4">
                <label for="">Termination Date</label>
                <input name="termination" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-1985" data-date-format="dd-mm-yyyy" style="width:100%;">    
            </div>

            <div class="form-group col-md-4">
                <label for="">Status</label>
                <select name="options" id="select2-option" class="" required="" style="width: 100%;">
                	<option value="">Select one</option>
                	<option value="">Seen</option>
                	<option value="">Reviewed</option>
                	<option value="">Approved</option>
                	<option value="">Rejected</option>
                </select>
            </div>
            
            <div class="form-group col-md-12">
                <label for="">Recommendation(s) </label>
                <textarea name="recommendation" class="form-control" rows="2"></textarea>
            </div>


            <hr>
            <div class="form-group col-md-12" align="center">
            	<a href="<?php echo e(url('/pim/employees/leaves/'.$leave->id)); ?>" class="btn btn-sm btn-danger">Cancel</a>
                <button type="submit" class="btn btn-sm btn-primary"> Submit </button>
            </div>

          </div>
      </form>
        </div>
    </div>
</div>