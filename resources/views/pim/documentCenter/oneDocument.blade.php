@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>{{$doc->title}}'s profile</p>
    </header>
    <section class="scrollable">
        <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r col-md-6">
                <section class="vbox">
                    <section class="scrollable">
                        <div class="wrapper ">
                        <div class="col-md-12" id="edit">
                        	
                        </div>
                            <section class="panel panel-default">
                                <div class="panel-body">
                                    <div class="clearfix  m-t">
                                        <div class="inline">
                                            <div class="thumb-lg"> 
                                            <?php $fpath = public_path().'/incs/images/personnel/'.$doc->getPersonnel->id.'.jpg' ;?>
		                                    @if (file_exists($fpath))
		                                        <img src="{{asset('incs/images/personnel/'.$doc->getPersonnel->id.'.jpg')}}" class="img-circle"> 
		                                    @else
		                                        <img src="{{asset('incs/images/personnel/no-pic.jpg')}}" class="img-circle"> 
		                                    @endif
                                            	<!-- <img src="{{asset('incs/images/hr_logobig.png')}}" class="">  -->
                                            </div>
											<hr>
                                            <div class="h4 m-t m-b-xs">{{$doc->getPersonnel->surname .' '.$doc->getPersonnel->first_name.' '.$doc->getPersonnel->middle_name}}</div> 
                                            <hr>
                                        </div>
                                            <div class="h4 m-t m-b-xs">Title: {{$doc->title}}</div> 
                                            <div class="h4 m-t m-b-xs">ISS Auth: {{$doc->issuing_authority}}</div> 
                                            <div class="h4 m-t m-b-xs">Exp.: {{$doc->expiration}}</div> 
                                            <div class="h5 m-t m-b-xs">Status: 
                                            	@if($doc->status ==1)
                                            	<span class="label bg-primary label-xs">Active</span>
                                            	@else
                                            	<span class="label bg-danger label-xs">Expired</span>
                                            	@endif
                                            </div> 
                                    </div>
                                </div>
                                <footer class="panel-footer bg-white ">
	                                <p class="h5 text-center">Other Documents</p>
	                                <div class="table-responsive">
	                                	<table class="table">
	                                		<thead>
	                                			<tr>
	                                				<th>Title</th>
	                                				<th>Validity</th>
	                                			</tr>
	                                		</thead>
	                                		<tbody>
	                                			@foreach($doc->getPersonnel->getDocuments as $pDocs)
	                                			<tr>
	                                				<td><a href="{{url('pim/employees/document/one/'.$pDocs->id)}}">{{$pDocs->title}}</a></td>
	                                				<td>{{$pDocs->expiration}}</td>
	                                			</tr>
	                                			@endforeach
	                                		</tbody>
	                                	</table>
	                                </div>
                                </footer>
                            </section>
                            <hr>
                        </div>
                    </section>
                </section>
            </aside>
            <aside class="bg-white">
                <section class="vbox">
                 <br><br>
                    <section class="scrollable">
                    <div class="row collapse" id="editbranch">
			             <!-- Include any file -->
			        </div>
		            <div class="row collapse" id="deactivate">
			             <!-- Include any file here -->
		            </div>
		            <br>
                        <div class="col-md-12">
                        <img src="{{asset('/documents/personnel/'. $doc->getPersonnel->surname .'_'.$doc->getPersonnel->first_name.'_'.$doc->getPersonnel->middle_name.'/'.$doc->getParent->id.'/'.$doc->id.'.png')}}" alt="No physical file assocaited with the selected title" style="width: 100%; height: 100%;">
                    	</div>	
                    </section>
                </section>
            </aside>
        </section>
    </section>
</section>
@endsection