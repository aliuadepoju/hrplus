
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/branches')}}"><i class="fa fa-cogs"></i> System Preference</a></li>
            <li class="active">Roles</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <div class="row collapse" id="newrole">
                 @include('system.acl.roles.new')
            </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Roles <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                @role('hr-admin | administrator')
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newrole" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-plus-square"> </i> Setup New System Role</button>
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
                                <th>Role </th>
                                <th style="text-align: center;">Users in Role</th>
                                <th>Role Permissions</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$sn}}</td>
                                <td><a href="{{url('/system/rbac/role/data/'.$role->id)}}" class="link"> {{$role->name}}</a></td>
                                <td align="center">{{$role->users->count()}}</td>
                                <td align="left">
                                        <!-- if(count($perms)>0)
                                            foreach(perms as perm)
                                             UCfirst($perm) <br />
                                            endforeach
                                            else
                                            N/A
                                        endif -->
                                </td>
                                <td>
                                    @if($role->status == 1)
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
    </section>
</section>

@endsection