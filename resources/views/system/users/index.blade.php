
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/branches')}}"><i class="fa fa-cogs"></i> System Preference</a></li>
            <li class="active">Users</li>
        </ul>
        <div class="m-b-md">
            @if(Session::has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Thank you.</strong> You successfully added <a href="#" class="alert-link">{{Session::get('message')}}</a>. 
            </div> 
            @endif
        </div>
        <div class="row collapse" id="newuser">
                 @include('system.users.new')
            </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Branches <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                <div class="pull-right">
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#newuser" aria-expanded="false" aria-controls="collapseExample">Add New User</button>
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
                    <table class="table table-striped m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Full Names </th>
                                <th>Branch/Center</th>
                                <th>Phone Number</th>
                                <th>e-Mail</th>
                                <th>Role(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$sn}}</td>
                                <td><a href="{{url('/system/users/profile/'.\Crypt::encrypt($user->id))}}" class="link"> {{$user->surname .' '.$user->first_name.' '.$user->middle_name}}</a></td>
                                <td>{{$user->getBranch->branch_name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td align="left">
                                    <?php $roles = $user->getRoles(); ?>
                                        @if(count($roles)>0)
                                            @foreach($roles as $role)
                                            {{ UCfirst($role) }}<br />
                                            @endforeach
                                            @else
                                            N/A
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