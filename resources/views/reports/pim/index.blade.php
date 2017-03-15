
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/pim/employees')}}"><i class="fa fa-user"></i> Employees</a></li>
            <li class="active">Reports</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="row">
        <div class="row collapse" id="emailReport">
                @include('reports.pim.options.email')
            </div>
            <form action="">
                <div class="col-md-6">
                    <section class="panel panel-default">
                        <header class="panel-heading"> General Reporting Criteria <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="radio" name="nooption" id="noOption" value="1" checked=""> All Employees  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="nooption" id="noOption" value="2">  Academic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="nooption" id="noOption" value="3">  Non Academic
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Date Type</label>
                                    <select name="dateType" id="dateType" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="1">All</option>
                                        <option value="2">Date Range</option>
                                    </select>

                                </div>
                                <div class="col-md-12" id="dateRange">
                                    <div class="form-group col-md-6">
                                        <label for="">Date From</label>
                                        <input name="dateFrom" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2004" data-date-format="dd-mm-yyyy" style="width:100%;">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Date To</label>
                                        <input name="dateTo" class="input-s datepicker-input form-control" size="16" type="text" value="12-02-2017" data-date-format="dd-mm-yyyy" style="width:100%;">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="0">All</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">State</label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="0">All</option>
                                        @foreach($states as $st)
                                        <option value="{{$st->id}}">{{$st->state}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">LGA</label>
                                    <select name="lga" id="lga" class="form-control">
                                        <option value="0">All</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Advance Report Tab -->
                <div class="col-md-6">
                    <section class="panel panel-info">
                        <header class="panel-heading"> Specific Reporting Criteria <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> </header>
                        <div class="panel-body">
                            <div class="form-group col-md-12">
                                <label for="">Branch/Study Center</label>
                                <select name="branch" id="branch" class="form-control">
                                    <option value="0">All</option>
                                    @foreach($branches as $brn)
                                    <option value="{{$brn->id}}">{{$brn->branch_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Department</label>
                                <select name="dept" id="depts" class="form-control">
                                    <option value="0">All</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Unit</label>
                                <select name="dept" id="depts" class="form-control">
                                    <option value="0">All</option>
                                </select>
                            </div>
                            <hr>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="">Salary Level</label>
                                <select name="dept" id="depts" class="form-control">
                                    <option value="0">All</option>
                                    <option value="1">Junior</option>
                                    <option value="2">Senior</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Nature of Appointment</label>
                                <select name="dept" id="depts" class="form-control">
                                    <option value="0">All</option>
                                    @foreach($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 ">
                    <section class="panel">
                        <header class="panel-heading"> Reporting Type <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> </header>
                        <div class="panel-body">
                            <div class="form-group col-md-12">
                                <input type="radio" name="reporttype" id="reporttype" value="4" checked="">  Detailed Report &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="reporttype" id="reporttype" value="5">  Statistical Report   
                            </div>

                            <hr>

                            <div class="form-group col-md-12" align="Center">
                                <button type="submit" class="btn btn-primary btn-sm">Generate Report</button>
                                <a href="#" class="btn btn-warning btn-sm">Generate Excel</a>
                                <button class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#emailReport" aria-expanded="false" aria-controls="collapseExample">e-Mail Report</button>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </section>
</section>

@endsection