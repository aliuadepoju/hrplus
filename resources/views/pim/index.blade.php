
@extends('layouts.masterpage')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Employees</li>
        </ul>
        <div class="m-b-md">
            <!-- <h3 class="m-b-none">Datagrid</h3>  -->
        </div>
        <section class="panel panel-default">
            <header class="panel-heading"> Employees <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
            	<div class="pull-right">
		            <a href="{{url('/pim/employees/register/'.\Crypt::encrypt(5))}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Employee Registration</a> 
		            <!-- <a href="" class="btn btn-warning btn-xs"><i class="fa fa-share-square"></i> Export Report</a> -->
		            <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-share"></i> Export Report <span class="caret"></span> </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/pim/reports/doPDF')}}">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
		        </div>
	        </header>
	        <div class="panel-body">
	            <div class="table-responsive">
	                <table class="table m-b-none" data-ride="datatables" >
	                    <thead>
	                        <tr>
	                            <th>S/N</th>
	                            <th>Staff No</th>
	                            <th>Surname</th>
	                            <th>First Name</th>
	                            <th>Middle Name</th>
	                            <th>Phone No</th>
	                            <th>e-Mail</th>
	                            <th>State</th>
	                            <th>LGA</th>
	                            <th>Sal. Scale</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php $sn = 1;?>
	                    @foreach($personnel as $prsn)
	                    	<tr>
	                    		<td>{{$sn}}</td>
	                    		<td>NOUN/{{$prsn->unique_id}}</td>
	                    		<td><a href="{{url('/pim/employees/data/'.\Crypt::encrypt($prsn->id))}}" class="link"> {{$prsn->title .' '.$prsn->surname}}</a></td>
	                    		<td>{{$prsn->first_name}}</td>
	                    		<td>{{$prsn->middle_name}}</td>
	                    		<td>{{$prsn->phone_no}}</td>
	                    		<td>{{$prsn->email}}</td>
	                    		<td>{{$prsn->getState->state}}</td>
	                    		<td>{{isset($prsn->getLga) ? $prsn->getLga->lga_name : "Not set"}}</td>
	                    		<td>{{$prsn->scale}}</td>
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