                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('beneficiary_name') ? ' has-error' : ''}}">
                            <label>Name</label>
                            <input type="text" rows="3" class="form-control" id="beneficiary_name" name="beneficiary_name" value="{{ Request::old('beneficiary_name') ?: '' }}"> 
                           @if ($errors->has('beneficiary_name'))
                          <span class="help-block">{{ $errors->first('beneficiary_name') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Relationship</label> 
                            <div class="form-group{{ $errors->has('beneficiary_relationship') ? ' has-error' : ''}}">
                             <select id="beneficiary_relationship" name="beneficiary_relationship" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                          @foreach($relationships as $relationship)
                            <option value="{{ $relationship->type }}">{{ $relationship->type }}</option>
                          @endforeach
                        </select>            
                           @if ($errors->has('beneficiary_relationship'))
                          <span class="help-block">{{ $errors->first('beneficiary_relationship') }}</span>
                           @endif    
                          </div>
                          </div>
                          </div>

                           <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('beneficiary_dob')) has-error @endif">
                        <label for="beneficiary_dob">Date of Birth</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="beneficiary_dob" id="beneficiary_dob" placeholder="Select your time" value="{{ old('beneficiary_dob') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('beneficiary_dob'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('beneficiary_dob') }}
                       </p>
                        @endif
                      </div>
                      </div>
                      </div>

                    

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Postal Address</label> 
                            <div class="form-group{{ $errors->has('beneficiary_postal_address') ? ' has-error' : ''}}">
                           <textarea type="text" rows="3" class="form-control" id="beneficiary_postal_address" name="beneficiary_postal_address" value="{{ Request::old('beneficiary_postal_address') ?: '' }}"></textarea>
                           @if ($errors->has('beneficiary_postal_address'))
                          <span class="help-block">{{ $errors->first('beneficiary_postal_address') }}</span>
                           @endif    
                          </div>
                          </div>

                         
                         <div class="col-sm-6">
                            <label>Residential Address</label> 
                            <div class="form-group{{ $errors->has('beneficiary_residential_address') ? ' has-error' : ''}}">
                           <textarea type="text" rows="3" class="form-control" id="beneficiary_residential_address" name="beneficiary_residential_address" value="{{ Request::old('beneficiary_residential_address') ?: '' }}"></textarea>
                           @if ($errors->has('beneficiary_residential_address'))
                          <span class="help-block">{{ $errors->first('beneficiary_residential_address') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Home Telephone</label> 
                            <div class="form-group{{ $errors->has('beneficiary_home_phone') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="beneficiary_home_phone" name="beneficiary_home_phone" value="{{ Request::old('beneficiary_home_phone') ?: '' }}">   
                           @if ($errors->has('beneficiary_home_phone'))
                          <span class="help-block">{{ $errors->first('beneficiary_home_phone') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('beneficiary_mobile') ? ' has-error' : ''}}">
                            <label>Mobile</label>
                            <input type="number" rows="3" class="form-control" id="beneficiary_mobile" name="beneficiary_mobile" value="{{ Request::old('beneficiary_mobile') ?: '' }}">          
                           @if ($errors->has('beneficiary_mobile'))
                          <span class="help-block">{{ $errors->first('beneficiary_mobile') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

    
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" name="btnbeneficiary" onclick="saveBeneficiaryDetails()" class="btn btn-success btn-s-xs">Save</button>
                        <input type="hidden" name="beneficiary_id" id="beneficiary_id" value="{{ Request::old('beneficiary_id') ?: '' }}">
                      </footer>
                    </section>