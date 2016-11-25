                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          
                           <div class="col-sm-6">
                            <label>Document</label> 
                            <div class="form-group{{ $errors->has('document') ? ' has-error' : ''}}">
                             <select id="document" name="document" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="Passport">Passport</option>
                          <option value="Visa">Visa</option>
                        </select>            
                           @if ($errors->has('document'))
                          <span class="help-block">{{ $errors->first('document') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('document_id') ? ' has-error' : ''}}">
                            <label>Number</label>
                            <input type="text" rows="3" class="form-control" id="document_id" name="document_id" value="{{ Request::old('document_id') ?: '' }}"> 
                           @if ($errors->has('document_id'))
                          <span class="help-block">{{ $errors->first('document_id') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                         <div class="form-group pull-in clearfix">
                          
                          <div class="col-sm-4">
                          <div class="form-group{{ $errors->has('immigration_issued_at') ? ' has-error' : ''}}">
                            <label>Place of Issue</label>
                           <div class="form-group{{ $errors->has('immigration_issued_at') ? ' has-error' : ''}}">
                             <select id="immigration_issued_at" name="immigration_issued_at" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">--Not set--</option>
                          @foreach($countries as $country)
                           <option value="{{ $country->name }}">{{ $country->name }}</option>
                           @endforeach
                        </select>            
                           @if ($errors->has('immigration_issued_at'))
                          <span class="help-block">{{ $errors->first('immigration_issued_at') }}</span>
                           @endif    
                          </div>            
                          </div>   
                        </div>

                          <div class="col-sm-4">
                            <label>Issued Date</label> 
                            <div class="form-group{{ $errors->has('immigration_issue_date') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="immigration_issue_date" name="immigration_issue_date" value="{{ Request::old('immigration_issue_date') ?: '' }}">   
                           @if ($errors->has('immigration_issue_date'))
                          <span class="help-block">{{ $errors->first('immigration_issue_date') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-4">
                          <div class="form-group{{ $errors->has('immigration_expiry_date') ? ' has-error' : ''}}">
                            <label>Expiry Date</label>
                            <input type="text" rows="3" class="form-control" id="immigration_expiry_date" name="immigration_expiry_date" value="{{ Request::old('immigration_expiry_date') ?: '' }}">          
                           @if ($errors->has('immigration_expiry_date'))
                          <span class="help-block">{{ $errors->first('immigration_expiry_date') }}</span>
                           @endif    
                          </div>   
                        </div>
                 
                        </div>

    
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveImmigrationDetails()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>