<html>
<head>
	<title>Study Centers' Records</title>
    <link rel="stylesheet" href="{{asset('incs/css/app.v1.css')}}" type="text/css" />
	<!-- <link rel="stylesheet" href=""> -->
	<style>
      #watermark { position: fixed; bottom: 0px; right: 0px; width: 200px; height: 200px; opacity: .1; }
    </style>
</head>

<body ">
<div class="" align="center">
    <img src="{{asset('incs/images/hr_logobig.png')}}" alt="" style="height: 90px; width: 90px;" align="center">
    <p class="h2 " align="center">NATIONAL OPEN UNIVERISY OF NIGERIA <br> Learn & Work</p> 
    <h5 align="center">STUDY CENTERS' RECORDS</h5>
</div>
    <hr>

    <div class="table-responsive">
        <table class="table table m-b-none" data-ride="datatables">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Branch Name </th>
                    <th>State</th>
                    <th>Personnel</th>
                    <th>Percent</th>
                    <!-- <th>Departments</th> -->
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

                    <!-- <td align="center">{{$branch->getDepts->count()}}</td> -->
                    <td>{{$branch->email}}</td>
                </tr>
            <?php $sn++;?>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <hr>
    <div class="footer">
		<div class="col-md-6 pull-left">
			{{strtoupper('For Offical Use Only')}}	
		</div>
		
		<div class="col-md-6 pull-right">
			{{strtoupper("official stamp")}}
		</div> <br><br><br>

		Reviewd By:_________________________________________________________________________<br><br><br> Signature:___________________________________________ Date:___________________________
    </div>

</body>
</html>
