@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li class="active"> Manage Employee </li>
              </ul>

             
             <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-users fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="/employees"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open">
                      <span class="h3 block m-t-xs"><strong>{{ $activestaff }}</strong></span>
                      <small class="text-muted text-uc">Active Staff</small>
                    </a>
                  </div>
                  @permission('approve-employee')
                    <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-heart fa-stack-1x text-white"></i>
                      </span>
                    </span>
                    <a class="clear" href="/pending-approval-staff">
                      <span class="h3 block m-t-xs"><strong id="bugs">{{ $pendingstaff }}</strong></span>
                      <small class="text-muted text-uc">Pending Approval</small>
                    </a>
                  </div>
                  @endpermission
                    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-dark"></i>
                      <i class="fa fa-trash-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="/inactive-staff">
                      <span class="h3 block m-t-xs"><strong>{{ $inactivestaff }}</strong></span>
                      <small class="text-muted text-uc">Inactive Staff</small>
                    </a>
                  </div>
                   <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-times-circle-o fa-stack-1x text-white"></i>
                      </span>
                    </span>
                    <a class="clear" href="/resigned-staff">
                      <span class="h3 block m-t-xs"><strong id="bugs">{{ $resignedretiredstaff }}</strong></span>
                      <small class="text-muted text-uc">Retired/Resigned Staff</small>
                    </a>
                  </div>

                 
                </div>
              </section>


              <div class="row">

                <div class="col-md-12">
 
                  <section class="panel panel-default">
                  <header class="panel-heading">
                    <form action="/find-staff" method="GET">
                      <div class="input-group text-ms">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search by employee, department, business, location">
                        <div class="input-group-btn">
                           <button class="btn btn-sm btn-success" type="submit">Search!</button>
                        </div>
                      </div>
                      </form>
                    </header>
                    <div class="table-responsive">

                      <table class="table table-striped m-b-none text-sm" width="100%">
                           <thead>
                          <tr>
                             <th>ID #</th>
                             
                            <th>Name</th>
                            <th>Job Title</th>
                            <th>Employment Status</th>
                            <th>Subsidiary</th>
                            <th>Department</th>
                            <th>Location</th>
                            <th>Created By</th>
                            <th width="30"></th>
                            <th width="20"></th>
                            <th width="20"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach( $employees as $employee )
                          <tr>

                            
                          

                            <td>{{ $employee->master_id }}</td>
                            {{-- <td>{{StaffController::getInitials($employee->fullname)}}></td> --}}
                            <td><a href="/employee-profile/{{ $employee->obsid }}" class="text-info">{{ ucwords(strtolower($employee->fullname)) }}</a></td>
                            <td>{{ ucwords(strtolower($employee->job_title)) }}</td>
                            <td>{{ ucwords(strtolower($employee->staff_type)) }}</td>
                            <td>{{ ucwords(strtolower($employee->subsidiary)) }}</td>
                            <td>{{ ucwords(strtolower($employee->department)) }}</td>
                            <td>{{ ucwords(strtolower($employee->location)) }}</td>
                            <td>{{ ucwords(strtolower($employee->created_by)) }}</td>
                            @permission('edit-employee')
                            <td>
                            @if(!$employee->id == null)
                            <a href="/new-employee/{{ $employee->staff_id}}" class="bootstrap-modal-form-open" onclick="setAccountNo('{{ $employee->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-pencil"></i></a>
                            @else
                            
                            @endif
                             </td>
                           <td>
                            <a  href="#" class="" onclick="deleteStaff('{{$employee->id}}','{{ $employee->fullname }}')"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                            </td> 
                             <td>
                             @if($employee->status == 'Active')
                              <a href="#" class="" onclick="deactivate('{{ $employee->id }}','{{ $employee->fullname }}')" data-toggle="class" ><i data-toggle="tooltip" data-placement="top" title="" data-original-title="Deactivate" class="fa fa-thumbs-down"></i> </a>
                              @elseif($employee->status == 'Deactive')
                              <a href="#" class="" onclick="activate('{{ $employee->id }}','{{ $employee->fullname }}')" data-toggle="class" ><i class="fa fa-thumbs-up"></i></a>
                              @else
                             <a href="#" class="" onclick="activate('{{ $employee->id }}','{{ $employee->fullname }}')" data-toggle="class" ><i class="fa fa-thumbs-up"></i></a>
                             @endif
                            </td>
                            @endpermission
                          </tr>
                         @endforeach
                        </tbody>
                      </table>
                    </div>
                  </section>
         
                </div>
              </div>

            </section>
             <footer class="footer bg-white b-t">
                  
                  <a href="#new-employee" class="bootstrap-modal-form-open float" data-toggle="modal">
<i class="fa fa-plus my-float"></i><i class="fa fa-user my-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add New Employee"></i>
</a>
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t pull-center">
                      <span class="badge badge-info">Record(s) Found : {{ $employees->total() }} {{ str_plural('Employee', $employees->total()) }}</span>
                      </p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right text-center-xs">                
                     
                         {!!$employees->render()!!}
                        
                    </div>
                  </div>


                </footer>
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
                           <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/create-employee" class="panel-body wrapper-lg" enctype="multipart/form-data">
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
          $.get('/deactivate-staff',
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
          $.get('/activate-staff',
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

  function deleteStaff(id,name)
  {

         
      swal({   
        title: "Are you sure?",   
        text: "Do you want to delete "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-staff',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was successfully deleted.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to delete.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to delete.", "error");   
        } });

  }


</script>

 











