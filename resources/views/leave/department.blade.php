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
                <a href="#new-leave-request"  data-toggle="modal" class="btn btn-sm btn-info bootstrap-modal-form-open"> <i class="fa fa-plus"></i>  Add New Leave Request</a>
                </div>
                 <div class="line"></div>
                <div>
                <a href="/proposed-calendar"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open"> <i class="fa fa-home"></i>  Proposed Leave Calendar</a>
                </div>
                <div class="line"></div>
                 <div>
                <a href="/manage-leave"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open"> <i class="fa fa-file"></i>   All Leave</a>
                </div>
                <div class="line"></div>
                 <p class="text-muted">By Department </p>
                <div>
                 @foreach($departments as $department)
                <a href="/department-calendar/{{ $department->name }}"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open"> <i class="fa fa-home"></i>  {{ $department->name }} </a>
                @endforeach
                </div>
                <div class="line"></div>
                <div>  
                <input type="hidden" id="subsidiary" name="subsidiary" value="{{ $result }}">
                </div>
                <p class="text-muted">By Subsidary </p>
                <div>
                @foreach($subsidiaries as $subsidiary)
                <a href="/subsidiary-calendar/{{ $subsidiary->name }}"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open"> <i class="fa fa-building-o"></i>  {{ $subsidiary->name }} </a>
                @endforeach
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
    
    //alert($('#subsidiary').val())
    var subsidiary = $('#subsidiary').val();
   
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
       
        url: '/department-leave-calendar/'+subsidiary+'' ,
        error: function() {
          alert("cannot load json");
        }
      }
    });
  });
</script>



<div class="modal fade" id="new-leave-request" style="height:900px">
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
                           <form  class="bootstrap-modal-form"  data-validate="parsley" method="post" action="/save-leave-request" class="panel-body wrapper-lg" enctype="multipart/form-data">
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
  
  function checkIsHoliday(date) {
  var _holidays = {
        'M': {//Month, Day
            '01/01': "New Year's Day",
            '07/04': "Independence Day",
            '11/11': "Veteran's Day",
            '11/28': "Thanksgiving Day",
            '11/29': "Day after Thanksgiving",
            '12/24': "Christmas Eve",
            '12/25': "Christmas Day",
            '12/31': "New Year's Eve"
        },
        'W': {//Month, Week of Month, Day of Week
            '1/3/1': "Martin Luther King Jr. Day",
            '2/3/1': "Washington's Birthday",
            '5/5/1': "Memorial Day",
            '9/1/1': "Labor Day",
            '10/2/1': "Columbus Day",
            '11/4/4': "Thanksgiving Day"
        }
    };
  var diff = 1+ (0 | (new Date(date).getDate() - 1) / 7);
  var memorial = (new Date(date).getDay() === 1 && (new Date(date).getDate() + 7) > 30) ? "5" : null;
    
  return (_holidays['M'][moment(date).format('MM/DD')] || _holidays['W'][moment(date).format('M/'+ (memorial || diff) +'/d')]);
    }

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
