@extends('layouts.default')
@section('content')
        <section id="content">
          <section class="hbox stretch">
          <aside class="aside-md bg-white b-r" id="subNav">
              <div class="wrapper b-b header">Jobs Manager</div>
              <ul class="nav">
                <li class="b-b b-light"><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Job Titles</a></li>
                <li class="b-b b-light"><a href="/job-title"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Job Titles</a></li>
                <li class="b-b b-light"><a href="/salary-component"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Salary Components</a></li>
                <li class="b-b b-light"><a href="/employment-status"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Employment Status</a></li>
                <li class="b-b b-light"><a href="/job-category"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Job Categories</a></li>
                <li class="b-b b-light"><a href="/work-shift"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Work Shifts</a></li>
                <li class="b-b b-light"><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Departments</a></li>
                <li class="b-b b-light"><a href="/pay-grade"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Pay Grades</a></li>
              </ul>
            </aside>
            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                     @include('includes.alert')
                    <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print List</a>
                     <span class="badge badge-info">Record(s) Found :  {{ $items->total() }} {{ str_plural('Status', $items->total()) }}</span>
                    </div>

                  <form action="/patient.find" method="GET">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search for a patient">
                        <span class="input-group-btn">
                          <button class="btn btn-sm btn-default" type="submit">Go!</button>
                        </span>
                      </div>
                    </div>
                     </form>
                    </div>
                  </div>
                </header>
                <section class="scrollable wrapper w-f">
                  <section class="panel panel-default">
                    <div class="table-responsive">
                      <table class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                           <th>#</th>
                            <th>Pay Grade  </th>
                            <th>Currency</th>
                            <th width="20"></th>
                            <th width="30"></th>
                          </tr>
                        </thead>
                         <tbody>
                        @foreach( $items as $key => $item )
                          <tr>
                            
                           <td>{{ ++$key }}</td>
                            <td>{{ $item->grade }}</td>
                            <td>{{ $item->currency }}</td>
                             <td><a href="#modal_check_in" class="bootstrap-modal-form-open" onclick="getDetails('{{ $item->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-pencil"></i></a>
                             </td>
                             <td><a href="#modal_check_in" class="bootstrap-modal-form-open" onclick="getDetails('{{ $item->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a>
                             </td>
                            
                          </tr>
                         @endforeach 
                        </tbody>
 
                      </table>
                    </div>
                  </section>
                </section>
                <footer class="footer bg-white b-t">
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t">
                      </p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right text-center-xs">                
                     
                        {!!$items->render()!!}
                        
                    </div>
                  </div>
                </footer>
              </section>
            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

