
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Salary Scales Categories</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="col-md-12">
        <div class="row collapse" id="newcat">
             @include('system.salary-scales.newCat')
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Salary Scale Categories <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                @role('hr-admin | administrator')
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newcat" aria-expanded="false" aria-controls="collapseExample">  </i> New Category</button>
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
                                <th> Code </th>
                                <th> Name </th>
                                <th style="text-align: center;">Sal. Scales</th>
                                <th style="text-align: center;">Personnel</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        @foreach($salCats as $cat)
                            <tr>
                                <td>{{$sn}}</td>
                                <td><a href="{{url('/system/salary-structures/categories/data/'.$cat->id)}}" class="link"> {{$cat->code}}</a></td>
                                <td><a href="{{url('/system/salary-structures/categories/data/'.$cat->id)}}" class="link"> {{$cat->category_name}}</a></td>
                                <td align="center">{{$cat->getScales->count()}}</td>
                                <td align="center">
                                    @foreach($cat->getScales as $catScales)
                                    @endforeach
                                        {{$catScales->count()}}
                                </td>
                                <td>
                                    @if($cat->status == 1)
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