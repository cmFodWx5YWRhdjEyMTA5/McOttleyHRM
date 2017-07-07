                    <section class="panel panel-default">
                      <div class="panel-body">
                  



                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Pay Grade</label> 
                            <div class="form-group{{ $errors->has('grade') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="grade" name="grade" value="{{ Request::old('grade') ?: '' }}">   
                           @if ($errors->has('grade'))
                          <span class="help-block">{{ $errors->first('grade') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Currency</label> 
                            <div class="form-group{{ $errors->has('currency') ? ' has-error' : ''}}">
                           <select id="currency" name="currency" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                           @foreach($currency as $currency)
                        <option value="{{ $currency->type }}">{{ $currency->type }}</option>
                          @endforeach  
                        </select>  
                           @if ($errors->has('currency'))
                          <span class="help-block">{{ $errors->first('currency') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Minimum Wage</label> 
                            <div class="form-group{{ $errors->has('minimum_wage') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="minimum_wage" name="minimum_wage" value="{{ Request::old('minimum_wage') ?: '' }}">   
                           @if ($errors->has('minimum_wage'))
                          <span class="help-block">{{ $errors->first('minimum_wage') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('maximum_wage') ? ' has-error' : ''}}">
                            <label>Maximum Wage</label>
                            <input type="text" rows="3" class="form-control" id="maximum_wage" name="maximum_wage" value="{{ Request::old('maximum_wage') ?: '' }}">          
                           @if ($errors->has('maximum_wage'))
                          <span class="help-block">{{ $errors->first('maximum_wage') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>