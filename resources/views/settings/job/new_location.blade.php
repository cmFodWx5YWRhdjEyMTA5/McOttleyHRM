                    <section class="panel panel-default">
                      <div class="panel-body">
                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Name</label> 
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="name" name="name" value="{{ Request::old('name') ?: '' }}">   
                           @if ($errors->has('name'))
                          <span class="help-block">{{ $errors->first('name') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Country</label> 
                            <div class="form-group{{ $errors->has('country') ? ' has-error' : ''}}">
                           <select id="country" name="country" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                            <option value="Ghana">Ghana</option>
                           @foreach($countries as $countries)
                        <option value="{{ $countries->name }}">{{ $countries->name }}</option>
                          @endforeach  
                        </select>  
                           @if ($errors->has('country'))
                          <span class="help-block">{{ $errors->first('country') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>


                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>City</label> 
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="city" name="city" value="{{ Request::old('city') ?: '' }}">   
                           @if ($errors->has('city'))
                          <span class="help-block">{{ $errors->first('city') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                       

                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Phone</label> 
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="phone" name="phone" value="{{ Request::old('phone') ?: '' }}">   
                           @if ($errors->has('phone'))
                          <span class="help-block">{{ $errors->first('phone') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                    

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>