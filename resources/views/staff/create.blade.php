                    <section class="panel panel-default">
                      <div class="panel-body">
                       
                     <div class="clearfix m-b">

                          <a href="#" class="thumb-lg">
                            <img src="images/avatar_default.jpg" id="imagePreview"  class="img-circle">

                             <input type="file" height="40px" name="image" id="image" enctype="multipart/form-data">
                          </a>
                                
                        </div>
                        
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Staff Number</label> 
                            <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : ''}}">
                            <input type="text" rows="3" class="form-control" id="staff_id" readonly="true" name="staff_id" value="{{ Request::old('staff_id') ?: '' }}">   
                           @if ($errors->has('staff_id'))
                          <span class="help-block">{{ $errors->first('staff_id') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('staff_type') ? ' has-error' : ''}}">
                            <label>Customer Type</label>
                            <select id="staff_type" name="staff_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select an account --</option>
                          
                        </select>         
                           @if ($errors->has('staff_type'))
                          <span class="help-block">{{ $errors->first('staff_type') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                      

                       <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                         <div class="form-group{{ $errors->has('fullname') ? ' has-error' : ''}}">
                          <label>Name </label>
                          <input type="text" class="form-control" id="fullname" value="{{ Request::old('fullname') ?: '' }}"  name="fullname">
                          @if ($errors->has('fullname'))
                          <span class="help-block">{{ $errors->first('fullname') }}</span>
                           @endif                        
                        </div>
                        </div>
                        </div>

                       


                         
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('location') ? ' has-error' : ''}}"> 
                            <label>Location</label>
                            <select id="location" name="location" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                         @foreach($locations as $location)
                        <option value="{{ $location->name }}">{{ $location->name }}</option>
                          @endforeach
                        </select>    
                          @if ($errors->has('location'))
                          <span class="help-block">{{ $errors->first('location') }}</span>
                           @endif      
                            </div>
                          </div>
                        </div>

   
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save Record</button>
                      </footer>
                    </section>