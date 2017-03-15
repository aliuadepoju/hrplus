  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo e($person->surname); ?>'s Email</h5>
        </div>
        <div class="panel-body">
           <form action="" method="" enctype="true">
          <div class="col-md-12">
            
            <div class="form-group col-md-4">
                <label for="">E-Mail Address</label>
                <input type="text" name="email" readonly="" class="form-control input-xs" value="<?php echo e($person->email); ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="">CC</label>
                <input type="text" name="email_cc" class="form-control input-xs" placeholder="copying email seperate with comas">
            </div>
            <div class="form-group col-md-4">
                <label for="">BCC</label>
                <input type="text" name="email_bcc" class="form-control input-xs" placeholder="blind copy emails seperate with comas">
            </div>
            
            <div class="form-group col-md-12">
                <label for="">Message Body </label>
                <textarea name="message" class="form-control" rows="4" style="width: 100%;"></textarea>
            </div>

            <hr>
            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> <i class=""></i> Send Mail</button>
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