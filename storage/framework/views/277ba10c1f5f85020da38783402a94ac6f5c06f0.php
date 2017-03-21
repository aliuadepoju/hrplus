<html>
<head>
	<title>Personnel Records</title>
    <link rel="stylesheet" href="<?php echo e(asset('incs/css/app.v1.css')); ?>" type="text/css" />
	<!-- <link rel="stylesheet" href=""> -->
	<style>
      #watermark { position: fixed; bottom: 0px; right: 0px; width: 200px; height: 200px; opacity: .1; }
    </style>
</head>

<body ">
<div class="" align="center">
    <img src="<?php echo e(asset('incs/images/hr_logobig.png')); ?>" alt="" style="height: 90px; width: 90px;" align="center">
    <p class="h2 " align="center">NATIONAL OPEN UNIVERISY OF NIGERIA <br> Learn & Work</p> 
    <h5 align="center">PERSONNEL RECORDS</h5>
</div>
    <hr>
    <div class="table-responsive">
        <table class="table table m-b-none" data-ride="datatables" >
            <thead>
            <tr bgcolor repeat pbr knext>
		      <td style="font-size: 10px;">S/N</td>
		      <td style="font-size: 10px;">Staff No</td>
		      <td style="font-size: 10px;">Name</td>
		      <td style="font-size: 10px;">Designation</td>
		      <td style="font-size: 10px;">Sex</td>
		      <td style="font-size: 10px;">State</td>
		      <td style="font-size: 10px;">LGA</td>
		      <td style="font-size: 10px;">Qualifications</td>
		      <td style="font-size: 10px;">DOB</td>
		      <td style="font-size: 10px;">Present Appt Date</td>
		      <td style="font-size: 10px;">Telephone </td>
		      <td style="font-size: 10px;"> Appt</td>
		      <td style="font-size: 10px;">Salary Scale</td>
		    </tr>
            </thead>
            <tbody>
            <?php $sn = 1;?>
            <?php $__currentLoopData = $personnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prsn): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td border=1 width=9><font size=1><?php echo e($sn); ?></font></td>
                    <td border=1 width=21><font size=1>NOUN/<?php echo e($prsn->unique_id); ?></font></td>
                    <td style="font-size: 9px;"> <?php echo e($prsn->title .' '.$prsn->surname .' '.$prsn->first_name.' '.$prsn->middle_name); ?></td>
                    <td style="font-size: 9px;"><?php echo e(isset($prsn->getNounInfos) ? $prsn->getNounInfos->rank : "Not Set"); ?></td>
                    <td style="font-size: 9px;" ><?php if($prsn->gender == 1): ?> M <?php else: ?> F <?php endif; ?></td>
                    <td style="font-size: 9px;"><?php echo e($prsn->getState->state); ?></td>
                    <td style="font-size: 9px;"><?php echo e(isset($prsn->getLga) ? $prsn->getLga->lga_name : "Not Set"); ?></td>
                    <td style="font-size: 9px;"></td>
                    <td style="font-size: 9px;"><?php echo e($prsn->dob); ?></td>
                    <td style="font-size: 9px;"><?php echo e(isset($prsn->getNounInfos) ? $prsn->getNounInfos->data_of_entry : "Not set"); ?></td>
                    <td style="font-size: 9px;"><?php echo e($prsn->phone_no); ?></td>
                    <td style="font-size: 9px;"><?php echo e(isset($prsn->getNounInfos->getAppt) ? $prsn->getNounInfos->getAppt->name : "Not Set"); ?></td>
                    <td style="font-size: 9px;"><?php echo e(isset($prsn->getNounInfos->getScale) ? $prsn->getNounInfos->getScale->scale : "Not set"); ?></td>
                </tr>

            <?php $sn++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
    </div>

<br><br><br><br><br>
   Reviewd By:__________________________________________________________________________ Signature & Date:__________________________________________ <br><br>
    <div class="footer">
        <p><?php echo e(strtoupper('For Offical Use Only')); ?> <div class="pull-right"><?php echo e(strtoupper("official stamp")); ?></div></p> 
    </div>
</body>
</html>
