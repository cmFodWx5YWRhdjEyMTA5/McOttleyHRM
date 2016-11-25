@extends('layouts.default')
@section('content')
        <section id="content">
          <section class="hbox stretch">
          <aside class="aside-md bg-white b-r" id="subNav">
              <div class="wrapper b-b header">Qualification Manager</div>
              <ul class="nav">
                <li class="b-b b-light"><a href="/manage-skills"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Skills</a></li>
                <li class="b-b b-light"><a href="/manage-education"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Education</a></li>
                <li class="b-b b-light"><a href="/manage-licenses"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Licenses</a></li>
                <li class="b-b b-light"><a href="/manage-languages"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Languages</a></li>
                <li class="b-b b-light"><a href="/manage-memberships"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Memberships</a></li>
              </ul>
            </aside>
            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                     @include('includes.alert')
                    <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print List</a>
                     <span class="badge badge-info">Record(s) Found :  {{ $items->total() }} {{ str_plural('License', $items->total()) }}</span>
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
                            <th>License</th>
                            
                            <th width="20"></th>
                            <th width="30"></th>
                          </tr>
                        </thead>
                         <tbody>
                        @foreach( $items as $key => $item )
                          <tr>
                            
                           <td>{{ ++$key }}</td>
                            <td>{{ $item->type }}</td>
     
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

