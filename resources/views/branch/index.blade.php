
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Branches</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="row collapse" id="newbranch">
             @include('branch.new')
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Branches <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newbranch" aria-expanded="false" aria-controls="collapseExample">Setup New Branch</button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Branch Name </th>
                                <th>State</th>
                                <th>Personnel</th>
                                <th>Percent</th>
                                <th>Departments</th>
                                <th>e-Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        @foreach($branches as $branch)
                            <tr>
                                <td>{{$sn}}</td>
                                <td width="42%"><a href="{{url('/branches/data/'.$branch->id)}}" class="link"> {{$branch->branch_name}}</a></td>
                                <td width="28%">{{$branch->getState->state}}</td>
                                <td align="center">{{number_format($branch->NounInfos->count(), 0)}}</td>
                                <td align="center">{{number_format(count($branch)/$branch->NounInfos->count() *100, 2)}} %</td>

                                <td align="center">{{$branch->getDepts->count()}}</td>
                                <td>{{$branch->email}}</td>
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