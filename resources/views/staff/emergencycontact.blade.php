                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('kin_name') ? ' has-error' : ''}}">
                            <label>Name</label>
                            <input type="text" rows="3" class="form-control" id="kin_name" name="kin_name" value="{{ Request::old('kin_name') ?: '' }}"> 
                           @if ($errors->has('kin_name'))
                          <span class="help-block">{{ $errors->first('kin_name') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Relationship</label> 
                            <div class="form-group{{ $errors->has('kin_relationship') ? ' has-error' : ''}}">
                             <select id="kin_relationship" name="kin_relationship" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                          @foreach($relationships as $relationship)
                            <option value="{{ $relationship->type }}">{{ $relationship->type }}</option>
                          @endforeach
                        </select>            
                           @if ($errors->has('kin_relationship'))
                          <span class="help-block">{{ $errors->first('kin_relationship') }}</span>
                           @endif    
                          </div>
                          </div>
                          </div>

                           <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('emergency_dob')) has-error @endif">
                        <label for="emergency_dob">Date of Birth</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="emergency_dob" id="emergency_dob" placeholder="Select your time" value="{{ old('emergency_dob') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('emergency_dob'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('emergency_dob') }}
                       </p>
                        @endif
                      </div>
                      </div>
                      </div>

                    

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Postal Address</label> 
                            <div class="form-group{{ $errors->has('kin_postal') ? ' has-error' : ''}}">
                           <textarea type="text" rows="3" class="form-control" id="kin_postal" name="kin_postal" value="{{ Request::old('kin_postal') ?: '' }}"></textarea>
                           @if ($errors->has('kin_postal'))
                          <span class="help-block">{{ $errors->first('kin_postal') }}</span>
                           @endif    
                          </div>
                          </div>

                         
                         <div class="col-sm-6">
                            <label>Residential Address</label> 
                            <div class="form-group{{ $errors->has('kin_residential') ? ' has-error' : ''}}">
                           <textarea type="text" rows="3" class="form-control" id="kin_residential" name="kin_residential" value="{{ Request::old('kin_residential') ?: '' }}"></textarea>
                           @if ($errors->has('kin_residential'))
                          <span class="help-block">{{ $errors->first('kin_residential') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Home Telephone</label> 
                            <div class="form-group{{ $errors->has('kin_home_phone') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="kin_home_phone" name="kin_home_phone" value="{{ Request::old('kin_home_phone') ?: '' }}">   
                           @if ($errors->has('kin_home_phone'))
                          <span class="help-block">{{ $errors->first('kin_home_phone') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('kin_mobile') ? ' has-error' : ''}}">
                            <label>Mobile</label>
                            <input type="number" rows="3" class="form-control" id="kin_mobile" name="kin_mobile" value="{{ Request::old('kin_mobile') ?: '' }}">          
                           @if ($errors->has('kin_mobile'))
                          <span class="help-block">{{ $errors->first('kin_mobile') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

    
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveEmergencyDetails()" name="btnemergency" class="btn btn-success btn-s-xs">Save</button>
                          <input type="hidden" name="emergency_id" id="emergency_id" value="{{ Request::old('emergency_id') ?: '' }}">
                      </footer>
                    </section>