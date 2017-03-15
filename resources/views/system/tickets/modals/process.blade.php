<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Processing {{$ticket->title}}</h5>
        </div>
        <div class="panel-body">
            <form action="{{url('/system/tickets/'.$ticket->id.'/process')}}" method="POST">
                <input type="hidden" name="ticketID" value="{{$ticket->id}}" > 

            {{csrf_field()}}
                <div class="form-group col-md-5">
                        <label>Status</label>
                        <select name="status" class="form-control" required="">
                            <option value="">Select staus</option>
                            @foreach($status as $st) 
                            <option value="{{$st->id}}">{{$st->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-7">
                        <label>Action<small> what do you perform on the ticket</small></label>
                        <input type="text" class="form-control" name="action">
                    </div>
                 <div class="form-group col-md-12">
                  <label for="product_category_id">Note</label>
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