  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo e($person->surname); ?>'s Report Generation</h5>
        </div>
        <div class="panel-body">
           <form action="" method="" enctype="true">
          <div class="col-md-12">
            <div class="col-md-6">
                <div class="panel wrapper panel-success">
                    <header> Basic Criteria </header>
                    <div class="panel-body">
                            
                        <div class="form-group col-md-12">
                            <div class="checkbox">
                                <label class="checkbox-custom">
                                    <input type="checkbox" name="checkboxB" id="2"> <i class="fa fa-fw fa-square-o"></i> All Elements </label>
                            </div>
                            <div class="checkbox">
                                <label class="checkbox-custom">
                                    <input type="checkbox" name="checkboxB" id="2"> <i class="fa fa-fw fa-square-o"></i> State </label>
                            </div>
                            <div class="checkbox">
                                <label class="checkbox-custom">
                                    <input type="checkbox" name="checkboxB" id="2"> <i class="fa fa-fw fa-square-o"></i> Study Center Data </label>
                            </div>
                            <div class="checkbox">
                                <label class="checkbox-custom">
                                    <input type="checkbox" name="checkboxB" id="2"> <i class="fa fa-fw fa-square-o"></i> Documents </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel wrapper panel-success">
                    <header > Advance Criteria</header>
                    <div class="panel-body">
                            
                        <div class="form-group col-md-12">
                            <div class="checkbox">
                                <label class="checkbox-custom">
                                    <input type="checkbox" name="checkboxB" id="2"> <i class="fa fa-fw fa-square-o"></i> All Elements </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> <i class=""></i> Generate Report</button>
                <button type="submit" class="btn btn-sm btn-info"> <i class=""></i> e-Mail Report</button>
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