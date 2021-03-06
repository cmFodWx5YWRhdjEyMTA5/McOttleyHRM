                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">

                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('special_skill') ? ' has-error' : ''}}">
                            <label>Skill</label>
                           <input type="text" rows="3" class="form-control" id="special_skill" name="special_skill" value="{{ Request::old('special_skill') ?: '' }}"> 
                           @if ($errors->has('special_skill'))
                          <span class="help-block">{{ $errors->first('special_skill') }}</span>
                           @endif    
                          </div>   
                        </div>


                          <div class="col-sm-6">
                            <label>Years of Experience</label> 
                            <div class="form-group{{ $errors->has('year_of_experience') ? ' has-error' : ''}}">
                            <input type="number" rows="3" class="form-control" id="year_of_experience" name="year_of_experience" value="{{ Request::old('year_of_experience') ?: '' }}">   
                           @if ($errors->has('year_of_experience'))
                          <span class="help-block">{{ $errors->first('year_of_experience') }}</span>
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
                        <button type="button" onclick="saveSkillDetails()" name="btnskill" class="btn btn-success btn-s-xs">Save</button>
                          <input type="hidden" name="skill_id" id="skill_id" value="{{ Request::old('skill_id') ?: '' }}">
                      </footer>
                    </section>