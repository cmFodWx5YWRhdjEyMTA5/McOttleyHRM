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
                          <small class="text-uc text-xs text-muted">connection</small>
                          <p class="m-t-sm">
                            <a href="#" class="btn btn-rounded btn-twitter btn-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn btn-rounded btn-facebook btn-icon"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn btn-rounded btn-gplus btn-icon"><i class="fa fa-google-plus"></i></a>
                          </p>
                        </div>
                      </div>
                    </section>
                   
                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                                     <li class="active"><a href="#jobsinformation" data-toggle="tab"><i class="fa fa-briefcase text-default"></i> KRA vs GOALS </a></li>
                                       <li><a href="#eductioninformation" data-toggle="tab"><i class="fa fa-trophy text-default"></i> Skill Set </a></li>
                                        <li><a href="#membershipsdetails" data-toggle="tab"><i class="fa fa-certificate text-default"></i> Feedback </a></li>
                                      <li><a href="#accountinformation" data-toggle="tab"><i class="fa fa-money text-default"></i> Self Appraisal </a></li>
                                        
                      </ul>
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
                            
                            <th>KRA</th>
                            <th>Weightage</th>
                            <th>Manager's Rating</th>
                            <th>User Rating</th>
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
             

  @stop


  