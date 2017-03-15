    
@extends('layouts.masterpage')

@section('content')

    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{url('/employees')}}">Employees</a></li>
                <li class="active">Registration</li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Employee Registration</h3> </div>
                <section class="panel panel-default wizard">
                    <div class="clearfix wizard-steps">
                        <ul class="steps">
                            <li data-target="#step1" class="active"><span class="badge badge-info">1</span>Personal Information</li>
                            <li data-target="#step2"><span class="badge">2</span>Qualifications Information</li>
                            <li data-target="#step3"><span class="badge">3</span>Employment Information</li>
                            <li data-target="#step4"><span class="badge">4</span>Finish</li>
                        </ul>
                        <div class="actions">
                            <button type="button" class="btn btn-default btn-xs btn-prev" disabled="disabled">Prev</button>
                            <button type="button" class="btn btn-default btn-xs btn-next" data-last="Finish">Next</button>
                        </div>
                    </div>
                    <div class="step-content">
                        <!-- The form -->
                        <form action="{{url('/pim/employees/register/new')}}" method="POST">
                        {{ csrf_field() }}
                            <!-- Step 1 -->
                            <div class="step-pane active" id="step1">
                                
                            <div class="row">
                                
                                <div class="form-group col-md-2">
                                    <label for="">Title</label>
                                    <select name="title" id="" class="form-control">
                                        <option value="">Title</option>
                                        <option value="1">Prof.</option>
                                        <option value="2">Dr.</option>
                                        <option value="3">Engr.</option>
                                        <option value="4">Arc.</option>
                                        <option value="5">Phar.</option>
                                        <option value="6">Mr.</option>
                                        <option value="7">Mrs</option>
                                        <option value="8">Miss</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Surname</label>
                                    <input type="text" name="surname" class="form-control" placeholder="Surname" data-required="true">    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" data-required="true">    
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Middle Name <small>Optional</small></label>
                                    <input type="text" name="middle_name" class="form-control" placeholder="Initials">    
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" placeholder="08012345678" data-required="true" pattern="(0)([7,8,9])([0,1])(\d{8})">    
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="">Alternate Phone Number </label>
                                    <input type="text" name="altPhone" class="form-control" placeholder="09-9658525">    
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">e-Mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="you@noun.edu.ng" data-required="true">    
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="">Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>    
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Date of Birth</label>
                                    <input name="dob" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-1985" data-date-format="dd-mm-yyyy" style="width:100%;">    
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">State of Origin </label>
                                    <select id="state" style="width:100%;" name="state" data-required="true" class="form-control">
                                        <option value="">Select State</option>
                                        @foreach($states as $st)
                                        <option value="{{$st->id}}">{{$st->state}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">LGA of Origin</label>
                                    <select name="lga" id="lga" class="form-control"></select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Home Town </label>
                                    <input type="text" name="homeTown" class="form-control" placeholder="Gwagwalada">    
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="">Religion</label>
                                    <select name="religion" id="religion" class="form-control" required="">
                                        <option value=""> Select One</option>
                                        <option value="1"> Christianity</option>
                                        <option value="2"> Islam</option>
                                        <option value="3"> Others</option>
                                    </select>
                                </div>

                                <!-- Marital Status -->

                                <div class="form-group col-md-2">
                                    <label for="">Marital Status</label>
                                    <select name="mStatus" id="mStatus" class="form-control" required="">
                                        <option value=""> Select One</option>
                                        <option value="1"> Single</option>
                                        <option value="2"> Engaged</option>
                                        <option value="3"> Married</option>
                                        <option value="4"> Seperated</option>
                                        <option value="5"> Widow/Widower</option>
                                    </select>
                                </div>

                                <div class="" id="mStat">
                                    
                                    <div class="form-group col-md-2">
                                        <label for="">No of Children </label>
                                        <input type="text" name="no_of_children" class="form-control" placeholder="2">    
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">Name of Spouse/Wife </label>
                                        <input type="text" name="spouse" class="form-control" placeholder="Gimbia Lami">    
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Spouse Phone No </label>
                                        <input type="text" name="spouse_phone_no" class="form-control" placeholder="08082354785">    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">Next of Kin (Full Names)</label>
                                    <input type="text" name="nok_name" class="form-control" placeholder="Salama Adama">    
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Next of Kin Phone </label>
                                    <input type="text" name="nok_phone" class="form-control" placeholder="0808457877">    
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Next of Kin Relationship </label>
                                    <select name="nokRel" id="select2-option" class="" required="" style="width: 100%;">
                                       <option value="">Select Relationship</option>  
                                          <option value="1">Son</option>  
                                          <option value="2">Daughter</option>  
                                          <option value="3">Brother</option>  
                                          <option value="4">Sister</option>  
                                          <option value="5">Parent</option>  
                                          <option value="500">Others (Specify)</option> 
                                    </select>
                                    <div class="" id="nok_other">
                                        <label for="">Other Relationship</label>
                                        <input type="text" name="nok_other_name" class="form-control" placeholder="Cousine">    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Next of Kin's Residential Address</label>
                                    <textarea name="nok_res_address" id="" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-12">
                                <br>
                            <legend>Residence Information</legend>
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Street No & Name</label>
                                    <input type="text" class="form-control" name="street_name_no">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Residence State </label>
                                    <select id="r_state" style="width:100%;" name="r_state" data-required="true" class="form-control">
                                        <option value="">Select State</option>
                                        @foreach($states as $st)
                                        <option value="{{$st->id}}">{{$st->state}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-2">
                                    <label for="">Residence LGA</label>
                                    <select name="r_lga" id="r_lga" class="form-control"></select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Town/Locality </label>
                                    <input type="text" name="locality" class="form-control" placeholder="Maitama">    
                                </div>
                            </div>
                            <hr>
                            </div>
                            <!-- /Step 1 -->
                            
                            <!-- Step 2 -->
                            <div class="step-pane" id="step2">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Qualification </label>
                                        <select class="form-control" id="" style="width:100%;" name="qualification" data-required="true">
                                            <option value="">Select One</option>
                                            @foreach($quals as $qual)
                                            <option value="{{$qual->id}}">{{$qual->qualification_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Field of Study</label>
                                        <select class="form-control" id="field_of_study" style="width:100%;" name="field_of_study" data-required="true">
                                            <option value="">Select One</option>
                                            @foreach($fos as $fos)
                                            <option value="{{$fos->id}}">{{$fos->fos_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-5">
                                        <label for="">Course Studied</label>
                                        <select class="form-control" id="sub_field_of_study" style="width:100%;" name="sub_field_of_study" data-required="true">
                                        
                                        <option value="1000">Other Course Specify</option>
                                        </select>  

                                         <div class="" id="course_other">
                                            <label for="">Specify Other Institution</label>
                                            <input type="text" class="form-control" name="course_other">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <label for="">Institution</label>
                                        <select class="form-control" name="school" data-required="true">
                                            <option value="">Select One</option>
                                            @foreach($schools as $schl)
                                            <option value="{{$schl->id}}">{{$schl->school_name}}</option>
                                            @endforeach
                                            <option value="500">Other (Specify)</option>
                                        </select>
                                        <div class="" id="school_other">
                                            <label for="">Specify Other Institution</label>
                                            <input type="text" class="form-control" name="school_other">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label for="">Class of Degree </label>
                                        <select name="class_of_degree" id="" class="form-control" required="">
                                            <option value="">Selecct One</option>
                                            <option value="1">First Class</option>
                                            <option value="2">2<sup>nd</sup> Class, Upper Division</option>
                                            <option value="3">2<super>nd</super> Class, Lower Division</option>
                                            <option value="4">Third Class</option>
                                            <option value="5">Distinction</option>
                                            <option value="6">Upper Credit</option>
                                            <option value="7">Lower Credit</option>
                                            <option value="8">Pass</option>
                                            <option value="9">Fail</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Scale of Grade </label>
                                        <input type="text" name="scale_of_grade" class="form-control" placeholder="">    
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="">CGPA </label>
                                        <input type="text" name="cgpa" class="form-control" placeholder="4.51">    
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="">Graduation Year</label>
                                        <select name="year" id="select2-option" class="form-control">
                                            <option value="">Year</option>
                                            @foreach($years as $yr)
                                            <option value="{{$yr}}">{{$yr}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Start Date </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <select name="sdtate_month" id="" class="form-control" required="" >
                                                <option value="">Selecct Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            </div>
                                            <div class="col-md-6">
                                            <select name="sdtate_year" id="" class="form-control" required="" >
                                                <option value="">Selecct Year</option>
                                                @foreach($years as $yr)
                                                <option value="{{$yr}}">{{$yr}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">End Date </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <select name="edtate_month" id="" class="form-control" required="">
                                                <option value="">Selecct Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            </div>
                                            <div class="col-md-6">
                                            <select name="edtate_year" id="" class="form-control" required="">
                                                <option value="">Selecct Year</option>
                                                @foreach($years as $yr)
                                                <option value="{{$yr}}">{{$yr}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group col-md-2">
                                        <label for=""></label> <br>
                                        <!-- <button class="btn btn-primary btn-sm">[ + ] Add More</button> -->
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <!-- /Step 2 -->
                            
                            <!-- Step 3 -->
                            <div class="step-pane" id="step3">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="radio" name="nooption" id="noOption" value="1" checked="" onselect="doAutoNumber();"> Autogenerate  &nbsp;&nbsp;
                                        <input type="radio" name="nooption" id="noOption" value="2">  Manual Renerate
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="">Staff No.</label>
                                        <input type="text" name="nounNo" id="nounNo" class="form-control" placeholder="NOUN/000001" value="NOUN/{{$uniqueID}}">    
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">Branch/Study Center</label>
                                        <select name="branch" id="branch" class="form-control">
                                            <option value="">Select Sudy Center</option>
                                            @foreach($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                            @endforeach
                                        </select>     
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Department</label>
                                        <select name="dept" id="dept" class="form-control">
                                            
                                        </select>     
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Unit</label>
                                        <select name="unit" id="unit" class="form-control">
                                            <option value="">Select Unit</option>
                                            @foreach($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                            @endforeach
                                        </select>     
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Designation</label>
                                        <input type="text" name="rank" class="form-control" placeholder="Vice Chancellor" data-required="true">    
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="">Salary Level</label>
                                        <select name="salaryscale" id="" class="form-control">
                                            <option value="">Select Scale</option>
                                            @foreach($salscale as $scale)
                                            <option value="{{$scale->id}}">{{$scale->scale}}</option>
                                            @endforeach
                                        </select>    
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Date of Entry</label>
                                        <input name="doe" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-1985" data-date-format="dd-mm-yyyy" style="width:100%;"> 
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Nature of Appointment</label>
                                        <select name="appointment" id="select2-option" class="form-control">
                                            <option value="">Select Appointment Type</option>
                                            @foreach($status as $sts)
                                            <option value="{{$sts->id}}">{{$sts->name}}</option>
                                            @endforeach
                                        </select>    
                                    </div>
                                </div>
                            </div>
                            <!-- /Step 3 -->

                            <!-- Step 4 -->
                            <div class="step-pane" id="step4">
                                <div class="row">
                                    <div class="jumbotron">
                                        <h2>Thank You!</h2>
                                        <p>Your data has been queed for submission. The HR Office has recieve this data as well. A mail will also be sent to your inbox to confirm this submission. You can click either buttons to Add data or Submit Data to complete the action<br><br><br>
                                        <center><button type="submit" class="btn btn-primary btn-lg text-center"  >Add Data</button></center>
                                        <hr><br>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                            <!-- /Step 4 -->
                        </form>
                    </div>
                </section>
        </section>
    </section>
@endsection