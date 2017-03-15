@extends('layouts.masterpage')

@section('content')
<section class="vbox">
    <header class="header bg-white b-b b-light">
        <p>Document Centers <small>(Personnel)</small> <p class="pull-right"> <a href="" class="btn btn-warning btn-xs"> <i class="fa fa-reply"></i> Return</a></p></p>
    </header>
    <section class="scrollable wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Employee Document Upload
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <p class="text-muted">Surname: <strong>{{Auth::user()->surname}}</strong></p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-muted">Middle Name: <strong>{{Auth::user()->middle_name}}</strong></p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-muted">First Name: <strong>{{Auth::user()->first_name}}</strong></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-muted">Branch: <strong>HQ NOUN</strong></p>
                                </div>

                                <div class="col-md-3">
                                    <p class="text-muted">Rank: <strong>Vice Chancellor</strong></p>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                  
                                  <div class="form-group col-md-3">
                                      <label for="">Document Title</label>
                                      <input type="text" name="title[]" class="form-control" placeholder="B. Sc Certificate ">
                                  </div>
                                  <div class="form-group col-md-3">
                                      <label for="">Issuing Authority</label>
                                      <input type="text" name="issuingauth" class="form-control" placeholder="Federal Univerity of Technology, Minna">
                                  </div>
                                  <div class="form-group col-md-2">
                                      <label for="">Document No.</label>
                                      <input type="text" name="docuNo" class="form-control" placeholder="0001221/06">
                                  </div>

                                  <div class="form-group col-md-2">
                                      <label for="">Document Type </label>
                                      <select name="docType" id="select2-option" style="width: 100%;" required="">
                                          <option value="">Select Type</option>
                                          <option value="1">Letters</option>
                                          <option value="2">Queries</option>
                                          <option value="3">Certificates</option>
                                      </select>
                                  </div>

                                  <div class="form-group col-md-2">
                                      <label for="">Expiration <small><i> (if any)</i></small></label>
                                      <input name="expiration" class="input-sm input-s datepicker-input form-control" size="16" type="text" value="12-02-1995" data-date-format="dd-mm-yyyy" style="width:100%;"> 
                                  </div> 

                                  <div class="form-group col-md-12">
                                      <label for="">Upload File </label>
                                      <input type="file" name="document[]" class="form-control">
                                  </div>  

                                  <div class="form-group pull-right">
                                      <button class="btn btn-xs btn-primary"> <i class="fa fa-plus"></i> </button>
                                  </div>

                                  <hr>
                                  <div class="form-group col-md-12">
                                      <button type="submit" class="btn btn-xs btn-primary"> Upload </button>
                                  </div>

                                </div>
                            </form>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </section>
</section>
@endsection