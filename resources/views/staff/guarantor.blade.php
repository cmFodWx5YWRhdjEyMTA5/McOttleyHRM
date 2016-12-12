                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('guarantor_name') ? ' has-error' : ''}}">
                            <label>Name</label>
                            <input type="text" rows="3" class="form-control" id="guarantor_name" name="guarantor_name" value="{{ Request::old('guarantor_name') ?: '' }}"> 
                           @if ($errors->has('guarantor_name'))
                          <span class="help-block">{{ $errors->first('guarantor_name') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Postal Address</label> 
                            <div class="form-group{{ $errors->has('guarantor_postal_address') ? ' has-error' : ''}}">
                           <textarea type="text" rows="3" class="form-control" id="guarantor_postal_address" name="guarantor_postal_address" value="{{ Request::old('guarantor_postal_address') ?: '' }}"></textarea>
                           @if ($errors->has('guarantor_postal_address'))
                          <span class="help-block">{{ $errors->first('guarantor_postal_address') }}</span>
                           @endif    
                          </div>
                          </div>

                         
                         <div class="col-sm-6">
                            <label>Residential Address</label> 
                            <div class="form-group{{ $errors->has('guarantor_residential_address') ? ' has-error' : ''}}">
                           <textarea type="text" rows="3" class="form-control" id="guarantor_residential_address" name="guarantor_residential_address" value="{{ Request::old('guarantor_residential_address') ?: '' }}"></textarea>
                           @if ($errors->has('guarantor_residential_address'))
                          <span class="help-block">{{ $errors->first('guarantor_residential_address') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Home Telephone</label> 
                            <div class="form-group{{ $errors->has('guarantor_home_phone') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="guarantor_home_phone" name="guarantor_home_phone" value="{{ Request::old('guarantor_home_phone') ?: '' }}">   
                           @if ($errors->has('guarantor_home_phone'))
                          <span class="help-block">{{ $errors->first('guarantor_home_phone') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('guarantor_mobile') ? ' has-error' : ''}}">
                            <label>Mobile</label>
                            <input type="text" rows="3" class="form-control" id="guarantor_mobile" name="guarantor_mobile" value="{{ Request::old('guarantor_mobile') ?: '' }}">          
                           @if ($errors->has('guarantor_mobile'))
                          <span class="help-block">{{ $errors->first('guarantor_mobile') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

    
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveGuarantorDetails()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>