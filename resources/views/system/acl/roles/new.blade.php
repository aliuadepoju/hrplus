<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New System Role</h5>
        </div>
        <div class="panel-body">
            <form action="{{url('/system/rbac/roles')}}" method="POST">
            {{csrf_field()}}
                <div class="form-group col-lg-4">
                    <label for="name" >Role Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Administrator">
                </div>
                <div class="form-group col-lg-4">
                    <label for="name" >Role Slug</label>
                    <input type="text" class="form-control" id="name" name="slug" placeholder="Role Slug">
                </div>

                <div class="form-group col-lg-4">
                    <label for="code" >Permission(s)</label>
                  <select class="" name="perm_id[]" id="select2-tags" style="width: 100%;" multiple="">
                      @foreach($permissions as $prm)
                      <option value="{{$prm->id}}">{{$prm->name}}</option>
                      @endforeach
                  </select>
                </div>
                 <div class="form-group col-lg-12">
                  <label for="product_category_id">Description</label>
                    <textarea name="description" id="" class="form-control" rows="3"></textarea>
                </div>
               
                
                <div class="form-group col-lg-12" align="center">
                    <a href="{{url('/system/rbac/roles')}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>