<!DOCTYPE html>
<html lang="en" class="app">

<head>
    <title><?php echo e(config('app.name', 'NOUN HR-PLUS')); ?> | <?php echo e(isset($pageName) ? $pageName : ""); ?></title>
    <meta name="description" content="National Open University of Nigeria Human Resource Portal v1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="Umoru Godfrey, E. Natview Technology, Abuja Nigeria, godfrey.umoru@natviewtechnology.com" />
    <meta name="date" content="29th January, 2017" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/css/font.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/css/app.v1.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/fuelux/fuelux.css')); ?>" type="text/css" />
    <!-- Select 2 -->
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/select2/select2.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/select2/theme.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/datepicker/datepicker.css')); ?>" type="text/css" />
    <!-- DTable -->
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/datatables/datatables.css')); ?>" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('incs/js/jquery.datatables/bootstrap-adapter/css/datatables.css')); ?>" />
    <link type="image/x-icon" href="<?php echo e(asset('incs/images/hr_logobig.png')); ?>" rel="shortcut icon"/>
    <!--[if lt IE 9]> 
        <script src="js/ie/html5shiv.js"></script> 
        <script src="js/ie/respond.min.js"></script> 
        <script src="js/ie/excanvas.js"></script> 
    <![endif]-->
</head>

<body class="">
    <section class="vbox">
        <header class="bg-primary dker lter header navbar navbar-fixed-top-xs">
            <div class="navbar-header aside-md">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
                <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?php echo e(asset('incs/hr_logo.png')); ?>" class="m-r-lg">HR PLUS</a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
            </div>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<p class="" align="center" id="clockbox"></p>
            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> 

                        <?php $fpath = public_path().'/incs/images/usrs/'.Auth::user()->id.'.png' ;?>
                        <?php if(file_exists($fpath)): ?>
                            <img src="<?php echo e(asset('incs/images/usrs/'.Auth::user()->id.'.png')); ?>"> 
                        <?php else: ?>
                            <!-- <img src="<?php echo e(asset('incs/images/usrs/'.Auth::user()->id.'.png')); ?>">  -->
                            <img src="<?php echo e(asset('incs/images/usrs/no-pic.jpg')); ?>" class="img-circle"> 
                        <?php endif; ?>

                    </span> <?php echo e(Auth::user()->surname. ' '. Auth::user()->first_name .' '.Auth::user()->middle_name); ?> <b class="caret"></b> </a>
                    <ul class="dropdown-menu animated fadeInRight"> <span class="arrow top"></span>
                        <li> <a href="<?php echo e(url('/system/users/profile/'.\Crypt::encrypt(Auth::user()->id))); ?>">Profile</a> </li>
                        <li> <a href="<?php echo e(url('/help/faqs')); ?>">Help</a> </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <aside class="bg-light lter b-r aside-md hidden-print hidden-xs" id="nav">
                    <section class="vbox">
                        <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <footer class="footer lt hidden-xs b-t b-light">
                            <div id="chat" class="dropup">
                                <section class="dropdown-menu on aside-md m-l-n">
                                    <section class="panel bg-white">
                                        <header class="panel-heading b-b b-light">Chats</header>
                                        <div class="panel-body animated fadeInRight">
                                            <p class="text-sm">Active Chats Coming Soon.</p>
                                        </div>
                                    </section>
                                </section>
                            </div>
                            <div id="invite" class="dropup">
                                <section class="dropdown-menu on aside-md m-l-n">
                                    <section class="panel bg-white">
                                        <header class="panel-heading b-b b-light"> John <i class="fa fa-circle text-success"></i> </header>
                                        <div class="panel-body animated fadeInRight">
                                            <p class="text-sm">Contacts Coming soon.</p>
                                        </div>
                                    </section>
                                </section>
                            </div>
                            <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-default btn-icon"> <i class="fa fa-angle-left text"></i> <i class="fa fa-angle-right text-active"></i> </a>
                            <div class="btn-group hidden-nav-xs">
                                <button type="button" title="Chats" class="btn btn-icon btn-sm btn-default" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i>
                                </button>
                                <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-default" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i>
                                </button>
                            </div>
                        </footer>
                    </section>
                </aside>
                <!-- /.aside -->
                <section id="content">
                   <?php echo $__env->yieldContent('content'); ?>
                </section>
            </section>
        </section>
    </section>
    
    <!-- App JavaScript -->
    <script src="<?php echo e(asset('incs/js/app.v1.js')); ?>"></script>
    <script src="<?php echo e(asset('incs/js/app.plugin.js')); ?>"></script>
    <!-- Sparkline Chart -->
    <script src="<?php echo e(asset('incs/js/charts/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <!-- ChartJs --> 
    <script src="<?php echo e(asset('incs/js/charts/chartJs/jsChart.js')); ?>"></script> 

    <!-- fuelux -->
    <script src="<?php echo e(asset('incs/js/fuelux/fuelux.js')); ?>"></script>
    <script src="<?php echo e(asset('incs/js/parsley/parsley.min.js')); ?>"></script>

    <!-- file input -->
    <script src="<?php echo e(asset('incs/js/file-input/bootstrap-filestyle.min.js')); ?>"></script>
    <!-- combodate -->
    <script src="<?php echo e(asset('incs/js/libs/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('incs/js/combodate/combodate.js')); ?>"></script>
    <!-- select2 -->
    <script src="<?php echo e(asset('incs/js/select2/select2.min.js')); ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo e(asset('incs/js/datepicker/bootstrap-datepicker.js')); ?>"></script>
     <!-- datatables -->
    <script src="<?php echo e(asset('incs/js/datatables/jquery.dataTables.min.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('incs/js/datatables/datatable.js')); ?>"></script> -->
    <!-- Map API -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBrsKzefSQA6WrokTTGHMa3Tl_wd4uaY_0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    
    <!-- Page Script  -->
         <?php
            $m = \App\Personnel::where('gender', 1); 
            $f = \App\Personnel::where('gender', 2);
            $ml = array();
            foreach ($m as $mi) {
                 $ml[] = $mi;
                 print json_encode($mi);
             } 
            $states = \App\State::all(); 
            $lgas = \App\Lga::all();
            
            $qualifications = \App\Qualification::all(); 
            $fos = \App\FieldOfStudy::all(); 
            $sfos = \App\SubFieldOfStudy::all(); 
            $branches = \App\Branch::all(); 
            $depts = \App\Department::all(); 
            $units = \App\Unit::all(); 
        ?>

        <script hidden="">
          var states = <?= json_encode($states); ?>;
          var lgas = <?= json_encode($lgas); ?>;
          var fos = <?= json_encode($fos); ?>;
          var sfos = <?= json_encode($sfos); ?>;
          var branches = <?= json_encode($branches); ?>;
          var depts = <?= json_encode($depts); ?>;
          var units = <?= json_encode($units); ?>;
          var m = <?= json_encode($m); ?>;
          var f = <?= json_encode($f); ?>;

        </script>

    <script type="text/javascript">
        $(document).ready(function(){
        $('#datatables').DataTable();
        $('#myTable').DataTable();
        $('#myTable1').DataTable();
        $('#myTable2').DataTable();
        $('#myTable3').DataTable();
        $('#myTable4').DataTable();
        $('#myTable5').DataTable();
        $('#myTable6').DataTable();
        $('#myTable7').DataTable();

        // Chart JS
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["NE", "NC", "NW", "SE", "SS", "SW"],
                datasets: [{
                    label: 'Study Center Distribution,  ',
                    data: [12, 19, 8, 5, 6, 7],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        // 'rgba(255,99,132,1)',
                        // 'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                        "rgba(75,192,192,1)"
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Personnel Distribution,  ',
                    data: [10, 15, 4, 6, 8, 11],
                    backgroundColor: [
                        'rgb(255, 255, 255)'
                        // 'rgba(176,226,255,0.5)'
                        // 'rgba(54, 162, 235, 0.5)',
                        // 'rgba(255, 206, 86, 0.5)',
                        // 'rgba(75, 192, 192, 0.7)',
                        // 'rgba(153, 102, 255, 0.8)',
                        // 'rgba(255, 159, 64, 0.9)'
                    ],
                    borderColor: [
                       'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.9)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

        //Gender Pie Chart
        var ctx = document.getElementById("genderDistribution").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Male %", "Female %"],
            datasets: [{
              backgroundColor: [
                "#2ecc71",
                "#3498db"],
              label: 'View',
              data: [1745, 1014]
            }]
          }
        });
        //End Gender Chart
      });
    </script>

        <!-- //End Chart JS -->
    
<script type="text/javascript">

    var branches = <?php print_r(json_encode($branches)) ?>;
    var mymap = new GMaps({
        el: '#mymap',
        lat: 9.042302,
        lng: 7.529507,
        zoom: 6
        });
        $.each( branches, function( index, value ){
            mymap.addMarker({
              lat: value.lat_cord,
              lng: value.long_cord,
              draggable: true,
              background: "#ccc",
              label: "N",
              animation: google.maps.Animation.DROP,
              title: value.branch_name,
              click: function(e) {
                window.open("/branches/data/");
                // alert('This is '+value.branch_name+', NOUN.');
              }
            });
       });



  </script>

      <!-- State & Lgas -->
      <script type="text/javascript">
       $("#school_other").hide();
        $("#course_other").hide();
        $("#religion_others").hide();
        $("#mStat").hide();
        $("#nok_rel_other").hide();
        $("#dateRange").hide();

        function doAutoNumber(argument) {
        var option = document.getElementById("noOption").value;
        if (option.val() == 1) {
            document.getElementById('nounNo').show();
        }
        else{
                document.getElementById('nounNo').hide();
            }
        }

         $("select[name=state]").on('change',function(){
            var select = '<select class="form-control" name="lga" id="lga" style="width: 100%;" required="">';
                var options = '<option value="">Select LGA</option>';
                for(var i in lgas){
                    if($(this).val() == lgas[i].state_id){
                        options+='<option value="'+lgas[i].id+'">'+lgas[i].lga_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=lga]").replaceWith(select);
        });


         // Residence State & LGA
         $("select[name=r_state]").on('change',function(){
            var select = '<select class="form-control" name="r_lga" id="r_lga" style="width: 100%;" required="">';
                var options = '<option value="">Select LGA</option>';
                for(var i in lgas){
                    if($(this).val() == lgas[i].state_id){
                        options+='<option value="'+lgas[i].id+'">'+lgas[i].lga_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=r_lga]").replaceWith(select);
        });

         // NOK Residence State & LGA

         $("select[name=nok_r_state]").on('change',function(){
            var select = '<select class="form-control" name="nok_r_lga" id="r_lga" style="width: 100%;" required="">';
                var options = '<option value="">Select LGA</option>';
                for(var i in lgas){
                    if($(this).val() == lgas[i].state_id){
                        options+='<option value="'+lgas[i].id+'">'+lgas[i].lga_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=nok_r_lga]").replaceWith(select);
        });

      // Fields & Sub fields of studies //
         $("select[name=field_of_study]").on('change',function(){
            var select = '<select class="form-control" name="sub_field_of_study" id="sub_field_of_study" style="width: 100%;" required>';
                var options = '<option value="">Select Course</option>' ;
                for(var i in sfos){
                    if($(this).val() == sfos[i].field_of_study_id){
                      // alert(sfos[i].name);
                        options+='<option value="'+sfos[i].id+'">'+sfos[i].sub_fos_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=sub_field_of_study]").replaceWith(select);
        });

      // Study Center & Department //

         $("select[name=branch]").on('change',function(){
            var select = '<select class="form-control" name="dept" id="dept" style="width: 100%;" required>';
                var options = '<option value="">Select Department</option>';
                for(var i in depts){
                    if($(this).val() == depts[i].branch_id){
                        options+='<option value="'+depts[i].id+'">'+depts[i].dept_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=dept]").replaceWith(select);
        });

         $("select[name=sub_field_of_study]").on("change", function() {
            var course_other = this.value;
            if (course_other == 1000){
                $("#course_other").show();
            }
            else{
               $("#course_other").hide();
            }
        });



         $("select[name=school]").on("change", function() {
            var school_other = this.value;
            if (school_other == 500){
                $("#school_other").show();
            }
            else{
               $("#school_other").hide();
            }
        });

         $("select[name=mStatus]").on("change", function() {
            var mStatus = this.value;
            if (mStatus == 3){
                $("#mStat").show();
            }
            else{
               $("#mStat").hide();
            }
        });

         $("select[name=nokRel]").on("change", function() {
            var nokRel = this.value;
            if (nokRel == 500){
                $("#nok_rel_other").show();
            }
            else{
               $("#nok_rel_other").hide();
            }
        });

         $("select[name=dateType]").on("change", function() {
            var dateType = this.value;
            if (dateType == 2){
                $("#dateRange").show();
            }
            else{
               $("#dateRange").hide();
            }
        });

         $("select[name=religion]").on("change", function() {
            var religion_others = this.value;
            if (religion_others == 3){
                $("#religion_others").show();
            }
            else{
               $("#religion_others").hide();
            }
        });

      </script>

      <!-- // Department & Units // -->
    <!--   <script type="text/javascript">
         $("select[name=dept]").on('change',function(){
            var select = '<select class="form-control" name="unit" id="unit" style="width: 100%;" required>';
                var options = '<option value="">Select Unit</option>';
                for(var i in units){
                    if($(this).val() == units[i].department_id){
                      alert(uints[i].unit_name);
                        options+='<option value="'+units[i].id+'">'+units[i].unit_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=unit]").replaceWith(select);
        });
      </script> -->

      <!-- Page Alerts -->
        <script>
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        </script>

      <script type="text/javascript">
        tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
        
        function GetClock(){
            var d=new Date();
            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
            if(nyear<1000) nyear+=1900;
            var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

            if(nhour==0){ap=" AM";nhour=12;}
            else if(nhour<12){ap=" AM";}
            else if(nhour==12){ap=" PM";}
            else if(nhour>12){ap=" PM";nhour-=12;}

            if(nmin<=9) nmin="0"+nmin;
            if(nsec<=9) nsec="0"+nsec;

            document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
        }

        window.onload=function(){
        GetClock();
        setInterval(GetClock,1000);
        }
    </script>
    <!-- /Page Script -->

</body>

</html>