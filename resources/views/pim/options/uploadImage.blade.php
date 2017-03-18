  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Upload {{$person->surname}}'s Image</h5>
        </div>
        <div class="panel-body">
          <form action="{{url('/pim/employees/data/uploadImage')}}" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
            <input type="hidden" name="personnel_id" value="{{$person->id}}">
            <input type="hidden" name="names" value="{{$person->surname.' '.$person->first_name}}">
            <div class="col-md-6">
              <div class="row">
                
              <div class="form-group col-md-12">
                  <label for="">Select Image </label>
                  <input type="file" class="form-control" name="avatar">
              </div>
              <div class="form-group col-md-12" align="center">
                  <button type="submit" class="btn btn-sm btn-primary"> Upload Image </button>
              </div>
              </div>
            </div>
          </form>

            <div class="form-group col-md-6">
                <p align="justify">
                @if($person->gender = 1)
                  Note that if this personnel have no image, his identity is questionable and is not visible to this system. The system can only read his information but could not make any intelligent informed decision about him. It is therefore adivised you upload his passport photograph. 
                @else
                  Note that if this personnel have no image, his identity is questionable and is not visible to this system. The system can only read her information but could not make any intelligent informed decision about her. It is therefore adivised you upload her passport photograph.
                @endif    
                </p>
            </div>
        </div>
    </div>
</div>
