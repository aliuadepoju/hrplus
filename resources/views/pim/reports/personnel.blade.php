<html>
<head>
	<title>Personnel Records</title>
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
    <h5 align="center">PERSONNEL RECORDS</h5>
</div>
    <hr>
    <div class="table-responsive">
        <table class="table table m-b-none" data-ride="datatables" >
            <thead>
            <tr bgcolor repeat pbr knext>
		      <td border=1 width=10 bgcolor=#eeeeee><font size=3>S/N</font></td>
		      <td border=1 width=21 bgcolor=#eeeeee><font size=3>Staff No</font></td>
		      <td border=1 width=35 bgcolor=#eeeeee><font size=3>Name</font></td>
		      <td border=1 width=42 bgcolor=#eeeeee><font size=3>Designation</font></td>
		      <td border=1 width=10 bgcolor=#eeeeee><font size=3>Sex</font></td>
		      <td border=1 width=27 bgcolor=#eeeeee><font size=3>State</font></td>
		      <td border=1 width=20 bgcolor=#eeeeee><font size=3>LGA</font></td>
		      <td border=1 width=35 bgcolor=#eeeeee><font size=3>Qualifications</font></td>
		      <td border=1 width=20 bgcolor=#eeeeee><font size=3>DOB</font></td>
		      <td border=1 width=20 bgcolor=#eeeeee><font size=3>DO Present Appt</font></td>
		      <td border=1 width=23 bgcolor=#eeeeee><font size=3>Telephone </font></td>
		      <td border=1 width=15 bgcolor=#eeeeee><font size=3> Appt</font></td>
		      <td border=1 width=15 bgcolor=#eeeeee><font size=3>Salary</font></td>
		    </tr>
                <!-- <tr>
                    <th style="font-size: 12px;">S/N</th>
                    <th style="font-size: 12px;">Staff No</th>
                    <th style="font-size: 12px;">Surname</th>
                    <th style="font-size: 12px;">First Name</th>
                    <th style="font-size: 12px;">Mid. Name</th>
                    <th style="font-size: 12px;">Phone No</th>
                    <th style="font-size: 12px;">e-Mail</th>
                    <th style="font-size: 12px;">State</th>
                    <th style="font-size: 12px;">LGA</th>
                    <th style="font-size: 12px;">Sal. Scale</th>
                </tr> -->
            </thead>
            <tbody>
            <?php $sn = 1;?>
            @foreach($personnel as $prsn)
                <tr>
                    <td border=1 width=10><font size=1>{{$sn}}</font></td>
                    <td border=1 width=21><font size=1>NOUN/{{$prsn->unique_id}}</font></td>
                    <td style="font-size: 12px;"> {{$prsn->title .' '.$prsn->surname .' '.$prsn->first_name.' '.$prsn->middle_name}}</td>
                    <td style="font-size: 12px;">{{$prsn->getNounInfos->rank}}</td>
                    <td style="font-size: 12px;" >@if($prsn->gender == 1) M @else F @endif</td>
                    <td style="font-size: 12px;">{{$prsn->getState->state}}</td>
                    <td style="font-size: 12px;">{{$prsn->getLga->lga_name}}</td>
                    <td style="font-size: 12px;"></td>
                    <td>{{$prsn->dob}}</td>
                    <td>{{$prsn->dob}}</td>
                    <td style="font-size: 12px;">{{$prsn->phone_no}}</td>
                    <td style="font-size: 12px;">{{$prsn->getNounInfos->getAppt->name}}</td>
                    <td style="font-size: 12px;">{{$prsn->getNounInfos->getScale ? $prsn->getNounInfos->getScale->scale : "Not set" }}</td>
                </tr>

            <?php $sn++;?>
            @endforeach
            </tbody>
        </table>
    </div>
<br><br>
    <div class="footer">
		<div class="col-md-6 pull-left">
    		<div class="panel panel-primary">
    			{{strtoupper('For Offical Use Only')}}	
    		</div>
		</div>
		
		<div class="col-md-6 pull-right">
			<div class="panel panel-danger">
    			{{strtoupper("official stamp")}}
			</div>
		</div>

		Reviewd By:_________________________________________________________________________<br> Signature & Date:_________________________________________
    </div>

</body>
</html>
