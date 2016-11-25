                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Employee</label> 
                            <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : ''}}">
                             <select id="staff_id" name="staff_id" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
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
                          <div class="col-sm-6">
                            <label>Case Name</label> 
                            <div class="form-group{{ $errors->has('case_name') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" name="case_name" id="date_join" value="{{ old('case_name') }}">         
                           @if ($errors->has('case_name'))
                          <span class="help-block">{{ $errors->first('case_name') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>


    
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Description</label> 
                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="6" class="form-control" id="comment" name="comment" value="{{ Request::old('comment') ?: '' }}"></textarea>   
                           @if ($errors->has('comment'))
                          <span class="help-block">{{ $errors->first('comment') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveCase()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>