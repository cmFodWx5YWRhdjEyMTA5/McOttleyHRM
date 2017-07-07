                    <section class="panel panel-default">
                      <div class="panel-body">
                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label> Holiday Name </label> 
                            <div class="form-group{{ $errors->has('holiday') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="holiday" name="holiday" value="{{ Request::old('holiday') ?: '' }}">   
                           @if ($errors->has('holiday'))
                          <span class="help-block">{{ $errors->first('holiday') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('holiday_date')) has-error @endif">
                        <label for="holiday_date">Holiday Date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="holiday_date" id="holiday_date" placeholder="Select your time" value="{{ old('holiday_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('holiday_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('holiday_date') }}
                       </p>
                        @endif
                      </div>
                      </div>
                      </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>