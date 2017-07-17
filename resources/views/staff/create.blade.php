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
                            <label>Staff Type</label>
                            <select id="staff_type" name="staff_type" rows="3" data-required="true" tabindex="1" data-placeholder="Select here.." class="form-control m-b" data-toggle="tooltip" data-placement="top" title="" data-original-title="Your employees can be classified in different ways based on their compensation and the type of work they do.">
                          <option value="">-- Select an account --</option>
                          @foreach($employeestatus as $employeestatus)
                        <option value="{{ $employeestatus->type }}">{{ $employeestatus->type }}</option>
                        @endforeach
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
                          <input type="text" class="form-control" data-required="true" id="fullname" value="{{ Request::old('fullname') ?: '' }}"  name="fullname">
                          @if ($errors->has('fullname'))
                          <span class="help-block">{{ $errors->first('fullname') }}</span>
                           @endif                        
                        </div>
                        </div>
                        </div>
  
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                         <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                          <label>Work Email </label>
                          <input type="email" class="form-control" data-required="true" id="email" value="{{ Request::old('email') ?: '' }}"  name="email" data-type="email" data-toggle="tooltip" data-placement="top" title="" data-original-title="Please be extra careful typing the address. We use it to grant access to the employee's sensitive information.">
                          @if ($errors->has('email'))
                          <span class="help-block">{{ $errors->first('email') }}</span>
                           @endif                        
                        </div>
                        </div>
                        </div>

                       


                         
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('location') ? ' has-error' : ''}}"> 
                            <label>Location</label>
                            <select id="location" name="location" rows="3"  data-required="true" tabindex="1" data-placeholder="Select here.." class="form-control m-b" data-toggle="tooltip" data-placement="top" title="" data-original-title="The primary location where the employee works.">
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


                        <section class="panel panel-default">
                     <header class="panel-heading font-bold">                  
                      Login Details
                    </header>
                      <div class="panel-body">
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Username</label> 
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : ''}}">
                            <input type="text" rows="3" class="form-control" data-required="true" id="username" name="username" value="">   
                           @if ($errors->has('username'))
                          <span class="help-block">{{ $errors->first('username') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                            <label>Password</label>
                         <input type="text" rows="3" class="form-control" data-required="true" id="password" name="password" value="">   
                      
                           @if ($errors->has('password'))
                          <span class="help-block">{{ $errors->first('password') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>
                        </div>
                        </section>

   
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save Record</button>
                      </footer>
                    </section>