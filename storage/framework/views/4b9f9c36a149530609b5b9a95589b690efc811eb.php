<?php $__env->startSection('content'); ?>
<?php echo e(csrf_field()); ?>

<section id="content">
        <div class="row m-n">
        <br>
            <div class="col-sm-4 col-md-8 col-md-offset-0">
               <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">New Support Ticket</h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo e(url('/system/tickets/new')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title" >Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Invalid page show ">
                    </div>
                    <div class="form-group col-md-6">
                        
                        <label for="category" >Category</label>
                        <select name="category" class="form-control"  required="" >
                          <option value="">Select a category</option>
                          <?php $__currentLoopData = $nCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="priority" >Priority</label>
                        <select name="priority" class="form-control" required="" >
                          <option value="">Select a priority</option>
                          <option value="1">1 High </option>
                          <option value="2">2 Medium</option>
                          <option value="3">3 Urgent </option>
                          <option value="4">4 Very Urgent</option>
                          <option value="5">5 ASAP</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date" >Dated</label>
                        <input name="doi" class="input-s datepicker-input form-control" size="16" type="text" value="<?php echo e(date('d-m-y')); ?>" data-date-format="dd-mm-yyyy" style="width:100%;"> 
                    </div>
                    <div class="form-group col-md-12">
                      <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Precisely describe the issue needing support."></textarea>
                    </div>
                     
                    <div class="form-group col-md-12" align="center">
                        <a href="<?php echo e(url('/system/')); ?>" class="btn btn-danger">Cancel</a>
                        <button type="submit" id="" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="">
          <h3 align="left">Ticket Priority</h3>
            <p align="justify">1 - High demanding issue <br>2 - Medium demanding Issue<br> 3 - Needing Urgent attention<br> 4 - Needing Immediate attention <br> 5 - ASAP Instant attention.</p>
        </div>
    </div>
            </div>
            <div class="col-sm-4 col-md-4 col-md-offset-0">
                <div class="m-b-lg">
                 <br><br>
                 
                </div>
                <p align="justify" class="h5 text-center"><h3 align="center">USESFULLNESS OF TICKETS </h3></p>
                <p>For us to provide Consistent Customer Service (CCS):</p>
                <div class="panel-group m-b" id="accordion2">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> Customer Feedback help us serve you better<small></small></a> </div>
                        <div id="collapseOne" class="panel-collapse in">
                            <div class="panel-body text-sm">
                            <p align="justify" class=""> This kind of error occurs only when any of the following conditions is met:</p>
                                <ul>
                                    <li> The resources looked for does not exist.</li>
                                    <li>Invalid url or link visited. The link showing at the address bar does not exist or any resource(s) associated with it on the system</li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p> <small>National Open University of Nigeria<br>&copy; <?php echo e(date('Y')); ?>. </small> All Rigths reserved </p>
        </div>
    </footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>