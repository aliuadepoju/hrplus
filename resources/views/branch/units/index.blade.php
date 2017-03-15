
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/branches')}}"><i class="fa fa-sitemap"></i> Branches</a></li>
            <li><a href="{{url('/branches/departments')}}"><i class="fa fa-cubes"></i> Departments</a></li>
            <li class="active">Units</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="row collapse" id="newunit">
             @include('branch.units.new')
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Units <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                    <!-- <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newunit3" aria-expanded="false" aria-controls="collapseExample">Setup New Unit</button> -->
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newunit" aria-expanded="false" aria-controls="collapseExample">Setup New Unit</button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
                    <a href="" class="btn btn-xs btn-info" type="button" data-toggle="collapse">View Unit Tree</a>
                </div>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Unit </th>
                                <th>Parent Department</th>
                                <th>Parent Branch</th>
                                <th style="text-align: center;">Staff Strenght</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        @foreach($units as $unit)
                            <tr>
                                <td>{{$sn}}</td>
                                <td><a href="{{url('/branches/departments/units/'.$unit->id)}}" class="link"> {{$unit->unit_name}}</a></td>
                                <td>{{$unit->getDept->dept_name}}</td>
                                <td>{{$unit->getDept->getBranch->branch_name}}</td>
                                <td align="center">{{$unit->getPersonnel->count()}}</td>
                            </tr>
                        <?php $sn++;?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</section>

@endsection