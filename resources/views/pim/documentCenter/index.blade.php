
    
@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>Document Centers <small>(Personnel)</small> 
            <p class="pull-right"> Total Personnel: {{number_format(count(\App\Personnel::all()),0)}} &emsp; Total Documents: {{number_format(count(\App\Document::all()),0)}} </p>
        </p>
    </header>
    <section class="scrollable wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($personnel as $person)
                    <div class="col-sm-4">
                        <section class="panel panel-default">
                           <a href=""> 
                           @if($person->getNOUNInfos->status_id ==1)
                           <header class="panel-heading bg-primary dker no-border">
                            @elseif($person->getNOUNInfos->status_id ==2)
                           <header class="panel-heading bg-primary dker no-border">
                            @elseif($person->getNOUNInfos->status_id ==3)
                           <header class="panel-heading bg-warning lt no-border">
                            @else
                           <header class="panel-heading bg-danger lt no-border">
                           @endif
                                <div class="clearfix">
                                    <a href="#" class="pull-left thumb avatar b-3x m-r"> 
                                        <?php $fpath = public_path().'/incs/images/personnel/'.$person->id.'.png' ;?>
                                    @if (file_exists($fpath))
                                        <img src="{{asset('incs/images/personnel/'.$person->id.'.png')}}" class="img-circle" style="height: 70px; width: 90px;"> 
                                    @else
                                        <img src="{{asset('incs/images/personnel/no-pic.jpg')}}" class="img-circle"> 
                                    @endif
                                    </a>
                                    <div class="clear">
                                        <div class="h4 m-t-xs m-b-xs text-white"><a href="{{url('/pim/employees/data/'.\Crypt::encrypt($person->id))}}">{{$person->title .' '.$person->surname.' '. $person->middle_name .' '.$person->first_name }} <i class="fa fa-eye text-white pull-right text-xs m-t-sm"> </i></a>  </div> <small class="text-muted">{{$person->getNOUNInfos->rank}}</small> </div>
                                </div>
                            </header></a>
                            <div class="list-group no-radius alt">
                                @foreach($docClass as $dC)
                                <a class="list-group-item"> <span class="badge bg-success">{{$person->getDocuments->count()}}</span> <i class="fa fa-file-o icon-muted"></i> {{$dC->classification_name}} </a>
                                @endforeach
                            </div>
                        </section>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</section>
@endsection