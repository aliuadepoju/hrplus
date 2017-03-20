  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Sent <?php echo e($person->surname); ?> SMS</h5>
        </div>
        <div class="panel-body">
           <form action="" method="" enctype="true">
          <div class="col-md-12">
            
            <div class="form-group col-md-6">
                <label for="">Phone Numbers</label>
                <input type="text" name="numbers" class="form-control" value="<?php echo e($person->phone_no.','.$person->alternate_phone_no); ?>">
            </div>
            
            <div class="form-group col-md-6">
                <label for="">Message Body <small style="color: red;">Not more than 160 characters</small></label>
                <!-- <input type="text" name="docuNo" class="form-control" placeholder="0001221/06"> -->
                <textarea name="message" class="form-control" rows="4"></textarea>
            </div>

            <hr>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-sm btn-primary"> Send </button>
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