<section class="panel panel-default">
                      <div class="panel-body">
                       
                    
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Name of the Appraisal</label> 
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
                            <input type="text" rows="3" class="form-control" data-required="true" id="title" name="title" value="{{ Request::old('title') ?: '' }}">   
                           @if ($errors->has('title'))
                          <span class="help-block">{{ $errors->first('title') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                        <div class="col-sm-4">
                       <div class="form-group @if($errors->has('appraisal_period')) has-error @endif">
                        <label for="appraisal_period" data-toggle="tooltip" data-placement="right" title="" data-original-title="Period for which the appraisee is to be evaluated.">Appraisal Cycle Period</label>
                        <div class="input-group">
                        <input type="text" class="form-control" data-required="true"  name="appraisal_period" id="appraisal_period" placeholder="Select your time" value="{{ old('appraisal_period') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('appraisal_period'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('appraisal_period') }}
                       </p>
                        @endif
                      </div>
                      </div>

                      <div class="col-sm-4">
                       <div class="form-group @if($errors->has('review_period')) has-error @endif">
                        <label for="review_period" data-toggle="tooltip" data-placement="right" title="" data-original-title="Period in which the appraisal process is conducted for the given appraisal cycle.">Review Period</label>
                        <div class="input-group">
                        <input type="text" class="form-control" data-required="true"  name="review_period" id="review_period" placeholder="Select your time" value="{{ old('review_period') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('review_period'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('review_period') }}
                       </p>
                        @endif
                      </div>
                      </div>



                      <div class="col-sm-4">
                       <div class="form-group @if($errors->has('self_period')) has-error @endif">
                        <label for="self_period" data-toggle="tooltip" data-placement="right" title="" data-original-title="Period during which the appraisee evaluates their own performance.">Self Appraisal Period</label>
                        <div class="input-group">
                        <input type="text" class="form-control" data-required="true"  name="self_period" id="self_period" placeholder="Select your time" value="{{ old('self_period') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('self_period'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('self_period') }}
                       </p>
                        @endif
                      </div>
                      </div>
                      </div>

                      
                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Description</label> 
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" data-required="true"  id="description" name="description" value="{{ Request::old('description') ?: '' }}"></textarea>   
                           @if ($errors->has('description'))
                          <span class="help-block">{{ $errors->first('description') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>


  
                       {{--  <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                         <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                          <label>Appraisal Form Template </label>
                          <input type="file" class="form-control" id="email" value="{{ Request::old('email') ?: '' }}"  name="email" data-toggle="tooltip" data-placement="top" title="" data-original-title="Please be extra careful typing the address. We use it to grant access to the employee's sensitive information.">
                          @if ($errors->has('email'))
                          <span class="help-block">{{ $errors->first('email') }}</span>
                           @endif                        
                        </div>
                        </div>
                        </div>

                        --}}
                        

                     <div class="form-group pull-in clearfix">
                     <div class="col-sm-6">
                         <div class="form-group">
                          <label>Employee</label>
                          <div class="form-group{{ $errors->has('employee') ? ' has-error' : ''}}">
                           <select name="employee[]" id="employee"  style="width:100%" multiple data-placeholder=""  >
                             <option  value="All">All</option>
                          @foreach($employees as $employee)
                        <option  value="{{ $employee->email }}">{{ $employee->fullname }}</option>
                          @endforeach
                            </select>       
                          @if ($errors->has('employee'))
                          <span class="help-block">{{ $errors->first('employee') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>


                         <div class="col-sm-6">
                         <div class="form-group">
                          <label>Business</label>
                          <div class="form-group{{ $errors->has('subsidiary') ? ' has-error' : ''}}">
                           <select name="subsidiary[]" id="subsidiary"  style="width:100%" multiple data-placeholder=""  >
                            <option  value="All">All</option>
                          @foreach($subsidiaries as $subsidiary)
                        <option  value="{{ $subsidiary->name }}">{{ $subsidiary->name }}</option>
                          @endforeach
                            </select>       
                          @if ($errors->has('subsidiary'))
                          <span class="help-block">{{ $errors->first('subsidiary') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                         <div class="form-group">
                          <label>Role</label>
                          <div class="form-group{{ $errors->has('jobtitle') ? ' has-error' : ''}}">
                         <select name="jobtitle[]" id="jobtitle"  style="width:100%" multiple data-placeholder=""  >
                           <option  value="All">All</option>
                          @foreach($jobtitles as $jobtitle)
                        <option  value="{{ $jobtitle->type }}">{{ $jobtitle->type }}</option>
                          @endforeach
                            </select>       
                          @if ($errors->has('jobtitle'))
                          <span class="help-block">{{ $errors->first('jobtitle') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                         <div class="form-group">
                          <label>Department</label>
                          <div class="form-group{{ $errors->has('department') ? ' has-error' : ''}}">
                           <select name="department[]" id="department"   style="width:100%" multiple data-placeholder=""  >
                             <option  value="All">All</option>
                          @foreach($departments as $department)
                        <option  value="{{ $department->name }}">{{ $department->name }}</option>
                          @endforeach
                            </select>         
                          @if ($errors->has('department'))
                          <span class="help-block">{{ $errors->first('department') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        </div> 
                  
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs"> Save Appraisal </button>
                      </footer>
                    </section>