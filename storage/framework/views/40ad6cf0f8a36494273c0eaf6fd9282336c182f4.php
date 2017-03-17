<?php $__env->startSection('content'); ?>
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p><?php echo e($doc->title); ?>'s profile</p>
    </header>
    <section class="scrollable">
        <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r col-md-6">
                <section class="vbox">
                    <section class="scrollable">
                        <div class="wrapper ">
                        <div class="col-md-12" id="edit">
                        	
                        </div>
                            <section class="panel panel-default">
                                <div class="panel-body">
                                    <div class="clearfix  m-t">
                                        <div class="inline">
                                            <div class="thumb-lg"> 
                                            <?php $fpath = public_path().'/incs/images/personnel/'.$doc->getPersonnel->id.'.png' ;?>
		                                    <?php if(file_exists($fpath)): ?>
		                                        <img src="<?php echo e(asset('incs/images/personnel/'.$doc->getPersonnel->id.'.png')); ?>" class="img-circle"> 
		                                    <?php else: ?>
		                                        <img src="<?php echo e(asset('incs/images/personnel/no-pic.jpg')); ?>" class="img-circle"> 
		                                    <?php endif; ?>
                                            </div>
											<hr>
                                            <div class="h4 m-t m-b-xs"><?php echo e($doc->getPersonnel->surname .' '.$doc->getPersonnel->first_name.' '.$doc->getPersonnel->middle_name); ?></div> 
                                            <hr>
                                        </div>
                                            <div class="h4 m-t m-b-xs">Title: <?php echo e($doc->title); ?></div> 
                                            <div class="h4 m-t m-b-xs">ISS Auth: <?php echo e($doc->issuing_authority); ?></div> 
                                            <div class="h4 m-t m-b-xs">Exp.: <?php echo e($doc->expiration); ?></div> 
                                            <div class="h5 m-t m-b-xs">Status: 
                                            	<?php if($doc->status ==1): ?>
                                            	<span class="label bg-primary label-xs">Active</span>
                                            	<?php else: ?>
                                            	<span class="label bg-danger label-xs">Expired</span>
                                            	<?php endif; ?>
                                            </div> 
                                    </div>
                                </div>
                                <footer class="panel-footer bg-white ">
	                                <p class="h5 text-center">Other Documents</p>
	                                <div class="table-responsive">
	                                	<table class="table">
	                                		<thead>
	                                			<tr>
	                                				<th>Title</th>
	                                				<th>Validity</th>
	                                			</tr>
	                                		</thead>
	                                		<tbody>
	                                			<?php $__currentLoopData = $doc->getPersonnel->getDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pDocs): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                                			<tr>
	                                				<td><a href="<?php echo e(url('pim/employees/document/one/'.\Crypt::encrypt($pDocs->id))); ?>"><?php echo e($pDocs->title); ?></a></td>
	                                				<td><?php echo e($pDocs->expiration); ?></td>
	                                			</tr>
	                                			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                                		</tbody>
	                                	</table>
	                                </div>
                                </footer>
                            </section>
                            <hr>
                        </div>
                    </section>
                </section>
            </aside>
            <aside class="bg-white">
                <section class="vbox">
                 <br><br>
                    <section class="scrollable">
                    <div class="row collapse" id="editbranch">
			             <!-- Include any file -->
			        </div>
		            <div class="row collapse" id="deactivate">
			             <!-- Include any file here -->
		            </div>
		            <br>
                        <div class="col-md-12">
                        <img src="<?php echo e(asset('/documents/personnel/'. $doc->getPersonnel->surname .'_'.$doc->getPersonnel->first_name.'_'.$doc->getPersonnel->middle_name.'/'.$doc->getParent->id.'/'.$doc->id.'.png')); ?>" alt="No physical file assocaited with the selected title" style="width: 100%; height: 100%;">
                    	</div>	
                    </section>
                </section>
            </aside>
        </section>
    </section>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>