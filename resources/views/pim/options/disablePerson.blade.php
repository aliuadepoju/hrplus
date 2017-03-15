<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title bg-danger" align="center"> SUSPENDING {{$person->surname.' '.$person->first_name.' '.$person->middle_name}}</h5>
        </div>
        <div class="panel-body">
            <form action="{{url('/pim/employees/data/deactivate/'.$person->id)}}" method="POST" role="form" class="form">
            {{csrf_field()}}
                <input type="hidden" class="form-control" id="personId" name="branchId" value="{{$person->id}}">
                
                <div class="form-group col-lg-12">
                 <p align="justify"> <b style="color: red;">Are you sure you want to deactivate {{$person->surname.' '.$person->first_name.' '.$person->middle_name}}?</b> You are laible for this action and it is not revocable. All activities and records of this staff are hereby termed floating once you complete this action.</p>
               </div>

                <div class="form-group col-lg-12">
                  <label for="description">Reason for deactivation</label>
                  <textarea  class="form-control" name="reason" rows="3" placeholder=""></textarea>
                </div>
                <div class="form-group col-lg-12" align="center">
                    <a href="{{url('/pim/employees/data/'.$person->id)}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>