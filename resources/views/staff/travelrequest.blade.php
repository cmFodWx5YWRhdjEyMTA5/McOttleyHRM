                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                       

                        <div class="form-group pull-in clearfix">
                        <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('travel_place') ? ' has-error' : ''}}">
                            <label>Place of visit</label>
                           <input type="text" rows="3" class="form-control" id="training_title" name="travel_place" value="{{ Request::old('training_title') ?: '' }}"> 
                           @if ($errors->has('travel_place'))
                          <span class="help-block">{{ $errors->first('travel_place') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Purpose of visit</label> 
                            <div class="form-group{{ $errors->has('travel_purpose') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="travel_purpose" name="travel_purpose" value="{{ Request::old('training_description') ?: '' }}"></textarea>   
                           @if ($errors->has('travel_purpose'))
                          <span class="help-block">{{ $errors->first('travel_purpose') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>




                      <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('travel_start_date')) has-error @endif">
                        <label for="travel_start_date">Expected date of departure</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="travel_start_date" id="travel_start_date" placeholder="Select your time" value="{{ old('sub_commencement_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('travel_start_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('travel_start_date') }}
                       </p>
                        @endif
                      </div>
                      </div>
                      <div class="col-sm-6">
                       <div class="form-group @if($errors->has('travel_end_date')) has-error @endif">
                        <label for="sub_renewal_date">Expected date of arrival</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="travel_end_date" id="travel_end_date" placeholder="Select your time" value="{{ old('sub_renewal_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('travel_end_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('travel_end_date') }}
                       </p>
                        @endif
                      </div>
                      </div>
                      </div>    

                           <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Is billable to </label> 
                            <div class="form-group{{ $errors->has('travel_bill_to') ? ' has-error' : ''}}">
                             <select id="travel_bill_to" name="travel_bill_to" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                        <option value="Company">Company</option>
                        <option value="Individual">Individual</option>
                        </select>            
                           @if ($errors->has('travel_bill_to'))
                          <span class="help-block">{{ $errors->first('travel_bill_to') }}</span>
                           @endif    
                          </div>
                          </div>
                          </div>
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveTravelDetails()" name="btnmembership" class="btn btn-success btn-s-xs">Save</button>
                         
                      </footer>
                    </section>