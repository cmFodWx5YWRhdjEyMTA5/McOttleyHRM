                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Level</label> 
                            <div class="form-group{{ $errors->has('level') ? ' has-error' : ''}}">
                             <select id="level" name="level" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select level --</option>
                          @foreach($educations as $education)
                            <option value="{{ $education->level }}">{{ $education->level }}</option>
                          @endforeach
                        </select>            
                           @if ($errors->has('level'))
                          <span class="help-block">{{ $errors->first('level') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('school') ? ' has-error' : ''}}">
                            <label>School</label>
                            <input type="text" rows="3" class="form-control" id="school" name="school" value="{{ Request::old('school') ?: '' }}"> 
                           @if ($errors->has('school'))
                          <span class="help-block">{{ $errors->first('school') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                      
                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-4">
                            <label>Major/Specialization</label> 
                            <div class="form-group{{ $errors->has('major_specialization') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="major_specialization" name="major_specialization" value="{{ Request::old('major_specialization') ?: '' }}">   
                           @if ($errors->has('major_specialization'))
                          <span class="help-block">{{ $errors->first('major_specialization') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-2">
                          <div class="form-group{{ $errors->has('complete_year') ? ' has-error' : ''}}">
                            <label>Year</label>
                            <input type="number" rows="3" class="form-control" id="complete_year" name="complete_year" value="{{ Request::old('complete_year') ?: '' }}">          
                           @if ($errors->has('complete_year'))
                          <span class="help-block">{{ $errors->first('complete_year') }}</span>
                           @endif    
                          </div>   
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('gpa') ? ' has-error' : ''}}">
                            <label>GPA/Score</label>
                           <input type="text" rows="3" class="form-control" id="gpa" name="gpa" value="{{ Request::old('gpa') ?: '' }}">        
                           @if ($errors->has('gpa'))
                          <span class="help-block">{{ $errors->first('gpa') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                         <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('school_start_date')) has-error @endif">
                        <label for="school_start_date">From</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="school_start_date" id="school_start_date" placeholder="Select your time" value="{{ old('school_start_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('school_start_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('school_start_date') }}
                       </p>
                        @endif
                      </div>
                      </div>

                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('school_end_date')) has-error @endif">
                        <label for="school_end_date">To</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="school_end_date" id="school_end_date" placeholder="Select your time" value="{{ old('school_end_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('school_end_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('school_end_date') }}
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
                        <button type="button" onclick="saveEducationDetails()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>