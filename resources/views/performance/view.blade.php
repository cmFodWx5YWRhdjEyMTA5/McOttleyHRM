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
                                     <li class="active"><a href="#kpa" data-toggle="tab"><i class="fa fa-briefcase text-default"></i> Performance Review </a></li>

                                      <li><a href="#feeback" data-toggle="tab"><i class="fa fa-star-o text-default"></i> Feedback </a></li>
                                     
                                       
                                        
                      </ul>
                    </header>

                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="kpa">
                             <section class="panel panel-warning">
                                  <header class="panel-heading font-bold"> Performance Goal </header>
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
                            @foreach( $kpa as $key => $kpa )
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td><input name="question[]" id="question" readonly="true" value="{{ $kpa->kra }}" class="btn btn-rounded btn-sm btn-default"></td>
                            <td><input name="weight[]" id="weight" readonly="true" value="{{ $kpa->weightage }}" class="btn btn-rounded btn-sm xs btn-default"></td>
                            <td><input type="text" id="managerscrore" data-max="5" readonly="true" name="managerscrore[]" value="{{ $kpa->manager }}" placeholder="0 of 5" class="form-control rounded"></td> 
                             <td><input type="text" id="userscore" data-max="5" readonly="true" name="userscore[]" value="{{ $kpa->employee }}" placeholder="0 of 5" class="form-control rounded"></td> 
                              <td><input name="comment[]" id="comment" value="{{ $kpa->comment }}" class="form-control rounded"></td>
                          </tr>
                         @endforeach
                          </tbody>

                           <footer>
                          <span class="badge bg-primary"> Manager's Rating : {{ $managerfinal }}%   </span>
                         <span class="badge bg-danger"> Employee's Rating : {{ $employeefinal }}%  </span>
                          <div class="btn-group pull-right">
                            <p>
                                  <button type="submit" class="btn btn-rounded btn-sm btn-info"><i class="fa fa-fw fa-download"></i>Save</button> 
                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input type="hidden" name="reviewid" id="reviewid" value="{{ $kpa->review_token }}">
                                    <input type="hidden" name="reviewtype" id="reviewtype" value="goal">
                                     <input type="hidden" name="staff_id" id="staff_id" value="{{ $employee->obsid  }}">
                                     <input type="hidden" name="staff_id_raw" id="staff_id_raw" value="{{ $employee->staff_id  }}">
                                       <input type="hidden" name="employee_mark" id="employee_mark" value="{{ $employeefinal }}">
                                     <input type="hidden" name="manager_mark" id="manager_mark" value="{{ $managerfinal }}">

                                  <a href="#" class="btn btn-rounded btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Cancel</a>
                                  <a href="#" class="btn btn-rounded btn-sm btn-default"><i class="fa fa-fw fa-print"></i> Print </a>
                            </p>
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
                                      <textarea type="text" rows="3"  class="form-control" readonly="true" id="employee_reason" name="employee_reason" value="{{ Request::old('employee_reason') ?: '' }}">{{ $kpa->employee_reason }}</textarea>
                                    </div>
                                     <div class="form-group">
                                      <label>Supervisor’s Comment(s) on the reasons above</label>
                                       <textarea type="text" rows="3" class="form-control" readonly="true"  readonly="true"  id="sup_comment_reason" name="sup_comment_reason" value="{{ Request::old('sup_comment_reason') ?: '' }}">{{ $kpa->sup_comment_reason }}</textarea>
                                    </div>


                                     <div class="form-group">
                                      <label>State the main challenges you had during the period under review.</label>
                                       <textarea type="text" rows="3"  class="form-control" readonly="true" id="challenges" name="challenges" value="{{ Request::old('challenges') ?: '' }}">{{ $kpa->challenges }}</textarea>
                                    </div>

                                     <div class="form-group">
                                      <label>If there were any failures on your part, please state them and provide reasons.</label>
                                      <textarea type="text" rows="3"  class="form-control" readonly="true" id="failures" name="failures" value="{{ Request::old('failures') ?: '' }}">{{ $kpa->failures }}</textarea>
                                    </div>

                                     <div class="form-group">
                                      <label>What is your strategy for the next reporting period (i.e. month/quarter)</label>
                                       <textarea type="text" rows="3" class="form-control" readonly="true" id="strategy" name="strategy" value="{{ Request::old('strategy') ?: '' }}">{{ $kpa->strategy }}</textarea>
                                    </div>


                                    <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Head of Department's Comments</label> 
                            <div class="form-group{{ $errors->has('manager_feedback') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" readonly="true"  id="manager_feedback" name="manager_feedback" value="{{ Request::old('manager_feedback') ?: '' }}">{{ $kpa->manager_feedback }}</textarea>   
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
                            <textarea type="text" rows="3" class="form-control" readonly="true"  id="director_feedback" name="director_feedback" value="{{ Request::old('director_feedback') ?: '' }}">{{ $kpa->director_feedback }}</textarea>   
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
                            <textarea type="text" rows="3" class="form-control" id="hr_feedback" name="hr_feedback" value="{{ Request::old('hr_feedback') ?: '' }}">{{ $kpa->hr_feedback }}</textarea>   
                           @if ($errors->has('hr_feedback'))
                          <span class="help-block">{{ $errors->first('hr_feedback') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div> 
                                
                                   
                                   
                                  
                                </div>
                              </section>
                        </div>
                       






                        <div class="tab-pane" id="skillset">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                           </form>

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




                    <div class="tab-pane" id="goals">
                        <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                        <section class="panel panel-warning">
                                <header class="panel-heading font-bold">Goals</header>
                                <div class="panel-body">
                                      <div class="table-responsive">

                      <table id="leaveTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                             <th>Goal Name</th>
                            <th>Start Date </th>
                            <th>Due Date</th>
                            <th>Priorty</th>
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












