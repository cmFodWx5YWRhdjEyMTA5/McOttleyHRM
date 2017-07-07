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
                        <div class="btn-group btn-group-justified m-b">
                          <a href="/periodic-performance-review" class="btn btn-primary btn-rounded">
                            
                              <i class="fa fa-sign-in"></i> Foward Appraisal
                           
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

                        </div>
                      </div>
                    </section>
                   
                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                                       <li class="active"><a href="#goals" data-toggle="tab"><i class="fa fa-signal text-default"></i> Performance Goals </a></li>

                                     <li ><a href="#kpa" data-toggle="tab"><i class="fa fa-briefcase text-default"></i> Key Result Area </a></li>

                                       <li><a href="#skillset" data-toggle="tab"><i class="fa fa-trophy text-default"></i> Skill Set </a></li>
                                       
                                       <li><a href="#audit" data-toggle="tab"><i class="fa fa-bars text-default"></i> Job Audit </a></li>


                                      <li><a href="#feedback" data-toggle="tab"><i class="fa fa-money text-default"></i> Feedback </a></li>

                                       <li><a href="#initiate" data-toggle="tab"><i class="fa fa-user text-default"></i> Self Appraisal </a></li>
                                       
                                        
                      </ul>
                    </header>

                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane" id="kpa">
                             <section class="panel panel-warning">
                                  <header class="panel-heading font-bold"> KRA vrs Goal - Probabtion</header>
                                <div class="panel-body">
                                      <div class="table-responsive">

                        <form  method="post"  data-validate="parsley" action="/save-ratings" >
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
                            @foreach( $kpa as $key => $kpa )
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td><input name="question[]" id="question" readonly="true" value="{{ $kpa->question }}" class="btn btn-rounded btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $kpa->tooltip }}"></td>
                            <td><input name="weight[]" id="weight" readonly="true" value="{{ $kpa->weightage }}" class="btn btn-rounded btn-sm xs btn-default"></td>
                            <td><input type="text" id="managerscrore" data-max="5" readonly="true" name="managerscrore[]" value="" placeholder="0 of 5" class="form-control rounded"></td> 
                             <td><input type="text" id="userscore" data-max="5" name="userscore[]" value="" placeholder="0 of 5" class="form-control rounded"></td> 
                              <td><input name="comment[]" id="comment" value="" class="form-control rounded"></td>
                          </tr>
                         @endforeach
                          </tbody>

                           <footer>
                          <div class="btn-group pull-right">
                            <p>
                                  <button type="submit" class="btn btn-rounded btn-sm btn-info"><i class="fa fa-fw fa-download"></i>Save</button> 
                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input type="hidden" name="reviewid" id="reviewid" value="{{ Session::token() }}">
                                    <input type="hidden" name="staff_id" id="staff_id" value="{{ $employee->obsid  }}">
                                       <input type="hidden" name="reviewtype" id="reviewtype" value="probation">
                                  <a href="#" class="btn btn-rounded btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Cancel</a>
                                  <a href="#" class="btn btn-rounded btn-sm btn-default"><i class="fa fa-fw fa-print"></i> Print </a>
                            </p>
                            </div>
                        </footer>
                        </table>
                          <br>
                          <br>
                          <br>
                        <section class="panel panel-default">
                                <div class="panel-body">

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                           <label>Should the employee be confirmed in his/her present position? </label> 
                       <select id="staff_id" name="staff_id" rows="3" readonly="true" tabindex="1" data-placeholder="Select here.." style="width:100%">
                         <option value="">-- Select option --</option>
                        
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        
                         </select>
                         </div>
                         </div>
                        

                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Please give three reasons why the employee should be confirmed/ not confirmed after the probationary period. </label> 
                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="6" class="form-control" readonly="true" id="comment" name="comment" value="{{ Request::old('comment') ?: '' }}"></textarea>   
                           @if ($errors->has('comment'))
                          <span class="help-block">{{ $errors->first('comment') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>


                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Head of Department's Comments</label> 
                            <div class="form-group{{ $errors->has('manager_feedback') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" readonly="true" id="manager_feedback" name="manager_feedback" value="{{ Request::old('manager_feedback') ?: '' }}"></textarea>   
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
                            <textarea type="text" rows="3" class="form-control" readonly="true" id="director_feedback" name="director_feedback" value="{{ Request::old('director_feedback') ?: '' }}"></textarea>   
                           @if ($errors->has('director_feedback'))
                          <span class="help-block">{{ $errors->first('director_feedback') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>
                        </div>
                </section>
                        </form>
                    </div>           
                  </div>
                </section>
              </div>
                      
                        <div class="tab-pane" id="skillset">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
  

                  <section class="panel panel-warning">
                  <header class="panel-heading font-bold">Skills
                 
                  <a href="#new-skill" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                  </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                   <table id="SkillTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                              <th> Domain </th>
                             <th>Skill</th>
                            <th>Description</th>
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



                    <div class="tab-pane active" id="goals">
                      <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                       <form  method="post"  data-validate="parsley" action="/save-ratings-performance-review" >
                        <section class="panel panel-warning">
                                <header class="panel-heading font-bold">Goals
                                <a href="#new-performancegoal" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      
                      @if($goals->count() > 0)
                      <table id="leaveTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th width="100">Performance Goal</th>
                            <th>Weightage %</th>
                            <th>Manager's Rating</th>
                            <th>Employee's Rating</th>
                            <th>Comment</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach( $goals as $key => $goal )
                          <tr>
                            <td ><input name="question[]" id="question" readonly="true" value="{{ $goal->question }}" class="btn btn-rounded btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $goal->tooltip }}"></td>
                            <td><input name="weight[]" id="weight" readonly="true" value="{{ $goal->weightage }}" class="btn btn-rounded btn-sm xs btn-default"></td>
                            <td><input type="text" id="managerscrore" data-max="5" readonly="true" name="managerscrore[]" value="" placeholder="0 of 5" class="form-control rounded"></td> 
                             <td><input type="text" id="userscore" data-max="5" data-required="true" name="userscore[]" value="" placeholder="0 of 5" class="form-control rounded" data-toggle="tooltip" data-placement="left" title="" data-original-title="
                              (1 = Failed to meet expectations; 2 = Met some but not all expectations; 3 = Met all expectations; 4 = Exceeded expectations; 5 = Outstanding) Please refer to performance rating guidelines on Page 5."></td> 
                              <td><input name="comment[]" id="comment" value="" class="form-control rounded"></td>
                               <td><a href="#" id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a></td> 
                          </tr>
                         @endforeach
                          </tbody>
                            <footer>
                          <div class="btn-group pull-right">
                            <p>
                                  <button type="submit" class="btn btn-rounded btn-sm btn-info"><i class="fa fa-fw fa-download"></i>Save</button> 
                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input type="hidden" name="reviewid" id="reviewid" value="{{ Session::token() }}">
                                    <input type="hidden" name="reviewtype" id="reviewtype" value="goal">
                                     <input type="hidden" name="staff_id" id="staff_id" value="{{ $employee->obsid  }}">
                                  <a href="#" class="btn btn-rounded btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Cancel</a>
                                  <a href="#" class="btn btn-rounded btn-sm btn-default"><i class="fa fa-fw fa-print"></i> Print </a>
                            </p>
                            </div>
                        </footer>
                        </table>
                      @else
                       <div class="panel-body">
                            
                       <div class="h3 m-t-xs m-b-xs">No performance goal found.</div> 
                    </div>
                    @endif

                    </div>           
                </div>
                </section>


                     <section class="panel panel-default">
                    <header class="panel-heading font-bold"></header>
                        <div class="panel-body">
                                 
                                    <div class="form-group">
                                      <label>Reasons behind the ratings given in the above objectives.</label>
                                      <textarea type="text" rows="3" class="form-control" id="employee_reason" name="employee_reason" value="{{ Request::old('employee_reason') ?: '' }}"></textarea>
                                    </div>
                                     <div class="form-group">
                                      <label>Supervisor’s Comment(s) on the reasons above</label>
                                       <textarea type="text" rows="3" readonly="true" class="form-control" id="sup_comment_reason" name="sup_comment_reason" value="{{ Request::old('sup_comment_reason') ?: '' }}"></textarea>
                                    </div>


                                     <div class="form-group">
                                      <label>State the main challenges you had during the period under review.</label>
                                       <textarea type="text" rows="3" class="form-control" id="challenges" name="challenges" value="{{ Request::old('challenges') ?: '' }}"></textarea>
                                    </div>

                                     <div class="form-group">
                                      <label>If there were any failures on your part, please state them and provide reasons.</label>
                                      <textarea type="text" rows="3" class="form-control" id="failures" name="failures" value="{{ Request::old('failures') ?: '' }}"></textarea>
                                    </div>

                                     <div class="form-group">
                                      <label>What is your strategy for the next reporting period (i.e. month/quarter)</label>
                                       <textarea type="text" rows="3" class="form-control" id="strategy" name="strategy" value="{{ Request::old('strategy') ?: '' }}"></textarea>
                                    </div>

                                    <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Head of Department's Comments</label> 
                            <div class="form-group{{ $errors->has('manager_feedback') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" readonly="true" id="manager_feedback" name="manager_feedback" value="{{ Request::old('manager_feedback') ?: '' }}"></textarea>   
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
                            <textarea type="text" rows="3" class="form-control" readonly="true" id="director_feedback" name="director_feedback" value="{{ Request::old('director_feedback') ?: '' }}"></textarea>   
                           @if ($errors->has('director_feedback'))
                          <span class="help-block">{{ $errors->first('director_feedback') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>     
                                </div>
                              </section>

                            </form>
                          </ul>
                          </div>





{{--                           Job Audit --}}
                          <div class="tab-pane" id="audit">
                      <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                       <form  method="post"  data-validate="parsley" action="/save-ratings-performance-review" >
                        <section class="panel panel-warning">
                                <header class="panel-heading font-bold">List up to ten major tasks you perform routinely.
                                <a href="#new-performancegoal" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                      
                      @if($goals->count() > 0)
                      <table id="leaveTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th width="100">Task</th>
                            <th>Comment</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach( $goals as $key => $goal )
                          <tr>
                            <td ><input name="question[]" id="question" readonly="true" value="{{ $goal->question }}" class="form-control rounded" data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $goal->tooltip }}"></td>
                              <td><input name="comment[]" id="comment" value="" class="form-control rounded"></td>
                               <td><a href="#" id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a></td> 
                          </tr>
                         @endforeach
                          </tbody>
                            <footer>
                          <div class="btn-group pull-right">
                            <p>
                                  <button type="submit" class="btn btn-rounded btn-sm btn-info"><i class="fa fa-fw fa-download"></i>Save</button> 
                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input type="hidden" name="reviewid" id="reviewid" value="{{ Session::token() }}">
                                      <input type="hidden" name="reviewtype" id="reviewtype" value="audit">
                                     <input type="hidden" name="staff_id" id="staff_id" value="{{ $employee->obsid  }}">
                                  <a href="#" class="btn btn-rounded btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Cancel</a>
                                  <a href="#" class="btn btn-rounded btn-sm btn-default"><i class="fa fa-fw fa-print"></i> Print </a>
                            </p>
                            </div>
                        </footer>
                        </table>
                      @else
                       <div class="panel-body">
                            
                       <div class="h3 m-t-xs m-b-xs">No task found.</div> 
                    </div>
                    @endif

                    </div>           
                </div>
                </section>


                     <section class="panel panel-default">
                    <header class="panel-heading font-bold"></header>
                        <div class="panel-body">
                                 
                                    <div class="form-group">
                                      <label>Supervisor' Comments</label>
                                      <textarea type="text" rows="3" class="form-control" id="employee_reason" name="employee_reason" value="{{ Request::old('employee_reason') ?: '' }}"></textarea>
                                    </div>
                                     <div class="form-group">
                                      <label>Managing Director’s (Or His/Her Representative’s Comments)</label>
                                       <textarea type="text" rows="3" readonly="true" class="form-control" id="sup_comment_reason" name="sup_comment_reason" value="{{ Request::old('sup_comment_reason') ?: '' }}"></textarea>
                                    </div>                                  
                                </div>
                              </section>

                            </form>
                          </ul>
                          </div>

                  {{-- Dependents--}}
                 <div class="tab-pane " id="feedback">
                    
                 </div>


                        </div>
                      </section>

                    </section>

                </aside>
               
                    </section>
                    </section>
                    
       

  @stop


 <div class="modal fade" id="new-skill" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Skill Set</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-performance" class="panel-body wrapper-lg">
                           @include('performance/skill')
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


     <div class="modal fade" id="new-performancegoal" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Goal</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/add-performance-goals" class="panel-body wrapper-lg">
                           @include('performance/pgoal')
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                         <input type="hidden" name="staff_id" value="{{ $employee->obsid }}">
                         <input type="hidden" name="reviewtype" value="goal">
                      </form>
                        </div>
                  
                  
                        </div>
                        </section>
                        </section>
                      </div>
                    
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


     <div class="modal fade" id="new-performancegoal" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Task</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/add-performance-goals" class="panel-body wrapper-lg">
                           @include('performance/pgoal')
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                         <input type="hidden" name="staff_id" value="{{ $employee->obsid }}">
                         <input type="hidden" name="reviewtype" value="audit">
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


// function addPerformanceGoal()
// {

// if($('#staff_id').val()!= "")
// {

//     $.get('/add-performance-goals',
//         {
//           "staff_id":                 $('#staff_id').val(),
//           "dependant_name":           $('#performancegoal').val(),
//           "dependant_dob":            $('#weightage').val()
         
//         },

//         function(data)
//         { 
          
//           $.each(data, function (key, value) {
//         if(data["OK"])
//         {
//           toastr.success("Goal added!");
//           loadPerformanceGoals();
//           $('#new-performancegoal').modal('toggle')
//         }
//         else
//         {
//           toastr.error("Goal failed to be added!");
//         }
//       });
                                        
//         },'json');
//   }
//   else
//     {
//       sweetAlert("Error adding data!");
//     }
// }

//    function loadPerformanceGoals()
//    {
         
        
//         $.get('/load-performance-goals',
//           {
//             "staff_id": $('#staff_id').val()
//           },
//           function(data)
//           { 

//             $('#DependentTable tbody').empty();
//             $.each(data, function (key, value) 
//             {           
//             $('#DependentTable tbody').append('<tr><td>'+ value['question'] +'</td><td>'+ value['relationship'] +'</td><td>'+ value['dob'] +'</td><td>'+ value['nationality'] +'</td><td><a href="#new-dependant" data-toggle="modal" class="bootstrap-modal-form-open"><i onclick="EditDependent(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-pencil"></i></a></td><td><a a href="#"><i onclick="deleteDependent(\''+value['id']+'\',\''+value['name']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
//             });
                                          
//          },'json');      
//     }





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












