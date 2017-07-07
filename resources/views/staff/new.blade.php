
@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li class=""> Employee Management </li>
                 <li class="active"> {{ $employees->fullname }} </li>  
                 @if( $employees->status=='Active')
                 <span class="label label-success tex-right">{{ $employees->status }}</span>
                 @else
                <span class="label label-danger tex-right">{{ $employees->status }}</span>
                 @endif
              </ul>


              <div class="row">
                <div class="col-md-12">
                    <section class="scrollable wrapper w-f">
                    <form id="masterform" name="masterform" data-validate="parsley"  class="panel-body wrapper-lg">

                      <section class="panel panel-default">
                                <header class="panel-heading bg-light">
                                  <ul class="nav nav-tabs pull-left">
                                    
                                    
                                    <li class="active"><a href="#staffinformation" data-toggle="tab"><i class="fa fa-user text-default"></i> Staff Information </a></li>
                                     <li><a href="#jobsinformation" data-toggle="tab"><i class="fa fa-briefcase text-default"></i> Job Records </a></li>
                                       <li><a href="#eductioninformation" data-toggle="tab"><i class="fa fa-trophy text-default"></i> Qualifications </a></li>
                                        <li><a href="#membershipsdetails" data-toggle="tab"><i class="fa fa-certificate text-default"></i> Memberships </a></li>
                                      <li><a href="#accountinformation" data-toggle="tab"><i class="fa fa-money text-default"></i> Salary </a></li>
                                       <li><a href="#emergencycontacts" data-toggle="tab"><i class="fa fa-user text-default"></i> Emergency Contact </a></li>
                                        <li><a href="#getguarantor" data-toggle="tab"><i class="fa fa-male text-default"></i> Guarantor </a></li>
                                         <li><a href="#getbeneficairy" data-toggle="tab"><i class="fa fa-heart text-default"></i> Beneficiary / Kin Details </a></li>
                                       <li><a href="#dependents" data-toggle="tab"><i class="fa fa-users text-default"></i> Dependents </a></li>
                                        <li><a href="#immigrationrecords" data-toggle="tab"><i class="fa fa-flag-o text-default"></i> Immigration </a></li>
                                         <li><a href="#employee_reportto" data-toggle="tab"><i class="fa fa-gavel text-default" ></i> Line Management </a></li>
                                         <li><a href="#bankinformation" data-toggle="tab"><i class="fa fa-credit-card text-default"></i> Bank Details </a></li>
                                       <li><a href="#documentations" data-toggle="tab"><i class="fa fa-folder text-default"></i> Documents </a></li>
                                        <li><a href="#socialmedia" data-toggle="tab"><i class="fa  fa-facebook-square text-default"></i> Social Media Details </a></li>
                                        <li><a href="#training" data-toggle="tab"><i class="fa fa-laptop text-default"></i> Training </a></li>
                                        <li><a href="#asset" data-toggle="tab"><i class="fa fa-magnet text-default"></i> Assets </a></li>
                                        <li><a href="#policy" data-toggle="tab"><i class="fa fa-bars text-default"></i> Company Policy </a></li>
                                        <li><a href="#travel" data-toggle="tab"><i class="fa fa-plane text-default"></i> Travel Request </a></li>
                                  </ul>
                                  <span class="hidden-sm">.</span>
                                </header>

                                 <div class="panel-body">
                                      <div class="tab-content">  
                        <div class="tab-pane active" id="staffinformation">
                        <div class="clearfix m-b">

                          <a href="/images/{{ $employees->image }}" class="thumb-lg">
                            <img src="/images/{{ $employees->image }}" id="imagePreview"  class="img-circle">
                            <a href="#new-profile-picture"  data-toggle="modal" class="btn btn-sm btn-info bootstrap-modal-form-open"><i class="fa fa-upload"></i> Upload </a>
                          </a>
                                
                        </div>

                         <section class="panel panel-default">
                     <header class="panel-heading font-bold">                  
                      Staff Information
                    </header>
                      <div class="panel-body">
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Staff Number</label> 
                            <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : ''}}">
                            <input type="text" rows="3" class="form-control" id="master_id" readonly="true" name="master_id" value="{{ $employees->master_id }}">   
                            <input type="hidden" rows="3" class="form-control" id="staff_id" readonly="true" name="staff_id" value="{{ $employees->staff_id }}">   
                           @if ($errors->has('staff_id'))
                          <span class="help-block">{{ $errors->first('staff_id') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('staff_type') ? ' has-error' : ''}}">
                            <label>Staff Type</label>
                         <select id="staff_type" name="staff_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="{{ $employees->staff_type }}">{{ $employees->staff_type }}</option>
                            @foreach($employeestatuses as $employeestatus)
                        <option value="{{ $employeestatus->type }}">{{ $employeestatus->type }}</option>
                          @endforeach 
                        </select>        
                      
                           @if ($errors->has('staff_type'))
                          <span class="help-block">{{ $errors->first('staff_type') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>
                        </div>
                        </section>


                      

                      <section class="panel panel-default">
                     <header class="panel-heading font-bold">                  
                      Personal Details
                    </header>
                      <div class="panel-body">
                        <div class="form-group">
                         <div class="form-group{{ $errors->has('fullname') ? ' has-error' : ''}}">
                          <label>Name </label>
                          <input type="text" class="form-control" id="fullname" value="{{ $employees->fullname }}"  name="fullname">
                          @if ($errors->has('fullname'))
                          <span class="help-block">{{ $errors->first('fullname') }}</span>
                           @endif                        
                        </div>
                        </div>



                         <div class="form-group">
                       <div class="form-group @if($errors->has('date_of_birth')) has-error @endif">
                        <label for="date_of_birth">Date of birth <span class="badge bg-default">{{ $employees->date_of_birth->age or 0}} year(s)</span> </label>
                        <div class="input-group">
                        @if($employees->date_of_birth==null)
                        <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Select your time"  value="">
                        @else
                        <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Select your time"  value="{{ $employees->date_of_birth->format('d-m-Y i')  }}">
                        @endif
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('date_of_birth'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('date_of_birth') }}
                       </p>
                        @endif
                      </div>
                      </div>

                          <div class="form-group">
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : ''}}">
                          <label>Gender</label>
                           <select id="gender" name="gender" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control sm-3">
                           <option value="{{ $employees->gender }}">{{ $employees->gender }}</option>
                         @foreach($genders as $gender)
                        <option value="{{ $gender->type }}">{{ $gender->type }}</option>
                          @endforeach 
                        </select>                         
                          @if ($errors->has('gender'))
                          <span class="help-block">{{ $errors->first('gender') }}</span>
                           @endif           
                        </div>
                        </div>
                  
                           <div class="form-group">
                         <div class="form-group{{ $errors->has('place_of_birth') ? ' has-error' : ''}}">
                          <label>Place of Birth </label>
                          <input type="text" class="form-control" id="place_of_birth" value="{{ $employees->place_of_birth }}"  name="place_of_birth">
                          @if ($errors->has('place_of_birth'))
                          <span class="help-block">{{ $errors->first('place_of_birth') }}</span>
                           @endif                        
                        </div>
                        </div>

                        </div>
                        </section>

                         
                         <section class="panel panel-default">
                     <header class="panel-heading font-bold">                  
                      Contact Details
                    </header>
                      <div class="panel-body">
                        <div class="form-group">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                          <label>Office Email</label>
                          <input type="text" class="form-control" id="email" name="email" value="{{ $employees->email }}"> 
                          @if ($errors->has('email'))
                          <span class="help-block">{{ $errors->first('email') }}</span>
                           @endif                            
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="form-group{{ $errors->has('private_email') ? ' has-error' : ''}}">
                          <label>Private Email</label>
                          <input type="text" class="form-control" id="private_email" name="private_email" value="{{ $employees->private_email }}"> 
                          @if ($errors->has('private_email'))
                          <span class="help-block">{{ $errors->first('private_email') }}</span>
                           @endif                            
                        </div>
                        </div>


                        <div class="form-group">
                          <label>Mobile Number</label>
                          <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ $employees->mobile_number }}">   
                          @if ($errors->has('mobile_number'))
                          <span class="help-block">{{ $errors->first('mobile_number') }}</span>
                           @endif                           
                        </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Residential Address</label> 
                            <div class="form-group{{ $errors->has('residential_address') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="residential_address" name="residential_address" value="{{ Request::old('residential_address') ?: '' }}">{{ $employees->residential_address }}</textarea>   
                           @if ($errors->has('residential_address'))
                          <span class="help-block">{{ $errors->first('residential_address') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('postal_address') ? ' has-error' : ''}}">
                            <label>Postal Address</label>
                            <textarea type="text" rows="3" class="form-control" id="postal_address" name="postal_address" value="{{ Request::old('postal_address') ?: '' }}">{{ $employees->postal_address }}</textarea>     
                           @if ($errors->has('postal_address'))
                          <span class="help-block">{{ $errors->first('postal_address') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                        </div>
                        </section>



                           <section class="panel panel-default">
                     <header class="panel-heading font-bold">                  
                      Other Details
                    </header>
                      <div class="panel-body">
                      <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('ssn') ? ' has-error' : ''}}">
                            <label>Social Security No.</label>
                              <input type="text" class="form-control" id="ssn" value="{{ $employees->ssn }}"  name="ssn">
                           @if ($errors->has('ssn'))
                          <span class="help-block">{{ $errors->first('ssn') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('nationality') ? ' has-error' : ''}}"> 
                            <label>Nationality</label>
                            <select id="nationality" name="nationality" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                            @if($employees->nationality==null)
                            <option value="Ghanaian">Ghanaian</option>
                            @else
                             <option value="{{ $employees->nationality}}">{{ $employees->nationality}}</option>
                             @endif
                     @foreach($nationalities as $nationality)

                        <option value="{{ $nationality->nationality }}">{{ $nationality->nationality }}</option>
                          @endforeach 
                        </select>    
                          @if ($errors->has('nationality'))
                          <span class="help-block">{{ $errors->first('nationality') }}</span>
                           @endif      
                            </div>
                          </div>
                          <div class="col-sm-6">
                           <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : ''}}"> 
                            <label>Marital Status</label>
                             <select id="marital_status" name="marital_status" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                              <option value="{{ $employees->marital_status}}">{{ $employees->marital_status}}</option>
                          @foreach($maritalstatus as $maritalstatus)
                        <option value="{{ $maritalstatus->type }}">{{ $maritalstatus->type }}</option>
                          @endforeach 
                        </select>    
                            @if ($errors->has('marital_status'))
                          <span class="help-block">{{ $errors->first('marital_status') }}</span>
                           @endif             
                          </div>   
                        </div>
                        </div>

                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('id_type') ? ' has-error' : ''}}"> 
                            <label>ID Type</label>
                            <select id="id_type" name="id_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                            <option value="{{ $employees->id_type}}">{{ $employees->id_type }}</option>
                         @foreach($identifications as $identification)
                        <option value="{{ $identification->type }}">{{ $identification->type }}</option>
                          @endforeach
                        </select>    
                          @if ($errors->has('id_type'))
                          <span class="help-block">{{ $errors->first('id_type') }}</span>
                           @endif      
                            </div>
                          </div>
                          <div class="col-sm-6">
                           <div class="form-group{{ $errors->has('id_number') ? ' has-error' : ''}}"> 
                            <label>ID Number</label>
                            <input type="text" class="form-control" id="id_number" value="{{ $employees->id_number }}"  name="ssn">
                            @if ($errors->has('id_number'))
                          <span class="help-block">{{ $errors->first('id_number') }}</span>
                           @endif             
                          </div>   
                        </div>
                        </div>
                        </div>
                         <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveMainDetails()" class="btn btn-success btn-s-xs">Save</button>
                         <input type="hidden" name="_token" value="{{ Session::token() }}">
                      </footer>
                        </section>

                        </div> 
                        <div class="tab-pane" id="jobsinformation">
                         <section class="panel panel-default">
                                <header class="panel-heading font-bold">Job Details</header>
                                <div class="panel-body">
                        <div class="form-group pull-in clearfix">
                            <div class="col-sm-4">
                          <div class="form-group{{ $errors->has('job_title') ? ' has-error' : ''}}">
                            <label>Job Title</label>
                            <select id="job_title" name="job_title" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                          <option value="">-- Not set --</option>
                             @foreach($jobtitles as $jobtitle)
                        <option value="{{ $jobtitle->type }}">{{ $jobtitle->type }}</option>
                          @endforeach  
                        </select>         
                           @if ($errors->has('job_title'))
                          <span class="help-block">{{ $errors->first('job_title') }}</span>
                           @endif    
                          </div>   
                        </div>

                          <div class="col-sm-4">
                          <div class="form-group{{ $errors->has('job_category') ? ' has-error' : ''}}">
                            <label>Job Category</label>
                            <select id="job_category" name="job_category" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                          <option value="">-- Not set --</option>
                             @foreach($jobcategories as $jobcategory)
                        <option value="{{ $jobcategory->type }}">{{ $jobcategory->type }}</option>
                          @endforeach  
                        </select>         
                           @if ($errors->has('job_category'))
                          <span class="help-block">{{ $errors->first('job_category') }}</span>
                           @endif    
                          </div>   
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group{{ $errors->has('department') ? ' has-error' : ''}}">
                            <label>Department</label>
                            <select id="department" name="department" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                         <option value="">-- Not set --</option>
                             @foreach($departments as $department)
                        <option value="{{ $department->name }}">{{ $department->name }}</option>
                          @endforeach  
                         
                        </select>         
                           @if ($errors->has('department'))
                          <span class="help-block">{{ $errors->first('department') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>
                        

                         <div class="form-group pull-in clearfix">
                            

                          <div class="col-sm-4">
                          <div class="form-group{{ $errors->has('subsidiary') ? ' has-error' : ''}}">
                            <label>Business Entity</label>
                            <select id="subsidiary" name="subsidiary" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                        <option value="">-- Not set --</option>
                             @foreach($subsidiaries as $subsidiary)
                        <option value="{{ $subsidiary->name }}">{{ $subsidiary->name }}</option>
                          @endforeach  
                         
                        </select>         
                           @if ($errors->has('subsidiary'))
                          <span class="help-block">{{ $errors->first('subsidiary') }}</span>
                           @endif    
                          </div>   
                        </div>
                         <div class="col-sm-4">
                          <div class="form-group{{ $errors->has('employment_status') ? ' has-error' : ''}}">
                            <label>Employment Status</label>
                            <select id="employment_status" name="employment_status" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                         <option value="">-- Not set --</option>
                           @foreach($employeestatuses as $employeestatus)
                        <option value="{{ $employeestatus->type }}">{{ $employeestatus->type }}</option>
                          @endforeach
                         
                        </select>         
                           @if ($errors->has('employment_status'))
                          <span class="help-block">{{ $errors->first('employment_status') }}</span>
                           @endif    
                          </div>   
                        </div>

                          <div class="col-sm-4">
                          <div class="form-group{{ $errors->has('work_shift') ? ' has-error' : ''}}">
                            <label>Work Shift</label>
                            <select id="work_shift" name="work_shift" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                          @foreach($workshifts as $workshift)
                        <option value="{{ $workshift->type }}">{{ $workshift->type }}</option>\
                        @endforeach
                        </select>         
                           @if ($errors->has('work_shift'))
                          <span class="help-block">{{ $errors->first('work_shift') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>



                        <div class="form-group pull-in clearfix">
                            <div class="col-sm-4">
                       <div class="form-group @if($errors->has('date_join')) has-error @endif">
                        <label for="date_join" data-toggle="tooltip" data-placement="top" title="" data-original-title="Your employee's first work day with your company. If this is a new hire, you can select a date in the future and the employee will be paid starting that date. If this is an existing employee, select their original first day of work with the company.">Date Join</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="date_join" id="date_join" placeholder="Select your time" value="{{ old('date_join') }}" >
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('date_join'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('date_join') }}
                       </p>
                        @endif
                      </div>
                      </div>

                          

                        <div class="col-sm-4">
                       <div class="form-group @if($errors->has('probation_end_date')) has-error @endif">
                        <label for="probation_end_date">Probation End Date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="probation_end_date" id="probation_end_date" placeholder="Select your time" value="{{ old('probation_end_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('probation_end_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('probation_end_date') }}
                       </p>
                        @endif
                      </div>
                      </div>

                      <div class="col-sm-4">
                       <div class="form-group @if($errors->has('permanency_date')) has-error @endif">
                        <label for="permanency_date">Date of Permanency</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="permanency_date" id="permanency_date" placeholder="Select your time" value="{{ old('permanency_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('permanency_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('permanency_date') }}
                       </p>
                        @endif
                      </div>
                      </div>


                        </div>

                       
                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Comments</label> 
                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="comment" name="comment" value="{{ Request::old('comment') ?: '' }}"></textarea>   
                           @if ($errors->has('comment'))
                          <span class="help-block">{{ $errors->first('comment') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>
                        </div>

                         <footer class="panel-footer text-right bg-light lter">
                          <a href="#new-terminate"  data-toggle="modal" class="btn btn-sm btn-danger bootstrap-modal-form-open"><i class="fa fa-trash"></i> Terminate</a>
                        <button type="button" onclick="saveJobDetails()" class="btn btn-success btn-s-xs">Add</button>
                        
                      </footer>
                        </section>

                       {{--  
                        <section class="panel panel-default">
                                <header class="panel-heading font-bold">Contract Details</header>
                                <div class="panel-body">
                       <div class="form-group pull-in clearfix">
                            <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('account_type') ? ' has-error' : ''}}">
                            <label>Start Date</label>
                            <select id="account_type" name="account_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select an account --</option>
                         
                        </select>         
                           @if ($errors->has('account_type'))
                          <span class="help-block">{{ $errors->first('account_type') }}</span>
                           @endif    
                          </div>   
                        </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('account_type') ? ' has-error' : ''}}">
                            <label>End Date</label>
                            <select id="account_type" name="account_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select an account --</option>
                          
                        </select>         
                           @if ($errors->has('account_type'))
                          <span class="help-block">{{ $errors->first('account_type') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                        </div>
                        </section> --}}


                        <section class="panel panel-warning">
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
                            <th>Business Entity</th>
                            <th></th>
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
                       
                       <section class="panel panel-default">
                                <header class="panel-heading font-bold">Pay</header>
                                <div class="panel-body">
                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('pay_grade') ? ' has-error' : ''}}">
                            <label>Job Grade</label>
                            <select id="pay_grade" name="pay_grade" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                         <option value="">-- Not set --</option>
                             @foreach($paygrades as $paygrade)
                        <option value="{{ $paygrade->grade }}">{{ $paygrade->grade }}</option>
                          @endforeach  
                         </select>         
                           @if ($errors->has('pay_grade'))
                          <span class="help-block">{{ $errors->first('pay_grade') }}</span>
                           @endif    
                          </div>   
                        </div>

                         <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('currency') ? ' has-error' : ''}}">
                            <label>Currency</label>
                            <select id="currency" name="currency" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                           @foreach($currency as $currency)
                        <option value="{{ $currency->type }}">{{ $currency->type }}</option>
                          @endforeach  
                        </select>         
                           @if ($errors->has('currency'))
                          <span class="help-block">{{ $errors->first('currency') }}</span>
                           @endif    
                          </div>   
                        </div>


                        <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('salary_event') ? ' has-error' : ''}}">
                            <label>Event</label>
                            <select id="salary_event" name="salary_event" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                             <option value="">-- Not set --</option>
                           @foreach($salaryevents as $salaryevent)
                        <option value="{{ $salaryevent->type }}">{{ $salaryevent->type }}</option>
                          @endforeach  
                        </select>         
                           @if ($errors->has('salary_event'))
                          <span class="help-block">{{ $errors->first('salary_event') }}</span>
                           @endif    
                          </div>   
                        </div>


                        <div class="col-sm-3">
                       <div class="form-group @if($errors->has('salary_start_date')) has-error @endif">
                        <label for="salary_start_date">Changes Effective From</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="salary_start_date" id="salary_start_date" placeholder="Select your time" value="{{ old('salary_start_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('salary_start_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('salary_start_date') }}
                       </p>
                        @endif
                      </div>
                      </div>

                         {{-- <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('account_type') ? ' has-error' : ''}}">
                            <label>Minimum</label>
                            <select id="account_type" name="account_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select an account --</option>
                          
                        </select>         
                           @if ($errors->has('account_type'))
                          <span class="help-block">{{ $errors->first('account_type') }}</span>
                           @endif    
                          </div>   
                        </div>
                         <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('account_type') ? ' has-error' : ''}}">
                            <label>Maximum</label>
                            <select id="account_type" name="account_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select an account --</option>
                          
                        </select>         
                           @if ($errors->has('account_type'))
                          <span class="help-block">{{ $errors->first('account_type') }}</span>
                           @endif    
                          </div>   
                        </div> --}}
                        </div>
                        </div>
                        </section>

                        
                          <div class="row">
                          <div class="col-md-6">
                         <section class="panel panel-default">
                                <header class="panel-heading font-bold">Earnings</header>
                                <div class="panel-body">
                       <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">    
                        <div class="form-group">
                          <label>Basic Pay</label>
                          <div class="form-group{{ $errors->has('basic_annual') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="basic_annual" name="basic_annual" value="{{ Request::old('basic_annual') ?: '' }}">   
                          @if ($errors->has('basic_annual'))
                          <span class="help-block">{{ $errors->first('basic_annual') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Car Maintenance Allowance</label>
                          <div class="form-group{{ $errors->has('car_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="car_allowance" name="car_allowance" value="{{ Request::old('car_allowance') ?: '' }}">   
                          @if ($errors->has('car_allowance'))
                          <span class="help-block">{{ $errors->first('car_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Utility Allowance</label>
                          <div class="form-group{{ $errors->has('living_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="living_allowance" name="living_allowance" value="{{ Request::old('living_allowance') ?: '' }}">   
                          @if ($errors->has('living_allowance'))
                          <span class="help-block">{{ $errors->first('living_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Housing Allowance</label>
                          <div class="form-group{{ $errors->has('housing_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="housing_allowance" name="housing_allowance" value="{{ Request::old('housing_allowance') ?: '' }}">   
                          @if ($errors->has('housing_allowance'))
                          <span class="help-block">{{ $errors->first('housing_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Clothing Allowance</label>
                          <div class="form-group{{ $errors->has('clothing_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="clothing_allowance" name="clothing_allowance" value="{{ Request::old('clothing_allowance') ?: '' }}">   
                          @if ($errors->has('clothing_allowance'))
                          <span class="help-block">{{ $errors->first('clothing_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                        <div class="form-group">
                          <label>Transport Allowance</label>
                          <div class="form-group{{ $errors->has('transport_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="transport_allowance" name="transport_allowance" value="{{ Request::old('transport_allowance') ?: '' }}">   
                          @if ($errors->has('transport_allowance'))
                          <span class="help-block">{{ $errors->first('transport_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </section>
                        </div>

                        <div class="col-md-6">
                         <section class="panel panel-default">
                                <header class="panel-heading font-bold">Deductions</header>
                                <div class="panel-body">
                       <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">    
                        <div class="form-group">
                          <label>Provident Fund (%)</label>
                          <div class="form-group{{ $errors->has('pension_fund_percent') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="pension_fund_percent" name="pension_fund_percent" value="5">   
                          @if ($errors->has('pension_fund_percent'))
                          <span class="help-block">{{ $errors->first('pension_fund_percent') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>SSF (%)</label>
                          <div class="form-group{{ $errors->has('epf_deducation_percent') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="epf_deducation_percent" name="epf_deducation_percent" value="5.5">   
                          @if ($errors->has('epf_deducation_percent'))
                          <span class="help-block">{{ $errors->first('epf_deducation_percent') }}</span>
                           @endif                           
                        </div>
                        </div>
                        
                        </div>
                        </div>
                         <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">    
                        <div class="form-group">
                          <label>Loan Repayment</label>
                          <div class="form-group{{ $errors->has('loan_repayment') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="loan_repayment" name="loan_repayment" value="{{ Request::old('loan_repayment') ?: '' }}">   
                          @if ($errors->has('loan_repayment'))
                          <span class="help-block">{{ $errors->first('loan_repayment') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="form-group pull-in clearfix">
                        <div class="col-sm-4">    
                        <div class="form-group">
                          <label>McFund Plus</label>
                          <div class="form-group{{ $errors->has('mcfund_plus') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="mcfund_plus" name="mcfund_plus" value="{{ Request::old('mcfund_plus') ?: '' }}">   
                          @if ($errors->has('mcfund_plus'))
                          <span class="help-block">{{ $errors->first('mcfund_plus') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-4">    
                        <div class="form-group">
                          <label>McTrust</label>
                          <div class="form-group{{ $errors->has('mctrust') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="mctrust" name="mctrust" value="{{ Request::old('mctrust') ?: '' }}">   
                          @if ($errors->has('mctrust'))
                          <span class="help-block">{{ $errors->first('mctrust') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-4">    
                        <div class="form-group">
                          <label>McFund</label>
                          <div class="form-group{{ $errors->has('mcfund') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="mcfund" name="mcfund" value="{{ Request::old('mcfund') ?: '' }}">   
                          @if ($errors->has('mcfund'))
                          <span class="help-block">{{ $errors->first('mcfund') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </section>
                        </div>

                        </div>

                  <footer class="panel-footer text-right bg-light lter">
                        
                        @role(['HR Manager','System Admin'])
                        <button type="button" onclick="PreviewSalaryDetails()" class="btn btn-success btn-s-xs">Preview Net</button>
                        @endrole

                         @role(['HR Officer','HR Manager'])
                        <button type="button" onclick="saveSalaryDetails()" class="btn btn-success btn-s-xs">Add</button>
                        @endrole
                      </footer>

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
                            @if(Auth::user()->getRole()=='HR Manager')
                            <th>Annual Basic</th>
                            <th>Earnings</th>
                            <th>Deductions</th>
                            @else

                            @endif
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

                      {{-- end of salary information --}}



                      {{-- Begin qualification information--}}
                      <div class="tab-pane" id="eductioninformation">
                      <section class="panel panel-info">
                                <header class="panel-heading font-bold">Work Experience
                                 <a href="#new-qualification" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">

                       <table id="ExperienceTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            
                             <th>Previous Company Name</th>
                            <th>Job Title</th>
                            <th>From</th>
                            <th>To</th>
                            <th></th>
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
                            
                             <th>Degree/Diploma</th>
                            <th>School Name</th>
                            <th>Field(s) of Study</th>
                            <th>From</th>
                            <th>To</th>
                            <th></th>
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
                  <header class="panel-heading font-bold">Licence
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
                      {{-- End qualification information --}}


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

                 {{-- Start guarantor --}}
                           <div class="tab-pane" id="getguarantor">
                            <section class="panel panel-default">
                                <header class="panel-heading font-bold">Guarantor
                                 <a href="#new-guarantor" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
             
                        <table id="GuarantorTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th>Name</th>
                            <th>Postal Address</th>
                            <th>Residential Address</th>
                            <th>Mobile</th>
                            <th>Home Telephone</th>
                            <th></th>
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


                {{-- Start beneficiary --}}
                           <div class="tab-pane" id="getbeneficairy">
                            <section class="panel panel-default">
                                <header class="panel-heading font-bold">Beneficiary
                                 <a href="#new-beneficiary" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
             
                        <table id="BeneficiaryTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                              <th>Name</th>
                            <th>Relationship</th>
                            <th>Home Telephone</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th></th>
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



                 {{-- Immigration--}}
                 <div class="tab-pane " id="immigrationrecords">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Assigned Immigration Records
                                 <a href="#new-immigration" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table id="ImmigrationTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th>Document</th>
                            <th>Number</th>
                            <th>Issued By</th>
                            <th>Issued Date</th>
                            <th>Expiry Date</th>
                            <th></th>
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
                 {{-- End Immigration--}}


                     {{-- Report to--}}
                 <div class="tab-pane " id="employee_reportto">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Assigned Supervisors / Subordinates
                                 <a href="#new-reporting-method" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Who does this employee report to? The manager must have a McPersona employee account to show up here.">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                    <table id="ReporttoTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Reporting Method</th>
                            <th></th>
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
                 {{-- End report to--}}

                 {{-- Bank info --}}
    
                 <div class="tab-pane " id="bankinformation">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Bank Information
                                 <a href="#new-bank" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                        <table id="BankTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                           <th>Account Number</th>
                            <th>Financial Institution</th>
                            <th>Account Type</th>
                            <th>Branch Location</th>
                            <th></th>
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
                 {{--Bank Details--}}


{{-- Bank info --}}
    
                 <div class="tab-pane " id="documentations">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Attachments
                                 <a href="#new-document" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
             
                      <table id="DocumentTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                           <th>File Name</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Date Added</th>
                            <th></th>
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
                 {{--Bank Details--}}



                 {{-- social Media --}}
    
                 <div class="tab-pane " id="socialmedia">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Social Media
                                 <a href="#attach_document" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                        
                            <th>Type </th>
                            <th>Profile Name</th>
                            <th>Profile Link</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                       {{--  @foreach($bills as $key => $bill )
                          <tr>
                           
                            <td>{{ $bill->invoice_number }}</td>
                            <td>{{ $bill->policy_product }}</td>
                            <td>{{ $bill->created_on }} ({{ Carbon\Carbon::parse($bill->created_on)->diffForHumans() }} overdue )</td>
                            <td>{{ $bill->currency }}</td>
                            <td>{{ $bill->amount }}</td>
                            <td></td>
                          </tr>
                         @endforeach --}}
                        </tbody>
 
                      </table>
                    </div>           
                </div>
                </section>
                </div>
                 {{--end social Media--}}

                 {{-- Training --}}
                 <div class="tab-pane " id="training">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Training 
                                 <a href="#new-training" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table id="ImmigrationTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th>Title</th>
                            <th>Trainer</th>
                            <th>Venue</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th></th>
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

                 {{-- end--}}


                  {{-- Training --}}
                 <div class="tab-pane " id="asset">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Assets 
                                 <a href="#new-asset" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table id="ImmigrationTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th>Type</th>
                            <th>Details</th>
                            <th>Given Date</th>
                            <th>Return Date</th>
                            <th></th>
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

                 {{-- end--}}


                  {{-- Training --}}
                 <div class="tab-pane " id="travel">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Travel 
                                 <a href="#new-travel" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table id="TravelTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th>Place of visit</th>
                            <th>Purpose of visit</th>
                            <th>Departure Date</th>
                            <th>Arrival Date</th>
                            <th></th>
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

                 {{-- end--}}

 {{-- Training --}}
                 <div class="tab-pane " id="policy">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Policy 
                                 <a href="#new-policy" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table id="ImmigrationTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Applies</th>
                            <th>Status</th>
                            <th></th>
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

                 {{-- end--}}


 {{-- social Media --}}
    
                 <div class="tab-pane " id="membershipsdetails">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Memberships
                                 <a href="#new-membership" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                    
                        <table id="MembershipTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th>Membership </th>
                            <th>Subscription Paid By</th>
                            <th>Subscription Amount</th>
                            <th>Currency</th>
                            <th>Subscription Commence Date</th>
                            <th>Subscription Renewal Date</th>
                            <th></th>
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
                 {{--end social Media--}}




                       </div>

                      </div>
                    </section>

                    </section>
                    </form>
                </div>
              </div>


            </section>
        </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop





<script type="text/javascript">
function saveMainDetails()
{
  //alert(document.getElementById("image").src);

    $.get('/save-staff-details',
        {
          "staff_id": $('#staff_id').val(),
          "staff_type": $('#staff_type').val(),
          "fullname": $('#fullname').val(),
          "date_of_birth": $('#date_of_birth').val(),
          "gender":  $('#gender').val(),
          "postal_address": $('#postal_address').val(),
          "residential_address": $('#residential_address').val(),
          "email":  $('#email').val(),    
          "mobile_number": $('#mobile_number').val(),
          "place_of_birth": $('#place_of_birth').val(),
          "id_type": $('#id_type').val(),
          "id_number":  $('#id_number').val(),    
          "marital_status": $('#marital_status').val(),
          "nationality": $('#nationality').val(),
          "ssn":  $('#ssn').val()   
          //"image": document.getElementById("image").src
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        
        if(data["OK"])
        {
          toastr.success("Employee details saved!");
         
        
        }

        else
        {
          toastr.error("Employee failed to be added!");
        }
      });
                                        
        },'json');

}


function saveJobDetails()
{


if($('#staff_id').val()!= "")
{

    $.get('/save-job-details',
        {
          "staff_id": $('#staff_id').val(),
           "date_join": $('#date_join').val(),
           "probation_end_date": $('#probation_end_date').val(),
          "permanency_date":  $('#permanency_date').val(),
          "job_title": $('#job_title').val(),
          "employment_status": $('#employment_status').val(),
         "job_specification":  $('#job_specification').val(),    
          "job_category": $('#job_category').val(),
          "department": $('#department').val(),
          "location":  $('#location').val(),    
          "work_shift": $('#work_shift').val(),
          "comment": $('#comment').val(),
          "subsidiary":  $('#subsidiary').val()    
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Job added!");
         loadJobDetail();

        }
        else
        {
          toastr.error("Job failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function deleteJob(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this job from list?",   
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
          $.get('/delete-job-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Job was removed from list.", "success"); 
              loadJobDetail();
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

   function deleteExperience(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this experience from list?",   
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
          $.get('/delete-experience-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Experience was removed from list.", "success"); 
              loadExperienceDetail();
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


 function deleteEducation(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this educational level from list?",   
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
          $.get('/delete-education-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Educational level was removed from list.", "success"); 
              loadEducationDetail();
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


function deleteSkill(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this skill from list?",   
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
          $.get('/delete-skill-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Skill was removed from list.", "success"); 
              loadSkillDetail();
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


   function deleteLanguage(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this language from list?",   
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
          $.get('/delete-language-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Language was removed from list.", "success"); 
              loadLanguageDetail();
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


    function deleteLicense(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this license from list?",   
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
          $.get('/delete-license-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Language was removed from list.", "success"); 
              loadLicenseDetail();
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

   function deleteBank(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this bank detail from list?",   
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
          $.get('/delete-bank-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Bank was removed from list.", "success"); 
              loadBankDetail();
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


   function deleteReportTo(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this report to detail from list?",   
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
          $.get('/delete-reportto-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Report to was removed from list.", "success"); 
              loadReporttoDetail();
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


   function deleteImmigration(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this immigration detail from list?",   
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
          $.get('/delete-immigration-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Immigration detail was removed from list.", "success"); 
              loadImmigrationDetail();
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


function deleteDependent(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this dependent detail from list?",   
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
          $.get('/delete-dependent-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Dependent detail was removed from list.", "success"); 
              loadDependentDetail();
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


   function deleteBeneficiary(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this beneficiary detail from list?",   
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
          $.get('/delete-beneficiary-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Beneficiary detail was removed from list.", "success"); 
              loadBeneficiaryDetail();
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

   function deleteGuarantor(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this guarantor detail from list?",   
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
          $.get('/delete-guarantor-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Guarantor detail was removed from list.", "success"); 
              loadGuarantorDetail();
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

     function deleteEmergency(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this emergency detail from list?",   
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
          $.get('/delete-emergency-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Emergency detail was removed from list.", "success"); 
              loadEmergencyDetail();
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


   function deleteSalary(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this salary detail from list?",   
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
          $.get('/delete-salary-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Salary detail was removed from list.", "success"); 
              loadSalaryDetail();
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

   function deleteMembership(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this membership detail from list?",   
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
          $.get('/delete-membership-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Memebership detail was removed from list.", "success"); 
              loadMembershipDetail();
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

    function deleteDocument(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this document from list?",   
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
          $.get('/delete-document-details',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Document was removed from list.", "success"); 
              loadDocumentDetail();
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



function saveSalaryDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-salary-details',
        {
          "staff_id":                 $('#staff_id').val(),
          "pay_grade":                $('#pay_grade').val(),
          "currency":                 $('#currency').val(),
          "basic_annual":             $('#basic_annual').val(),
          "car_allowance":            $('#car_allowance').val(),
          "living_allowance":         $('#living_allowance').val(),
          "clothing_allowance":       $('#clothing_allowance').val(),
          "housing_allowance":        $('#housing_allowance').val(),
          "epf_deducation_percent":   $('#epf_deducation_percent').val(),
          "pension_fund_percent":     $('#pension_fund_percent').val(),
          "loan_repayment":           $('#loan_repayment').val(),
          "mcfund_plus":              $('#mcfund_plus').val(),
          "mcfund":                   $('#mcfund').val(),
          "mctrust":                  $('#mctrust').val(),
          "salary_event":             $('#salary_event').val(),
          "salary_start_date":        $('#salary_start_date').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Salary added!");
         loadSalaryDetail();
        
        }
        else
        {
          toastr.error("Salary failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function saveEmergencyDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-emergency-details',
        {
          "staff_id":              $('#staff_id').val(),
           "kin_name":             $('#kin_name').val(),
           "kin_relationship":     $('#kin_relationship').val(),
           "kin_office_phone":     $('#kin_office_phone').val(),
          "emergency_dob":     $('#emergency_dob').val(),
           "kin_postal":     $('#kin_postal').val(),
           "kin_residential":     $('#kin_residential').val(),
           "kin_mobile":            $('#kin_mobile').val(),
           "kin_home_phone":        $('#kin_home_phone').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Emergency contact added!");
         loadEmergencyDetail();
        $('#new-emergency-contact').modal('toggle')
        }
        else
        {
          toastr.error("Emergency contact failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateEmergencyDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/update-emergency-details',
        {
          "id":                     $('#emergency_id').val(),
           "kin_name":             $('#kin_name').val(),
           "kin_relationship":     $('#kin_relationship').val(),
           "kin_office_phone":     $('#kin_office_phone').val(),
           "kin_postal":            $('#kin_postal').val(),
             "emergency_dob":            $('#emergency_dob').val(),
           "kin_residential":       $('#kin_residential').val(),
           "kin_mobile":            $('#kin_mobile').val(),
           "kin_home_phone":        $('#kin_home_phone').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Emergency contact added!");
         loadEmergencyDetail();
         location.reload(true);
        $('#new-emergency-contact').modal('toggle')
        }
        else
        {
          toastr.error("Emergency contact failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function saveMemebershipDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-membership-details',
        {
          "staff_id":              $('#staff_id').val(),
           "sub_type":             $('#sub_type').val(),
           "sub_paid_by":          $('#sub_paid_by').val(),
           "sub_amount":           $('#sub_amount').val(),
           "sub_currency":         $('#sub_currency').val(),
           "sub_commencement_date":$('#sub_commencement_date').val(),
           "sub_renewal_date":     $('#sub_renewal_date').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Memebership added!");
        loadMembershipDetail();
        $('#new-membership').modal('toggle')
        }
        else
        {
          toastr.error("Membership failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateMembershipDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/update-membership-details',
        {
          "id":              $('#membership_id').val(),
           "sub_type":             $('#sub_type').val(),
           "sub_paid_by":          $('#sub_paid_by').val(),
           "sub_amount":           $('#sub_amount').val(),
           "sub_currency":         $('#sub_currency').val(),
           "sub_commencement_date":$('#sub_commencement_date').val(),
           "sub_renewal_date":     $('#sub_renewal_date').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Memebership added!");
        loadMembershipDetail();
        location.reload(true);
        $('#new-membership').modal('toggle')
        }
        else
        {
          toastr.error("Membership failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}


function saveGuarantorDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-guarantor-details',
        {
          "staff_id":                       $('#staff_id').val(),
           "guarantor_name":                $('#guarantor_name').val(),
           "guarantor_office_phone":        $('#guarantor_office_phone').val(),
           "guarantor_mobile":              $('#guarantor_mobile').val(),
           "guarantor_postal_address":      $('#guarantor_postal_address').val(),
           "guarantor_residential_address": $('#guarantor_residential_address').val()
           
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Guarantor added!");
        loadGuarantorDetail();
        $('#new-guarantor').modal('toggle')
        }
        else
        {
          toastr.error("Guarantor failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateGuarantorDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/update-guarantor-details',
        {
          "id":                       $('#guarantor_id').val(),
           "guarantor_name":                $('#guarantor_name').val(),
           "guarantor_office_phone":        $('#guarantor_office_phone').val(),
           "guarantor_mobile":              $('#guarantor_mobile').val(),
           "guarantor_postal_address":      $('#guarantor_postal_address').val(),
           "guarantor_residential_address": $('#guarantor_residential_address').val()
           
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Guarantor added!");
        loadGuarantorDetail();
        location.reload(true);
        $('#new-guarantor').modal('toggle')
        }
        else
        {
          toastr.error("Guarantor failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function saveBeneficiaryDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-beneficiary-details',
        {
          "staff_id":                         $('#staff_id').val(),
           "beneficiary_name":                $('#beneficiary_name').val(),
           "beneficiary_relationship":        $('#beneficiary_relationship').val(),
           "beneficiary_dob":                 $('#beneficiary_dob').val(),
           "beneficiary_postal_address":      $('#beneficiary_postal_address').val(),
           "beneficiary_residential_address": $('#beneficiary_residential_address').val(),
           "beneficiary_home_phone":          $('#beneficiary_home_phone').val(),
           "beneficiary_mobile":              $('#beneficiary_mobile').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Beneficiary added!");
        loadBeneficiaryDetail();
        $('#new-beneficiary').modal('toggle')
        }
        else
        {
          toastr.error("Beneficiary failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateBeneficiaryDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/update-beneficiary-details',
        {
          "id":                               $('#beneficiary_id').val(),
           "beneficiary_name":                $('#beneficiary_name').val(),
           "beneficiary_relationship":        $('#beneficiary_relationship').val(),
           "beneficiary_dob":                 $('#beneficiary_dob').val(),
           "beneficiary_postal_address":      $('#beneficiary_postal_address').val(),
           "beneficiary_residential_address": $('#beneficiary_residential_address').val(),
           "beneficiary_home_phone":          $('#beneficiary_home_phone').val(),
           "beneficiary_mobile":              $('#beneficiary_mobile').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Beneficiary added!");
        loadBeneficiaryDetail();
        location.reload(true);
        $('#new-beneficiary').modal('toggle')
        }
        else
        {
          toastr.error("Beneficiary failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}




function saveExperienceDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-experience-details',
        {
          "staff_id": $('#staff_id').val(),
           "job_experience_company":    $('#job_experience_company').val(),
           "job_experience_title":      $('#job_experience_title').val(),
           "qualification_end_date":    $('#qualification_end_date').val(),
           "qualification_start_date":   $('#qualification_start_date').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Experience added!");
         loadExperienceDetail();
         $('#new-qualification').modal('toggle')
        
        }
        else
        {
          toastr.error("Experience failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}


function updateExperienceDetails()
{

  //alert($('#experience_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/update-experience-details',
        {
           "id": $('#experience_id').val(),
           "job_experience_company":    $('#job_experience_company').val(),
           "job_experience_title":      $('#job_experience_title').val(),
           "qualification_end_date":    $('#qualification_end_date').val(),
           "qualification_start_date":   $('#qualification_start_date').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Experience Updated!");
         loadExperienceDetail();
         $('#new-qualification').modal('toggle')
         location.reload(true);
        
        }
        else
        {
          toastr.error("Experience failed to be update!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}


function saveBankDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-bank-details',
        {
          "staff_id": $('#staff_id').val(),
           "bank_name":             $('#bank_name').val(),
           "bank_location":         $('#bank_location').val(),
           "bank_account_type":     $('#bank_account_type').val(),
           "bank_account_number":   $('#bank_account_number').val(),
           "account_holder_name":   $('#account_holder_name').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Bank details added!");
         loadBankDetail();
         
         $('#new-bank').trigger("reset");
         $('#new-bank').modal('toggle');
        
        }
        else
        {
          toastr.error("Bank details failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}


function updateBankDetails()
{

  //alert($('#bank_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/update-bank-details',
        {
           "id":                    $('#bank_id').val(),
           "bank_name":             $('#bank_name').val(),
           "bank_location":         $('#bank_location').val(),
           "bank_account_type":     $('#bank_account_type').val(),
           "bank_account_number":   $('#bank_account_number').val(),
           "account_holder_name":   $('#account_holder_name').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Bank details updated!");
         loadBankDetail();
         
          location.reload(true);
        
        }
        else
        {
          toastr.error("Bank details failed to be updated!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}


function saveEducationDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-education-details',
        {
          "staff_id":                $('#staff_id').val(),
          "level":                   $('#level').val(),
          "school":                  $('#school').val(),
          "gpa":                     $('#gpa').val(),
          "major_specialization":    $('#major_specialization').val(),
          "complete_year":           $('#complete_year').val(),
          "school_start_date":       $('#school_start_date').val(),
          "school_end_date":         $('#school_end_date').val(),
          "comment":                 $('#comment').val()
        },



        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Education added!");
          loadEducationDetail();
          $('#new-education').modal('toggle')
        }
        else
        {
          toastr.error("Education failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateEducationDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/update-education-details',
        {
          "id":                      $('#education_id').val(),
          "level":                   $('#level').val(),
          "school":                  $('#school').val(),
          "gpa":                     $('#gpa').val(),
          "major_specialization":    $('#major_specialization').val(),
          "complete_year":           $('#complete_year').val(),
          "school_start_date":       $('#school_start_date').val(),
          "school_end_date":         $('#school_end_date').val(),
          "comment":                 $('#comment').val()
        },



        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Education added!");
          loadEducationDetail();
          $('#new-education').modal('toggle')
          location.reload(true);
        }
        else
        {
          toastr.error("Education failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function saveSkillDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-skill-details',
        {
          "staff_id":                $('#staff_id').val(),
          "special_skill":           $('#special_skill').val(),
          "year_of_experience":      $('#year_of_experience').val(),
          "comment":                 $('#comment').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Skill added!");
          loadSkillDetail();
          $('#new-skill').modal('toggle')
        
        }
        else
        {
          toastr.error("Skill failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateSkillDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/update-skill-details',
        {
          "id":                      $('#skill_id').val(),
          "special_skill":           $('#special_skill').val(),
          "year_of_experience":      $('#year_of_experience').val(),
          "comment":                 $('#comment').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Skill added!");
          loadSkillDetail();
          $('#new-skill').modal('toggle')
          location.reload(true);
        
        }
        else
        {
          toastr.error("Skill failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function saveLanguageDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/save-language-details',
        {
          "staff_id":                $('#staff_id').val(),
          "language":                $('#language').val(),
          "language_skill":          $('#language_skill').val(),
          "fluency":                 $('#fluency').val(),
          "comment":                 $('#comment').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Language added!");
          loadLanguageDetail();
          $('#new-language').modal('toggle')
        
        }
        else
        {
          toastr.error("Skill failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateLanguageDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/update-language-details',
        {
          "id":                      $('#language_id').val(),
          "language":                $('#language').val(),
          "language_skill":          $('#language_skill').val(),
          "fluency":                 $('#fluency').val(),
          "comment":                 $('#comment').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Language added!");
          loadLanguageDetail();
          $('#new-language').modal('toggle')
          location.reload(true);
        
        }
        else
        {
          toastr.error("Skill failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}




function saveLicenseDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/save-license-details',
        {
          "staff_id":                $('#staff_id').val(),
          "license_type":            $('#license_type').val(),
          "license_number":          $('#license_number').val(),
          "license_start_date":      $('#license_start_date').val(),
          "license_end_date":        $('#license_end_date').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("License added!");
          loadLicenseDetail();
          $('#new-license').modal('toggle')
        }
        else
        {
          toastr.error("License failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateLicenseDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/update-license-details',
        {
          "id":                      $('#license_id').val(),
          "license_type":            $('#license_type').val(),
          "license_number":          $('#license_number').val(),
          "license_start_date":      $('#license_start_date').val(),
          "license_end_date":        $('#license_end_date').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("License added!");
          loadLicenseDetail();
          $('#new-license').modal('toggle')
          location.reload(true);
        }
        else
        {
          toastr.error("License failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}



function saveDependantDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/save-dependent-details',
        {
          "staff_id":                 $('#staff_id').val(),
          "dependant_name":           $('#dependant_name').val(),
          "dependant_dob":            $('#dependant_dob').val(),
          "dependant_relationship":   $('#dependant_relationship').val(),
          "dependant_gender":         $('#dependant_gender').val(),
          "dependant_nationality":    $('#dependant_nationality').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Dependant added!");
          loadDependentDetail();
          $('#new-dependant').modal('toggle')
        }
        else
        {
          toastr.error("Dependant failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateDependantDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/update-dependent-details',
        {
          "id":                       $('#dependant_id').val(),
          "dependant_name":           $('#dependant_name').val(),
          "dependant_dob":            $('#dependant_dob').val(),
          "dependant_relationship":   $('#dependant_relationship').val(),
          "dependant_nationality":    $('#dependant_nationality').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Dependant updated!");
          loadDependentDetail();
          $('#new-dependant').modal('toggle')
          location.reload(true);

        }
        else
        {
          toastr.error("Dependant failed to be updated!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}


function saveImmigrationDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/save-immigration-details',
        {
          "staff_id":                 $('#staff_id').val(),
          "document":                 $('#document').val(),
          "document_id":              $('#document_id').val(),
          "issued_at":                $('#immigration_issued_at').val(),
          "issue_date":               $('#immigration_issue_date').val(),
          "expiry_date":              $('#immigration_expiry_date').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Immigration details added!");
          loadImmigrationDetail();
          $('#new-immigration').modal('toggle')
        
        }
        else
        {
          toastr.error("Immigration detail failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateImmigrationDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/update-immigration-details',
        {
          "id":                       $('#immigration_id').val(),
          "document":                 $('#document').val(),
          "document_id":              $('#document_id').val(),
          "issued_at":                $('#immigration_issued_at').val(),
          "issue_date":               $('#immigration_issue_date').val(),
          "expiry_date":              $('#immigration_expiry_date').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Immigration details added!");
          loadImmigrationDetail();
          $('#new-immigration').modal('toggle')
          location.reload(true);
        
        }
        else
        {
          toastr.error("Immigration detail failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}


function saveReportingDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/save-reportto-details',
        {
          "staff_id":             $('#staff_id').val(),
          "name":                 $('#reportto_name').val(),
          "type":                 $('#reportto_type').val(),
          "reporting_mode":       $('#reportto_method').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Reporting details added!");
          loadReporttoDetail();
          $('#new-reporting-method').modal('toggle')
        }
        else
        {
          toastr.error("Reporting details failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function updateReportingDetails()
{

if($('#staff_id').val()!= "")
{

    $.get('/update-reportto-details',
        {
          "id":                   $('#reportto_id').val(),
          "name":                 $('#reportto_name').val(),
          "type":                 $('#reportto_type').val(),
          "reporting_mode":       $('#reportto_method').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Reporting details added!");
          loadReporttoDetail();
          $('#new-reporting-method').modal('toggle')
          location.reload(true);
        }
        else
        {
          toastr.error("Reporting details failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}

function doTermination()
{

if($('#staff_id').val()!= "")
{

    $.get('/terminate-job-offer',
        {
          "staff_id":             $('#staff_id').val(),
          "terminate_reason":     $('#terminate_reason').val(),
          "terminate_date":       $('#terminate_date').val(),
          "terminate_comment":    $('#terminate_comment').val()
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Appointment terminated successfully!");
          $('#new-terminate').modal('toggle')
        }
        else
        {
          toastr.error("Appointment termination failed!");
        }
      });
                                        
        },'json');
  }
  else
    {
      sweetAlert("Please fill staff details!");
    }
}


function PreviewSalaryDetails()
{
    
  if($('#basic_annual').val()=="")
  {sweetAlert("Please enter staff basic",'Fill all fields', "error");}
  else
  {

    $.get('/quick-compute',
        {

          "id": $('#staff_id').val(),
          "salary": $('#basic_annual').val(),
          "car_allowance": $('#car_allowance').val(),
          "living_allowance": $('#living_allowance').val(),
          "clothing_allowance": $('#clothing_allowance').val(),
          "housing_allowance": $('#housing_allowance').val(),
          "pension_fund_percent" : $('#pension_fund_percent').val(),
          "employee_ssf" : $('#epf_deducation_percent').val(),
          "loan_repayment" : $('#loan_repayment').val(),
          "mcfund" : $('#mcfund').val(),
          "mctrust" : $('#mctrust').val(),
          "mcfund_plus" : $('#mcfund_plus').val(),
          "deductions": 0

        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
          sweetAlert("Net Salary : ", data["netsalary"], "info");
           // $('#income_tax').val(data.income_tax);
           // $('#pension_fund_percent').val(data.employeePF);
           // $('#epf_deducation_percent').val(data.employerPF);
      });
                                        
        },'json');
  }
}





function loadJobDetail()
   {
         
        
        $.get('/load-job-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#JobTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#JobTable tbody').append('<tr><td>1</td><td>'+ value['permanency_date'] +'</td><td>Present</td><td>'+ value['job_title'] +'</td><td>'+ value['employment_status'] +'</td><td>'+ value['job_category'] +'</td><td>'+ value['department'] +'</td><td>'+ value['subsidiary'] +'</td><td><a a href="#"><i onclick="deleteJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    function loadExperienceDetail()
   {
         
        
        $.get('/load-experience-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#ExperienceTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#ExperienceTable tbody').append('<tr><td>'+ value['company'] +'</td><td>'+ value['job_title'] +'</td><td>'+ value['date_from'] +'</td><td>'+ value['date_to'] +'</td><td><a href="#new-qualification" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditExperience(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteExperience(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


    function loadMembershipDetail()
   {
         
        
        $.get('/load-memberships-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#MembershipTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#MembershipTable tbody').append('<tr><td>'+ value['sub_type'] +'</td><td>'+ value['sub_paid_by'] +'</td><td>'+ value['sub_amount'] +'</td><td>'+ value['sub_currency'] +'</td><td>'+ value['sub_commencement_date'] +'</td><td>'+ value['sub_renewal_date'] +'</td><td><a href="#new-membership" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditMembership(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteMembership(\''+value['id']+'\',\''+value['sub_type']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

     function loadGuarantorDetail()
   {
         
        
        $.get('/load-guarantor-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#GuarantorTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#GuarantorTable tbody').append('<tr><td>'+ value['guarantor_name'] +'</td><td>'+ value['guarantor_postal_address'] +'</td><td>'+ value['guarantor_residential_address'] +'</td><td>'+ value['guarantor_mobile'] +'</td><td>'+ value['guarantor_office_phone'] +'</td>><td><a href="#new-guarantor" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditGuarantor(\''+value['id']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteGuarantor(\''+value['id']+'\',\''+value['guarantor_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

     function loadBeneficiaryDetail()
   {
         
        
        $.get('/load-beneficairy-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#BeneficiaryTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#BeneficiaryTable tbody').append('<tr><td>'+ value['beneficiary_name'] +'</td><td>'+ value['beneficiary_relationship'] +'</td><td>'+ value['beneficiary_home_phone'] +'</td><td>'+ value['beneficiary_mobile'] +'</td><td>'+ value['beneficiary_postal_address'] +'</td><td><a href="#new-beneficiary" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditBeneficiary(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteBeneficiary(\''+value['id']+'\',\''+value['beneficiary_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


    function loadEducationDetail()
   {
         
        
        $.get('/load-education-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#EducationTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#EducationTable tbody').append('<tr><td>'+ value['level'] +'</td><td>'+ value['school'] +'</td><td>'+ value['major_specialization'] +'</td><td>'+ value['school_start_date'] +'</td><td>'+ value['school_end_date'] +'</td><td><a href="#new-education" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditEducation(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteEducation(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

     function loadSkillDetail()
   {
         
        
        $.get('/load-skill-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#SkillTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#SkillTable tbody').append('<tr><td>'+ value['special_skill'] +'</td><td>'+ value['year_of_experience'] +'</td><td><a href="#new-skill" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditSkill(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteSkill(\''+value['id']+'\',\''+value['special_skill']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    function loadLanguageDetail()
   {
         
        
        $.get('/load-language-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#LanguageTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#LanguageTable tbody').append('<tr><td>'+ value['language'] +'</td><td>'+ value['skill'] +'</td><td>'+ value['fluency'] +'</td><td>'+ value['comment'] +'</td><td><a href="#new-language" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditLanguage(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteLanguage(\''+value['id']+'\',\''+value['language']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

     function loadBankDetail()
   {
         
        
        $.get('/load-bank-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#BankTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#BankTable tbody').append('<tr><td>'+ value['bank_account_number'] +'</td><td>'+ value['bank_name'] +'</td><td>'+ value['bank_account_type'] +'</td><td>'+ value['bank_location'] +'</td><td><a href="#new-bank" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditBank(\''+value['id']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteBank(\''+value['id']+'\',\''+value['bank_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

    function loadEmergencyDetail()
   {
         
        
        $.get('/load-emergency-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#EmergencyTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#EmergencyTable tbody').append('<tr><td>'+ value['kin_name'] +'</td><td>'+ value['kin_relationship'] +'</td><td>'+ value['kin_mobile'] +'</td><td>'+ value['kin_home_phone'] +'</td><td>'+ value['kin_office_phone'] +'</td><td><a href="#new-emergency-contact" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditEmergency(\''+value['id']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteEmergency(\''+value['id']+'\',\''+value['kin_name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


    function loadDependentDetail()
   {
         
        
        $.get('/load-dependent-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#DependentTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#DependentTable tbody').append('<tr><td>'+ value['name'] +'</td><td>'+ value['relationship'] +'</td><td>'+ value['dob'] +'</td><td>'+ value['nationality'] +'</td><td><a href="#new-dependant" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditDependent(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteDependent(\''+value['id']+'\',\''+value['name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

     function loadDocumentDetail()
   {
         
        
        $.get('/load-document-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#DocumentTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#DocumentTable tbody').append('<tr><td>'+ value['filename'] +'</td><td>'+ value['original_name'] +'</td><td>'+ value['size'] +'</td><td>'+ value['created_on'] +'</td><td><a a href="/uploads/images/'+ value['filepath'] +'"><i onclick="/uploads/images/'+ value['filepath'] +'" class="fa fa-eye"></i></a></td><td><a a href="#"><i onclick="deleteDocument(\''+value['id']+'\',\''+value['filename']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


function loadImmigrationDetail()
   {
         
        
        $.get('/load-immigration-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#ImmigrationTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#ImmigrationTable tbody').append('<tr><td>'+ value['document'] +'</td><td>'+ value['document_id'] +'</td><td>'+ value['issued_at'] +'</td><td>'+ value['issue_date'] +'</td><td>'+ value['expiry_date'] +'</td><td><a a href="#"><i onclick="deleteImmigration(\''+value['id']+'\',\''+value['document']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


function loadReporttoDetail()
   {
         
        
        $.get('/load-reportto-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#ReporttoTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#ReporttoTable tbody').append('<tr><td>'+ value['name'] +'</td><td>'+ value['type'] +'</td><td>'+ value['reporting_mode'] +'</td><td><a a href="#"><i onclick="deleteReportTo(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }



    function loadLicenseDetail()
   {
         
        
        $.get('/load-license-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            $('#LicenseTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#LicenseTable tbody').append('<tr><td>'+ value['license_type'] +'</td><td>'+ value['license_number'] +'</td><td>'+ value['issued_date'] +'</td><td>'+ value['expiry_date'] +'</td><td><a href="#new-license" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditLicense(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteLicense(\''+value['id']+'\',\''+value['license_type']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }



    function loadSalaryDetail()
   {
         
        
        $.get('/load-salary-details',
          {
            "staff_id": $('#staff_id').val()
          },
          function(data)
          { 

            // <td>'+ value['basic_annual'] +'</td><td>'+ (value['car_allowance']+ value['living_allowance'] )+'</td><td>'+ (((value['pension_fund_percent']/100) * value['basic_annual'])+ ((value['epf_deducation_percent']/100) * value['basic_annual']) )+'</td>

            $('#SalaryTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#SalaryTable tbody').append('<tr><td>'+ value['event'] +'</td><td>'+ value['effective_from'] +'</td><td>Present</td><td>'+ value['pay_grade'] +'</td><td>'+ value['currency'] +'</td><td><a href="#"><i onclick="deleteSalary(\''+value['id']+'\',\''+value['pay_grade']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

</script>

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function () {
  $('#date_join').daterangepicker({
     "minDate": moment('1900-06-14'),
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
  $('#probation_end_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#beneficiary_dob').daterangepicker({
     "minDate": moment('1900-06-14'),
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
  $('#permanency_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#date_of_birth').daterangepicker({
     "minDate": moment('1930-06-14'),
      "maxDate": moment(),
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
  $('#qualification_start_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#qualification_end_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#school_end_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#school_start_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#license_start_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#dependant_dob').daterangepicker({
     "minDate": moment('1900-06-14'),
      "maxDate": moment(),
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
  $('#license_end_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#emergency_dob').daterangepicker({
     "minDate": moment('1900-06-14'),
      "maxDate": moment(),
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
  $('#kin_dob').daterangepicker({
     "minDate": moment('1900-06-14'),
      "maxDate": moment(),
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
  $('#terminate_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#salary_start_date').daterangepicker({
     "minDate": moment('1930-06-14'),
      "maxDate": moment(),
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
  $('#immigration_issue_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#immigration_expiry_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#training_to').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#training_from').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#sub_commencement_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#asset_return_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#asset_given_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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
  $('#sub_renewal_date').daterangepicker({
     "minDate": moment('1930-06-14'),
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

<div class="modal fade" id="new-qualification" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" data-validate="parsley" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Work Experience</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" class="panel-body wrapper-lg">
                           @include('staff/qualification')
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


<div class="modal fade" id="new-education" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Education</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-employee" class="panel-body wrapper-lg">
                           @include('staff/education')
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

<div class="modal fade" id="new-training" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Training</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-training" class="panel-body wrapper-lg">
                           @include('staff/training')
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


    <div class="modal fade" id="new-skill" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Skill</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-employee" class="panel-body wrapper-lg">
                           @include('staff/skill')
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



  <div class="modal fade" id="new-language" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Language</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-employee" class="panel-body wrapper-lg">
                           @include('staff/language')
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

    <div class="modal fade" id="new-license" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add License</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-employee" class="panel-body wrapper-lg">
                           @include('staff/license')
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


 <div class="modal fade" id="new-emergency-contact" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Emergency Contact</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-employee" class="panel-body wrapper-lg">
                           @include('staff/emergencycontact')
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



 <div class="modal fade" id="new-dependant" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Dependant</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-employee" class="panel-body wrapper-lg">
                           @include('staff/dependant')
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

    <div class="modal fade" id="new-immigration" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Immigration Details</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-employee" class="panel-body wrapper-lg">
                           @include('staff/immigration')
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


 <div class="modal fade" id="new-reporting-method" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Reporting Methods</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-employee" class="panel-body wrapper-lg">
                           @include('staff/report')
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


<div class="modal fade" id="new-beneficiary" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Beneficiary</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-beneficiary" class="panel-body wrapper-lg">
                           @include('staff/beneficiary')
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


<div class="modal fade" id="new-bank" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Bank</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                          
                           @include('staff/bank')
                       
                        </div>                  
                        </div>
                        </section>
                </section>
         </div>        
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


    <div class="modal fade" id="new-guarantor" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Guarantor</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-beneficiary" class="panel-body wrapper-lg">
                           @include('staff/guarantor')
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


    
<div class="modal fade" id="new-membership" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Membership</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-beneficiary" class="panel-body wrapper-lg">
                           @include('staff/membership')
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


    <div class="modal fade" id="new-travel" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Travel</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-beneficiary" class="panel-body wrapper-lg">
                           @include('staff/travelrequest')
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

  <div class="modal fade" id="new-document" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Attach Document</h4>
        </div>

        <div class="modal-body">
         <div class="fallback">
          <form method="post"  enctype="multipart/form-data" action="/create-document">
          <input type="text" class="form-control" width="1000px" height="40px" name="filename" id="filename" placeholder="Enter file name" /><br>
          <input type="file" class="form-control dropbox" width="500px" height="40px" name="image" /><br>
          <input type="submit" name="submit"  class="btn btn-success btn-s-xs" value="upload" />
          <input type="hidden" name="_token" value="{{ Session::token() }}">
          <input type="hidden" name="selectedid" id="selectedid" value="{{ $employees->staff_id }}">
        </form>
        </div>
          <br>
          <br>
          <br>
              <div class="jumbotron how-to-create">
                <ul>
                    <li>Documents/Images are uploaded as soon as you drop them</li>
                    <li>Maximum allowed size of image is 8MB</li>
                </ul>

            </div>

      </div>
      </div>
      </div>
      </div>

        <div class="modal fade" id="new-profile-picture" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Update Profile Picture</h4>
        </div>

        <div class="modal-body">
         <div class="fallback">
          <form method="post"  enctype="multipart/form-data" action="/update-picture">
          <input type="file" class="form-control dropbox" width="500px" height="40px" name="image" id="image" /><br>
          <input type="submit" name="submit"  class="btn btn-success btn-s-xs" value="upload" />
          <input type="hidden" name="_token" value="{{ Session::token() }}">
          <input type="hidden" name="selectedid" id="selectedid" value="{{ $employees->staff_id }}">
        </form>
        </div>
          <br>
          <br>
          <br>
              <div class="jumbotron how-to-create">
                <ul>
                    <li>Images are uploaded as soon as you drop them</li>
                    <li>Maximum allowed size of image is 8MB</li>
                </ul>

            </div>

      </div>
      </div>
      </div>
      </div>


 <div class="modal fade" id="new-terminate" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Terminate</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-beneficiary" class="panel-body wrapper-lg">
                           @include('staff/terminate')
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


    <div class="modal fade" id="new-asset" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Asset</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-asset" class="panel-body wrapper-lg">
                           @include('staff/asset')
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

     <div class="modal fade" id="new-policy" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Policy</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-policy" class="panel-body wrapper-lg">
                           @include('staff/policy')
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


<script>

function EditBank(id)
{ 

  $.get("/fetch-bank",
          {"id":id},
          function(json)
          {
                $('#new-bank input[name="bank_id"]').val(json.id);
                $('#new-bank input[name="bank_account_number"]').val(json.bank_account_number);
                $('#new-bank select[name="bank_name"]').val(json.bank_name);
                $('#new-bank input[name="account_holder_name"]').val(json.account_holder_name);
                $('#new-bank select[name="bank_account_type"]').val(json.bank_account_type);
                $('#new-bank textarea[name="bank_location"]').val(json.bank_location);
                $('#new-bank button[name="bank_button"]').attr("onclick", 'updateBankDetails()');
              
                 
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function EditExperience(id)
{ 

  $.get("/fetch-experience",
          {"id":id},
          function(json)
          {
                $('#new-qualification input[name="experience_id"]').val(json.id);
                $('#new-qualification input[name="job_experience_company"]').val(json.job_experience_company);
                $('#new-qualification input[name="job_experience_title"]').val(json.job_experience_title);
                $('#new-qualification input[name="qualification_start_date"]').val(json.qualification_start_date);
                $('#new-qualification input[name="qualification_end_date"]').val(json.qualification_end_date);
                $('#new-qualification textarea[name="experience_comment"]').val(json.experience_comment);
                $('#new-qualification button[name="experience_button"]').attr("onclick", 'updateExperienceDetails()');
              
                 
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function EditBeneficiary(id)
{ 

  $.get("/fetch-beneficiary",
          {"id":id},
          function(json)
          {
                $('#new-beneficiary input[name="beneficiary_id"]').val(json.id);
                $('#new-beneficiary input[name="beneficiary_name"]').val(json.beneficiary_name);
                $('#new-beneficiary select[name="beneficiary_relationship"]').val(json.beneficiary_relationship);
                $('#new-beneficiary input[name="beneficiary_dob"]').val(json.beneficiary_dob);
                $('#new-beneficiary textarea[name="beneficiary_postal_address"]').val(json.beneficiary_postal_address);
                $('#new-beneficiary textarea[name="beneficiary_residential_address"]').val(json.beneficiary_residential_address);
                $('#new-beneficiary input[name="beneficiary_mobile"]').val(json.beneficiary_mobile);
                $('#new-beneficiary input[name="beneficiary_home_phone"]').val(json.beneficiary_home_phone);
                $('#new-beneficiary button[name="btnbeneficiary"]').attr("onclick", 'updateBeneficiaryDetails()');
              
                 
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}


function EditEducation(id)
{ 

  $.get("/fetch-education-details",
          {"id":id},
          function(json)
          {
                $('#new-education input[name="education_id"]').val(json.id);
                $('#new-education select[name="level"]').val(json.level);
                $('#new-education input[name="school"]').val(json.school);
                $('#new-education input[name="major_specialization"]').val(json.major_specialization);
                $('#new-education input[name="complete_year"]').val(json.complete_year);
                $('#new-education input[name="gpa"]').val(json.gpa);
                $('#new-education input[name="school_start_date"]').val(json.school_start_date);
                $('#new-education input[name="school_end_date"]').val(json.school_end_date);

                $('#new-education button[name="btneducation"]').attr("onclick", 'updateEducationDetails()');
              
                 
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function EditSkill(id)
{ 

  $.get("/fetch-skill-details",
          {"id":id},
          function(json)
          {
                $('#new-skill input[name="skill_id"]').val(json.id);
                $('#new-skill input[name="special_skill"]').val(json.special_skill);
                $('#new-skill input[name="year_of_experience"]').val(json.year_of_experience);
                $('#new-skill textarea[name="comment"]').val(json.comment);
                $('#new-skill button[name="btnskill"]').attr("onclick", 'updateSkillDetails()');
              
                 
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function EditLanguage(id)
{ 

  $.get("/fetch-language-details",
          {"id":id},
          function(json)
          {
                $('#new-language input[name="language_id"]').val(json.id);
                $('#new-language select[name="language"]').val(json.language);
                $('#new-language select[name="language_skill"]').val(json.skill);
                $('#new-language select[name="fluency"]').val(json.fluency);
                $('#new-language textarea[name="comment"]').val(json.comment);
                $('#new-language button[name="btnlanguage"]').attr("onclick", 'updateLanguageDetails()');
     
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}


function EditLicense(id)
{ 

  $.get("/fetch-license-details",
          {"id":id},
          function(json)
          {
                $('#new-license input[name="license_id"]').val(json.id);
                $('#new-license select[name="license_type"]').val(json.license_type);
                $('#new-license input[name="license_number"]').val(json.license_number);
                $('#new-license input[name="license_start_date"]').val(json.issued_date);
                $('#new-license input[name="license_end_date"]').val(json.expiry_date);
                 $('#new-license textarea[name="comment"]').val(json.comment);
                $('#new-license button[name="btnlicense"]').attr("onclick", 'updateLicenseDetails()');
     
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function EditMembership(id)
{ 

  $.get("/fetch-memberships-details",
          {"id":id},
          function(json)
          {
                $('#new-membership input[name="membership_id"]').val(json.id);
                $('#new-membership select[name="sub_type"]').val(json.sub_type);
                $('#new-membership select[name="sub_paid_by"]').val(json.sub_paid_by);
                $('#new-membership input[name="sub_amount"]').val(json.sub_amount);
                $('#new-membership input[name="sub_currency"]').val(json.sub_currency);
                $('#new-membership input[name="sub_commencement_date"]').val(json.sub_commencement_date);
                $('#new-membership input[name="sub_renewal_date"]').val(json.sub_renewal_date);
                $('#new-membership button[name="btnmembership"]').attr("onclick", 'updateMembershipDetails()');
     
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function EditEmergency(id)
{ 

  $.get("/fetch-emergency-details",
          {"id":id},
          function(json)
          {
                $('#new-emergency-contact input[name="emergency_id"]').val(json.id);
                $('#new-emergency-contact input[name="kin_name"]').val(json.kin_name);
                $('#new-emergency-contact select[name="kin_relationship"]').val(json.kin_relationship);
                $('#new-emergency-contact input[name="emergency_dob"]').val(json.emergency_dob);
                $('#new-emergency-contact textarea[name="kin_postal"]').val(json.kin_postal);
                $('#new-emergency-contact textarea[name="kin_residential"]').val(json.kin_residential);
                $('#new-emergency-contact input[name="kin_home_phone"]').val(json.kin_home_phone);
                $('#new-emergency-contact input[name="kin_mobile"]').val(json.kin_mobile);
                $('#new-emergency-contact button[name="btnemergency"]').attr("onclick", 'updateEmergencyDetails()');
     
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function EditGuarantor(id)
{ 

  $.get("/fetch-guarantor-details",
          {"id":id},
          function(json)
          {
                $('#new-guarantor input[name="guarantor_id"]').val(json.id);
                $('#new-guarantor input[name="guarantor_name"]').val(json.guarantor_name);
                $('#new-guarantor textarea[name="guarantor_postal_address"]').val(json.guarantor_postal_address);
                $('#new-guarantor textarea[name="guarantor_residential_address"]').val(json.guarantor_residential_address);
                $('#new-guarantor input[name="guarantor_office_phone"]').val(json.guarantor_office_phone);
                $('#new-guarantor input[name="guarantor_mobile"]').val(json.guarantor_mobile);
                $('#new-guarantor button[name="btnguarantor"]').attr("onclick", 'updateGuarantorDetails()');
     
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}

function EditDependent(id)
{ 

  $.get("/fetch-dependent-details",
          {"id":id},
          function(json)
          {
                $('#new-dependant input[name="dependant_id"]').val(json.id);
                $('#new-dependant input[name="dependant_name"]').val(json.name);
                $('#new-dependant select[name="dependant_gender"]').val(json.gender);
                $('#new-dependant select[name="dependant_relationship"]').val(json.relationship);
                $('#new-dependant input[name="dependant_dob"]').val(json.dob);
                $('#new-dependant select[name="dependant_nationality"]').val(json.nationality);
                $('#new-dependant button[name="btndependant"]').attr("onclick", 'updateDependantDetails()');
     
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}



</script>



<script type="text/javascript">
$(document).ready(function () {
    loadJobDetail();
    loadExperienceDetail();
    loadEducationDetail();
    loadSkillDetail();
    loadLanguageDetail();
    loadLicenseDetail();
    loadSalaryDetail();
    loadEmergencyDetail();
    loadDependentDetail();
    loadImmigrationDetail();
    loadReporttoDetail();
    loadGuarantorDetail();
    loadBeneficiaryDetail();
    loadBankDetail();
    loadDocumentDetail();
    loadMembershipDetail();

    $('#nationality').select2();
    $('#job_title').select2();
    $('#job_category').select2();
    $('#department').select2();
    $('#subsidiary').select2();
    $('#employment_status').select2();
    $('#pay_grade').select2();
     $('#reportto_name').select2();
     $('#training_staff').select2();
    $('#asset_staff').select2();

  });
</script>



