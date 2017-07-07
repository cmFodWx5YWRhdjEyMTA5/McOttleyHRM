                    <section class="panel panel-default">
                      <div class="panel-body">

                      
                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-4">
                            <label>Type of Asset</label> 
                            <div class="form-group{{ $errors->has('asset_type') ? ' has-error' : ''}}">
                           <select id="asset_type" name="asset_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select type --</option>
                         @foreach($assetstypes as $asset)
                            <option value="{{ $asset->type }}">{{ $asset->type }}</option>
                          @endforeach 
                        </select>         
                           @if ($errors->has('asset_type'))
                          <span class="help-block">{{ $errors->first('asset_type') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                         <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('asset_given_date')) has-error @endif">
                        <label for="asset_given_date">Given Date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="asset_given_date" id="asset_given_date" placeholder="Select your time" value="{{ old('asset_given_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('asset_given_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('asset_given_date') }}
                       </p>
                        @endif
                      </div>
                      </div>

                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('asset_return_date')) has-error @endif">
                        <label for="asset_return_date">Return Date</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="asset_return_date" id="asset_return_date" placeholder="Select your time" value="{{ old('asset_return_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('asset_return_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('asset_return_date') }}
                       </p>
                        @endif
                      </div>
                      </div>
                    </div>
    
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Asset Details</label> 
                            <div class="form-group{{ $errors->has('asset_detail') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="asset_detail" name="asset_detail" value="{{ Request::old('asset_detail') ?: '' }}"></textarea>   
                           @if ($errors->has('asset_detail'))
                          <span class="help-block">{{ $errors->first('asset_detail') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveAssetRequest()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>