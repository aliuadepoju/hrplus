    
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
            <div class="panel wizard">
                <div class="wizard-steps clearfix" id="form-wizard">
                    <ul class="steps">
                        <li data-target="#step1" class="active"><span class="badge badge-info">1</span>Employee Personal Information </li>
                        <li data-target="#step2"><span class="badge">2</span>Qualification Information</li>
                        <li data-target="#step3"><span class="badge">3</span>Employment Information</li>
                        <li data-target="#step4"><span class="badge">4</span>Confirm Submission</li>
                    </ul>
                </div>
                <br>
                <div class="step-content clearfix">
                    <form action="{{url('/pim/employees/register')}}" method="POST">
                        <div class="step-pane active" id="step1">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="radio" name="nooption" id="noOption" value="1" checked="" onselect="doAutoNumber();"> Autogenerate  &nbsp;&nbsp;
                                        <input type="radio" name="nooption" id="noOption" value="2">  Manual Renerate
                                    </div>
                                </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">Noun Unique No.</label>
                                    <input type="text" name="nounNo" id="nounNo" class="form-control" placeholder="NOUN/000001" value="NOUN/{{$uniqueID}}">    
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Prof,Dr,Mr,Mrs">    
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Surname</label>
                                    <input type="text" name="surname" class="form-control" placeholder="Surname" data-required="true">    
                                </div>
                                <div class="form-group col-md-3">
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
                                    <input type="text" name="phone" class="form-control" placeholder="08012345678" data-required="true">    
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
                                <div class="form-group col-md-4">
                                    <label for="">Home Town </label>
                                    <input type="text" name="homeTown" class="form-control" placeholder="Gwagwalada">    
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
                                        <label for="">Most Senior Child </label>
                                        <input type="text" name="seniorChild" class="form-control" placeholder="Jude Okoh">    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Next of Kin (Name)</label>
                                        <input type="text" name="nok_name" class="form-control" placeholder="Salama Adama">    
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">Next of Kin Phone </label>
                                        <input type="text" name="spouse" class="form-control" placeholder="0808457877">    
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
                                            <!-- <div class="form-group col-md-12"> -->
                                        <label for="">Other Relationship</label>
                                        <input type="text" name="nok_other_name" class="form-control" placeholder="Cousine">    
                                    <!-- </div> -->
                                        </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Residential Address </label>
                                    <textarea name="resAddress" class="form-control" id="" rows="2"></textarea>
                                </div>

                            </div>
                            <hr>
                        </div>
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
                                    <label for="">Grade </label>
                                    <input type="text" name="grade[]" class="form-control" placeholder="First Class Upper">    
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="">Institution</label>
                                    <select class="" id="select2-option" style="width:100%;" name="school" data-required="true">
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
                                    <label for="">Year</label>
                                    <select name="year" id="select2-option" class="form-control">
                                        <option value="">Year</option>
                                        @foreach($years as $yr)
                                        <option value="{{$yr}}">{{$yr}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <hr>

                                <div class="form-group col-md-2">
                                    <label for=""></label> <br>
                                    <!-- <button class="btn btn-primary btn-sm">[ + ] Add More</button> -->
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- </div> -->
                        <div class="step-pane" id="step3">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Branch/Study Center</label>
                                    <select name="branch" id="branch" class="form-control">
                                        <option value="">Select Sudy Center</option>
                                        @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                        @endforeach
                                    </select>     
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Department</label>
                                    <select name="dept" id="dept" class="form-control">
                                        <!-- <option value="">Select Department</option>
                                        @foreach($depts as $dept)
                                        <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                                        @endforeach -->
                                    </select>     
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Unit</label>
                                    <select name="unit" id="unit" class="form-control">
                                        <!-- <option value="">Select Unit</option>
                                        @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                        @endforeach -->
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
                        <div class="step-pane" id="step4">

                            <div class="row">
                                <div class="jumbotron">
                                    <h2>Thank You!</h2>
                                    <p>Your data has been queed for submission. The HR Office has recieve this data as well. A mail will also be sent to your inbox to confirm this submission. You can click either buttons to Add data or Submit Data to complete the action<br><br><br><hr><br>
                                        <div class="form-group col-md-12" align="center">
                                            <button type="submit" class="btn btn-primary btn-lg" >Add Data</button>
                                        </div>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="actions pull-left">
                        <button type="button" class="btn btn-default btn btn-prev" disabled="disabled">Prev Section</button>
                        <button type="button" class="btn btn-success btn btn-next" data-last="Submit Data">Next Section</button>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a> -->
@endsection