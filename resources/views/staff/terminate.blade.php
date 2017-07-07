                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('terminate_reason') ? ' has-error' : ''}}">
                            <label>Reason</label>
                            <select id="terminate_reason" name="terminate_reason" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select reason --</option>
                          @foreach($terminate_reasons as $terminate_reason)
                            <option value="{{ $terminate_reason->type }}">{{ $terminate_reason->type }}</option>
                          @endforeach
                        </select>         
                           @if ($errors->has('terminate_reason'))
                          <span class="help-block">{{ $errors->first('terminate_reason') }}</span>
                           @endif    
                          </div>   
                        </div>
                        
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('terminate_date')) has-error @endif">
                        <label for="terminate_date">Separation date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="terminate_date" id="terminate_date" placeholder="Select your time" value="{{ old('terminate_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('terminate_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('terminate_date') }}
                       </p>
                        @endif
                      </div>
                      </div>
                    </div>


                    <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>What did you like the most of the organization</label> 
                            <div class="form-group{{ $errors->has('terminate_comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="terminate_comment" name="terminate_comment" value="{{ Request::old('terminate_comment') ?: '' }}"></textarea>   
                           @if ($errors->has('terminate_comment'))
                          <span class="help-block">{{ $errors->first('terminate_comment') }}</span>
                           @endif    
                          </div>
                          </div>

                            <div class="col-sm-6">
                            <label>Think the organization do to improve staff welfare</label> 
                            <div class="form-group{{ $errors->has('terminate_comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="terminate_comment" name="terminate_comment" value="{{ Request::old('terminate_comment') ?: '' }}"></textarea>   
                           @if ($errors->has('terminate_comment'))
                          <span class="help-block">{{ $errors->first('terminate_comment') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Anything you wish to share with us</label> 
                            <div class="form-group{{ $errors->has('terminate_comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="terminate_comment" name="terminate_comment" value="{{ Request::old('terminate_comment') ?: '' }}"></textarea>   
                           @if ($errors->has('terminate_comment'))
                          <span class="help-block">{{ $errors->first('terminate_comment') }}</span>
                           @endif    
                          </div>
                          </div>

                            <div class="col-sm-6">
                            <label>Would you like working for this organization again</label> 
                            <div class="form-group{{ $errors->has('terminate_comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="terminate_comment" name="terminate_comment" value="{{ Request::old('terminate_comment') ?: '' }}"></textarea>   
                           @if ($errors->has('terminate_comment'))
                          <span class="help-block">{{ $errors->first('terminate_comment') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>



                    <div class="form-group pull-in clearfix">
                         <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_trainer') ? ' has-error' : ''}}">
                            <label>Company Vehicle handed in</label>
                           <input type="text" rows="3" class="form-control" id="training_trainer" name="training_trainer" value="{{ Request::old('training_trainer') ?: '' }}"> 
                           @if ($errors->has('training_trainer'))
                          <span class="help-block">{{ $errors->first('training_trainer') }}</span>
                           @endif    
                          </div>   
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_venue') ? ' has-error' : ''}}">
                            <label>All equipments handed in</label>
                           <input type="text" rows="3" class="form-control" id="training_venue" name="training_venue" value="{{ Request::old('training_venue') ?: '' }}"> 
                           @if ($errors->has('training_venue'))
                          <span class="help-block">{{ $errors->first('training_venue') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                         <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_trainer') ? ' has-error' : ''}}">
                            <label>All library books submitted</label>
                           <input type="text" rows="3" class="form-control" id="training_trainer" name="training_trainer" value="{{ Request::old('training_trainer') ?: '' }}"> 
                           @if ($errors->has('training_trainer'))
                          <span class="help-block">{{ $errors->first('training_trainer') }}</span>
                           @endif    
                          </div>   
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_venue') ? ' has-error' : ''}}">
                            <label>Security</label>
                           <input type="text" rows="3" class="form-control" id="training_venue" name="training_venue" value="{{ Request::old('training_venue') ?: '' }}"> 
                           @if ($errors->has('training_venue'))
                          <span class="help-block">{{ $errors->first('training_venue') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                         <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_trainer') ? ' has-error' : ''}}">
                            <label>Exit interview conducted</label>
                           <input type="text" rows="3" class="form-control" id="training_trainer" name="training_trainer" value="{{ Request::old('training_trainer') ?: '' }}"> 
                           @if ($errors->has('training_trainer'))
                          <span class="help-block">{{ $errors->first('training_trainer') }}</span>
                           @endif    
                          </div>   
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_venue') ? ' has-error' : ''}}">
                            <label>Notice period followed</label>
                           <input type="text" rows="3" class="form-control" id="training_venue" name="training_venue" value="{{ Request::old('training_venue') ?: '' }}"> 
                           @if ($errors->has('training_venue'))
                          <span class="help-block">{{ $errors->first('training_venue') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                         <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_trainer') ? ' has-error' : ''}}">
                            <label>Resignation letter submitted</label>
                           <input type="text" rows="3" class="form-control" id="training_trainer" name="training_trainer" value="{{ Request::old('training_trainer') ?: '' }}"> 
                           @if ($errors->has('training_trainer'))
                          <span class="help-block">{{ $errors->first('training_trainer') }}</span>
                           @endif    
                          </div>   
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('training_venue') ? ' has-error' : ''}}">
                            <label>Manager/Supervisor clearance</label>
                           <input type="text" rows="3" class="form-control" id="training_venue" name="training_venue" value="{{ Request::old('training_venue') ?: '' }}"> 
                           @if ($errors->has('training_venue'))
                          <span class="help-block">{{ $errors->first('training_venue') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                      
                        
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Comments</label> 
                            <div class="form-group{{ $errors->has('terminate_comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="terminate_comment" name="terminate_comment" value="{{ Request::old('terminate_comment') ?: '' }}"></textarea>   
                           @if ($errors->has('terminate_comment'))
                          <span class="help-block">{{ $errors->first('terminate_comment') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="doTermination()" class="btn btn-success btn-s-xs">Confirm</button>
                      </footer>
                    </section>