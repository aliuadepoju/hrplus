
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Salary Scales</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>

         <div class="col-md-12">
            <div class="row collapse" id="newrscale">
                @include('system.salary-scales.newScale')
            </div>
        <section class="panel panel-success">
            <header class="panel-heading"> Salary Scales <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                @role('hr-admin | administrator')
                <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newrscale" aria-expanded="false" aria-controls="collapseExample"> New Scale</button>
                @endrole
                @role('hr-admin | report-only')
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
                @endrole
                </div>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Sale Name </th>
                                <th style="text-align: center;">Parent Category</th>
                                <th style="text-align: center;">Personnel</th>
                                <!-- <th style="text-align: center;">Percentage (%)</th> -->
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        @foreach($salScales as $scale)
                            <tr>
                                <td>{{$sn}}</td>
                                <td><a href="{{url('/system/salary-structures/scales/data/'.$scale->id)}}" class="link"> {{$scale->scale}}</a></td>
                                <td align="center">{{$scale->getParent->category_name}}</td>
                                <td align="center">{{$scale->getPersonnel->count()}}</td>
                                <!-- <td align="center">{{$scale->getPersonnel->count()}}</td> -->
                                <td>
                                    @if($scale->status == 1)
                                    <span class="label bg-primary">Active</span>
                                    @else
                                    <span class="label bg-danger">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                        <?php $sn++;?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        </div>
    </section>
</section>

@endsection