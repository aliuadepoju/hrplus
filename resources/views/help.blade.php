
@extends('layouts.base')

@section('content')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Help</li>
        </ul>
        <!-- <div class="m-b-md">
        </div> -->
        <div class="jumbotron">
	        <div class="" align="center">
	        	<img src="{{asset('/incs/images/hr_logo.png')}}" alt="" align="center">
	        </div>
	        <hr>
        	<p align="justify" class="h5">This module is designed to assist you how to use the system. Most of the questions you would have asked or loved to ask are being asked with you in mind and appropraite answers are being provided to help you. You may explore all the questions and answers section of this help module and take the full advantage of the features as it is our to help you understand the system properly. We do hope you enjoy this product </p>
        </div> 
        <div class="col-md-8">
	        <section class="panel panel-default">
	            <header class="panel-heading"> Frequently Asked Questions <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i></header>
		        <div class="panel-body">
	               <div class="panel-group m-b" id="accordion2">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> How do I .... #1 </a> </div>
                            <div id="collapseOne" class="panel-collapse in">
                                <div class="panel-body text-sm"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo"> How do I .... #2 </a> </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body text-sm"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree"> How do I .... #3 </a> </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body text-sm"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                            </div>
                        </div>
                    </div>   
	            </div>
	        </section>
        </div>
         <div class="col-sm-4">
            <div class="list-group bg-white">
                <a href="#" class="list-group-item">  <span class="badge">201</span> </i> Personnal Issues </a>
                <a href="#" class="list-group-item">  <span class="badge bg-info">5021</span> Pages and Layouts </a>
                <a href="#" class="list-group-item">  <span class="badge bg-success">14</span>Call </a>
                <a href="#" class="list-group-item">  <span class="badge bg-dark">20</span> Messages </a>
                <a href="#" class="list-group-item">  <span class="badge">14</span> </i> Bookmarks </a>
            </div>
        </div> 
        <!-- <div class="col-md-4">
	        <section class="panel panel-warning">
	            <header class="panel-heading"> Questions Category <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i></header>
		        <div class="panel-body">
	            </div>
	        </section>
        </div> -->
    </section>
</section>

@endsection	