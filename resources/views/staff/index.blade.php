@extends('layouts.default')
@section('content')

        <section id="content">
          <section class="hbox stretch">
            <aside class="aside-md bg-white b-r" id="subNav">
              <div class="wrapper b-b header">Customer Manager</div>
              <ul class="nav">
                <li class="b-b b-light"><a href="/active-patients"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Active Staff</a></li>
                <li class="b-b b-light"><a href="/inactive-patients"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Deactivated Staff</a></li>
                 <li class="b-b b-light"><a href="/inactive-patients"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Permanent</a></li>
                 <li class="b-b b-light"><a href="/inactive-patients"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Contracts</a></li>
              </ul>
            </aside>
            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                     
                      <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
                      <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-upload"></i> Upload</a>
                      <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-file"></i> File</a>
                      <a href="#new-employee"  data-toggle="modal" class="btn btn-sm btn-dark bootstrap-modal-form-open"><i class="fa fa-group"></i> Create New Staff</a>
                    <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print List</a>
                     <span class="badge badge-info">Record(s) Found : {{ $employees->total() }} {{ str_plural('Employee', $employees->total()) }}</span>
                    </div>

                  <form action="/find-patient" method="GET">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search for a staff">
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
                           @permission('edit-patient')
                            <th width="30"></th>
                            <th width="20"></th>
                            @endpermission
                             <th>ID #</th>
                            <th>Name</th>
                            <th>Job Title</th>
                            <th>Employment Status</th>
                            <th>Subsidiary</th>
                            <th>Department</th>
                            <th>Location</th>
                            <th>Supervised By</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach( $employees as $employee )
                          <tr>
                            @permission('edit-patient')
                            <td>
                            @if(!$employee->id == null)
                            <a href="/new-employee/{{ $employee->staff_id}}" class="bootstrap-modal-form-open" onclick="setAccountNo('{{ $employee->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-pencil"></i></a>
                            @else
                            
                            @endif
                             </td>
                            {{-- <td><a  href="#modal_docs" data-toggle="modal" class="btn btn-s-sx btn-default btn-rounded" onclick="showidonModal('{{$customerlist->patient_id}}')"><i class="fa fa-cloud-upload"></i> Attach Files </a></td> --}}
                             <td>
                             @if(!$employee->id == null)
                              <a href="#" class="" onclick="deactivate('{{ $employee->id }}','{{ $employee->fullname }}')" data-toggle="class"><i class="fa fa-thumbs-down"></i> </a>
                              @else
                             <a href="#" class="" onclick="activate('{{ $employee->id }}','{{ $employee->fullname }}')" data-toggle="class"><i class="fa fa-thumbs-up"></i></a>
                             @endif
                            </td>
                          
                            @endpermission
                            <td>{{ $employee->staff_id }}</td>
                            <td><a href="/employee-profile/{{ $employee->staff_id }}" class="text-default">{{ $employee->fullname }}</a></td>
                            <td>{{ $employee->date_of_birth }}</td>
                            <td>{{ $employee->postal_address }}</td>
                            <td>{{ $employee->mobile_number }}</td>
                            <td>{{ $employee->created_on }}</td>
                            <td>{{ $employee->location }}</td>
                            <td>{{ $employee->account_manager }}</td>
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
                     
                        {!!$employees->render()!!}
                        
                    </div>
                  </div>
                </footer>
              </section>

            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

  <div class="modal fade" id="new-employee" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">New Staff</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-employee" class="panel-body wrapper-lg">
                           @include('staff/create')
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                      </form>
                        </div>
                  
                  
                        </div>
                        </section>
                        </section>
                      </div>
                    
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
                  


<script >
function deactivate(id,name)
  {

         
      swal({   
        title: "Are you sure?",   
        text: "Do you want to deactivate "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, deactivate it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/deactivate-account',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was successfully deactivated.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to deactivate.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to deactivate.", "error");   
        } });

  }

  function activate(id,name)
  {

        //alert(id,name);
      swal({   
        title: "Are you sure?",   
        text: "Do you want to activate "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, activate it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/activate-account',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was activated successully.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to activate.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to activate.", "error");   
        } });

  }


</script>

 











