                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                       

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Membership</label> 
                            <div class="form-group{{ $errors->has('sub_type') ? ' has-error' : ''}}">
                             <select id="sub_type" name="sub_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                          @foreach($memberships as $membership)
                            <option value="{{ $membership->type }}">{{ $membership->type }}</option>
                          @endforeach
                        </select>            
                           @if ($errors->has('sub_type'))
                          <span class="help-block">{{ $errors->first('sub_type') }}</span>
                           @endif    
                          </div>
                          </div>
                          </div>

                           <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Subscription Paid By</label> 
                            <div class="form-group{{ $errors->has('sub_paid_by') ? ' has-error' : ''}}">
                             <select id="sub_paid_by" name="sub_paid_by" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                        <option value="Company">Company</option>
                        <option value="Individual">Individual</option>
                        </select>            
                           @if ($errors->has('sub_paid_by'))
                          <span class="help-block">{{ $errors->first('sub_paid_by') }}</span>
                           @endif    
                          </div>
                          </div>
                          </div>


                           <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Subscription Amount</label> 
                            <div class="form-group{{ $errors->has('sub_amount') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="sub_amount" name="sub_amount" value="{{ Request::old('sub_amount') ?: '' }}">   
                           @if ($errors->has('sub_amount'))
                          <span class="help-block">{{ $errors->first('sub_amount') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('sub_currency') ? ' has-error' : ''}}">
                            <label>Currency</label>
                            <input type="text" rows="3" class="form-control" id="sub_currency" name="sub_currency" value="{{ Request::old('sub_currency') ?: '' }}">          
                           @if ($errors->has('sub_currency'))
                          <span class="help-block">{{ $errors->first('sub_currency') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                      <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('sub_commencement_date')) has-error @endif">
                        <label for="sub_commencement_date">Subscription Commence Date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="sub_commencement_date" id="sub_commencement_date" placeholder="Select your time" value="{{ old('sub_commencement_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('sub_commencement_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('sub_commencement_date') }}
                       </p>
                        @endif
                      </div>
                      </div>
                      <div class="col-sm-6">
                       <div class="form-group @if($errors->has('sub_renewal_date')) has-error @endif">
                        <label for="sub_renewal_date">Subscription Renewal Date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="sub_renewal_date" id="sub_renewal_date" placeholder="Select your time" value="{{ old('sub_renewal_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('sub_renewal_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('sub_renewal_date') }}
                       </p>
                        @endif
                      </div>
                      </div>
                      </div>    
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveMemebershipDetails()" name="btnmembership" class="btn btn-success btn-s-xs">Save</button>
                          <input type="hidden" name="membership_id" id="membership_id" value="{{ Request::old('membership_id') ?: '' }}">
                      </footer>
                    </section>