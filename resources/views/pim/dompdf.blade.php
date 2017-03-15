<html>
<head>
	<title>Personnel Records</title>
    <link rel="stylesheet" href="{{asset('incs/css/app.v1.css')}}" type="text/css" />
	<!-- <link rel="stylesheet" href=""> -->
</head>

<body>
<div class="" align="center">
    <img src="{{asset('incs/images/hr_logobig.png')}}" alt="" style="height: 100px; width: 100px;" align="center">
</div>
    <p class="h2 " align="center">NATIONAL OPEN UNIVERISY OF NIGERIA <br> Learn & Work</p> 
    <h5 align="center">Personnel Records</h5>
    <hr>
    <div class="table-responsive">
        <table class="table table m-b-none" data-ride="datatables" >
            <thead>
                <tr>
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
                </tr>
            </thead>
            <tbody>
            <?php $sn = 1;?>
            @foreach($personnel as $prsn)
                <tr>
                    <td style="font-size: 12px;">{{$sn}}</td>
                    <td style="font-size: 12px;">NOUN/{{$prsn->unique_id}}</td>
                    <td style="font-size: 12px;"> {{$prsn->title .' '.$prsn->surname}}</td>
                    <td style="font-size: 12px;">{{$prsn->first_name}}</td>
                    <td style="font-size: 12px;" >{{$prsn->middle_name}}</td>
                    <td style="font-size: 12px;">{{$prsn->phone_no}}</td>
                    <td style="font-size: 12px;">{{$prsn->email}}</td>
                    <td style="font-size: 12px;">{{$prsn->getState->state}}</td>
                    <td style="font-size: 12px;">{{$prsn->getLga->lga_name}}</td>
                    <td style="font-size: 12px;">{{$prsn->getScale ? $prsn->getScale->scale : "Not set" }}</td>
                </tr>
            <?php $sn++;?>
            @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
