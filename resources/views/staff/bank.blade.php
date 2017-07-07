                     <form  class="bootstrap-modal-form" id="bank_form" name="bank_form" method="post" action="/update-beneficiary" class="panel-body wrapper-lg">
                    <section class="panel panel-default">
                      <div class="panel-body">
                  

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Financial Institution</label> 
                            <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : ''}}">
                             <select id="bank_name" name="bank_name" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                          @foreach($banks as $bank)
                            <option value="{{ $bank->name }}">{{ $bank->name }}</option>
                          @endforeach
                        </select>            
                           @if ($errors->has('bank_name'))
                          <span class="help-block">{{ $errors->first('bank_name') }}</span>
                           @endif    
                          </div>
                          </div>
                          </div>

                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Account Type</label> 
                            <div class="form-group{{ $errors->has('bank_account_type') ? ' has-error' : ''}}">
                             <select id="bank_account_type" name="bank_account_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                            <option value="Current">Current</option>
                             <option value="Savings">Savings</option>
                              <option value="Other">Other</option>
                        </select>            
                           @if ($errors->has('bank_account_type'))
                          <span class="help-block">{{ $errors->first('bank_account_type') }}</span>
                           @endif    
                          </div>
                          </div>
                          </div>


                           <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Account Holder Name</label> 
                            <div class="form-group{{ $errors->has('account_holder_name') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="account_holder_name" name="account_holder_name" value="{{ Request::old('account_holder_name') ?: '' }}">   
                           @if ($errors->has('account_holder_name'))
                          <span class="help-block">{{ $errors->first('account_holder_name') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>


                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Account Number</label> 
                            <div class="form-group{{ $errors->has('bank_account_number') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="bank_account_number" name="bank_account_number" value="{{ Request::old('bank_account_number') ?: '' }}">   
                           @if ($errors->has('bank_account_number'))
                          <span class="help-block">{{ $errors->first('bank_account_number') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Location</label> 
                            <div class="form-group{{ $errors->has('bank_location') ? ' has-error' : ''}}">
                           <textarea type="text" rows="3" class="form-control" id="bank_location" name="bank_location" value="{{ Request::old('bank_location') ?: '' }}"></textarea>
                           @if ($errors->has('bank_location'))
                          <span class="help-block">{{ $errors->first('bank_location') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" name="bank_button" onclick="saveBankDetails()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>
                    <input type="hidden" name="bank_id" id="bank_id" value="{{ Request::old('bank_id') ?: '' }}">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>