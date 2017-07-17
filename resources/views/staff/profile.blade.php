@extends('layouts.default')
@section('content')

            <header class="header bg-white b-b b-light">
            
              <p><span class="label label-info">{{ $employee->fullname }}'s Profile</span></p> 
            </header>
            <section class="scrollable">
              <section class="hbox stretch">
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">

                  <section class="scrollable">
                      <div class="wrapper">
                        <div class="clearfix m-b">
                          <a href="/images/{{ $employee->image }}" class="pull-left thumb m-r">
                            <img src="/images/{{ $employee->image }}" class="img-circle">
                          </a>
                           <input type="hidden" id="get_staff_id" name="get_staff_id" value="{{ $employee->staff_id }}">
                          <div class="clear">
                            <div class="h3 m-t-xs m-b-xs">{{ $employee->fullname }}</div>
                            <small class="text-muted"><i class="fa fa-map-marker"></i> {{ $employee->location }} </small>
                          </div>                
                        </div>
                        <div class="panel wrapper panel-success">
                          <div class="row">
                            <div class="col-xs-4">
                              <a href="#">
                              <span class="m-b-xs h4 block">{{ $employee->gender }} </span>
                                <small class="text-muted">Gender</small>
                              </a>
                            </div>
                            <div class="col-xs-4">
                              <a href="#">
                               <span class="m-b-xs h4 block">@if($employee->date_of_birth==null)  @else {{ $employee->date_of_birth->age }} @endif</span>
                                <small class="text-muted">Age</small>
                              </a>
                            </div>
                            <div class="col-xs-4">
                              <a href="#">
                                 <span class="m-b-xs h4 block">{{ $employee->department }}</span>
                                <small class="text-muted">Dept.</small>
                                 <input type="hidden" id="subsidiary" name="subsidiary" value="{{ $employee->department }}">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="btn-group btn-group-justified m-b">
                          <a class="btn btn-primary btn-rounded" data-toggle="button">
                            <span class="text">
                              <i class="fa fa-pencil"></i> Update Profile
                            </span>
                            </a>
                        </div>
                        <div>
                          <small class="text-uc text-xs text-muted">about me</small>
                          <p>{{ $employee->job_title }}</p>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">info</small>
                          <div class="line"></div>
                          <p>Type : {{ $employee->staff_type }}</p>
                          <div class="line"></div>
                          <p>Marital Status : {{ $employee->marital_status }}</p>
                          <div class="line"></div>
                          <p>Subsidiary : {{ $employee->subsidiary }}</p>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">Contacts</small>
                          <p class="m-t-sm"><i class="fa fa-phone"></i> : <a href="#">0{{ $employee->mobile_number }}</a></p>
                          <p class="m-t-sm"><i class="fa fa-envelope"></i> : <a href="#">{{ $employee->email }}</a></p>
                          <p class="m-t-sm"><i class="fa fa-home"></i> : <a href="#">{{ $employee->postal_address }}</a></p>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">Team - {{ $employee->department }}</small>
                          <p class="m-t-sm">
                          @foreach($teams as $team)
                             <span class="pull-left thumb-sm"><img src="/images/{{ $team->image }}" class="img-circle"  data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $team->fullname }}"></span> 
                          @endforeach
                          </p>
                        </div>
                      </div>
                    </section>
                   




                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                     <header class="panel-heading bg-light">
                                  <ul class="nav nav-tabs pull-left">
                                     <li class="active"><a href="#jobsinformation" data-toggle="tab"><i class="fa fa-briefcase text-default"></i> Job Records </a></li>
                                       <li><a href="#eductioninformation" data-toggle="tab"><i class="fa fa-trophy text-default"></i> Qualifications </a></li>
                                        <li><a href="#membershipsdetails" data-toggle="tab"><i class="fa fa-certificate text-default"></i> Leaves </a></li>
                                      <li><a href="#accountinformation" data-toggle="tab"><i class="fa fa-money text-default"></i> Salary </a></li>
                                       <li><a href="#emergencycontacts" data-toggle="tab"><i class="fa fa-user text-default"></i> Emergency Contact </a></li>
                                       <li><a href="#dependents" data-toggle="tab"><i class="fa fa-users text-default"></i> Dependents </a></li>
                                        
                      </ul>
                       <span class="hidden-sm">.</span>
                    </header>

                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="jobsinformation">
                             <section class="panel panel-warning">
                                  <header class="panel-heading font-bold">Job Records</header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                       <table id="JobTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            
                            <th>Event</th>
                            <th>Effective From</th>
                            <th>Effective To</th>
                            <th>Job Title</th>
                            <th>Employment Status</th>
                            <th>Department</th>
                            <th>Location</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>           
                  </div>
                </section>
                        </div>
                        <div class="tab-pane" id="accountinformation">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                        <section class="panel panel-warning">
                                <header class="panel-heading font-bold">Salary History</header>
                                <div class="panel-body">
                                      <div class="table-responsive">

                      <table id="SalaryTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                             <th>Event</th>
                            <th>Effective From</th>
                            <th>Effective To</th>
                            <th>Pay Grade</th>
                            <th>Currency</th>
                            <th>Annual Basic</th>
                            <th>Earnings</th>
                            <th>Deductions</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>           
                </div>
                </section>
                          </ul>
                        </div>
                        <div class="tab-pane" id="eductioninformation">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                        <section class="panel panel-info">
                                <header class="panel-heading font-bold">Work Experience
                                 <a href="#new-qualification" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">

                       <table id="ExperienceTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            
                             <th>Company</th>
                            <th>Job Title</th>
                            <th>From</th>
                            <th>To</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>           
                </div>
                </section>

                 <section class="panel panel-danger">
                                <header class="panel-heading font-bold">Education
                                 <a href="#new-education" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                   <table id="EducationTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            
                             <th>Level</th>
                            <th>School</th>
                            <th>Major/Specialization</th>
                            <th>From</th>
                            <th>To</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>           
                </div>
                </section>




                <section class="panel panel-warning">
                  <header class="panel-heading font-bold">Skills
                  {{-- <ul class="nav nav-pills pull-right"><li><a href="#">Add</a></li></ul> --}}
                  <a href="#new-skill" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                  </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                   <table id="SkillTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                             
                             <th>Skill</th>
                            <th>Years of Experience</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>           
                </div>
                </section>


                <section class="panel panel-success">
                  <header class="panel-heading font-bold">Languages
                  {{-- <ul class="nav nav-pills pull-right"><li><a href="#">Add</a></li></ul> --}}
                  <a href="#new-language" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                  </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table id="LanguageTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                              <th>Language</th>
                             <th>Skill</th>
                            <th>Fluency Level</th>
                            <th>Comment</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>           
                </div>
                </section>

                 <section class="panel panel-default">
                  <header class="panel-heading font-bold">License
                  {{-- <ul class="nav nav-pills pull-right"><li><a href="#">Add</a></li></ul> --}}
                  <a href="#new-license" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                  </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table id="LicenseTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                              <th>License</th>
                             <th>License Number</th>
                            <th>Issued Date</th>
                            <th>Expiry Date</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>           
                </div>
                </section>
                          </ul>
                        </div>
                        <div class="tab-pane" id="membershipsdetails">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                        <section class="panel panel-warning">
                                <header class="panel-heading font-bold">Leave</header>
                                <div class="panel-body">
                                      <div class="table-responsive">

                      <table id="leaveTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                             <th>Leave Type</th>
                            <th>No of Days</th>
                            <th>Effective From</th>
                            <th>Effective From</th>
                            <th>Status</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>           
                </div>
                </section>
                          </ul>
                          </div>

                  {{-- Dependents--}}
                 <div class="tab-pane " id="dependents">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Assigned Dependents
                                 <a href="#new-dependant" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                     

                        <table id="DependentTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                             <th>Name</th>
                            <th>Relationship</th>
                            <th>Date of Birth</th>
                            <th>Nationality</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>

                    </div>           
                </div>
                </section>
                 </div>

                 {{-- Start emergency contact--}}
                           <div class="tab-pane" id="emergencycontacts">
                            <section class="panel panel-default">
                                <header class="panel-heading font-bold">Emergency Contacts
                                 <a href="#new-emergency-contact" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
             
                        <table id="EmergencyTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                              <th>Name</th>
                            <th>Relationship</th>
                            <th>Home Telephone</th>
                            <th>Mobile</th>
                            <th>Work Telephone</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>           
                </div>
                </section>
                </div>
                 {{-- End dependents--}}

                  
                  
                        </div>
                      </section>

                    </section>

                </aside>
                <aside class="col-lg-4 b-l">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <section class="panel panel-default">
                          <h4 class="font-thin padder">Upcoming Department Leaves & Review   <a href="#new-leave-request" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">Apply Leave</span></a></h4>
                         <div class="calendar" id="calendar">

                    </div>
                      </section>
                       <section class="panel b-light">
                    <header class="panel-heading bg-dark dker no-border"><strong>{{ date("F") }} Birthdays</strong></header>
                    <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                     <div class="list-group">
                     @foreach( $birthdays as $birthday )
                      <a href="#" class="list-group-item text-ellipsis">
                        <span class="badge bg-default">{{ $birthday->date_of_birth->format('jS F') }}</span> 
                        <span class="pull-left thumb-sm">
                        <img src="/images/{{ $birthday->image }}" class="img-circle"> {{ $birthday->fullname }}</span> 
                        
                      </a>
                      @endforeach
                    </div>
                  </section> 
                        


                    <section class="panel clearfix bg-default lter">
                        <h4 class="font-thin padder">Performance Review  <a href="/employee-appraisal/{{ $employee->obsid }}"  ><span class="badge bg-info pull-right"></span></a></h4>
                          <div class="panel-body">
                          @foreach($reviewcycles as $cycle)
                           <li class="list-group-item">
                        <div class="media">
                          <span class="pull-left thumb-sm"><img src="/images/{{ $employee->image }}" alt="John said" class="img-circle"></span>
                          @if($cycle->staff_id == $cycle->staff_id)
                          <div class="pull-right text-muted m-t-sm">
                            <a href="/employee-appraisal/{{ $employee->obsid }}/{{ $cycle->review_token }}"><span class="badge bg-success pull-right">Add Review</span></a>
                          </div>
                          @else
                          <div class="pull-right text-muted m-t-sm">
                            @if(Carbon\Carbon::now() > $review->review_end)
                           @else
                            <a href="/view-appraisal/{{ $cycle->id}}"><span class="badge bg-success pull-right">Click to review</span></a>
                            @endif
                          </div>

                          @endif
                          <div class="media-body">
                            <div><a href="#">{{ $cycle->title }}</a></div>
                            <p>
                            <small class="text-muted">Review Status : {{ $cycle->status }}</small>
                            </p>
                            <p>
                            <small class="text-muted">Created : {{ Carbon\Carbon::parse($cycle->review_start)->diffForHumans() }}</small>
                            </p>
                            <p>
                             <small class="text-muted">Expire On : {{ $cycle->review_start->addDays(7) }}</small>
                             </p>
                          </div>
                        </div>
                      </li>
                      @endforeach
                      </div>
                    </section>

                    <section class="panel clearfix bg-default lter">
                        <h4 class="font-thin padder">Leave Request</h4>
                          <div class="panel-body">
                          @foreach($leaves as $leave)
                           <li class="list-group-item">
                        <div class="media">
                          <span class="pull-left thumb-sm"><img src="/images/{{ $employee->image }}" alt="John said" class="img-circle"></span>
                          <div class="pull-right text-muted m-t-sm">
                           @if($leave->employee != $employee->staff_id && $leave->hod_approval_status=='Pending')
                            <a href="#" onclick="hodapprove('{{ $leave->id }}','{{ $leave->name }}')"><span class="badge bg-success pull-right">Approve</span></a>
                            @else
                           
                            @endif
                            <a href="#view-leave-request" onclick="getDetails('{{ $leave->id }}')" class="bootstrap-modal-form-open" id="edit" name="edit" data-toggle="modal"><span class="badge bg-info pull-right">Info</span></a>
                          </div>
                          <div class="media-body">
                            <div><a href="#">{{ $leave->leave_type }} - {{ $leave->name }}</a></div>
                            <small class="text-muted">Leave Days : {{ $leave->number_of_days }} Day(s)</small>
                            <div><a href="/uploads/images/{{ $leave->document }}"><i class="fa fa-cloud-download"></i></a></div>
                          </div>
                        </div>
                      </li>
                      @endforeach
                      </div>
                    </section>


                    <section class="panel clearfix bg-default lter">
                        <h4 class="font-thin padder">Pay Slips</h4>
                          <div class="panel-body">
                           @foreach($payrolls as $payroll)
                           <li class="list-group-item">
                        <div class="media">
                          <span class="pull-left thumb-sm"><img src="/images/{{ $employee->image }}" alt="John said" class="img-circle"></span>
                          <div class="pull-right text-muted m-t-sm">
                           
                            <a href="/print-payroll/{{ $payroll->trasactionid  }}">{{ $payroll->payperiod  }}<span class="badge bg-warning pull-right">View</span></a>
                          </div>
                        </div>
                      </li>
                      @endforeach 
                      </div>
                    </section>


                      </div>
                    </section>
                    </section>
                    </aside>

                    </section>
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


        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <div class="modal fade" id="view-leave-request" style="height:900px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">View Leave</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form"  data-validate="parsley" method="post" action="/save-leave-request" class="panel-body wrapper-lg" enctype="multipart/form-data">
                           @include('leave/view')
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



<script type="text/javascript">
  $(document).ready(function() {

      loadJobDetail();
      loadSalaryDetail();
      loadExperienceDetail();
      loadEducationDetail();
      loadSkillDetail();
      loadLanguageDetail();
      loadLicenseDetail();
      loadDependentDetail();
      loadEmergencyDetail();
      loadLeave();

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
          //alert("cannot load json");
        }
      }
    });
  });
</script>

<script type="text/javascript">

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

// function getleavedays()
// {

//     $.get('/get-leave-days-left',
//         {

//           "staff_id": $('#staff_id').val(),
//           "leave_type": $('#leave_type').val()
        

//         },
//         function(data)
//         { 
          
//           $.each(data, function (key, value) {
        
//           //sweetAlert("Employee SSF : ", data["employeessf"], "info");
//            $('#leave_balance').val(data.daystaken);
       
//       });
                                        
//         },'json');
  
// }

function getDetails(id)
{ 

  $.get("/fetch-leave-details",
          {"id":id},
          function(json)
          {
            

                $('#view-leave-request select[name="staff_id"]').val(json.employee);
                 $('#view-leave-request select[name="leave_type"]').val(json.leave_type);
              
                $('#view-leave-request input[name="leave_from"]').val(json.leave_from);
                $('#view-leave-request input[name="leave_to"]').val(json.leave_to);
                $('#view-leave-request input[name="comment"]').val(json.comment);
                $('#view-leave-request select[name="reliever"]').val(json.reliever);
                $('#view-leave-request select[name="approval_1"]').val(json.approval_1);
                $('#view-leave-request select[name="approval_2"]').val(json.approval_2);

                $('#view-leave-request select[name="staff_id"]').select2();
                $('#view-leave-request select[name="reliever"]').select2();
                $('#view-leave-request select[name="approval_1"]').select2();
                $('#view-leave-request select[name="approval_2"]').select2();
                
                 
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function hodapprove(id,name)
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
          $.get('/approve-leave-hod',
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

  function loadJobDetail()
   {
         //alert($('#get_staff_id').val());
        
        $.get('/load-job-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#JobTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#JobTable tbody').append('<tr><td>1</td><td>'+ value['permanency_date'] +'</td><td>Present</td><td>'+ value['job_title'] +'</td><td>'+ value['employment_status'] +'</td><td>'+ value['department'] +'</td><td>'+ value['subsidiary'] +'</td><td><a a href="#"><i onclick="deleteJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

      function loadExperienceDetail()
   {
         
        
        $.get('/load-experience-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#ExperienceTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#ExperienceTable tbody').append('<tr><td>'+ value['company'] +'</td><td>'+ value['job_title'] +'</td><td>'+ value['date_from'] +'</td><td>'+ value['date_to'] +'</td><td><a a href="#"><i onclick="deleteExperience(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


    function loadReporttoDetail()
   {
         
        
        $.get('/load-reportto-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#ReporttoTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#ReporttoTable tbody').append('<tr><td>'+ value['name'] +'</td><td>'+ value['type'] +'</td><td>'+ value['reporting_mode'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }



    function loadLicenseDetail()
   {
         
        
        $.get('/load-license-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#LicenseTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#LicenseTable tbody').append('<tr><td>'+ value['license_type'] +'</td><td>'+ value['license_number'] +'</td><td>'+ value['issued_date'] +'</td><td>'+ value['expiry_date'] +'</td><td><a a href="#"><i onclick="deleteLicense(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }



    function loadSalaryDetail()
   {
         
        
        $.get('/load-salary-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 
            // <td>'+ value['basic_annual'] +'</td><td>'+ (value['car_allowance']+ value['living_allowance'] )+'</td><td>'+ (((value['pension_fund_percent']/100) * value['basic_annual'])+ ((value['epf_deducation_percent']/100) * value['basic_annual']) )+'</td>

            $('#SalaryTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#SalaryTable tbody').append('<tr><td>'+ value['event'] +'</td><td>'+ value['effective_from'] +'</td><td>Present</td><td>'+ value['pay_grade'] +'</td><td>'+ value['currency'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


    function loadEducationDetail()
   {
         
        
        $.get('/load-education-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#EducationTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#EducationTable tbody').append('<tr><td>'+ value['level'] +'</td><td>'+ value['school'] +'</td><td>'+ value['major_specialization'] +'</td><td>'+ value['school_start_date'] +'</td><td>'+ value['school_end_date'] +'</td><td><a a href="#"><i onclick="deleteEduction(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

     function loadSkillDetail()
   {
         
        
        $.get('/load-skill-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#SkillTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#SkillTable tbody').append('<tr><td>'+ value['special_skill'] +'</td><td>'+ value['year_of_experience'] +'</td><td><a a href="#"><i onclick="deleteSkill(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    function loadLanguageDetail()
   {
         
        
        $.get('/load-language-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#LanguageTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#LanguageTable tbody').append('<tr><td>'+ value['language'] +'</td><td>'+ value['skill'] +'</td><td>'+ value['fluency'] +'</td><td>'+ value['comment'] +'</td><td><a a href="#"><i onclick="deleteLanguage(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    function loadEmergencyDetail()
   {
         
        
        $.get('/load-emergency-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#EmergencyTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#EmergencyTable tbody').append('<tr><td>'+ value['kin_name'] +'</td><td>'+ value['kin_relationship'] +'</td><td>'+ value['kin_mobile'] +'</td><td>'+ value['kin_home_phone'] +'</td><td>'+ value['kin_office_phone'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

     function loadLeave()
   {
         
        
        $.get('/load-leave',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#leaveTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#leaveTable tbody').append('<tr><td>'+ value['leave_type'] +'</td><td>'+ value['number_of_days'] +'</td><td>'+ value['leave_from'] +'</td><td>'+ value['leave_to'] +'</td><td>'+ value['status'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


    function loadDependentDetail()
   {
         
        
        $.get('/load-dependent-details',
          {
            "staff_id": $('#get_staff_id').val()
          },
          function(data)
          { 

            $('#DependentTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#DependentTable tbody').append('<tr><td>'+ value['name'] +'</td><td>'+ value['relationship'] +'</td><td>'+ value['dob'] +'</td><td>'+ value['nationality'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
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

</script>



<script type="text/javascript">
$(function () {
  $('#leave_from').daterangepicker({
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
     $('#reliever').select2();
      $('#approval_1').select2();
      $('#approval_2').select2();

  });
</script>












