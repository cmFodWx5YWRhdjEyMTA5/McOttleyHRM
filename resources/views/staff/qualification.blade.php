                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Company</label> 
                            <div class="form-group{{ $errors->has('job_experience_company') ? ' has-error' : ''}}">
                            <input type="text" rows="3" class="form-control" id="job_experience_company" name="job_experience_company" value="{{ Request::old('job_experience_company') ?: '' }}">   
                           @if ($errors->has('job_experience_company'))
                          <span class="help-block">{{ $errors->first('job_experience_company') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('job_experience_title') ? ' has-error' : ''}}">
                            <label>Job Title</label>
                           <input type="text" rows="3" class="form-control" id="job_experience_title" name="job_experience_title" value="{{ Request::old('job_experience_title') ?: '' }}"> 
                           @if ($errors->has('job_experience_title'))
                          <span class="help-block">{{ $errors->first('job_experience_title') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('qualification_start_date')) has-error @endif">
                        <label for="qualification_start_date">From</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="qualification_start_date" id="qualification_start_date" placeholder="Select your time" value="{{ old('qualification_start_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('qualification_start_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('qualification_start_date') }}
                       </p>
                        @endif
                      </div>
                      </div>

                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('qualification_end_date')) has-error @endif">
                        <label for="qualification_end_date">To</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="qualification_end_date" id="qualification_end_date" placeholder="Select your time" value="{{ old('qualification_end_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('qualification_end_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('qualification_end_date') }}
                       </p>
                        @endif
                      </div>
                      </div>
                    </div>
    
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Comments</label> 
                            <div class="form-group{{ $errors->has('experience_comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="experience_comment" name="experience_comment" value="{{ Request::old('experience_comment') ?: '' }}"></textarea>   
                           @if ($errors->has('experience_comment'))
                          <span class="help-block">{{ $errors->first('experience_comment') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveExperienceDetails()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>