                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Employee</label> 
                            <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : ''}}">
                             <select id="staff_id" name="staff_id" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%" data-required="true">
                          <option value="">-- Select employee --</option>
                          @foreach($employees as $employee)
                            <option value="{{ $employee->fullname }}">{{ $employee->fullname }}</option>
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
                            <div class="form-group{{ $errors->has('case') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" name="case" id="case" value="{{ old('case') }}" data-required="true">         
                           @if ($errors->has('case'))
                          <span class="help-block">{{ $errors->first('case') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>


    
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Description</label> 
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                            <textarea type="text" rows="6" class="form-control" id="description" name="description" value="{{ Request::old('description') ?: '' }}"></textarea>   
                           @if ($errors->has('description'))
                          <span class="help-block">{{ $errors->first('description') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>