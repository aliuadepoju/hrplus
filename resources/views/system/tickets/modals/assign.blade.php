<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Assigning {{$ticket->title}}</h5>
        </div>
        <div class="panel-body">
            <form action="{{url('/system/tickets/'.$ticket->id.'/assign')}}" method="POST">
                <input type="hidden" name="ticketID" value="{{$ticket->id}}" > 
            {{csrf_field()}}
                <div class="form-group col-md-4">
                        <label>Responsible Person</label>
                        <select name="user" class="form-control" required="">
                            <option value="">Select user to assign task to</option>
                            @foreach($user as $usr) 
                            <option value="{{$usr->id}}">{{$usr->surname .' '.$usr->first_name.' '.$usr->middle_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>To be resolved in... <small>days</small></label>
                        <input type="text" class="form-control" name="days">
                    </div>
                 <div class="form-group col-md-5">
                  <label for="product_category_id">Note</label>
                    <textarea name="assignement_note" id="" class="form-control" rows="3"></textarea>
                </div>
                 <div class="form-group col-md-12">
                  <label for="product_category_id">Process Note</label>
                    <textarea name="process_note" id="" class="form-control" rows="3"></textarea>
                </div>

               
                
                <div class="form-group col-md-12" align="center">
                    <a href="{{url('/system/rbac/roles')}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>