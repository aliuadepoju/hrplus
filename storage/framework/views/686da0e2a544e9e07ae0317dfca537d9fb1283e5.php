<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New Salary Scale Category</h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/system/salary-structures/categories')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

                <div class="form-group col-lg-12">
                    <label for="name" >Scale Category Name</label>
                    <input type="text" class="form-control" id="name" name="catName" placeholder="CONTISS">
                </div>
                <div class="form-group col-lg-6">
                    <label for="name" >Category Code</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="CONTISS">
                </div>

                <div class="form-group col-lg-6">
                    <label for="code" >Category Type</label>
                  <select class="" name="type" id="select2-option" style="width: 100%;">
                      <option value="1"> Academic </option>
                      <option value="2"> Non Academic</option>
                  </select>
                </div>
                 <div class="form-group col-lg-12">
                  <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" rows="3" placeholder="CONTISS"></textarea>
                </div>
               
                
                <div class="form-group col-lg-12" align="center">
                    <a href="<?php echo e(url('/system/salary-structures/Categories')); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>