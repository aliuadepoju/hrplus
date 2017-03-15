<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h5 class="panel-title">Setup New Salary Scale Category</h5>
        </div>
        <div class="panel-body">
            <form action="{{url('/system/salary-structures/NewScales')}}" method="POST">
            {{csrf_field()}}
                <div class="form-group col-lg-6">
                    <label for="name" >Parent Category</label>
                    <select class="" name="category" id="select2-option" style="width: 100%;" required="">
                      <option value=""> Select a category </option>
                    @foreach($salCats as $cats)
                      <option value="{{$cats->id}}"> {{$cats->category_name}} </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="name" >Scale Name</label>
                    <input type="text" class="form-control" id="name" name="scaleName" placeholder="CONTISS">
                </div>

                <div class="form-group col-lg-6">
                    <label for="name" >Min. Salary Range</label>
                    <input type="text" class="form-control" id="min_salary_range" name="min_salary_range" placeholder="1500565.65">
                </div>
                <div class="form-group col-lg-6">
                    <label for="name" >Max. Salary Range</label>
                    <input type="text" class="form-control" id="max_salary_range" name="max_salary_range" placeholder="1500565.65">
                </div>

                <div class="form-group col-lg-12">
                    <label for="code" >Category Type</label>
                    <select name="grouping" id="" class="form-control" required="">
                      <option value=""> Select a grouping </option>
                      <option value="1"> Junior </option>
                      <option value="2"> Senior </option>
                    </select>
                </div>

                <div class="form-group col-lg-12">
                  <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" rows="3" placeholder="CONTISS"></textarea>
                </div>
                  
                
                <div class="form-group col-lg-12" align="center">
                    <a href="{{url('/system/salary-structures/_Scales')}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" id="register" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>