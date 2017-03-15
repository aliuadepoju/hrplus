<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title" align="center"> DEACTIVATING {{$unit->unit_name}}</h5>
        </div>
        <div class="panel-body">
            <form action="{{url('/branches/data/deactivate/'.$unit->id)}}" method="POST" role="form" class="form">
            {{csrf_field()}}
                <input type="hidden" class="form-control" id="unitId" name="unitId" value="{{$unit->id}}">
                
                <div class="form-group col-lg-12">
                 <p align="justify"> <b style="color: red;">Are you sure you want to deactivate this unit?</b> You are laible for this action and it is not revocable. All activities of staff and records to this unit are hereby termed floating once you complete this action.</p>
               </div>

                <div class="form-group col-lg-12">
                  <label for="description">Reason for deactivation</label>
                  <textarea  class="form-control" name="reason" rows="3" placeholder=""></textarea>
                </div>
                <div class="form-group col-lg-12" align="center">
                    <a href="{{url('/branches/departments/units/'.$unit->id)}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Deactivate</button>
                </div>
            </form>
        </div>
    </div>
</div>