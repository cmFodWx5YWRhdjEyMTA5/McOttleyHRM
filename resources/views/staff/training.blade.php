                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                        <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('training_title') ? ' has-error' : ''}}">
                            <label>Training Title</label>
                           <input type="text" rows="3" class="form-control" id="training_title" name="training_title" value="{{ Request::old('training_title') ?: '' }}"> 
                           @if ($errors->has('training_title'))
                          <span class="help-block">{{ $errors->first('training_title') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Description</label> 
                            <div class="form-group{{ $errors->has('training_description') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="training_description" name="training_description" value="{{ Request::old('training_description') ?: '' }}"></textarea>   
                           @if ($errors->has('training_description'))
                          <span class="help-block">{{ $errors->first('training_description') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                         <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_trainer') ? ' has-error' : ''}}">
                            <label>Trainer</label>
                           <input type="text" rows="3" class="form-control" id="training_trainer" name="training_trainer" value="{{ Request::old('training_trainer') ?: '' }}"> 
                           @if ($errors->has('training_trainer'))
                          <span class="help-block">{{ $errors->first('training_trainer') }}</span>
                           @endif    
                          </div>   
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_venue') ? ' has-error' : ''}}">
                            <label>Venue</label>
                           <input type="text" rows="3" class="form-control" id="training_venue" name="training_venue" value="{{ Request::old('training_venue') ?: '' }}"> 
                           @if ($errors->has('training_venue'))
                          <span class="help-block">{{ $errors->first('training_venue') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>



                         <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('training_from')) has-error @endif">
                        <label for="training_from">Start Date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="training_from" id="training_from" placeholder="Select your time" value="{{ old('training_from') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('training_from'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('training_from') }}
                       </p>
                        @endif
                      </div>
                      </div>

                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('training_to')) has-error @endif">
                        <label for="training_to">End date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="training_to" id="training_to" placeholder="Select your time" value="{{ old('training_to') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('training_to'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('training_to') }}
                       </p>
                        @endif
                      </div>
                      </div>
                    </div>

                    <div class="form-group pull-in clearfix">
                         <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_cost') ? ' has-error' : ''}}">
                            <label>Cost</label>
                           <input type="text" rows="3" class="form-control" id="training_cost" name="training_cost" value="{{ Request::old('training_cost') ?: '' }}"> 
                           @if ($errors->has('training_cost'))
                          <span class="help-block">{{ $errors->first('training_cost') }}</span>
                           @endif    
                          </div>   
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_source') ? ' has-error' : ''}}">
                            <label>Training source</label>
                           <input type="text" rows="3" class="form-control" id="training_source" name="training_source" value="{{ Request::old('training_source') ?: '' }}"> 
                           @if ($errors->has('training_source'))
                          <span class="help-block">{{ $errors->first('training_source') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Company sponsored</label> 
                            <div class="form-group{{ $errors->has('training_sponsor') ? ' has-error' : ''}}">
                           <select id="training_sponsor" name="training_sponsor" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select --</option>
                         @foreach($flags as $flag)
                            <option value="{{ $flag->type }}">{{ $flag->type }}</option>
                          @endforeach 
                        </select>         
                           @if ($errors->has('training_sponsor'))
                          <span class="help-block">{{ $errors->first('training_sponsor') }}</span>
                           @endif    
                          </div>
                          </div>
                          <div class="col-sm-6">
                            <label>Reimbursible</label> 
                            <div class="form-group{{ $errors->has('training_reimburse') ? ' has-error' : ''}}">
                           <select id="training_reimburse" name="training_reimburse" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select --</option>
                          @foreach($flags as $flag)
                            <option value="{{ $flag->type }}">{{ $flag->type }}</option>
                          @endforeach 
                        </select>         
                           @if ($errors->has('training_reimburse'))
                          <span class="help-block">{{ $errors->first('training_reimburse') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>
    
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Remarks</label> 
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
                        <button type="button" onclick="savetrainingRequest()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>