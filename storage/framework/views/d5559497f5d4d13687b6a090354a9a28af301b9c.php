<?php $xcode = mt_rand(6, 654321); ?>
<section class="w-f scrollable">
    <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
        <br>
        <!-- nav -->
        <nav class="nav-primary hidden-xs">
            <ul class="nav">
                <li>
                <?php if (Auth::check() && Auth::user()->hasRole('hr-admin|administrator|snr-management|center-cordinator')): ?>
                    <a href="#dashboard"> <i class="fa fa-dashboard icon"> <b class="bg-info"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Dashboards</span> </a>
                    <ul class="nav lt">
                        <li>
                            <a href="<?php echo e(url('/home')); ?>"> <i class="fa fa-angle-right"></i> <span>Integrated</span> </a>
                        </li>
                       <li>
                            <a href="<?php echo e(url('/pim/distribution/geo_pol_zones/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Geo Political Zones </span> </a>
                        </li>

                        <!--  <li>
                            <a href="<?php echo e(url('/home/StudyCenters')); ?>"> <i class="fa fa-angle-right"></i> <span>Study Centers</span> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(url('/home/noun')); ?>"> <i class="fa fa-angle-right"></i> <span>Organizational</span> </a>
                        </li>-->

                        <li>
                            <a href="<?php echo e(url('/pim/distribution/states/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>States</span> </a>
                        </li> 
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasRole('hr-admin|administrator|snr-management|center-cordinator')): ?>
                <li>
                    <a href="#employee"> <i class="fa fa-users icon"> <b class="bg-success"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Personnel</span> </a>
                    <ul class="nav lt">
                        <li>
                            <a href="<?php echo e(url('/pim/employees/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Employee Information</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/pim/employees/register/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Employee Register</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/pim/employees/documentCenter/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Document Center</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/pim/employees/appraisals/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Appraisal Management</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/pim/employees/leaves/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Leave Management</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/system/reports/pim/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Reports</span> </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasRole('hr-admin|administrator|snr-management|center-cordinator')): ?>
                <li>
                    <a href="#orgSettings"> <i class="fa fa-sitemap icon"> <b class="bg-warning"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Org. Settings</span> </a>
                    <ul class="nav lt">
                        <li>
                            <a href="<?php echo e(url('/branches/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Study Centers Charting</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/branches/departments/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Departments Charting</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/branches/departments/units/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Units Charting</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#salaryscale" class="active"> <i class="fa fa-level-up icon"> <b class="bg-danger"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Salary Scales</span> </a>
                    <ul class="nav lt">
                        <li>
                            <a href="<?php echo e(url('/system/salary-structures/categories/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Salary Categories </span> </a>
                            <a href="<?php echo e(url('/system/salary-structures/scales/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Salary Scales</span> </a>
                        </li>
                        
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasRole('administrator|hr-admin')): ?>
                <li class="">
                    <a href="#users" class="active"> <i class="fa fa-user icon"> <b class="bg-primary"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Users Management</span> </a>
                    <ul class="nav lt">
                        <li>
                            <a href="<?php echo e(url('/system/users/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Users</span> </a>
                        </li>
                        
                        <li>
                            <a href="<?php echo e(url('/system/rbac/roles/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Roles & Privileges</span> </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasRole('maintenance-admin | hr-admin | administrator')): ?>
                <li class="">
                    <a href="#preferences" class="active"> <i class="fa fa-cogs icon"> <b class="bg-danger"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>System Preference</span> </a>
                    <ul class="nav lt">
                        <li>
                            <a href="<?php echo e(url('/system/preference/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Preference</span> </a>
                            <a href="<?php echo e(url('/system/tickets/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>System Tickets</span> </a>
                        </li>
                        
                        <li>
                            <a href="<?php echo e(url('/system/rbac/roles/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Database Backup & Restore</span> </a>
                        </li>
                        <!-- <li>
                            <a href="<?php echo e(url('/system/rbac/roles')); ?>"> <i class="fa fa-angle-right"></i> <span>Settings</span> </a>
                        </li> -->

                    </ul>
                </li>
                <?php endif; ?>

                
            </ul>
            <br>

            <?php
                $totalStaff = \App\Personnel::all(); 
                $male = \App\Personnel::where('gender', '=', 1)->get(); 
                $female = \App\Personnel::where('gender', '=', 2)->get();
                $seniorStaff = \DB::select("SELECT count(distinct personnels.id) as Nos from personnels, noun_infos n, salary_scales ss, salary_scale_categories sc where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = sc.id and sc.Type = 1  LIMIT 1");
                $juniorStaff = DB::select("SELECT count(distinct `unique_id` )as Nos from personnels, noun_infos n, salary_scales ss where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = 1 and ss.grouping = 1");
                $fullTimeStaff = \App\NounInfo::where('status_id', '=', 1);
                $acadStaff = DB::select("SELECT count(distinct personnels.id) as Nos from personnels, noun_infos n, salary_scales ss where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = 2  LIMIT 1");
                $nonAcadStaff = DB::select("SELECT count(distinct personnels.id) as Nos from personnels, noun_infos n, salary_scales ss where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = 1  LIMIT 1");
                $seniorNonACade = DB::select("SELECT count(distinct `unique_id` )as Nos from personnels, noun_infos n, salary_scales ss where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = 1 and ss.grouping = 2");
                $transientStaff = \App\NounInfo::where('status_id', '!=', 1);
                
                ?>
                    <!-- <header>Quick Statistics by Distribution</header> <-->
                    <?php if (Auth::check() && Auth::user()->hasRole('hr-admin|senior-management|center-cordinator|administrator')): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="3" style="text-align: center;"><?php echo e(strtoupper('Quick Statistics')); ?></th>
                            </tr>
                            <tr>
                                <th>ELEMENT</th>
                                <th>VALUE</th>
                                <!-- <th>%</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="color: red"><strong>Total Employee</strong></td>
                            <td><?php echo e(number_format($totalStaff->count(), 0)); ?></td>
                            <!-- <td><?php echo e(number_format(count($totalStaff)/count($totalStaff) * 100, 0)); ?>%</td> -->
                        </tr>
                            <tr>
                                <td style="color: blue"><strong>Academics</strong></td>
                                <?php $__currentLoopData = $acadStaff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ACST): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <td><strong><?php echo e(number_format($ACST->Nos, 0)); ?></strong></td>
                                <!-- <td><?php echo e(number_format(count($ACST)/count($totalStaff) * 100, 2)); ?>%</td> -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tr>
                            <tr>
                                <td>Senior Non Acad. </td>
                                <?php $__currentLoopData = $seniorNonACade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SNA): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <td><strong><?php echo e(number_format($SNA->Nos, 0)); ?></strong></td>
                                <!-- <td><?php echo e(number_format(count($seniorStaff)/count($totalStaff) * 100, 2)); ?>%</td> -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tr>
                            <tr>
                                <td>Junior Non Acad.</td>
                                <?php $__currentLoopData = $juniorStaff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jS): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <td><strong><?php echo e(number_format($jS->Nos, 0)); ?></strong></td>
                                <!-- <td><?php echo e(number_format(count($jS->Nos)/count($totalStaff) * 100, 2)); ?>%</td> -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tr>
                            <tr>
                                <td style="color: blue;"> <strong>Total Non Academic</strong></td>
                                <td><strong><?php echo e(number_format($jS->Nos + $SNA->Nos, 0)); ?></strong></td>
                                <!-- <td><?php echo e(number_format(count($jS)/count($SNA) * 100, 2)); ?>%</td> -->
                            </tr>
                            <tr>
                                <td><strong>Retiring this year </strong><br><small> </small></td>
                                <td><strong>3</strong></td>
                                <!-- <td> 0.30%</td> -->
                            </tr>
                            <tr>
                                <td><strong>Over Due this year </strong><br><small></small></td>
                                <td> <strong>2</strong></td>
                                <!-- <td> 0.20%</td> -->
                            </tr>
                        </tbody>
                    </table>
                    <?php endif; ?>
               <!--  </div>
            </div> -->
        </nav>
        <!-- / nav -->
    </div>
</section>