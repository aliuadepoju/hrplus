  <div class="col-lg-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Editing {{$person->surname}}'s Data</h5>
        </div>
        <div class="panel-body">
           <form action="{{url('/pim/employees/data/editData')}}" method="post" role="form">
           {{csrf_field()}}
           <input type="hidden" name="personnel_id" value="{{$person->id}}">
          <div class="col-md-12">
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
                  <input type="text" name="surname" class="form-control" placeholder="Surname" data-required="true" value="{{$person->surname}}">    
              </div>
              <div class="form-group col-md-4">
                  <label for="">First Name</label>
                  <input type="text" name="first_name" class="form-control" placeholder="First Name" data-required="true" value="{{$person->first_name}}">    
              </div>

              <div class="form-group col-md-3">
                  <label for="">Middle Name <small>Optional</small></label>
                  <input type="text" name="middle_name" class="form-control" placeholder="Initials" value="{{$person->middle_name}}">    
              </div>
          </div>

          <div class="row">
              <div class="form-group col-md-4">
                  <label for="">Phone Number</label>
                  <input type="text" name="phone" class="form-control" placeholder="08012345678" data-required="true" pattern="(0)([7,8,9])([0,1])(\d{8})" value="{{$person->phone_no}}">    
              </div>

              <div class="form-group col-md-4">
                  <label for="">Alternate Phone Number </label>
                  <input type="text" name="altPhone" class="form-control" placeholder="09-9658525" value="{{$person->alternate_phone_no}}">    
              </div>

              <div class="form-group col-md-4">
                  <label for="">e-Mail</label>
                  <input type="email" name="email" class="form-control" placeholder="you@noun.edu.ng" data-required="true" value="{{$person->email}}">    
              </div>

            </div>
            <div class="row">
              <div class="form-group col-md-4">
                  <label for="">State of Origin </label>
                  <select id="state" style="width:100%;" name="state" required="" class="form-control">
                      <option value="{{$person->getState->id}}" selected="">{{$person->getState->state}}</option>
                      @foreach($states as $st)
                      <option value="{{$st->id}}">{{$st->state}}</option>
                      @endforeach
                  </select>

              </div>

              <div class="form-group col-md-3">
                  <label for="">LGA of Origin</label>
                  <select name="lga" id="lga" class="form-control" required=""></select>
              </div>
              <div class="form-group col-md-5">
                  <label for="">Home Town </label>
                  <input type="text" name="homeTown" class="form-control" placeholder="Gwagwalada" value="{{$person->home_town}}">    
              </div>
            </div>
            <div class="row">

              <div class="form-group col-md-4">
                  <label for="">Gender</label>
                  <select name="gender" id="" class="form-control" required="">
                      <option value="">Select Gender</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                  </select>    
              </div>
              <div class="form-group col-md-4">
                  <label for="">Religion</label>
                  <select name="religion" id="religion" class="form-control" required="">
                      <option value=""> Select One</option>
                      <option value="1"> Christianity</option>
                      <option value="2"> Islam</option>
                      <option value="3"> Others</option>
                  </select>
                  <div class="" id="religion_others">
                      <label for="ReligionOthers">Religion</label>
                      <input type="text" name="religion_others" class="form-control" placeholder="African Traditional Religion">
                  </div>
              </div>
              <div class="form-group col-md-4">
                  <label for="">Date of Birth</label>
                  <input name="dob" class="input-s datepicker-input form-control" size="16" type="text" value="{{$person->dob}}" data-date-format="dd-mm-yyyy" style="width:100%;" required="">    
              </div>
            </div>

            <!-- Marital Status -->
            <div class="row">

              <div class="form-group col-md-3">
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
                      <input type="text" name="no_of_children" class="form-control" placeholder="2" style="text-align: center;">    
                  </div>

                  <div class="form-group col-md-4">
                      <label for="">Spouse/Husband </label>
                      <input type="text" name="spouse" class="form-control" placeholder="Gimbia Lami">    
                  </div>
                  <div class="form-group col-md-3">
                      <label for="">Phone No </label>
                      <input type="text" name="spouse_phone_no" class="form-control" placeholder="08082354785">    
                  </div>
              </div>
          </div>
         <!--  <div class="row">
              <div class="form-group col-md-4">
                  <label for="">Next of Kin</label>
                  <input type="text" name="nok_name" class="form-control" placeholder="Salama Adama" required="">    
              </div>

              <div class="form-group col-md-4">
                  <label for="">NOK Phone </label>
                  <input type="text" name="nok_phone" class="form-control" placeholder="0808457877">    
              </div>


              <div class="form-group col-md-4">
                  <label for="">NOK Relationship </label>
                  <select name="nokRel" id="nokRel" class="form-control" required="" style="width: 100%;">
                     <option value="">Select Relationship</option>  
                        <option value="1">Son</option>  
                        <option value="2">Daughter</option>  
                        <option value="3">Brother</option>  
                        <option value="4">Sister</option>  
                        <option value="5">Parent</option>  
                        <option value="500">Others (Specify)</option> 
                  </select>
                  <div class="" id="nok_rel_other">
                      <label for="">Other Relationship</label>
                      <input type="text" name="nok_other_name" class="form-control" placeholder="Cousine">    
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                  <label for="">Gender </label>
                  <select name="nokGender" id="" class="form-control" required="" style="width: 100%;" required="">
                     <option value="">Gender</option>  
                        <option value="1">Male</option>  
                        <option value="2">Female</option>  
                  </select>
              </div>
              <div class="form-group col-md-3">
                  <label for="">NOK Date of Birth </label>
                  <input name="nok_dob" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-1985" data-date-format="dd-mm-yyyy" style="width:100%;" required="">   
              </div>
              <div class="form-group col-md-6">
                  <label for="">NOK Street No & Name</label>
                  <input type="text" class="form-control" name="nok_street_name_no" required="">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-4">
                  <label for="">NOK Residence State </label>
                  <select id="nok_r_state" style="width:100%;" name="nok_r_state" required="" class="form-control">
                      <option value="">Select State</option>
                      @foreach($states as $st)
                      <option value="{{$st->id}}">{{$st->state}}</option>
                      @endforeach
                  </select>

              </div>

              <div class="form-group col-md-4">
                  <label for="">NOK Residence LGA</label>
                  <select name="nok_r_lga" id="nok_r_lga" class="form-control"></select>
              </div>

              <div class="form-group col-md-4">
                  <label for="">Town/Locality </label>
                  <input type="text" name="nok_locality" class="form-control" placeholder="Maitama" required="">    
              </div>
          </div> -->
          <div class="row">
          <div class="form-group col-md-12">
              <br>
          <legend>Residence Information</legend>
          </div>
          </div>
          <div class="row">
              <div class="form-group col-md-3">
                  <label for="">Street No & Name</label>
                  <input type="text" class="form-control" name="street_name_no" required="">
              </div>
              <div class="form-group col-md-3">
                  <label for="">Residence State </label>
                  <select id="r_state" style="width:100%;" name="r_state" required="" class="form-control">
                      <option value="">Select State</option>
                      @foreach($states as $st)
                      <option value="{{$st->id}}">{{$st->state}}</option>
                      @endforeach
                  </select>

              </div>

              <div class="form-group col-md-3">
                  <label for="">Residence LGA</label>
                  <select name="r_lga" id="r_lga" class="form-control"></select>
              </div>

              <div class="form-group col-md-3">
                  <label for="">Town/Locality </label>
                  <input type="text" name="locality" class="form-control" placeholder="Maitama">    
              </div>
          </div>
          <hr>
            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> Update Record </button>
            </div>
          </div>
      </form>
        </div>
    </div>
</div>
