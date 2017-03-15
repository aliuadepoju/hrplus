<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New System User</h5>
        </div>
        <div class="panel-body">
            <form>
                <div class="form-group col-lg-4">
                    <label for="name" >Surname</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Surname">
                </div>
                <div class="form-group col-lg-4">
                    <label for="name" >Middle Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Middle Name">
                </div>
                <div class="form-group col-lg-4">
                    <label for="name" >First Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="First Name">
                </div>
                <div class="form-group col-lg-4">
                  <label for="product_category_id">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="08012345678">
                </div>
                 <div class="form-group col-lg-4">
                  <label for="product_category_id">Email</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="user@noun.edu.ng">
                </div>
                <div class="form-group col-lg-4">
                    <label for="code" >Branch/Branch/Study Center</label>
                  <select class="" name="branch_id" id="select2-option" style="width: 100%;">
                      <option value="1">Select one</option>
                      @foreach($branches as $branch)
                      <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group col-lg-6">
                    <label for="code" >Role(s)</label>
                  <select class="" name="role_id[]" id="select2-tags" style="width: 100%;" multiple="">
                      @foreach($roles as $rl)
                      <option value="{{$rl->id}}">{{$rl->name}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group col-lg-6">
                    <label for="code" >Permission(s)</label>
                  <select class="form-control" name="perm_id[]" id="select2-option" style="width: 100%;" multiple="">
                      @foreach($permissions as $prm)
                      <option value="{{$prm->id}}">{{$prm->name}}</option>
                      @endforeach
                  </select>
                </div>
               
                
                <div class="form-group col-lg-12" align="center">
                    <a href="{{url('/system/users')}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>