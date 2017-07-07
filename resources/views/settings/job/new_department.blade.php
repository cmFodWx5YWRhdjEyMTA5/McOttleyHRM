                    <section class="panel panel-default">
                      <div class="panel-body">
                  



                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
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