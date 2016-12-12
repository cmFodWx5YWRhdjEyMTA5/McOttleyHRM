@extends('layouts.default')
@section('content')
<section class="vbox">
            <header class="header bg-white b-b b-light">
              <p>{{ $employee->fullname }}'s Profile</p>
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
                          <div id="staff_id" name="staff_id" value="{{ $employee->staff_id }}">
                            
                          </div>
                          <div class="clear">
                            <div class="h3 m-t-xs m-b-xs">{{ $employee->fullname }} </div>
                            <small class="text-muted"><i class="fa fa-map-marker"></i>Staff ID : {{ $employee->staff_id }} </small>
                          </div>                
                        </div>
                        <div id="staff_id" name="staff_id" value="{{ $employee->staff_id }}">
                          
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
                                <span class="m-b-xs h4 block">{{ $employee->date_of_birth->age }}</span>
                                <small class="text-muted">Age</small>
                              </a>
                            </div>
                            <div class="col-xs-4">
                              <a href="#">
                                <span class="m-b-xs h4 block">IT</span>
                                <small class="text-muted">Dept.</small>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="btn-group btn-group-justified m-b">
                          <a class="btn btn-primary btn-rounded" data-toggle="button">
                            <span class="text">
                              <i class="fa fa-eye"></i> Whatsapp
                            </span>
                            <span class="text-active">
                              <i class="fa fa-eye-slash"></i> Call
                            </span>
                          </a>
                          <a class="btn btn-dark btn-rounded" data-loading-text="Connecting">
                            <i class="fa fa-comment-o"></i> SMS
                          </a>
                        </div>
                        <div>
                          <small class="text-uc text-xs text-muted">Mobile</small>
                          <p>{{ $employee->mobile_number }}</p>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">Address</small>
                          <p>{{ $employee->postal_address }}</p>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">Email</small>
                          <p>{{ $employee->email }}</p>
                          <p class="m-t-sm">
                            <a href="#" class="btn btn-rounded btn-twitter btn-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn btn-rounded btn-facebook btn-icon"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn btn-rounded btn-gplus btn-icon"><i class="fa fa-google-plus"></i></a>
                          </p>
                          
                          </div>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                       

                        <li class="active"><a href="#staffinformation" data-toggle="tab"><i class="fa fa-user text-default"></i> Staff Information </a></li>
                                     <li><a href="#jobsinformation" data-toggle="tab"><i class="fa fa-briefcase text-default"></i> Job Records </a></li>
                                       <li><a href="#eductioninformation" data-toggle="tab"><i class="fa fa-trophy text-default"></i> Qualifications </a></li>
                                        <li><a href="#membershipsdetails" data-toggle="tab"><i class="fa fa-certificate text-default"></i> Memberships </a></li>
                                      <li><a href="#accountinformation" data-toggle="tab"><i class="fa fa-money text-default"></i> Salary </a></li>
                                       <li><a href="#emergencycontacts" data-toggle="tab"><i class="fa fa-user text-default"></i> Emergency Contact </a></li>
                                       <li><a href="#dependents" data-toggle="tab"><i class="fa fa-users text-default"></i> Dependents </a></li>
                                        <li><a href="#immigrationrecords" data-toggle="tab"><i class="fa fa-plane text-default"></i> Immigration </a></li>
                                         <li><a href="#employee_reportto" data-toggle="tab"><i class="fa fa-gavel text-default"></i> Report-to </a></li>
                                         <li><a href="#bankinformation" data-toggle="tab"><i class="fa fa-credit-card text-default"></i> Bank Details </a></li>
                                       <li><a href="#documentations" data-toggle="tab"><i class="fa fa-folder text-default"></i> Documents </a></li>
                                        <li><a href="#socialmedia" data-toggle="tab"><i class="fa  fa-facebook-square text-default"></i> Social Media Details </a></li>
                      </ul>
                    </header>

                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="consultation_tab">
                             <section class="panel panel-default">
                                <header class="panel-heading font-bold">Job History</header>
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
                            <th>Job Category</th>
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
                        <div class="tab-pane" id="diagnosis_tab">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                         {{--  @foreach($consultations as $consult)
                             @if($consult->diagnosis != null)
                            <li class="list-group-item">
                              <a href="#" class="thumb-sm pull-left m-r-sm">
                                <img src="/images/avatar_default.jpg" class="img-circle">
                              </a>
                              <a href="#" class="clear">
                                <small class="pull-right">{{ $consult->date }}</small>
                                <strong class="block">{{ $consult->diagnosis }}</strong>
                                <small>{{ $consult->doctorid }}</small>
                              </a>
                            </li>
                            @else
                            

                            @endif
                            @endforeach --}}
                          </ul>
                        </div>
                        <div class="tab-pane" id="medication_tab">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                         {{--  @foreach($medications as $drug)
                          @if($drug->DrugName != null)
                            <li class="list-group-item">
                              <a href="#" class="thumb-sm pull-left m-r-sm">
                                <img src="/images/avatar_default.jpg" class="img-circle">
                              </a>
                              <a href="#" class="clear">
                                <small class="pull-right">{{ $drug->StartDate }}</small>
                                <strong class="block">{{ $drug->DrugName }}</strong>
                                <small>{{ $drug->Createdby }}</small>
                              </a>
                            </li>
                            @else
                            

                            @endif
                            @endforeach --}}
                          </ul>
                        </div>
                        <div class="tab-pane" id="document_tab">
                          
                          </div>
                  
                        </div>
                      </section>

                    </section>

                </aside>
                <aside class="col-lg-4 b-l">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <section class="panel panel-default">
                          <h4 class="font-thin padder">Upcoming Department Leaves & Review</h4>
                         <div class="calendar" id="calendar">

                    </div>
              </section>
                        <section class="panel clearfix bg-info lter">
                          <div class="panel-body">
                           {{--  <a href="#" class="thumb pull-left m-r">
                              <img src="/images/{{ $patients[0]->image }}" class="img-circle">
                            </a>
                            <div class="clear">
                              <a href="/event-calendar" class="text-info">{{ $patients[0]->fullname }} <i class="fa fa-twitter"></i></a>
                              <small class="block text-muted">Appointments</small>
                              <a href="/event-calendar" class="btn btn-xs btn-success m-t-xs">Schedule Consultation</a>
                              <a href="/event-calendar" class="btn btn-xs btn-success m-t-xs">Schedule Resource</a>
                               @if(Auth::user()->usertype == 'Guest')
                              <a href="#modal_check_in" class="bootstrap-modal-form-open btn btn-xs btn-success m-t-xs" onclick="getGuestdetails('{{ Auth::user()->location }}')"  id="edit" name="edit" data-toggle="modal" alt="edit" >Check In</a>
                               @else
                              <a href="#modal_check_in" class="bootstrap-modal-form-open btn btn-xs btn-success m-t-xs" onclick="getDetails('{{ $patients[0]->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit" >Check In</a>
                              @endif
                            </div> --}}
                          </div>
                        </section>


                      </div>
                    </section>
                    </section>
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






