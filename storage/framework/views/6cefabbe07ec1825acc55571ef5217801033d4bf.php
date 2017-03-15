<?php $__env->startSection('content'); ?>

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">System Preference</li>
        </ul>
        <div class="m-b-md">
            <?php if(Session::has('message')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Thank you.</strong> You successfully added <a href="#" class="alert-link"><?php echo e(Session::get('message')); ?></a>. 
            </div> 
            <?php endif; ?>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> System Preference <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
            </header>
            <div class="panel-body">
                <div class="row tab-v3">
					<div class="col-sm-3">
						<ul class="nav nav-stacked">
							<li class="active"><a href="#home-2" data-toggle="tab" aria-expanded="true"><i class="fa fa-home"></i> Home</a></li>
							<li class=""><a href="#license" data-toggle="tab" aria-expanded="false"><i class="fa fa-credit-card"></i> License</a></li>
							<li class=""><a href="#tickets" data-toggle="tab" aria-expanded="false"><i class="fa fa-folder-open"></i> Tickets</a></li>
							<li class=""><a href="#stakeholders" data-toggle="tab" aria-expanded="false"><i class="fa fa-users"></i> Tickets Stakeholders</a></li>
							<li class=""><a href="#settings-2" data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> Pref. Settings</a></li>
							<li class=""><a href="#settings-2" data-toggle="tab" aria-expanded="false"><i class="fa fa-sitemap"></i> Designations Setup</a></li>
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="tab-content">
							<div class="tab-pane fade active in" id="home-2">
								<h4>Heading Sample 1</h4>
								<p align="justify">Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum <strong>ivamus imperdiet</strong> condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc.</p>
								<p align="justify">Pellentesque <strong>fermentum vivamus</strong> imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac felis consectetur id. Donec eget orci metusvivamus imperdiet.</p>
								<p align="justify">Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum <strong>ivamus imperdiet</strong> condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc.</p>
								
								<p align="justify">Pellentesque <strong>fermentum vivamus</strong> imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac felis consectetur id. Donec eget orci metusvivamus imperdiet.</p>
								<p align="justify">Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum <strong>ivamus imperdiet</strong> condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc.</p>
								<p align="justify">Pellentesque <strong>fermentum vivamus</strong> imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac felis consectetur id. Donec eget orci metusvivamus imperdiet.</p>
							</div>
							<div class="tab-pane fade" id="license">
								<h4 align="center"><?php echo e(strtoupper('System License(s)')); ?></h4><br>
								<!-- <p align="justify">Your licence(s) data are detailed below: </p> -->
								<div class="table-responsive">
								<?php if(count($license)> 0): ?>
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>License Type</th>
												<th>License Key</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th>Validity</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php $no = 1; ?>
										<?php $__currentLoopData = $license; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lic): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
											<tr>
												<td><?php echo e($no); ?></td>
												<td><?php echo e($lic->getType->type_name); ?></td>
												<td><?php echo e($lic->license_key); ?></td>
												<td><?php echo e($lic->start_date); ?></td>
												<td><?php echo e($lic->start_date); ?></td>
												<td>
													<?php 
													    $from = new DateTime($lic->start_date);
													    $end = new DateTime($lic->end_date);
													    $to   = new DateTime('today');
													?>
													 <!-- <?php echo e($from->diff($to)->y); ?>Yrs, <?php echo e($from->diff($to)->m); ?> Months, --> <?php echo e($from->diff($to)->d); ?> Days 
												</td>
												<td>
													<?php if($lic->status == 1): ?>
													<span class="label label-success">Active</span>
													<?php elseif($lic->status == 2): ?>
													<span class="label label-warning">Trial Period</span>
													<?php else: ?>
													<span class="label label-danger">Expired</span>
													<?php endif; ?>
												</td>
												<td>
												<?php if($lic->status == 3): ?>
													<a href="#" class="btn btn-info btn-xs">Renew License</a>
												<?php else: ?>
													<a href="#" class="btn btn-primary btn-xs">Extend License</a>
												<?php endif; ?>
												</td>
											</tr>
											<?php $no++; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
										</tbody>
										<?php else: ?>
									<p class="h3" align="center"> You have no license key or file associated with this system. You are hereby encouraged to buy a license as your trier period expires in 14 days from now. Thank you</p>
									<?php endif; ?>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="messages-2">
								<h4>Heading Sample 3</h4>
								<p><img alt="" class="pull-right rgt-img-margin img-width-200" src="assets/img/main/img13.jpg"> <strong>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id.</strong> Donec eget orci metus, Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, consectetur id. Donec eget orci metus, ac adipiscing nunc. <strong>Pellentesque fermentum</strong>, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper.</p>
							</div>
							<div class="tab-pane fade" id="settings-2">
								<img alt="" class="pull-left lft-img-margin img-width-200" src="assets/img/main/img10.jpg">
								<h4>Heading Sample 4</h4>
								<p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec eget orci metus, <strong>ac adipiscing nunc.</strong> Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum id. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac <strong>interdum ullamcorper.</strong></p>
							</div>

							<div class="tab-pane fade" id="tickets">
								<h4 align="center"><?php echo e(strtoupper('System Tickets')); ?></h4>
								<!-- <p align="justify">Your licence(s) data are detailed below: </p> -->
								<br>
								<div class="table-responsive">
								<?php if(count($tickets) > 0): ?>
									<table class="table">
										<thead>
				                            <tr>
				                                <th>#</th>
				                                <th>Ticket #</th>
				                                <th>Ticket Title</th>
				                                <th>Branch</th>
				                                <th>User</th>
				                                <th>Category</th>
				                                <th>Priority</th>
				                                <th>Status</th>
				                            </tr>
				                        </thead>
										<tbody>
										<?php $count = 1; ?>
				                           <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				                            <tr>
				                                <td><?php echo e($count); ?></td>
				                                <td><?php echo e($ticket->serial); ?></td>
				                                <td><a href="<?php echo e(url('/system/tickets/view/'.\Crypt::encrypt($ticket->id))); ?>" style="color: #369;"><b><?php echo e($ticket->title); ?></b></a></td>
				                                <td align="left"><?php echo e($ticket->getCreator->getBranch->branch_name); ?></td>
				                                <td align="left"><?php echo e($ticket->getCreator->surname.' '.$ticket->getCreator->first_name.' '.$ticket->getCreator->middle_name); ?></td>
				                                <td><?php echo e($ticket->getCat->name); ?></td>
				                                <td class="">
				                                    <?php if($ticket['priority'] == 1): ?>
				                                        <span class="">Normal Issue</span>
				                                    <?php elseif($ticket['priority'] == 2): ?>
				                                        <span class="">Standard Issue</span>
				                                     <?php elseif($ticket['priority'] == 3): ?>
				                                        <span class="">Needing Urgent Attention</span>
				                                         <?php elseif($ticket['priority'] == 4): ?> 
				                                        <span class="">Immediate Attention</span>
				                                        <?php elseif($ticket['priority'] == 5): ?> 
				                                        <span class="">Instant Integration</span>
				                                    <?php endif; ?>
				                                </td>
				                                <td class="">
				                                    <?php if($ticket['status'] == 1): ?>
				                                        <span class="badge badge-info">Open Ticket</span>
				                                    <?php elseif($ticket['status'] == 2): ?>
				                                        <span class="badge badge-inverse">Assigned Ticket</span>
				                                     <?php elseif($ticket['status'] == 3): ?>
				                                        <span class="badge badge-warning">Awaiting Test</span>
				                                         <?php elseif($ticket['status'] == 4): ?> 
				                                        <span class="badge badge-warning">Passed Testing</span>
				                                        <?php elseif($ticket['status'] == 5): ?> 
				                                        <span class="badge badge-success">Ticket Closed</span>
				                                    <?php endif; ?>
				                                </td>
				                            </tr>
				                            <?php $count++; ?>
				                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
										</tbody>
									</table>
									<?php else: ?>
									<p class="h3" align="center"> No Ticket has been submited on the system. Thank you</p>
									<?php endif; ?>
								</div>
							</div>

							<div class="tab-pane fade" id="stakeholders">
								<h4>Ticket Stakeholders</h4>
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Full Names</th>
											<th>Phone No</th>
											<th>e-Mail Add.</th>
											<th>Tickets Staked In</th>
										</tr>
									</thead>
									<tbody>
									<?php $no = 1; ?>
									<?php $__currentLoopData = $stakeholders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stkholder): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
										<tr>
											<td><?php echo e($no); ?></td>
											<td><?php echo e($stkholder->surname.' '.$stkholder->other_names); ?></td>
											<td><?php echo e($stkholder->phone_no); ?></td>
											<td><?php echo e($stkholder->email); ?></td>
											<td>
												<?php $__currentLoopData = $stkholder->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holderT): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
													<ul>
														<li><a href="<?php echo e(url('/system/tickets/view/'.\Crypt::encrypt($holderT->getTicket->id))); ?>"><?php echo e($holderT->getTicket->title); ?></a><br></li>
													</ul>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
											</td>
										</tr>
									<?php $no++; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
									</tbody>
									
								</table>
							</div>

						</div>
					</div>
				</div>
            </div>
        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>