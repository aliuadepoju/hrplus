  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Update {{$person->surname}}'s Salary Scale</h5>
        </div>
        <div class="panel-body">
          <form action="{{url('/pim/employees/data/editSalaryScale')}}" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
            <input type="hidden" name="pID" value="{{$person->id}}">
            <div class="col-md-6">
              <div class="row">
                
              <div class="form-group col-md-12">
                  <label for="">Select Desired Scale </label>
                  <select name="salary_scale" class="form-control" >
                    <option value="">Select Salary Scale</option>
                    @foreach($sScale as $scale)
                    <option value="{{$scale->id}}">{{$scale->scale}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group col-md-12" align="center">
                  <button type="submit" class="btn btn-sm btn-primary"> Update Scale </button>
              </div>
              </div>
            </div>
          </form>

            <div class="form-group col-md-6">
                <p align="justify">
                @if($person->gender = 1)
                  <b>Note</b> that if this personnel Salary Scale is not updated, his salary structure is questionable and is not visible to this system. The system can only read his information but could not make any intelligent informed decision about him. It is therefore adivised you upload his passport photograph. 
                @else
                  Note that if this personnel have no image, his identity is questionable and is not visible to this system. The system can only read her information but could not make any intelligent informed decision about her. It is therefore adivised you upload her passport photograph.
                @endif    
                </p>
            </div>
        </div>
    </div>
</div>
