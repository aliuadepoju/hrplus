<?php 
    $from = new DateTime($person->getNounInfos->date_of_entry);
    $dob = new DateTime($person->dob);
    $to   = new DateTime('today');

?>  
<?php $__env->startSection('content'); ?>
<section class="vbox">
    
    <header class="header bg-white b-b b-light">
        <p><?php echo e($person->surname); ?>'s profile 
            <div class="pull-right">
            <br>
                <div class="btn-group">
                    <button class="btn btn-warning btn-xs btn-flat ">Personnel Actions</button>
                    <button class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a class="" data-toggle="collapse" data-target="#" aria-expanded="false" aria-controls="collapseExample">Edit Records</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#cCenter" aria-expanded="false" aria-controls="collapseExample">Change Study Center</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#lga" aria-expanded="false" aria-controls="collapseExample">Change LGA</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#suspend" aria-expanded="false" aria-controls="collapseExample">Suspend Personnel</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#nok" aria-expanded="false" aria-controls="collapseExample">Update NOK</a></li>
                        <li class="divider"></li>
                        <li><a class="" data-toggle="collapse" data-target="#upload" aria-expanded="false" aria-controls="collapseExample">Upload Document</a></li>
                        <li><a class="" data-toggle="collapse" data-target="#report" aria-expanded="false" aria-controls="collapseExample">Export Report</a></li>
                    </ul>
                </div>
                <button class="btn btn-xs btn-success" type="button" data-toggle="collapse" data-target="#email" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-envelope"> </i> Send e-Mail</button>
                <button class="btn btn-xs btn-dark" type="button" data-toggle="collapse" data-target="#sms" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-envelope-o"> </i> Send SMS</button>

                <a href="#" class="btn btn-info btn-xs"> <i class="fa fa-user"></i> My Appraisal </a> 
                <button class="btn btn-info btn-xs" data-toggle="collapse" data-target="#leavesform" aria-expanded="false" aria-controls="collapseExample">Leave Form</button> <br>

            </div>
        </p>
    </header>
    <section class="scrollable">
        <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r">
                <section class="vbox">
                    <section class="panel panel-default">
                        <header class="panel-heading bg-primary lt no-border">
                            <div class="clearfix">
                                <a href="#" class="pull-left thumb avatar b-3x m-r"> 
                                <?php $fpath = public_path().'/incs/images/personnel/'.$person->id.'.jpg' ;?>
                                    <?php if(file_exists($fpath)): ?>
                                        <img src="<?php echo e(asset('incs/images/personnel/'.$person->id.'.jpg')); ?>" class="img-circle"> 
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('incs/images/personnel/no-pic.jpg')); ?>" class="img-circle"> 
                                    <?php endif; ?>
                                </a>
                                <div class="clear">
                                    <div class="h4 m-t-xs m-b-xs text-white"> <?php echo e($person->surname.' '.$person->middle_name. ' '.$person->first_name); ?> <i class="fa fa-circle text-white pull-right text-xs m-t-sm"></i> </div> <small class="text-muted"><?php echo e($person->getNounInfos->rank); ?></small> 

                                    <br> 
                                </div>
                            </div>
                        </header>
                        <div class="list-group no-radius alt">
                            <ul class="list-group no-radius">
                                <li class="list-group-item"> <i class="fa fa-phone"></i> <b> Phone Numbers: </b><br> <?php echo e($person->phone_no.', '.$person->alternate_phone_no); ?></li>
                                <li class="list-group-item"> <i class="fa fa-envelope"></i> <b> e-Mail Address: </b><br> <?php echo e($person->email); ?></li>
                                <li class="list-group-item"> <i class="fa fa-user"></i> <b> State of Origin/LGA: </b><br> <?php echo e($person->getState->state); ?> &emsp;- &emsp; <?php echo e(isset($person->getLga) ? $person->getLga->lga_name: "Not set"); ?></li>
                                <li class="list-group-item"> <i class="fa fa-sitemap"></i> <b> Department: </b><br> <?php echo e($person->getNounInfos->getDept->dept_name); ?></li>
                                <li class="list-group-item"> <i class="fa fa-sitemap"></i> <b> Unit: </b><br> <?php echo e($person->getNounInfos->getUnit->unit_name); ?></li>
                                <li class="list-group-item"> <i class="fa fa-clock-o"></i> <b> In Service Since: </b><br> <?php echo e($from->format('d M, Y')); ?> (<?php echo e($from->diff($to)->y); ?>Yrs, <?php echo e($from->diff($to)->m); ?> Months)</li>
                                <li class="list-group-item"> <i class="fa fa-clock-o"></i> <b> Date of Birth: </b><br> <?php echo e($dob->format('d M, Y')); ?> (<?php echo e($dob->diff($to)->y); ?>Yrs, <?php echo e($dob->diff($to)->m); ?> Months)</li>
                                <li class="list-group-item"> <i class="fa fa-clock"></i> <b> Retirement by Birth: </b><br> precise date</li>
                                <li class="list-group-item"> <i class="fa fa-clock"></i> <b> Retirement by Employment: </b><br> precise date</li>
                            </ul>
                        </div>
                    </section>
                </section>
            </aside>
            <aside class="bg-white">
            <!-- Notification -->
            <?php if(session()->has('flash_notification.message')): ?>
                <div class="alert alert-<?php echo e(session('flash_notification.level')); ?>">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo session('flash_notification.message'); ?>

                </div>
            <?php endif; ?>
            <!-- /Notification -->

                <div class="row collapse" id="leavesform">
                    <?php echo $__env->make('pim.options.leaveForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="row collapse" id="nok">
                    <?php echo $__env->make('pim.options.nok', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="row collapse" id="lga">
                    <?php echo $__env->make('pim.options.editLGA', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="row collapse" id="sms">
                    <?php echo $__env->make('pim.sms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="row collapse" id="cCenter">
                    <?php echo $__env->make('pim.options.editBranch', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="row collapse" id="email">
                    <?php echo $__env->make('pim.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="row collapse" id="upload">
                    <?php echo $__env->make('pim.documentCenter.personDocument', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="row collapse" id="report">
                    <?php echo $__env->make('pim.reportCriteria', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="row collapse" id="suspend">
                    <?php echo $__env->make('pim.options.disablePerson', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
             <!-- Page Options  -->
             <!-- /Page Options -->
             <section class="panel col-md-12">
                <div class="col-md-10">
                    <section class="panel ">
                        <div class="panel-body" style="height: ; width: ">
                        <p class="h5 "><b>Rank:</b> <br> <?php echo e($person->getNounInfos->rank); ?> </p> <br>
                        <p class="h5 "> <b>Study Center: </b><br><?php echo e($person->getNounInfos->getBranch->branch_name); ?></p>
                        </div>
                    </section>
                </div>
                <div class="col-md-2    ">
                    <section class="panel ">
                        <div class="panel-body" align="right" style="height: ; width: ">
                            <?php echo DNS2D::getBarcodeHTML($person->surname.' '.$person->first_name.' '.$person->middle_name, "QRCODE", 2,2);; ?> NOUN/<?php echo e($person->unique_id); ?>

                        </div>
                    </section>
                </div>
             </section>
                <!-- Remaining content goes here! -->
                <section class="panel panel-default">
                    <header class="panel-heading bg-light">
                        <ul class="nav nav-tabs nav-white">
                            <li class="active"><a href="#home" data-toggle="tab"> <i class="fa fa-home"></i> Home</a></li>
                            <li class=""><a href="#qual" data-toggle="tab"> <i class="fa fa-certificate"></i> Qualifications & Dates</a></li>
                            <li class=""><a href="#salaryhistory" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> Promotions</a></li>
                            <li class=""><a href="#documentCenter" data-toggle="tab"><i class="fa fa-folder-open"></i> Doc. Center</a></li>
                            <li class=""><a href="#jobhistory" data-toggle="tab"> <i class="fa fa-file"></i> Job History</a></li>
                            <li class=""><a href="#leaves" data-toggle="tab"> <i class="fa fa-file-o"></i> Leaves</a></li>
                            <li class=""><a href="#disciplinary" data-toggle="tab"> <i class="fa fa-gavel"></i> Disciplinary Activities</a></li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                 <div class="col-md-12">
                                        <section class="panel panel-default">
                                            <header class="panel-heading"> Appraisal Center <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                                            <div class="pull-right">Total Questions: <b>65</b>, Total feedback replied: <b>45</b>, feedback left: <b>20</b>  </div> 
                                            </header>
                                            <div class="panel-body">
                                            <div class="panel-group m-b" id="accordion2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> Element #1  <small>Job Knowledge</small></a> </div>
                                                <div id="collapseOne" class="panel-collapse in">
                                                    <div class="panel-body text-sm">
                                                        <ul>
                                                            <li> <a href=""> How long have you been in the service of NOUN</a></li>
                                                            <li><a href=""> What training or development recommendations did you agree on?</a></li>
                                                        </ul> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo"> Element #2 <small>Team manship</small></a> </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="panel-body text-sm">
                                                        <ul>
                                                            <li> <a href=""> Do you play along with other members of your department/unit?</a></li>
                                                            <li> <a href=""> Do you always seek advice from other members of your unit to carryout certian task?</a></li>
                                                            <li> <a href=""> Are you comfortable working alone with the other members of your unit to carryout certian task?</a></li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree"> Element #3 <small>Leadership abilities</small></a> </div>
                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="panel-body text-sm"> 
                                                        <ul>
                                                            <li> <a href=""> what is the question?</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="qual">
                                <center><h3>Personnel Qualifications</h3></center>
                                    <div class="line line-dashed"></div>
                            </div>
                            <div class="tab-pane" id="jobhistory">
                                <!-- <div class="text-center wrapper"> </div> -->
                                <?php if($person->gender == 1): ?>
                                <h4 align="center"> No Job history found. This personnel is still at his first call branch/study center.</h4>
                                 <?php else: ?>   
                                <h4 align="center"> No Job history found. This personnel is still at her first call branch/study center.</h4>
                                <?php endif; ?>    
                                <div class="line line-dashed"></div>
                            </div>

                            <div class="tab-pane" id="salaryhistory">
                                <div class="col-md-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> Promotions/Salary History <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                                        </header>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <?php if(count($person->getPromotions) >0): ?>
                                                <table class="table table-striped m-b-none" data-ride="datatables">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Unique Code</th>
                                                            <th>Type</th>
                                                            <th>Title</th>
                                                            <th>Issuing Authority </th>
                                                            <th>Expiry Date <small>*** if Any ***</small> </th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $sn = 1;?>
                                                    <?php $__currentLoopData = $person->getPromotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($sn); ?></td>
                                                            <td><a href="<?php echo e(url('/pim/employees/document/one/'.\Crypt::encrypt($promo->id))); ?>" class="link"> <?php echo e($promo->unique_code); ?></a></td>
                                                            <td><?php echo e($promo->id); ?></td>
                                                            <td><?php echo e($promo->title); ?></td>
                                                            <td><?php echo e($promo->issuing_authority); ?></td>
                                                            <td><?php echo e($promo->expiration); ?></td>
                                                            <td>
                                                                <?php if($promo->status == 1): ?>
                                                                <span class="label bg-primary">  Valid</span>
                                                                <?php else: ?>
                                                                <span class="label bg-danger">  Expired</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php $sn++;?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tbody>
                                                </table>
                                                <?php else: ?>
                                                <h4 align="center"> No promotion record(s) found for this personnel yet.</h4>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>

                            <div class="tab-pane" id="documentCenter">
                                 <center><h3></h3></center>
                                <div class="col-md-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> Documents Center <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                                        </header>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <?php if(count($person->getDocuments) >0): ?>
                                                <table class="table table-striped m-b-none" data-ride="datatables">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Unique Code</th>
                                                            <th>Type</th>
                                                            <th>Title</th>
                                                            <th>Issuing Authority </th>
                                                            <th>Expiry Date <small>*** if Any ***</small> </th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $sn = 1;?>
                                                    <?php $__currentLoopData = $person->getDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docs): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($sn); ?></td>
                                                            <td><a href="<?php echo e(url('/pim/employees/document/one/'.\Crypt::encrypt($docs->id))); ?>" class="link"> <?php echo e($docs->unique_code); ?></a></td>
                                                            <td><?php echo e($docs->getParent->classification_name); ?></td>
                                                            <td><?php echo e($docs->title); ?></td>
                                                            <td><?php echo e($docs->issuing_authority); ?></td>
                                                            <td><?php echo e($docs->expiration); ?></td>
                                                            <td>
                                                                <?php if($docs->status == 1): ?>
                                                                <span class="label bg-primary">  Valid</span>
                                                                <?php else: ?>
                                                                <span class="label bg-danger">  Expired</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php $sn++;?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tbody>
                                                </table>
                                                <?php else: ?>
                                                <h4 align="center"> No document uploaded for this personnel yet.</h4>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>

                            <div class="tab-pane" id="disciplinary">
                                
                                <center><h3></h3></center>
                                <div class="col-md-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> Disciplinary Activities <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                                        </header>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                               
                                                <h4 align="center"> No disciplinary action taken by the management against this personnel yet.</h4>
                                               
                                            </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>

                            <div class="tab-pane" id="leaves">
                                <center><h3></h3></center>
                                <div class="col-md-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> Leaves <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                                        </header>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <?php if(count($person->getLeaves) >0): ?>
                                                <table class="table table-striped m-b-none" data-ride="datatables">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Unique Code</th>
                                                            <th>Leave Type</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $sn = 1;?>
                                                    <?php $__currentLoopData = $person->getLeaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaves): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($sn); ?></td>
                                                            <td><a href="<?php echo e(url('/pim/employees/leaves/'.$leaves->id)); ?>" class="link"> <?php echo e($leaves->unique_code); ?></a></td>
                                                            <td><?php echo e($leaves->getParent->type_name); ?></td>
                                                            <td><?php echo e($leaves->start_date); ?></td>
                                                            <td><?php echo e($leaves->end_date); ?></td>
                                                            <td>
                                                                <?php if($leaves->status == 1): ?>
                                                                 <span class="label bg-primary">  New</span>
                                                                <?php elseif($leaves->status == 2): ?>
                                                                 <span class="label bg-info">Seen & Attended to avaiting approval</span>
                                                                <?php elseif($leaves->status == 3): ?>
                                                                 <span class="label bg-warning">Cancelled</span>
                                                                <?php else: ?>
                                                                 <span class="label bg-success">Approved</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php $sn++;?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tbody>
                                                </table>
                                                <?php else: ?>
                                                <h4 align="center"> No leave applications made by thie personnel yet.</h4>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="line line-dashed"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
        </section>
    </section>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>