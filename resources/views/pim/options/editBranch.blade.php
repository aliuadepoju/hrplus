  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">{{$person->surname}}'s Change Study Center</h5>
        </div>
        <div class="panel-body">
           <form action="{{url('/pim/employees/data/editBranch')}}" method="post" role="form">
           {{csrf_field()}}
           <input type="hidden" name="personnel_id" value="{{$person->id}}">
          <div class="col-md-12">
            <div class="row">
              
            <div class="form-group col-md-6">
                <label for="">New Branch </label>
                <select id="" class="form-control" style="width:100%;" name="branch" data-required="true" >
                    <option value="">Select new branch</option>
                    @foreach($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Department </label>
                <select id="dept" style="width:100%;" name="dept" data-required="true" class="form-control">
                </select>
            </div>
            
            <div class="row col-md-12">
                <div class="panel">
                <div class="panel-header">
                  <header></header>
                </div>
                <div class="panel-body">
                  <div class="">
                    <p class="h4 "> <b style="color: red"> ***Warning:</b> Once this staff staff station is changed, all his records will be moved to the newly selected center. </p>
                  </div>
                </div>
              </div>
            </div>

            </div>
            

            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> Change Branch </button>
            </div>

          </div>
      </form>
        </div>
    </div>
</div>

<script>
  function doAlert() {
    alert('It worked');
  }
</script>