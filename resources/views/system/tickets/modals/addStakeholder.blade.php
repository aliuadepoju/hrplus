<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title">Adding Stakeholder(s) to {{$ticket->title}}</h5>
        </div>
        <div class="panel-body">
            <form action="{{url('/system/tickets/'.$ticket->id.'/add-stakeholder')}}" method="POST">
                <input type="hidden" name="ticketID" value="{{$ticket->id}}" > 
            {{csrf_field()}}
                <div class="form-group col-md-4">
                    <label>Stakeholder </label>
                    <select name="stakeholder" id="select2-option" style="width: 100%;" >
                        <option value="">Select Stakeholder</option>
                        @foreach($stakeholders as $stkhd)
                        <option value="{{$stkhd->id}}">{{$stkhd->surname .' '.$stkhd->other_names}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- <div class="form-group col-md-6">
                    <label>Other Names</label>
                    <input type="text" class="form-control" name="othernames">
                </div>
                <div class="form-group col-md-6">
                    <label>Phone Number </label>
                    <input type="text" class="form-control" name="phoneNo">
                </div>
                <div class="form-group col-md-6">
                    <label>e-Mail Address</label>
                    <input type="email" class="form-control" name="email">
                </div> -->

                <div class="form-group col-md-8">
                  <label for="product_category_id">Reason for Addition</label>
                    <textarea name="reason_for_addition" id="" class="form-control" rows="3"></textarea>
                </div>
                
                <div class="form-group col-md-12" align="center">
                    <a href="{{url('/system/rbac/roles')}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>