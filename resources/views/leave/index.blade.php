@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li class="active"> Manage Leave </li>
              </ul>

             
             <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-folder-open-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="/manage-leave"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open">
                      <span class="h3 block m-t-xs"><strong>{{ $pending }}</strong></span>
                      <small class="text-muted text-uc">Pending</small>
                    </a>
                  </div>
                    <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-heart fa-stack-1x text-white"></i>
                      </span>
                    </span>
                    <a class="clear" href="/approved-leave">
                      <span class="h3 block m-t-xs"><strong id="bugs">{{ $approved }}</strong></span>
                      <small class="text-muted text-uc">Approved</small>
                    </a>
                  </div>
                    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-times-circle-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="/cancelled-leave" data-toggle="modal">
                      <span class="h3 block m-t-xs"><strong>{{ $cancelled }}</strong></span>
                      <small class="text-muted text-uc">Cancelled</small>
                    </a>
                  </div>
                   <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-default"></i>
                      <i class="fa fa-thumbs-o-down fa-stack-1x text-white"></i>
                      </span>
                    </span>
                    <a class="clear" href="/rejected-leave">
                      <span class="h3 block m-t-xs"><strong id="bugs">{{ $rejected }}</strong></span>
                      <small class="text-muted text-uc">Rejected</small>
                    </a>
                  </div>

                 
                </div>
              </section>


              <div class="row">

                <div class="col-md-12">
 
                  <section class="panel panel-default">
                  <header class="panel-heading">
                    <form action="/find-leave" method="GET">
                      <div class="input-group text-ms">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search ...">
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
                            <th></th>
                            <th>Employee</th>
                            <th>Leave Period</th>
                            <th>Leave Type</th>
                            <th>Leave Balance (Days)</th>
                            <th>Days Taken</th>
                            <th>HOD Approval Status</th>
                            <th>MD Approval Status</th>
                            <th>HR Approval Status</th>
                            <th></th> 
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                       @foreach( $schedules as $key => $employee )
                          <tr>
                           
                          
                           <td>{{ ++$key }}</td>
                            <td><a href="#" class="text-default">{{ $employee->name }}</a></td>
                             <td>{{ $employee->leave_from->format('d-M-Y') }} to {{ $employee->leave_to->format('d-M-Y') }}</td>
                            <td>{{ $employee->leave_type }}</td>
                            <td>{{ $employee->leave_balance }}</td>
                            <td>{{ $employee->number_of_days }}</td>
                             <td>{{ $employee->hod_approval_status }}</td>
                             <td>{{ $employee->md_approval_status }}</td>
                            <td>{{ $employee->status }}</td>
                            {{-- <td>
                            <div class="input-group-btn">
                            @if($employee->status==="Approved")
                            <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            @elseif($employee->status==="Rejected")
                            <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            @else
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            @endif
                            <ul class="dropdown-menu pull-right">
                            <li><a onclick="">Approve</a></li>
                            <li><a onclick="cancel('{{ $employee->id }}','{{ $employee->name }}')">Cancel</a></li>
                            <li><a onclick="">Reject</a></li>
                            </ul>
                            </div>
                            </td> --}}
                            @permission('approve-employee')
                            <td><a onclick="approve('{{ $employee->id }}','{{ $employee->name }}')"  id="edit" name="edit" alt="edit"><i class="fa fa-thumbs-up text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve"></i></a></td>

                            <td><a onclick="reject('{{ $employee->id }}','{{ $employee->name }}')"  id="edit" name="edit" alt="edit"><i class="fa fa-thumbs-down text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reject"></i></a></td>
                            @endpermission
                            @permission('approve-employee')
                            <td><a href="#edit-leave-request" onclick="getDetails('{{ $employee->id }}')" class="bootstrap-modal-form-open" id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Details"></i></a></td>
                            <td><a class="bootstrap-modal-form-open" onclick="saveComment('{{ $employee->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-comment" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comment"></i></a></td>
                             <td><a onclick="deleteLeave('{{ $employee->id }}')"  id="edit" name="edit" alt="edit"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a></td>
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
                  
                  <a href="#new-leave-request" class="bootstrap-modal-form-open float" data-toggle="modal">
<i class="fa fa-plus my-float">  </i><i class="fa fa-suitcase my-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add New Leave Application"></i>
</a>
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t pull-center">
                      <span class="badge badge-info">Record(s) Found : {{ $schedules->total() }} {{ str_plural('Leave Application', $schedules->total()) }}</span>
                      </p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right text-center-xs">                
                     
                         {!!$schedules->render()!!}
                        
                    </div>
                  </div>


                </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

















     <div class="modal fade" id="new-leave-request" size="height:900px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Assign Leave</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/save-leave-request" class="panel-body wrapper-lg" enctype="multipart/form-data">
                            @include('leave/new')
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


    <div class="modal fade" id="edit-leave-request" style="height:900px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Leave</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form"  data-validate="parsley" method="post" action="/save-leave-request" class="panel-body wrapper-lg" enctype="multipart/form-data">
                           @include('leave/edit')
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


<script type="text/javascript">
  $(document).ready(function() {

    $('#reliever').select2();
   



  });
</script>
<script >

function getDetails(id)
{ 

  $.get("/fetch-leave-details",
          {"id":id},
          function(json)
          {
            

                $('#edit-leave-request select[name="staff_id"]').val(json.employee);
                 $('#edit-leave-request select[name="leave_type"]').val(json.leave_type);
              
                $('#edit-leave-request input[name="leave_from"]').val(json.leave_from);
                $('#edit-leave-request input[name="leave_to"]').val(json.leave_to);
                $('#edit-leave-request input[name="comment"]').val(json.comment);



                $('#edit-leave-request select[name="reliever"]').val(json.reliever);
                $('#edit-leave-request select[name="approval_1"]').val(json.approval_1);
                $('#edit-leave-request select[name="approval_2"]').val(json.approval_2);

                 $('#edit-leave-request select[name="staff_id"]').select2();
                $('#edit-leave-request select[name="reliever"]').select2();
                $('#edit-leave-request select[name="approval_1"]').select2();
                $('#edit-leave-request select[name="approval_2"]').select2();
                
                 
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}
function approve(id,name)
  {

         
      swal({   
        title: "Are you sure?",   
        text: "Do you want to approve "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, approve it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/approve-leave',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Approved!", name +" was successfully approved.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to approve.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to approve.", "error");   
        } });

  }


function getleavedays()
{

    $.get('/get-leave-days-left',
        {

          "staff_id": $('#staff_id').val(),
          "leave_type": $('#leave_type').val()
        

        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
          //sweetAlert("Employee SSF : ", data["employeessf"], "info");
           $('#leave_balance').val(data.daystaken);
           $('#leave_entitlement').val(data.entitlement);
       
      });
                                        
        },'json');
  
}


  function cancel(id,name)
  {

         
      swal({   
        title: "Are you sure?",   
        text: "Do you want to cancel "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, cancel it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/cancel-leave',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Cancelled!", name +" was successfully approved.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to approve.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to approve.", "error");   
        } });

  }

  function reject(id,name)
  {

        //alert(id,name);
      swal({   
        title: "Are you sure?",   
        text: "Do you want to reject "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, reject it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/reject-leave',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Rejected!", name +" was rejected successully.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" operation error.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" operation error.", "error");   
        } });

  }

function saveLeaveRequest()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-leave-request',
        {
          "staff_id":           $('#staff_id').val(),
           "leave_type":        $('#leave_type').val(),
           "leave_from":        $('#leave_from').val(),
           "leave_to":          $('#leave_to').val(),
          "comment":            $('#comment').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
        
        swal("Leave request saved!");
        
        location.reload(true);

        }
        else
        {
          toastr.error("Leave request failed to save!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please select an employee!");
    }
}


function loadPendingLeave()
   {
         
        
        $.get('/load-pending-leave')
  }



 function deleteLeave(id)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this leave item from list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-leave',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Leave was removed from list.", "success"); 
               location.reload(true);
             }
            else
            { 
              swal("Cancelled","Failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled","Failed to be removed from list.", "error");   
        } });

   }

</script>



 <script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script type="text/javascript">
$(function () {
  $('#leave_from').daterangepicker({
     "daysOfWeek": ['Mo', 'Tu', 'We', 'Th', 'Fr'],
    "singleDatePicker":true,
    "autoApply": true,
    "showISOWeekNumbers": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});
</script>

<script type="text/javascript">
$(function () {
  $('#leave_to').daterangepicker({
     "daysOfWeek": ['Mo', 'Tu', 'We', 'Th', 'Fr'],
    "singleDatePicker":true,
    "autoApply": true,
    "showISOWeekNumbers": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});
</script>



<script type="text/javascript">
$(document).ready(function () {
    $('#staff_id').select2();
    $('#reliever').select2();
    $('#approval_1').select2();
       $('#approval_2').select2();

  });
</script>


<script type="text/javascript">
  
  function saveComment(id,name)
  {

  swal({
  title: "Comment on leave status!",
  text: "Enter leave comment:",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Enter comment"
},
function(inputValue){
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("You need to enter comment!");
    return false
  }
  
  else
  {
    $.get('/process-leave-comment',
          {
             "ID": id,
             "amountpaid": inputValue  
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Leave!", name +" was successfully processed.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Failed", name +" failed to process.", "error");
              
            }
           
        });
                                          
          },'json');    
  }
});

}


</script>









