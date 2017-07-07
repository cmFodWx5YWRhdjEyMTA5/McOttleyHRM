                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          
                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('license_type') ? ' has-error' : ''}}">
                            <label>License Type</label>
                            <select id="license_type" name="license_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select license --</option>
                          @foreach($licenses as $license)
                            <option value="{{ $license->type }}">{{ $license->type }}</option>
                          @endforeach
                        </select>         
                           @if ($errors->has('license_type'))
                          <span class="help-block">{{ $errors->first('license_type') }}</span>
                           @endif    
                          </div>   
                        </div>


                          <div class="col-sm-6">
                            <label>License Number</label> 
                            <div class="form-group{{ $errors->has('license_number') ? ' has-error' : ''}}">
                            <input type="text" rows="3" class="form-control" id="license_number" name="license_number" value="{{ Request::old('license_number') ?: '' }}">   
                           @if ($errors->has('license_number'))
                          <span class="help-block">{{ $errors->first('license_number') }}</span>
                           @endif    
                          </div>
                          </div>

                          
                        </div>

                      
                         <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('license_start_date')) has-error @endif">
                        <label for="license_start_date">Issued Date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="license_start_date" id="license_start_date" placeholder="Select your time" value="{{ old('license_start_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('license_start_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('license_start_date') }}
                       </p>
                        @endif
                      </div>
                      </div>

                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('license_end_date')) has-error @endif">
                        <label for="license_end_date">Expiry Date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="license_end_date" id="license_end_date" placeholder="Select your time" value="{{ old('license_end_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('license_end_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('license_end_date') }}
                       </p>
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
                        <button type="button" onclick="saveLicenseDetails()" name="btnlicense" class="btn btn-success btn-s-xs">Save</button>
                          <input type="hidden" name="license_id" id="license_id" value="{{ Request::old('license_id') ?: '' }}">
                      </footer>
                    </section>