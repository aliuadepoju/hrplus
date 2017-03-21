@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>Dashboard <p class="pull-right" ><strong>Total Employees: {{number_format($personnel->count(), 0)}}</strong></p>
        </p>
    </header>
    <section>
        <section class="hbox stretch">
            <section>
                <section class="vbox">
                    <section class="scrollable wrapper">
                        <div class=" col-md-6">
                        <section class="panel panel-default">
                            <div class="carousel slide auto panel-body" id="c-slide">
                                <ol class="carousel-indicators out">
                                    <li data-target="#c-slide" data-slide-to="0" class="active"></li>
                                    <li data-target="#c-slide" data-slide-to="1" class=""></li>
                                    <li data-target="#c-slide" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">

                                    <div class="item active">
                                       <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-graduation fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>
                                                    @foreach($acadStaff as $AcadSt)
                                                        {{number_format($AcadSt->Nos, 0)}}
                                                    @endforeach

                                                    </strong></span> <small class="text-muted text-uc">Academic Staff</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs">
                                                    <strong>
                                                @foreach($nonAcadStaff as $noAcadSt)
                                                    {{number_format($noAcadSt->Nos, 0)}}
                                                @endforeach
                                                    </strong></span> <small class="text-muted text-uc">Non Academic Staff</small> </a>
                                                </div>
                                           </div>
                                       </div> 
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>
                                                    @foreach($seniorNonAcadStaff as $snoAcadSt)
                                                      {{number_format($snoAcadSt->Nos + $AcadSt->Nos, 0)}}
                                                    @endforeach
                                                    </strong></span> <small class="text-muted text-uc">Senior Staff</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>

                                                    @foreach($juniorNonAcadStaff as $jnoAcadSt)
                                                      {{number_format($jnoAcadSt->Nos, 0)}}
                                                    @endforeach

                                                    </strong></span> <small class="text-muted text-uc">Junior Staff</small> </a>
                                                </div>
                                           </div>
                                       </div>
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>
                                                    @foreach($seniorNonAcadStaff as $snoAcadSt)
                                                      {{number_format($snoAcadSt->Nos, 0)}}
                                                    @endforeach
                                                    </strong></span> <small class="text-muted text-uc">Senior Non Acad</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>
                                                    @foreach($juniorNonAcadStaff as $jnoAcadSt)
                                                      {{number_format($jnoAcadSt->Nos, 0)}}
                                                    @endforeach
                                                    </strong></span> <small class="text-muted text-uc">Junior Non Acaad</small> </a>
                                                </div>
                                           </div>
                                       </div>
                                    </div>
                                    <!--  -->
                                    <div class="item">
                                        <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>{{number_format($fullTimeStaff->count(),0)}}</strong></span> <small class="text-muted text-uc">Full Time Employment</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>{{number_format($transientStaff->count(),0)}}</strong></span> <small class="text-muted text-uc">Transient Staff</small> </a>
                                                </div>
                                           </div>
                                       </div>
                                    </div>

                                    <div class="item">
                                        <div class="row">
                                           <div class="col-md-6 text-center" >
                                                <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>{{number_format($male->count(), 0)}}</strong></span> <small class="text-muted text-uc">Male</small> </a>
                                                </div>
                                           </div>
                                           <div class="col-md-6 text-center">
                                               <div class="col-sm-12 col-md-12 padder-v b-r b-light"> <span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-male fa-stack-1x text-white"></i> </span>
                                                    <a class="clear" href="#"> <span class="h3 block m-t-xs"><strong>{{number_format($female->count(), 0)}}</strong></span> <small class="text-muted text-uc">Female</small> </a>
                                                </div>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#c-slide" data-slide="prev"> <i class="fa fa-angle-left"></i> </a>
                                <a class="right carousel-control" href="#c-slide" data-slide="next"> <i class="fa fa-angle-right"></i> </a>
                            </div>
                        </section>

                        <!-- /Geo Spatial Distributions of Centers -->
                        <!-- <section class="panel"> -->
                            <!-- <header class="panel-heading font-bold">Geo Spatial Distribution of Study Centers</header> -->
                            <!-- <div class="panel-body"> -->
                               <div id="mymap" style="height: 400px; width: 550px;"></div> <br>
                            <!-- </div> -->
                        <!-- </section> -->
                        <!-- /Geo Spatial Distributions of Centers -->
                        <section class="panel">
                            <header class="panel-heading font-bold">Gender Distribution</header>
                            <div class="panel-body">
                              <canvas id="genderDistribution" width="300" height="300"></canvas>
                            </div>
                        </section>

                        <section class="panel ">
                            <header class="panel-heading font-bold">Status Distribution</header>
                            <div class="panel-body">
                            <canvas id="myChart" width="400" height="400"></canvas>
                                <!-- <div id="myChart" style="width: 100%; height:300px"></div> -->
                            </div>
                        </section>
                        <section class="panel panel-info">
                            <header class="panel-heading"> <h4> Departments Employment Distribution </h4><small>Drill Down of Employee Distribution in NOUN Departments</small></header>
                                <div class="table-responsive">
                                <h3></h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Department</th>
                                                <th style="text-align: center;">Employees</th>
                                                <th style="text-align: center;">Percent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $n = 1;?>
                                            @foreach($depts as $dept)
                                                <tr>
                                                    <td>{{$n}}</td>
                                                    <td><a href="">{{$dept->dept_name}}</a></td>
                                                    <td align="center">{{$dept->getNOUNInfo->count()}}</td>
                                                    <td align="center">{{@number_format($dept->getNOUNInfo->count()/$personnel->count()*100,2)}}%</td>
                                                </tr>
                                                
                                            <?php $n++;?>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </section>

                            <section class="panel panel-warning">
                            <header class="panel-heading"> <h4> State of Origin Distribution </h4><small>Drill Down of Employee Distribution from each State</small></header>
                                <div class="table-responsive">
                                <h3></h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>State</th>
                                                <th style="text-align: center;" >Employees</th>
                                                <th style="text-align: center;">Branches</th>
                                                <th style="text-align: center;">Empl. %</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $n = 1;?>
                                            @foreach($states as $state)
                                                <tr>
                                                    <td>{{$n}}</td>
                                                    <td width="35%"><a href="{{url('/state/data/'.\Crypt::encrypt($state->id))}}">{{$state->state}}</a></td>
                                                    <td align="center">{{$state->getPersonnel->count()}}</td>
                                                    <td align="center">{{$state->getBranches->count()}}</td>
                                                    <td align="center">{{@number_format(($state->getPersonnel->count()/$state->count())*100/100, 2)}}%</td>
                                                </tr>
                                                
                                            <?php $n++;?>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                         <section class=""></section>   
                        </div>

                        <div class=" col-md-6">
                            <section class="panel panel-success">
                            <header class="panel-heading"> Date: {{date('d-m-Y')}}<h4> <strong>Top 5 Highest State Employment Distribution</strong></h4> </header>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>State</th>
                                                <th style="text-align: center;">Employees</th>
                                                <th style="text-align: center;">Percent</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $n = 1;?>
                                           @foreach($Hstates as $hst)
                                            <tr>
                                                <td>{{$n}}</td>
                                                <td><a href="{{url('/state/data/'.\Crypt::encrypt($hst->state_id))}}">{{$hst->state}}</a></td>
                                                <td align="center">{{number_format($hst->Nos, 0)}}</td>
                                                <td align="center">{{$hst->Nos*count($hst->state)/100}} %</td>
                                                <td><a href="{{url('/state/data/'.\Crypt::encrypt($hst->state_id))}}" class="btn btn-success btn-xs ">View More</a></td>
                                            </tr>
                                            <?php $n++;?>
                                           @endforeach 
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5"> <h4> <strong>Least 5 States Employment Distribution</strong></h4></td>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>State</th>
                                            <th style="text-align: center;">Employees</th>
                                            <th style="text-align: center;">Percent</th>
                                            <th></th>
                                        </tr>
                                           <?php $n = 1;?>
                                           @foreach($Lstates as $lst)
                                            <tr>
                                                <td>{{$n}}</td>
                                                <td><a href="{{url('/state/data/'.\Crypt::encrypt($lst->state_id))}}">{{$lst->state}}</a></td>
                                                <td align="center">{{number_format($lst->Nos, 0)}}</td>
                                                <td align="center">{{$lst->Nos*count($lst->state)/100}} %</td>
                                                <td><a href="{{url('/state/data/'.\Crypt::encrypt($lst->state_id))}}" class="btn btn-success btn-xs ">View More</a></td>
                                            </tr>
                                            <?php $n++;?>
                                           @endforeach 
                                        </tfoot>
                                    </table>
                                </div>
                            </section>

                            <section class="panel panel-default">
                            <header class="panel-heading"> <h4> <strong>BRANCH DISTRIBUTION (EMPLOYEE)</strong></h4><small>Drill Down of Employee Distribution in NOUN Study Centers</small></header>
                                <div class="table-responsive">
                                <h3></h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Study Center</th>
                                                <th style="text-align: center;" width="10%">Employees</th>
                                                <th style="text-align: center;" width="10%">Percent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $n = 1;?>
                                            @foreach($branches as $branch)
                                                <tr>
                                                    <td>{{$n}}</td>
                                                    <td><a href="{{url('/branches/data/'.\Crypt::encrypt($branch->id))}}">{{$branch->branch_name}}</a></td>
                                                    <td align="center">{{$branch->getStaff->count()}}</td>
                                                    <td align="center">{{@number_format(count($branch)/$branch->getStaff->count()*100, 2)}} %</td>
                                                </tr>
                                                
                                            <?php $n++;?>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </section>
                </section>
            </section>
        </section>
    <hr>
    </section>
    <br>
    <!-- <footer class="footer bg-white b-t b-light">
        <p> @ {{date('Y')}} Powered by: Natview Technology <p class="pull-right">Nigerian Defence Academy</p></p>
    </footer> -->
</section>


@endsection
