                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Employee</label> 
                            <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : ''}}">
                             <select id="staff_id" name="staff_id" rows="3" data-required="true"  tabindex="1" data-placeholder="Select here.." style="width:100%">
                          <option value="">-- Select employee --</option>
                          @foreach($employees as $employee)
                            <option value="{{ $employee->staff_id }}">{{ $employee->fullname }}</option>
                          @endforeach
                        </select>            
                           @if ($errors->has('staff_id'))
                          <span class="help-block">{{ $errors->first('staff_id') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                      
                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-4">
                            <label>Leave Type</label> 
                            <div class="form-group{{ $errors->has('leave_type') ? ' has-error' : ''}}">
                           <select id="leave_type" name="leave_type" rows="3" data-required="true" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select type --</option>
                          @foreach($leavetypes as $leavetype)
                            <option value="{{ $leavetype->type }}">{{ $leavetype->type }}</option>
                          @endforeach
                        </select>         
                           @if ($errors->has('leave_type'))
                          <span class="help-block">{{ $errors->first('leave_type') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                         <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('leave_from')) has-error @endif">
                        <label for="leave_from">From</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="leave_from" data-required="true" id="leave_from" placeholder="Select your time" value="{{ old('leave_from') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('leave_from'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('leave_from') }}
                       </p>
                        @endif
                      </div>
                      </div>

                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('leave_to')) has-error @endif">
                        <label for="leave_to">To</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="leave_to" data-required="true" id="leave_to" placeholder="Select your time" value="{{ old('leave_to') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('leave_to'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('leave_to') }}
                       </p>
                        @endif
                      </div>
                      </div>
                    </div>
    
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Emergency Contact Details</label> 
                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="comment" name="comment" value="{{ Request::old('comment') ?: '' }}"></textarea>   
                           @if ($errors->has('comment'))
                          <span class="help-block">{{ $errors->first('comment') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>
    {{--                   
                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Handing Over Note</label> 
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : ''}}">
                        <input type="file" class="form-control dropbox" data-required="true" width="1000px" height="40px" id="image" name="image" />
                        </div>
                        </div>
                        </div> --}}


                      <section class="panel panel-default">
                     <header class="panel-heading font-bold">                  
                      Approval By
                    </header>
                      <div class="panel-body">
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-4">
                            <label>Relieving Officer</label> 
                            <div class="form-group{{ $errors->has('reliever') ? ' has-error' : ''}}">
                            <select id="reliever" name="reliever" rows="3" data-required="true"  tabindex="1" data-placeholder="Select here.." style="width:100%">
                          <option value="">-- Select Reliever --</option>
                          @foreach($relievers as $employee)
                            <option value="{{ $employee->staff_id }}">{{ $employee->fullname }}</option>
                          @endforeach 
                        </select>       
                           @if ($errors->has('reliever'))
                          <span class="help-block">{{ $errors->first('reliever') }}</span>
                           @endif    
                          </div>
                          </div>


                          <div class="col-sm-4">
                            <label>Supervisor</label> 
                            <div class="form-group{{ $errors->has('approval_1') ? ' has-error' : ''}}">
                            <select id="approval_1" name="approval_1" rows="3" data-required="true"  tabindex="1" data-placeholder="Select here.." style="width:100%">
                          <option value="">-- Select Supervisor / HOD --</option>
                          @foreach($supervisors as $employee)
                            <option value="{{ $employee->staff_id }}">{{ $employee->fullname }}</option>
                          @endforeach 
                        </select>       
                           @if ($errors->has('approval_1'))
                          <span class="help-block">{{ $errors->first('approval_1') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-4">
                          <div class="form-group{{ $errors->has('approval_2') ? ' has-error' : ''}}">
                            <label>Director</label>
                        <select id="approval_2" name="approval_2" rows="3" data-required="true"  tabindex="1" data-placeholder="Select here.." style="width:100%">
                          <option value="">-- Select  --</option>
                          @foreach($directors as $employee)
                            <option value="{{ $employee->staff_id }}">{{ $employee->fullname }}</option>
                          @endforeach 
                        </select>       
                      
                           @if ($errors->has('approval_2'))
                          <span class="help-block">{{ $errors->first('approval_2') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>
                        </div>
                        </section>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Update</button>
                      </footer>
                    </section>