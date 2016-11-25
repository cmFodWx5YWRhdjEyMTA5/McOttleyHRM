@extends('layouts.default')
@section('content')

        <section id="content">
          <section class="hbox stretch">
            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                     
                      <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
                      <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-upload"></i> Upload</a>
                      <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-file"></i> File</a>
                      <a href="#new-disciplinary-case"  data-toggle="modal" class="btn btn-sm btn-dark bootstrap-modal-form-open"><i class="fa fa-group"></i> Create New Case</a>
                    <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print List</a>
                     <span class="badge badge-info">Record(s) Found : {{ $cases->total() }} {{ str_plural('Leave', $cases->total()) }}</span>
                    </div>

                  <form action="/find-leave" method="GET">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search ...">
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
                            <th>Employee</th>
                            <th>Case Name</th>
                            <th>Description</th>
                            <th>Created By</th>
                            <th>Created On</th>
                            <th>Disciplanary Action</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                      {{--  @foreach( $schedules as $employee )
                          <tr>
                            <td><a href="/customer-profile/{{ $employee->id }}" class="text-default">{{ $employee->name }}</a></td>
                             <td>{{ $employee->leave_from }} to {{ $employee->leave_to }}</td>
                            <td>{{ $employee->leave_type }}</td>
                            <td>0</td>
                            <td>0</td>

                            <td>{{ $employee->status }}</td>
                            <td>
                            <div class="input-group-btn">
                            @if($employee->status==="Approved")
                            <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            @elseif($employee->status==="Rejected")
                            <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            @else
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            @endif
                            <ul class="dropdown-menu pull-right">
                            <li><a onclick="approve('{{ $employee->id }}','{{ $employee->id }}')">Approve</a></li>
                            <li><a href="/laboratory-drug-alcohol/{{ $employee->id }}">Cancel</a></li>
                            <li><a onclick="reject('{{ $employee->id }}','{{ $employee->id }}')">Reject</a></li>
                            </ul>
                            </div>
                            </td>
                            <td><a class="bootstrap-modal-form-open" onclick="setAccountNo('{{ $employee->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Details"></i></a></td>
                            <td><a class="bootstrap-modal-form-open" onclick="saveComment('{{ $employee->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-comment" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comment"></i></a></td>
                          </tr>
                         @endforeach  --}}
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
                     
                     {!!$cases->render()!!} 
                        
                    </div>
                  </div>
                </footer>
              </section>

            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

 <div class="modal fade" id="new-disciplinary-case" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Disciplinary Case</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/assign-leave" class="panel-body wrapper-lg">
                           @include('discipline/new')
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
              swal("Deleted!", name +" was successfully approved.", "success"); 
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
              swal("Deleted!", name +" was rejected successully.", "success"); 
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

</script>



 <script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script type="text/javascript">
$(function () {
  $('#leave_from').daterangepicker({
     "minDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
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
     "minDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
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
              swal("Paid!", name +" was successfully processed.", "success"); 
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







