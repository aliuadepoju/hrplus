  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Leave Form</h5>
        </div>
        <div class="panel-body">
           <form action="{{url('/pim/employees/leave/new')}}" method="post" role="form">
           {{csrf_field()}}
           <input type="hidden" name="personnel_id" value="{{$person->id}}">
          <div class="col-md-12">
            
            <div class="form-group col-md-3">
                <label for="">Leave Type </label>
                <select id="" class="form-control" style="width:100%;" name="lType" data-required="true" >
                   <option value="">Select Type</option>
                    @foreach($leavetypes as $lT)
                    <option value="{{$lT->id}}">{{$lT->type_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="">Date Resumed Duty from previous leave</label>
                <input name="drdfpl" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2016" data-date-format="dd-mm-yyyy" style="width:100%;">
            </div>
            <div class="form-group col-md-4"  >
                <label for="">Date Proceeding on Leave</label>
                <input name="dpol" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2017" data-date-format="dd-mm-yyyy" style="width:100%;">
            </div>
            <div class="form-group col-md-4">
                <label for="">Date Leave Ends</label>
                <input name="dle" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2017" data-date-format="dd-mm-yyyy" style="width:100%;">
            </div>
            <div class="form-group col-md-4">
                <label for="">Date of Resumption of Duty</label>
                <input name="dorod" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2017" data-date-format="dd-mm-yyyy" style="width:100%;">
            </div>

            <div class="form-group col-md-4">
                <label for="" class="text-xs">Person responsible for duties during absence <small>(If Applicable)</small></label>
                <select name="personInAbsence" id="select2-option" style="width: 100%;">
                    @foreach($myTeam as $team)
                        @foreach($team->personnels as $tP)
                        <option value="{{$tP->id}}">{{$tP->surname .' '.$tP->first_name. ' '.$tP->middle_name}}</option>
                        @endforeach
                    @endforeach
                </select>
                <!-- <input name="tLeaves" class="form-control text-center" readonly="" type="text" value="{{$person->getLeaves->count()}}" align="center"> -->
            </div>

            <!-- <div class="form-group col-md-4">
                <label for="">Your Total Leaves</label>
                <input name="tLeaves" class="form-control text-center" readonly="" type="text" value="{{$person->getLeaves->count()}}" align="center">
            </div> -->
            <hr>
            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> Submit </button>
            </div>

          </div>
      </form>
        </div>
    </div>
</div>

<script>
  function doAlert() {
    alert('It worked');
  }
</script>