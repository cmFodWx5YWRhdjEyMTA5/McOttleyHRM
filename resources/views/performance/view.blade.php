@extends('layouts.default')
@section('content')

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

                        </div>
                      </div>
                    </section>
                   
                  </section>
                </aside>




                <aside class="bg-white">
                  <section class="vbox">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                                     <li class="active"><a href="#kpa" data-toggle="tab"><i class="fa fa-briefcase text-default"></i> {{ $reviewtitle }} </a></li>
                                     <li class="active"><a href="#kpa" data-toggle="tab"> <span class="badge bg-primary"> Manager's Rating : {{ $managerfinal }}%   </span></a></li>
                                       <li class="active"><a href="#kpa" data-toggle="tab"> <span class="badge bg-danger"> Employee's Rating : {{ $employeefinal }}%  </span></a></li>


                    
                      </ul>
                    </header>

                    <section class="scrollable">
                      <div class="tab-content">


                      <div class="tab-pane active" id="goals">
                          
                  @if(strpos($reviewtitle, 'Probation') !== false)
                      
                  <section class="panel panel-default">
                          <div class="panel-body">
 <form  method="post"  data-validate="parsley" action="/save-ratings-performance-review" >
                      <div class="form-group pull-in clearfix">
                                      <div class="col-sm-12">
                                        <label>State your understanding of your main duties and responsibilities. </label> 
                                        <div class="form-group{{ $errors->has('prob_1') ? ' has-error' : ''}}">
                                        <textarea type="text" rows="6" class="form-control" readonly="true" id="prob_1" name="prob_1" value="{{ Request::old('prob_1') ?: '' }}">{{ $kpas[0]->prob_1 }}</textarea>   
                                       @if ($errors->has('prob_1'))
                                      <span class="help-block">{{ $errors->first('prob_1') }}</span>
                                       @endif    
                                      </div>
                                      </div>
                                    </div>


                                      <div class="form-group pull-in clearfix">
                                      <div class="col-sm-12">
                                        <label>How long have you been in the position for which you are being assessed? Has the period been good/bad/satisfactory or otherwise for you, and why? </label> 
                                        <div class="form-group{{ $errors->has('prob_2') ? ' has-error' : ''}}">
                                        <textarea type="text" rows="6" class="form-control" readonly="true" id="prob_2" name="prob_2" value="{{ Request::old('prob_2') ?: '' }}">{{ $kpas[0]->prob_2 }}</textarea>   
                                       @if ($errors->has('prob_2'))
                                      <span class="help-block">{{ $errors->first('prob_2') }}</span>
                                       @endif    
                                      </div>
                                      </div>
                                    </div>



                                      <div class="form-group pull-in clearfix">
                                      <div class="col-sm-12">
                                        <label>What do you consider to be your most important achievements during the period? </label> 
                                        <div class="form-group{{ $errors->has('prob_3') ? ' has-error' : ''}}">
                                        <textarea type="text" rows="6" class="form-control" readonly="true" id="prob_3" name="prob_3" value="{{ Request::old('prob_3') ?: '' }}">{{ $kpas[0]->prob_3 }}</textarea>   
                                       @if ($errors->has('prob_3'))
                                      <span class="help-block">{{ $errors->first('prob_3') }}</span>
                                       @endif    
                                      </div>
                                      </div>
                                    </div>



                                     <div class="form-group pull-in clearfix">
                                      <div class="col-sm-12">
                                        <label>What elements of the job did you find most difficult? </label> 
                                        <div class="form-group{{ $errors->has('prob_4') ? ' has-error' : ''}}">
                                        <textarea type="text" rows="6" class="form-control" readonly="true" id="prob_4" name="prob_4" value="{{ Request::old('prob_4') ?: '' }}">{{ $kpas[0]->prob_4 }}</textarea>   
                                       @if ($errors->has('prob_4'))
                                      <span class="help-block">{{ $errors->first('prob_4') }}</span>
                                       @endif    
                                      </div>
                                      </div>
                                    </div>



                                       <div class="form-group pull-in clearfix">
                                        <div class="col-sm-12">
                                          <label>What elements of the job interest you the most, and least? </label> 
                                          <div class="form-group{{ $errors->has('prob_5') ? ' has-error' : ''}}">
                                          <textarea type="text" rows="6" class="form-control" readonly="true" id="prob_5" name="prob_5" value="{{ Request::old('prob_5') ?: '' }}">{{ $kpas[0]->prob_5 }}</textarea>   
                                         @if ($errors->has('prob_5'))
                                        <span class="help-block">{{ $errors->first('prob_5') }}</span>
                                         @endif    
                                        </div>
                                        </div>
                                      </div>



                                       <div class="form-group pull-in clearfix">
                                        <div class="col-sm-12">
                                          <label>What do you consider to be your most important aims and tasks in the next six months?</label>
                                          <div class="form-group{{ $errors->has('prob_6') ? ' has-error' : ''}}">
                                          <textarea type="text" rows="6" class="form-control" readonly="true"  id="prob_6" name="prob_6" value="{{ Request::old('prob_6') ?: '' }}">{{ $kpas[0]->prob_6 }}</textarea>   
                                         @if ($errors->has('prob_6'))
                                        <span class="help-block">{{ $errors->first('prob_6') }}</span>
                                         @endif    
                                        </div>
                                        </div>
                                      </div>


                                        <div class="form-group pull-in clearfix">
                                        <div class="col-sm-12">
                                          <label>What action could be taken to improve your performance in your current position by you, and your boss?</label>
                                          <div class="form-group{{ $errors->has('prob_9') ? ' has-error' : ''}}">
                                          <textarea type="text" rows="6" class="form-control" id="prob_9" name="prob_9" value="{{ Request::old('prob_9') ?: '' }}">{{ $kpas[0]->prob_9 }}</textarea>   
                                         @if ($errors->has('prob_9'))
                                        <span class="help-block">{{ $errors->first('prob_9') }}</span>
                                         @endif    
                                        </div>
                                        </div>
                                      </div>


                                       <div class="form-group pull-in clearfix">
                                        <div class="col-sm-12">
                                          <label>What kind of work or job would you like to be doing in one/two/five years’ time?</label>
                                          <div class="form-group{{ $errors->has('prob_7') ? ' has-error' : ''}}">
                                          <textarea type="text" rows="6" class="form-control" readonly="true" id="prob_7" name="prob_7" value="{{ Request::old('prob_7') ?: '' }}">{{ $kpas[0]->prob_7 }}</textarea>   
                                         @if ($errors->has('prob_7'))
                                        <span class="help-block">{{ $errors->first('prob_7') }}</span>
                                         @endif    
                                        </div>
                                        </div>
                                      </div>


                                       <div class="form-group pull-in clearfix">
                                        <div class="col-sm-12">
                                          <label>What sort of training/experiences would benefit you in the next year? Not just job-skills - also your natural strengths and personal passions you would like to develop - you and your work can benefit from these.</label>
                                          <div class="form-group{{ $errors->has('prob_8') ? ' has-error' : ''}}">
                                          <textarea type="text" rows="6" class="form-control" readonly="true" id="prob_8" name="prob_8" value="{{ Request::old('prob_8') ?: '' }}">{{ $kpas[0]->prob_8 }}</textarea>   
                                         @if ($errors->has('prob_8'))
                                        <span class="help-block">{{ $errors->first('prob_8') }}</span>
                                         @endif    
                                        </div>
                                        </div>
                                        </div>
                                              

                         <section class="panel panel-warning">
                                  <header class="panel-heading font-bold"> Performance Goal <a href="#new-performancegoal" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a></header>
                                <div class="panel-body">
                                      <div class="table-responsive">

                       
                       <table id="JobTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                         <thead>
                            <tr>
                             <th></th>
                             <th>KRA</th>
                            <th>Weightage %</th>
                            <th>Manager's Rating</th>
                            <th>Employee's Rating</th>
                            <th>Comment</th>
                            <th></th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach( $kpas as $key => $kpa )
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td><input name="question[]" id="question" readonly="true" value="{{ $kpa->kra }}" class="btn btn-rounded btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $kpa->kra }}"></td>
                            <td><input name="weight[]" id="weight"  value="{{ $kpa->weightage }}" readonly="true" class="btn btn-rounded btn-sm xs btn-default"></td>
                            <td><input type="text" id="managerscrore" data-max="5" data-required="true" readonly="true" name="managerscrore[]" value="{{ $kpa->manager }}" placeholder="1 of 5" class="form-control rounded"></td> 
                             <td><input type="text" id="userscore" data-max="5" readonly="true"  name="userscore[]" value="{{ $kpa->employee }}" placeholder="1 of 5" class="form-control rounded"></td> 
                              <td><input name="comment[]" id="comment" value="{{ $kpa->comment }}" class="form-control rounded"></td>
                               <td><a href="#" onclick="deleteDetails('{{ $kpa->id }}','{{ $kpa->kra }}')" id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a></td> 
                          </tr>
                         @endforeach
                          </tbody>
                        </table>
                       
                    </div>           
                  </div>
                </section>

                      
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                           <label>Should the employee be confirmed in his/her present position? </label> 
                       <select id="employee_reason" name="employee_reason"  rows="3" tabindex="1" data-placeholder="Select here.." class="form-control">
                         <option value="{{ $kpas[0]->employee_reason }}">{{ $kpas[0]->employee_reason }}</option>
                        
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        
                         </select>
                         </div>
                         </div>
                        

                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Please give three reasons why the employee should be confirmed/ not confirmed after the probationary period. </label> 
                            <div class="form-group{{ $errors->has('sup_comment_reason') ? ' has-error' : ''}}">
                            <textarea type="text" rows="6" class="form-control" id="sup_comment_reason" readonly="true"  name="sup_comment_reason" value="{{ Request::old('sup_comment_reason') ?: '' }}">{{ $kpas[0]->sup_comment_reason }}</textarea>   
                           @if ($errors->has('sup_comment_reason'))
                          <span class="help-block">{{ $errors->first('sup_comment_reason') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>


                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Head of Department's Comments</label> 
                            <div class="form-group{{ $errors->has('manager_feedback') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="manager_feedback" readonly="true"  name="manager_feedback" value="{{ Request::old('manager_feedback') ?: '' }}">{{ $kpas[0]->manager_feedback }}</textarea>   
                           @if ($errors->has('manager_feedback'))
                          <span class="help-block">{{ $errors->first('manager_feedback') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>



                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>MD’s Comments</label> 
                            <div class="form-group{{ $errors->has('director_feedback') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="director_feedback" readonly="true" name="director_feedback" value="{{ Request::old('director_feedback') ?: '' }}">{{ $kpas[0]->director_feedback }}</textarea>   
                           @if ($errors->has('director_feedback'))
                          <span class="help-block">{{ $errors->first('director_feedback') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>HR’s Comments</label> 
                            <div class="form-group{{ $errors->has('hr_feedback') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="hr_feedback" name="hr_feedback" value="{{ Request::old('hr_feedback') ?: '' }}">{{ $kpas[0]->hr_feedback }}</textarea>   
                           @if ($errors->has('hr_feedback'))
                          <span class="help-block">{{ $errors->first('hr_feedback') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div> 
                        </div>
                </section>

                <footer>
                         <div class="form-group pull-in clearfix">
                          
                             <div class="col-sm-10 form-group">
                                  <div class="form-group">
                             
                          <div class="form-group{{ $errors->has('supervisor') ? ' has-error' : ''}}">
                           <select name="supervisor[]" id="supervisor" data-required="true" style="width:100%" multiple data-placeholder="Select Supervisor / Manager"  >
                          @foreach($supervisors as $supervisor)
                        <option  value="{{ $supervisor->email }}">{{ $supervisor->fullname  }} ---------- {{ $supervisor->job_title  }}</option>
                          @endforeach
                            </select>         
                          @if ($errors->has('supervisor'))
                          <span class="help-block">{{ $errors->first('supervisor') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>

                        <div class="form-group">
                                   
                                <p>   
                                   <button type="submit" class="btn btn-rounded btn-sm btn-info"><i class="fa fa-fw fa-download"></i>Save & Re-Forward Appraisal</button> 
                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input type="hidden" name="reviewid" id="reviewid" value="{{ $kpa->review_token }}">
                                    <input type="hidden" name="reviewtype" id="reviewtype" value="goal">
                                     <input type="hidden" name="staff_id" id="staff_id" value="{{ $employee->obsid  }}">
                                      <input type="hidden" name="staff_id_raw" id="staff_id_raw" value="{{ $employee->staff_id  }}">
                                       <input type="hidden" name="employee_mark" id="employee_mark" value="{{ $employeefinal }}">
                                     <input type="hidden" name="manager_mark" id="manager_mark" value="{{ $managerfinal }}">
                            </p>
                            </div>
                        </div>


                        </footer>

                  @else
                    
                    <section class="panel panel-warning">
                                  <header class="panel-heading font-bold"> Performance Goal <a href="#new-performancegoal" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a></header>
                                <div class="panel-body">
                                      <div class="table-responsive">

                        <form  method="post"  data-validate="parsley" action="/save-ratings-performance-review" >
                       <table id="JobTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                         <thead>
                            <tr>
                             <th></th>
                             <th>KRA</th>
                            <th>Weightage %</th>
                            <th>Manager's Rating</th>
                            <th>Employee's Rating</th>
                            <th>Comment</th>
                            <th></th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach( $kpas as $key => $kpa )
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td><input name="question[]" id="question" readonly="true" value="{{ $kpa->kra }}" class="btn btn-rounded btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $kpa->kra }}"></td>

                            <td><input type="text" id="weight" data-max="100" name="weight[]" readonly="true" value="{{ $kpa->weightage }}" placeholder="%" class="form-control rounded"></td>

                            <td><input type="text" id="managerscrore" data-max="5" data-required="true" readonly="true" name="managerscrore[]" value="{{ $kpa->manager }}" placeholder="1 of 5" class="form-control rounded"></td> 
                             <td><input type="text" id="userscore" data-max="5" readonly="true"  name="userscore[]" value="{{ $kpa->employee }}" placeholder="1 of 5" class="form-control rounded"></td> 
                              <td><input name="comment[]" id="comment" value="{{ $kpa->comment }}" class="form-control rounded"></td>
          
                             

                               <td><a href="#" onclick="deleteDetails('{{ $kpa->id }}','{{ $kpa->kra }}')" id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a></td> 
                          </tr>
                         @endforeach
                          </tbody>

                           <footer>

                           <div class="form-group pull-in clearfix">
                           <div class="col-sm-3">
                           <p>
                          <span class="badge bg-primary"> Manager's Rating : {{ $managerfinal }}%   </span>
                          </p>
                          <p>
                         <span class="badge bg-danger"> Employee's Rating : {{ $employeefinal }}%  </span>
                         </p>
                         </div>
                             <div class="col-sm-6 form-group">
                                  <div class="form-group">
                             
                          <div class="form-group{{ $errors->has('supervisor') ? ' has-error' : ''}}">
                           <select name="supervisor[]" id="supervisor" data-required="true" style="width:100%" multiple data-placeholder="Select Supervisor / Manager"  >
                          @foreach($supervisors as $supervisor)
                        <option  value="{{ $supervisor->email }}">{{ $supervisor->fullname  }} ---------- {{ $supervisor->job_title  }}</option>
                          @endforeach
                            </select>         
                          @if ($errors->has('supervisor'))
                          <span class="help-block">{{ $errors->first('supervisor') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>

                        <div class="form-group pull-right">
                                   
                                <p>   
                                  <button type="submit" class="btn btn-rounded btn-sm btn-info"><i class="fa fa-fw fa-download"></i>Save Review</button> 
                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input type="hidden" name="reviewid" id="reviewid" value="{{ $kpa->review_token }}">
                                    <input type="hidden" name="reviewtype" id="reviewtype" value="goal">
                                     <input type="hidden" name="staff_id" id="staff_id" value="{{ $employee->obsid  }}">
                                     <input type="hidden" name="staff_id_raw" id="staff_id_raw" value="{{ $employee->staff_id  }}">

                                      <input type="hidden" name="employee_mark" id="employee_mark" value="{{ $employeefinal }}">
                                     <input type="hidden" name="manager_mark" id="manager_mark" value="{{ $managerfinal }}">
                                     
                            </p>
                            </div>
                        </div>




                        </footer>
                        </table>
                       
                    </div>           
                  </div>
                </section>


                    
                    <section class="panel panel-default">
                    <header class="panel-heading font-bold"></header>
                        <div class="panel-body">
                                 
                                    <div class="form-group">
                                      <label>Reasons behind the ratings given in the above objectives.</label>
                                      <textarea type="text" rows="3"  class="form-control"  id="employee_reason" name="employee_reason" value="{{ Request::old('employee_reason') ?: '' }}">{{ $kpa->employee_reason }}</textarea>
                                    </div>
                                     <div class="form-group">
                                      <label>Supervisor’s Comment(s) on the reasons above</label>
                                       <textarea type="text" rows="3" class="form-control" readonly="true" id="sup_comment_reason" name="sup_comment_reason" value="{{ Request::old('sup_comment_reason') ?: '' }}">{{ $kpa->sup_comment_reason }}</textarea>
                                    </div>


                                     <div class="form-group">
                                      <label>State the main challenges you had during the period under review.</label>
                                       <textarea type="text" rows="3"  class="form-control"  id="challenges" name="challenges" value="{{ Request::old('challenges') ?: '' }}">{{ $kpa->challenges }}</textarea>
                                    </div>

                                     <div class="form-group">
                                      <label>If there were any failures on your part, please state them and provide reasons.</label>
                                      <textarea type="text" rows="3"  class="form-control"  id="failures" name="failures" value="{{ Request::old('failures') ?: '' }}">{{ $kpa->failures }}</textarea>
                                    </div>

                                     <div class="form-group">
                                      <label>What is your strategy for the next reporting period (i.e. month/quarter)</label>
                                       <textarea type="text" rows="3" class="form-control"  id="strategy" name="strategy" value="{{ Request::old('strategy') ?: '' }}">{{ $kpa->strategy }}</textarea>
                                    </div>


                                    <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Head of Department's Comments</label> 
                            <div class="form-group{{ $errors->has('manager_feedback') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" readonly="true" id="manager_feedback" name="manager_feedback" value="{{ Request::old('manager_feedback') ?: '' }}">{{ $kpa->manager_feedback }}</textarea>   
                           @if ($errors->has('manager_feedback'))
                          <span class="help-block">{{ $errors->first('manager_feedback') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>



                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>MD’s Comments</label> 
                            <div class="form-group{{ $errors->has('director_feedback') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="director_feedback" readonly="true" name="director_feedback" value="{{ Request::old('director_feedback') ?: '' }}">{{ $kpa->director_feedback }}</textarea>   
                           @if ($errors->has('director_feedback'))
                          <span class="help-block">{{ $errors->first('director_feedback') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div> 


                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>HR’s Comments</label> 
                            <div class="form-group{{ $errors->has('hr_feedback') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="hr_feedback" readonly="true" name="hr_feedback" value="{{ Request::old('hr_feedback') ?: '' }}">{{ $kpa->hr_feedback }}</textarea>   
                           @if ($errors->has('hr_feedback'))
                          <span class="help-block">{{ $errors->first('hr_feedback') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div> 
                                   
                         </div>
                      </section>

                      @endif
                        </div>
                      </form>
                        






                        

     

                  
                  
                        </div>
                      </section>

                    </section>

                </aside>
               
                    </section>
                    </section>
                    
       

  @stop

 

  <script src="{{ asset('/event_components/jquery.min.js')}}"></script>


<script type="text/javascript">


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


  function deleteDetails(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+ name +" from goal list?",   
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
          $.get('/delete-performance-goal',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
             
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
    $('#supervisor').select2();
    

  });
</script>












