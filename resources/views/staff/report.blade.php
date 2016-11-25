                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('reportto_name') ? ' has-error' : ''}}">
                            <label>Name</label>
                            <input type="text" rows="3" class="form-control" id="reportto_name" name="reportto_name" value="{{ Request::old('reportto_name') ?: '' }}"> 
                           @if ($errors->has('reportto_name'))
                          <span class="help-block">{{ $errors->first('reportto_name') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Type</label> 
                            <div class="form-group{{ $errors->has('reportto_type') ? ' has-error' : ''}}">
                             <select id="reportto_type" name="reportto_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                         @foreach($reporttotypes as $reporttotype)
                            <option value="{{ $reporttotype->category }}">{{ $reporttotype->category }}</option>
                          @endforeach
                        </select>            
                           @if ($errors->has('reportto_type'))
                          <span class="help-block">{{ $errors->first('reportto_type') }}</span>
                           @endif    
                          </div>
                          </div>


                          <div class="col-sm-6">
                            <label>Reporting Method</label> 
                            <div class="form-group{{ $errors->has('reportto_method') ? ' has-error' : ''}}">
                             <select id="reportto_method" name="reportto_method" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                          @foreach($reporttotypes as $reporttotype)
                            <option value="{{ $reporttotype->type }}">{{ $reporttotype->type }}</option>
                          @endforeach
                        </select>            
                           @if ($errors->has('reportto_method'))
                          <span class="help-block">{{ $errors->first('reportto_method') }}</span>
                           @endif    
                          </div>
                          </div>
                          </div>

                      

    
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveReportingDetails()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>