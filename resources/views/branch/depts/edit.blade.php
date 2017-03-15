<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New Department</h5>
        </div>
        <div class="panel-body">
            <form>
                <div class="form-group col-lg-4">
                    <label for="code" >Parent Branch</label>
                  <select class="" name="branch_id" id="select2-option" style="width: 100%;">
                      <option value="1">Select A Branch</option>
                      @foreach($branches as $brnc)
                      <option value="{{$brnc->id}}">{{$brnc->branch_name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="name" >Department Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$dpet->dept_name}}">
                </div>
                <div class="form-group col-lg-4">
                  <label for="product_category_id">Email</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{$dpet->email}}">
                </div>
                <div class="form-group col-lg-12">
                  <label for="description">Description</label>
                  <textarea  class="form-control" name="description" rows="3" placeholder="Description">{{$dpet->description}}"</textarea>
                </div>
                <div class="form-group col-lg-12" align="center">
                    <a href="{{url('/branches/departments/1')}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>