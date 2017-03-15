  <div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">{{$person->surname}}'s Change LGA</h5>
        </div>
        <div class="panel-body">
           <form action="{{url('/pim/employees/data/editLGA')}}" method="post" role="form">
           {{csrf_field()}}
           <input type="hidden" name="personnel_id" value="{{$person->id}}">
          <div class="col-md-12">
            
            <div class="form-group col-md-6">
                <label for="">State of Origin </label>
                <select id="state" style="width:100%;" name="state" data-required="true" class="form-control">
                    <option value="{{$person->getState->id}}">{{$person->getState->state}}</option>
                    @foreach($states as $st)
                    <option value="{{$st->id}}">{{$st->state}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="">LGA of Origin</label>
                <select name="lga" id="lga" class="form-control"></select>
            </div>
            <hr>
            <div class="form-group col-md-12" align="center">
                <button type="submit" class="btn btn-sm btn-primary"> Change LGA </button>
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