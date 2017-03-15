<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New Branch</h5>
        </div>
        <div class="panel-body">
            <form action="{{url('/branches')}}" method="POST" role="form">
            {{csrf_field()}}
                <div class="form-group col-lg-4">
                    <label for="name" >Branch Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Branch Name">
                </div>
                <div class="form-group col-lg-4">
                  <label for="product_category_id">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="08012345678">
                </div>
                 <div class="form-group col-lg-4">
                  <label for="product_category_id">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="branch@noun.edu.ng">
                </div>
                <div class="form-group col-lg-4">
                    <label for="code" >Resident State</label>
                  <select class="" name="state_id" id="select2-option" style="width: 100%;">
                      <option value="1">Select A State</option>
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
                  <select class="form-control" name="cord_id" id="select2-option" style="width: 100%;">
                      <option value="1">Select Cordinator</option>
                      @foreach($cords as $cd)
                      <option value="{{$cd->id}}">{{$cd->surname}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group col-lg-12">
                  <label for="description">Address</label>
                  <textarea  class="form-control" name="address" rows="3" placeholder="Address"></textarea>
                </div>
                <div class="form-group col-lg-12" align="center">
                    <a href="{{url('/branches')}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>