
@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li class=""> Employee Management </li>
                 <li class="active"> New Employee </li>   
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
                                        <li><a href="#immigrationrecords" data-toggle="tab"><i class="fa fa-plane text-default"></i> Immigration </a></li>
                                         <li><a href="#employee_reportto" data-toggle="tab"><i class="fa fa-gavel text-default"></i> Report-to </a></li>
                                         <li><a href="#bankinformation" data-toggle="tab"><i class="fa fa-credit-card text-default"></i> Bank Details </a></li>
                                       <li><a href="#documentations" data-toggle="tab"><i class="fa fa-folder text-default"></i> Documents </a></li>
                                        <li><a href="#socialmedia" data-toggle="tab"><i class="fa  fa-facebook-square text-default"></i> Social Media Details </a></li>
                                    
                                  </ul>
                                  <span class="hidden-sm">.</span>
                                </header>

                                 <div class="panel-body">
                                      <div class="tab-content">  
                                            <div class="tab-pane active" id="staffinformation">
                        <div class="clearfix m-b">

                          <a href="#" class="thumb-lg">
                            <img src="/images/{{ $employees->image }}" id="imagePreview"  class="img-circle">

                             <input type="file" height="40px" name="image" id="image" enctype="multipart/form-data">
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
                            <input type="text" rows="3" class="form-control" id="staff_id" readonly="true" name="staff_id" value="{{ $employees->staff_id }}">   
                           @if ($errors->has('staff_id'))
                          <span class="help-block">{{ $errors->first('staff_id') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('staff_type') ? ' has-error' : ''}}">
                            <label>Staff Type</label>
                         <select id="staff_type" name="staff_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select an account --</option>
                          {{--  @foreach($employeestatus as $employeestatus)
                        <option value="{{ $employeestatus->type }}">{{ $employeestatus->type }}</option>
                          @endforeach --}}
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
                        <label for="date_of_birth">Date of birth</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Select your time" value="{{ old('date_of_birth') }}">
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
                          <label>Email</label>
                          <input type="text" class="form-control" id="email" name="email" value="{{ $employees->email }}"> 
                          @if ($errors->has('email'))
                          <span class="help-block">{{ $errors->first('email') }}</span>
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
                            <select id="ssn" name="ssn" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select an account --</option>
                          
                        </select>         
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
                            <select id="nationality" name="nationality" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                             <option value="{{ $employees->nationality}}">{{ $employees->nationality}}</option>
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
                             <select id="id_number" name="id_number" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                             <option value="">-- Not set --</option>
                      {{--     @foreach($sale_channels as $sale_channel)
                        <option value="{{ $sale_channel->channel }}">{{ $sale_channel->channel }}</option>
                          @endforeach  --}}
                        </select>    
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
                            <select id="job_title" name="job_title" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
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
                            <select id="job_category" name="job_category" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
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
                            <select id="department" name="department" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
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
                            <label>Subsidiary</label>
                            <select id="subsidiary" name="subsidiary" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
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
                            <select id="employment_status" name="employment_status" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                         <option value="">-- Not set --</option>
                           @foreach($employeestatus as $employeestatus)
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
                        <label for="date_join">Date Join</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="date_join" id="date_join" placeholder="Select your time" value="{{ old('date_join') }}">
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

                         <div class="tab-pane" id="accountinformation">
                       
                       <section class="panel panel-default">
                                <header class="panel-heading font-bold">Pay</header>
                                <div class="panel-body">
                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('pay_grade') ? ' has-error' : ''}}">
                            <label>Pay Grade</label>
                            <select id="pay_grade" name="pay_grade" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
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
                          <label>Annual Basic Payment</label>
                          <div class="form-group{{ $errors->has('basic_annual') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="basic_annual" name="basic_annual" value="{{ Request::old('basic_annual') ?: '' }}">   
                          @if ($errors->has('basic_annual'))
                          <span class="help-block">{{ $errors->first('basic_annual') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Transporation Allowance</label>
                          <div class="form-group{{ $errors->has('car_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="car_allowance" name="car_allowance" value="{{ Request::old('car_allowance') ?: '' }}">   
                          @if ($errors->has('car_allowance'))
                          <span class="help-block">{{ $errors->first('car_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Cost of Living Allowance</label>
                          <div class="form-group{{ $errors->has('living_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="living_allowance" name="living_allowance" value="{{ Request::old('living_allowance') ?: '' }}">   
                          @if ($errors->has('living_allowance'))
                          <span class="help-block">{{ $errors->first('living_allowance') }}</span>
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
                          <label>Pension Fund (%)</label>
                          <div class="form-group{{ $errors->has('pension_fund_percent') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="pension_fund_percent" name="pension_fund_percent" value="{{ Request::old('pension_fund_percent') ?: '' }}">   
                          @if ($errors->has('pension_fund_percent'))
                          <span class="help-block">{{ $errors->first('pension_fund_percent') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>EPF (%)</label>
                          <div class="form-group{{ $errors->has('epf_deducation_percent') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="epf_deducation_percent" name="epf_deducation_percent" value="{{ Request::old('epf_deducation_percent') ?: '' }}">   
                          @if ($errors->has('epf_deducation_percent'))
                          <span class="help-block">{{ $errors->first('epf_deducation_percent') }}</span>
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
                        <button type="button" onclick="saveSalaryDetails()" class="btn btn-success btn-s-xs">Add</button>
                      </footer>

                        <section class="panel panel-default">
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

                        </div>

                      {{-- end of salary information --}}



                      {{-- Begin qualification information--}}
                      <div class="tab-pane" id="eductioninformation">
                      <section class="panel panel-default">
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

                 <section class="panel panel-default">
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




                <section class="panel panel-default">
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


                <section class="panel panel-default">
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
             
                        <table id="EmergencyTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th>Name</th>
                            <th>Postal Address</th>
                            <th>Residential Address</th>
                            <th>Mobile</th>
                            <th>Home Telephone</th>
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
             
                        <table id="EmergencyTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                              <th>Name</th>
                            <th>Relationship</th>
                            <th>Home Telephone</th>
                            <th>Mobile</th>
                            <th>Address</th>
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
                                 <a href="#new-reporting-method" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
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
                                 <a href="#attach_document" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                        
                            <th>Account Number</th>
                            <th>Financial Institution</th>
                            <th>Account Type</th>
                            <th>Branch Location</th>
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
                 {{--Bank Details--}}


{{-- Bank info --}}
    
                 <div class="tab-pane " id="documentations">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Attachments
                                 <a href="#attach_document" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                        
                            <th>File Name</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Type</th>
                            <th>Date Added</th>
                            <th>Added By</th>
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


 {{-- social Media --}}
    
                 <div class="tab-pane " id="membershipsdetails">
                    <section class="panel panel-default">
                                <header class="panel-heading font-bold">Memberships
                                 <a href="#attach_document" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                        
                            <th>Membership </th>
                            <th>Subscription Paid By</th>
                            <th>Subscription Amount</th>
                            <th>Currency</th>
                            <th>Subscription Commence Date</th>
                            <th>Subscription Renewal Date</th>
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
          "id_type": $('#id_type').val(),
          "id_number":  $('#id_number').val(),    
          "marital_status": $('#marital_status').val(),
          "nationality": $('#nationality').val(),
          "ssn":  $('#ssn').val()    
          //"image":  data
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


function saveSalaryDetails()
{

 // alert($('#staff_id').val());
if($('#staff_id').val()!= "")
{

    $.get('/save-salary-details',
        {
          "staff_id":                $('#staff_id').val(),
           "pay_grade":              $('#pay_grade').val(),
           "currency":               $('#currency').val(),
           "basic_annual":           $('#basic_annual').val(),
          "car_allowance":           $('#car_allowance').val(),
          "living_allowance":        $('#living_allowance').val(),
           "epf_deducation_percent": $('#epf_deducation_percent').val(),
          "pension_fund_percent":    $('#pension_fund_percent').val(),
          "salary_event":             $('#salary_event').val(),
          "salary_start_date":    $('#salary_start_date').val()
        },


        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Experience added!");
         loadSalaryDetail();
        
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
            $('#JobTable tbody').append('<tr><td>1</td><td>'+ value['permanency_date'] +'</td><td>Present</td><td>'+ value['job_title'] +'</td><td>'+ value['employment_status'] +'</td><td>'+ value['job_category'] +'</td><td>'+ value['department'] +'</td><td>Main</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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
            $('#ExperienceTable tbody').append('<tr><td>'+ value['company'] +'</td><td>'+ value['job_title'] +'</td><td>'+ value['date_from'] +'</td><td>'+ value['date_to'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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
            $('#EducationTable tbody').append('<tr><td>'+ value['level'] +'</td><td>'+ value['school'] +'</td><td>'+ value['major_specialization'] +'</td><td>'+ value['school_start_date'] +'</td><td>'+ value['school_end_date'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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
            $('#SkillTable tbody').append('<tr><td>'+ value['special_skill'] +'</td><td>'+ value['year_of_experience'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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
            $('#LanguageTable tbody').append('<tr><td>'+ value['language'] +'</td><td>'+ value['skill'] +'</td><td>'+ value['fluency'] +'</td><td>'+ value['comment'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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
            $('#EmergencyTable tbody').append('<tr><td>'+ value['kin_name'] +'</td><td>'+ value['kin_relationship'] +'</td><td>'+ value['kin_mobile'] +'</td><td>'+ value['kin_home_phone'] +'</td><td>'+ value['kin_office_phone'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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
            $('#DependentTable tbody').append('<tr><td>'+ value['name'] +'</td><td>'+ value['relationship'] +'</td><td>'+ value['dob'] +'</td><td>'+ value['nationality'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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
            $('#ImmigrationTable tbody').append('<tr><td>'+ value['document'] +'</td><td>'+ value['document_id'] +'</td><td>'+ value['issued_at'] +'</td><td>'+ value['issue_date'] +'</td><td>'+ value['expiry_date'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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
            $('#ReporttoTable tbody').append('<tr><td>'+ value['name'] +'</td><td>'+ value['type'] +'</td><td>'+ value['reporting_mode'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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
            $('#LicenseTable tbody').append('<tr><td>'+ value['license_type'] +'</td><td>'+ value['license_number'] +'</td><td>'+ value['issued_date'] +'</td><td>'+ value['expiry_date'] +'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
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

            $('#SalaryTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#SalaryTable tbody').append('<tr><td>'+ value['event'] +'</td><td>'+ value['effective_from'] +'</td><td>Present</td><td>'+ value['pay_grade'] +'</td><td>'+ value['currency'] +'</td><td>'+ value['basic_annual'] +'</td><td>'+ (value['car_allowance']+ value['living_allowance'] )+'</td><td>'+ (((value['pension_fund_percent']/100) * value['basic_annual'])+ ((value['epf_deducation_percent']/100) * value['basic_annual']) )+'</td><td><a a href="#"><i onclick="removeJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }

</script>

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function () {
  $('#date_join').daterangepicker({
     "minDate": moment('2010-06-14'),
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
     "minDate": moment('2010-06-14'),
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
     "minDate": moment('2010-06-14'),
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
     "minDate": moment('1950-06-14'),
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
     "minDate": moment('1950-06-14'),
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
  $('#qualification_end_date').daterangepicker({
     "minDate": moment('1950-06-14'),
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
  $('#school_end_date').daterangepicker({
     "minDate": moment('1950-06-14'),
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
  $('#school_start_date').daterangepicker({
     "minDate": moment('1950-06-14'),
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
  $('#license_start_date').daterangepicker({
     "minDate": moment('1950-06-14'),
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
  $('#dependant_dob').daterangepicker({
     "minDate": moment('1950-06-14'),
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
     "minDate": moment('1950-06-14'),
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
  $('#emergency_dob').daterangepicker({
     "minDate": moment('1950-06-14'),
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
     "minDate": moment('1950-06-14'),
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
  $('#salary_start_date').daterangepicker({
     "minDate": moment('1950-06-14'),
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
     "minDate": moment('1950-06-14'),
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
  $('#immigration_expiry_date').daterangepicker({
     "minDate": moment('1950-06-14'),
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
  });
</script>



