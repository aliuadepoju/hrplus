<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="index.html"><i class="fa fa-user"></i> Employees</a></li>
            <li class="active">Appraisals</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="jumbotron">
	        <div class="" align="center">
	        	<img src="<?php echo e(asset('/incs/images/hr_logo.png')); ?>" alt="" align="center">
	        </div>
	        <hr>
        	<!-- <h2 align="center">FEATURES COMING SOON! </h2> -->
        	<p align="justify">This module is under construction as the appraisal processes are being discussed with the management. Be patient we will notifiy you once the module is up even you will not see this message. </p>
        </div> 
        <div class="col-md-5">
	        <section class="panel panel-default">
	            <header class="panel-heading"> Appraisals Elements <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
	            	<div class="pull-right">
			            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Setup Elements</a> 
			            <!-- <a href="" class="btn btn-warning btn-xs"><i class="fa fa-share-square"></i> Export Report</a> -->
			            <!-- <div class="btn-group">
	                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
	                        <ul class="dropdown-menu">
	                            <li><a href="#">PDF</a></li>
	                            <li><a href="#">Excel</a></li>
	                        </ul>
	                    </div> -->
			        </div>
		        </header>
		        <div class="panel-body">
		               <div class="jumbotron">
		            	<p align="justify">Your appraisal elements will be listed here. If you are seeing this message it then means that the elements are not setup yet. </p>
		            </div>    
	            </div>
	        </section>
        </div>
        <div class="col-md-7">
	        <section class="panel panel-success">
	            <header class="panel-heading"> Appraisals Questions <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
	            	<div class="pull-right">
			            <a href="$" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Setup Questions</a> 
			            <!-- <a href="" class="btn btn-warning btn-xs"><i class="fa fa-share-square"></i> Export Report</a> -->
			            <!-- <div class="btn-group">
	                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
	                        <ul class="dropdown-menu">
	                            <li><a href="#">PDF</a></li>
	                            <li><a href="#">Excel</a></li>
	                        </ul>
	                    </div> -->
			        </div>
		        </header>
		        <div class="panel-body">
		            <div class="jumbotron">
		            	<p align="justify">Your appraisal questions will be listed here. If you are seeing this message it then means that the questions are not setup yet. </p>
		            </div>    
	            </div>
	        </section>
        </div>
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>