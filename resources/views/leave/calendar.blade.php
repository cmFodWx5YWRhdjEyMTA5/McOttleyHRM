@extends('layouts.default')
@section('content')
<section id="content">
          <section class="hbox stretch">          
            <!-- .aside -->
            <aside>
              <section class="vbox">
                <section class="scrollable wrapper">
                  <section class="panel panel-default">
                    <header class="panel-heading bg-light clearfix">
                      <div class="btn-group pull-right" data-toggle="buttons">
                       <label class="btn btn-sm btn-bg btn-default active" id="yearview">
                          <input type="radio" name="options">Year
                        </label>
                        <label class="btn btn-sm btn-bg btn-default active" id="monthview">
                          <input type="radio" name="options">Month
                        </label>
                        <label class="btn btn-sm btn-bg btn-default" id="weekview">
                          <input type="radio" name="options">Week
                        </label>
                        <label class="btn btn-sm btn-bg btn-default" id="dayview">
                          <input type="radio" name="options">Day
                        </label>
                      </div>
                      <span class="m-t-xs inline">
                        Fullcalendar
                      </span>
                    </header>
                    <div class="calendar" id="calendar">

                    </div>
                  </section>
                </section>
              </section>
            </aside>
            <!-- /.aside -->
            <!-- .aside -->
            <aside class="aside-lg b-l">
              <div class="padder">
                <h5>Dragable events</h5>
                <div class="line"></div>
                <div id="myEvents" class="pillbox clearfix m-b no-border no-padder">
                  <ul>
                    <li class="label bg-dark">Vacation</li>
                    <li class="label bg-info">Annual</li>
                    <input type="text" placeholder="add leave">
                  </ul>
                </div>
                <div class="line"></div>
                <div class="checkbox">
                  <label class="checkbox-custom"><input type='checkbox' id='drop-remove' /><i class="fa fa-square-o"></i> remove after drop</label>
                </div>
                <div>
                <a href="#modal_create_event"  data-toggle="modal" class="btn btn-sm btn-info bootstrap-modal-form-open"> <i class="fa fa-plus"></i>  Add New Leave Request</a>
                </div>
                <div class="line"></div>
                 <div>
                <a href="/manage-leave"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open"> <i class="fa fa-file"></i>  Show All Leave</a>
                </div>
                <div class="line"></div>
                <div>
                <a href="/manage-leave"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open"> <i class="fa fa-group"></i>  By Department</a>
                </div>
                <div class="line"></div>
                <div>
                <a href="/manage-leave"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open"> <i class="fa fa-home"></i>  By Subsidary </a>
                </div>
              </div>
            </aside>
            <!-- /.aside -->
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
    @stop

  <script src="{{ asset('/event_components/jquery.min.js')}}"></script>
  <script src="{{ asset('/event_components/bootstrap.min.js')}}"></script>
  <script src="{{ asset('/event_components/fullcalendar.min.js')}}"></script>
  <script src="{{ asset('/event_components/moment.min.js')}}"></script>


<script type="text/javascript">
  $(document).ready(function() {
    
    var base_url = '{{ url('/') }}';

    $('#calendar').fullCalendar({
      weekends: true,
      header: {
        left: 'prev,next today,prevYear,nextYear',
        center: 'title',
        right: 'listDay,month,agendaWeek,agendaDay'
      },
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: {
        url: '/event/api',
        error: function() {
          alert("cannot load json");
        }
      }
    });
  });
</script>



<div class="modal fade" id="modal_create_event" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">New Leave</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-event" class="panel-body wrapper-lg">
                          @include('leave/new')
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                      </form>
                        </div>
                  
                  
                        </div>
                      </div>
                    </section>
                  </section>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script> 
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
