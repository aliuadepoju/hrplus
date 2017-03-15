<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Edit {{$branch->branch_name}}</h5>
        </div>
        <div class="panel-body">
            <form action="{{url('/branches/data/'.$branch->id)}}" method="POST" role="form" class="form">
            {{csrf_field()}}
                <div class="form-group col-lg-4">
                    <label for="name" >Branch Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$branch->branch_name}}">
                </div>
                <div class="form-group col-lg-4">
                  <label for="product_category_id">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$branch->phone_no}}">
                </div>
                 <div class="form-group col-lg-4">
                  <label for="product_category_id">Email</label>
                    <input type="text" class="form-control" id="code" name="email" value="{{$branch->email}}">
                </div>
                <div class="form-group col-lg-4">
                    <label for="state_id" >Resident State</label>
                  <select class="" name="state_id" id="select2-option" style="width: 100%;">
                      <option value="{{$branch->getState->id}}">{{$branch->getState->state}}</option>
                      @foreach($states as $st)
                      <option value="{{$st->id}}">{{$st->state}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="code" >Resident LGA</label>
                  <select class="form-control" name="lga" id="lga" style="width: 100%;">
                      
                  </select>
                </div>

                <div class="form-group col-lg-4">
                    <label for="code" >Center Cordinator</label>
                  <select class="form-control" name="cord_id" id="select2-option1" style="width: 100%;">
                      <option value="1">Select Cordinator</option>
                      @foreach($cords as $cd)
                      <option value="{{$cd->id}}">{{$cd->surname.' '.$cd->first_name.' '.$cd->middle_name}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group col-lg-12">
                  <label for="description">Address</label>
                  <textarea  class="form-control" name="address" rows="3" placeholder="">{{$branch->address}}</textarea>
                </div>
                <div class="form-group col-lg-12" align="center">
                    <a href="{{url('/branches/data/'.$branch->id)}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>