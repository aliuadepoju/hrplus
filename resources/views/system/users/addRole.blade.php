<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Adding Role to {{$user->surname}}</h5>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{url('/system/users/attach_role')}}" role="form">
                <div class="form-group col-lg-12">
                    <label for="code" >Select Role(s) from the dropdown box</label>
                  <select class="" name="role_id[]" id="select2-tags" style="width: 100%;" multiple="">
                      @foreach($roles as $rl)
                      <option value="{{$rl->id}}">{{$rl->name}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group col-lg-12" align="center">
                    <a href="{{url('/system/users/profile/'.$user->id)}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>