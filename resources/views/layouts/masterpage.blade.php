<!DOCTYPE html>
<html lang="en" class="app">

<head>
    <title>{{ config('app.name', 'Laravel') }} | {{isset($pageName) ? $pageName : ""}}</title>
    <meta name="description" content="National Open University of Nigeria Human Resource Portal v1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="Umoru Godfrey, E. Natview Technology, Abuja Nigeria, godfrey.umoru@natviewtechnology.com" />
    <meta name="date" content="29th January, 2017" />
    <link rel="stylesheet" href="{{asset('incs/css/font.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('incs/css/app.v1.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('incs/js/fuelux/fuelux.css')}}" type="text/css" />
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{asset('incs/js/select2/select2.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('incs/js/select2/theme.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('incs/js/datepicker/datepicker.css')}}" type="text/css" />
    <!-- DTable -->
    <link rel="stylesheet" href="{{asset('incs/js/datatables/datatables.css')}}" type="text/css" />
     <link rel="stylesheet" type="text/css" href="{{asset('incs/js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}" />
    <link type="image/x-icon" href="{{asset('incs/images/hr_logobig.png')}}" rel="shortcut icon"/>

    
    <!--[if lt IE 9]> 
        <script src="js/ie/html5shiv.js"></script> 
        <script src="js/ie/respond.min.js"></script> 
        <script src="js/ie/excanvas.js"></script> 
    <![endif]-->
</head>

<body class="">
    <section class="vbox">
        <header class="bg-primary lter header navbar navbar-fixed-top-xs">
            <div class="navbar-header aside-md">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
                <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="{{asset('incs/images/hr_logo.png')}}" class="m-r-lg"></a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
            </div>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<p class="" align="center" id="clockbox"></p>
            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> 

                        <?php $fpath = public_path().'/incs/images/usrs/'.Auth::user()->id.'.png' ;?>
                        @if (file_exists($fpath))
                            <img src="{{asset('incs/images/usrs/'.Auth::user()->id.'.png')}}"> 
                        @else
                            <!-- <img src="{{asset('incs/images/usrs/'.Auth::user()->id.'.png')}}">  -->
                            <img src="{{asset('incs/images/usrs/no-pic.jpg')}}" class="img-circle"> 
                        @endif

                    </span> {{Auth::user()->surname. ' '. Auth::user()->first_name .' '.Auth::user()->middle_name }} <b class="caret"></b> </a>
                    <ul class="dropdown-menu animated fadeInRight"> <span class="arrow top"></span>
                        <li> <a href="{{url('/system/users/profile/'.\Crypt::encrypt(Auth::user()->id))}}">Profile</a> </li>
                        <li> <a href="{{url('/help/faqs')}}">Help</a> </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
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
                        <!-- <header class="header bg-warning lter text-center clearfix">
                            <div class="btn-group">
                               
                            </div>
                        </header> -->
                        @include('layouts.sidebar')
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

                   @yield('content')
                </section>
            </section>
            @yield('image')
        </section>
    </section>
    


    <!-- App -->
    <script src="{{asset('incs/js/app.v1.js')}}"></script>
    <script src="{{asset('incs/js/app.plugin.js')}}"></script>
    <!-- Sparkline Chart -->
    <script src="{{asset('incs/js/charts/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Easy Pie Chart --> 
    <script src="{{asset('incs/js/charts/easypiechart/jquery.easy-pie-chart.js')}}"></script> 
    <!-- Flot --> 
    <script src="{{asset('incs/js/charts/flot/jquery.flot.min.js')}}"></script> 
    <script src="{{asset('incs/js/charts/flot/jquery.flot.tooltip.min.js')}}"></script> 
    <script src="{{asset('incs/js/charts/flot/jquery.flot.resize.js')}}"></script> 
    <script src="{{asset('incs/js/charts/flot/jquery.flot.orderBars.js')}}"></script> 
    <script src="{{asset('incs/js/charts/flot/jquery.flot.pie.min.js')}}"></script> 
    <script src="{{asset('incs/js/charts/flot/jquery.flot.grow.js')}}"></script> 
    <script src="{{asset('incs/js/charts/flot/demo.js')}}"></script>

    <!-- fuelux -->
    <script src="{{asset('incs/js/fuelux/fuelux.js')}}"></script>
    <script src="{{asset('incs/js/parsley/parsley.min.js')}}"></script>

    <!-- file input -->
    <script src="{{asset('incs/js/file-input/bootstrap-filestyle.min.js')}}"></script>
    <!-- combodate -->
    <script src="{{asset('incs/js/libs/moment.min.js')}}"></script>
    <script src="{{asset('incs/js/combodate/combodate.js')}}"></script>
    <!-- select2 -->
    <script src="{{asset('incs/js/select2/select2.min.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('incs/js/datepicker/bootstrap-datepicker.js')}}"></script>
     <!-- datatables -->
    <script src="{{asset('incs/js/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- <script src="{{asset('incs/js/datatables/demo.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('incs/js/jquery.datatables/bootstrap-adapter/js/datatables.js')}}"></script>
    <script type="text/javascript" src="{{asset('incs/js/jquery.datatables/jquery.datatables.min.js')}}"></script>

    <!-- Flot chart from Main HRPlus -->
    <script src="{{asset('incs/js/flot-chart/jquery.flot.js')}}"></script>
    <script src="{{asset('incs/js/flot-chart/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('incs/js/flot-chart/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('incs/js/flot-chart/jquery.flot.tooltip.js')}}"></script>
    <script src="{{asset('incs/js/flot-chart/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('incs/js/flot-chart/jquery.flot.fillbetween.js')}}"></script>
    <script src="{{asset('incs/js/flot-chart/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('incs/js/flot-chart/jquery.flot.spline.js')}}"></script>
    

    <!-- Page Script  -->
         <?php
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

        </script>

      <!-- State & Lgas -->
      <script type="text/javascript">
       $("#school_other").hide();
        $("#course_other").hide();
        $("#religion_others").hide();
        $("#mStat").hide();
        $("#nok_other").hide();
        $("#dateRange").hide();

        function doAutoNumber(argument) {
            // body...
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
                $("#nok_other").show();
            }
            else{
               $("#nok_other").hide();
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


<!--BEGIN JAVASCRIPT-->

<script>
    var d7_1 = [0];
    var d7_2 = [0];
    $.plot('#pie-chart', [{
        data: d7_1,
        label: "Male",
        color: "#3DB9D3"
    },
        {
            data: d7_2,
            label: "Female",
            color: "#ffce54"
        }], {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 3/4,
                    background: {
                        opacity: 0.5,
                        color: '#000'
                    }
                }
            }
        }
    });
</script>

<script>
    var d4_1 = [["Fulltime", 0],["Temporary", 0],["Contract", 0],["Visit Prof", 0],["Sabbatical", 0],["Part-Time", 0],["Visit Lec", 0]];
    var d4_2 = [["Fulltime", 0],["Temporary", 0],["Contract", 0],["Visit Prof", 0],["Sabbatical", 0],["Part-Time", 0],["Visit Lec", 0]];
    $.plot("#bar-chart-stack", [{
        data: d4_1,
        label: "Male",
        color: "#07bf29"
    },{
        data: d4_2,
        label: "Female",
        color: "#ffc107"
    }], {
        series: {
            stack: !0,
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });

</script>
</body>

</html>