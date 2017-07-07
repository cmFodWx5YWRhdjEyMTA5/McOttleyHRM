                    <section class="panel panel-default">
                      <div class="panel-body">
                  



                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Level</label> 
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : ''}}">
                           <input type="text" rows="3" class="form-control" id="type" name="type" value="{{ Request::old('type') ?: '' }}">   
                           @if ($errors->has('type'))
                          <span class="help-block">{{ $errors->first('type') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Description</label> 
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                           <textarea type="text" rows="3" class="form-control" id="description" name="description" value="{{ Request::old('description') ?: '' }}"></textarea>
                           @if ($errors->has('description'))
                          <span class="help-block">{{ $errors->first('description') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>