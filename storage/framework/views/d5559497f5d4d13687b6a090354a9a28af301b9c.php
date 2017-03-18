<?php $xcode = mt_rand(6, 654321); ?>
<section class="w-f scrollable">
    <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
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
                       <!--  <li>
                            <a href="<?php echo e(url('/home/employees/'.\Crypt::encrypt($xcode))); ?>"> <i class="fa fa-angle-right"></i> <span>Employees</span> </a>
                        </li>

                        <li>
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
                $seniorStaff = \App\NounInfo::where('salary_scale_id', '<=', 20)->get();
                $juniorStaff = \App\NounInfo::where('salary_scale_id', '>=', 20)->get();
                $fullTimeStaff = \App\NounInfo::where('status_id', '=', 1);
                $partTimeStaff = \App\NounInfo::where('status_id', '=', 6)->get();
                $acadStaff = \App\NounInfo::whereBetween('salary_scale_id', [1, 64])->get();
                $nonAcadStaff = \App\NounInfo::whereBetween('salary_scale_id', [65, 259])->get();
                $transientStaff = \App\NounInfo::where('status_id', '!=', 1);//->orWhere('status_id', '=', 4)->orWhere('status_id', '=', 5)->orWhere('status_id', '=', 6)->orWhere('status_id', '=', 7)->orWhere('status_id', '=', 8)->orWhere('status_id', '=', 9)->get();
                ?>
            <!-- <div class="panel panel-success">
                <div class="panel-heading">
                </div>
                <div class="panel-body"> -->
                    <!-- <header>Quick Statistics by Distribution</header> <-->
                    <?php if (Auth::check() && Auth::user()->hasRole('hr-admin|senior-management|center-cordinator|administrator')): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="3" style="text-align: center;"><?php echo e(strtoupper('Quick Statistics')); ?></th>
                            </tr>
                            <tr>
                                <th>Element</th>
                                <th>No</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Total Employee</td>
                            <td><?php echo e(number_format($totalStaff->count(), 0)); ?></td>
                            <td><?php echo e(number_format(count($totalStaff)/count($totalStaff) * 100, 0)); ?>%</td>
                        </tr>
                            <tr>
                                <td>Academics</td>
                                <td><?php echo e(number_format($acadStaff->count(), 0)); ?></td>
                                <td><?php echo e(number_format(count($acadStaff)/count($totalStaff) * 100, 2)); ?>%</td>
                            </tr>
                            <tr>
                                <td>Senior Non Acad. </td>
                                <td><?php echo e(number_format($seniorStaff->count(), 0)); ?></td>
                                <td><?php echo e(number_format(count($seniorStaff)/count($totalStaff) * 100, 2)); ?>%</td>
                            </tr>
                            <tr>
                                <td>Junior Non Acad.</td>
                                <td><?php echo e(number_format($juniorStaff->count(), 0)); ?></td>
                                <td><?php echo e(number_format(count($juniorStaff)/count($totalStaff) * 100, 2)); ?>%</td>
                            </tr>
                            <tr>
                                <td>Total </td>
                                <td><?php echo e(number_format($nonAcadStaff->count(), 0)); ?></td>
                                <td><?php echo e(number_format(count($nonAcadStaff)/count($totalStaff) * 100, 2)); ?>%</td>
                            </tr>
                            <tr>
                                <td>Retiring <br><small> This year</small></td>
                                <td>3</td>
                                <td> 0.30%</td>
                            </tr>
                            <tr>
                                <td>Over Due <br><small> Generic</small></td>
                                <td> 2</td>
                                <td> 0.20%</td>

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