                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('dependant_name') ? ' has-error' : ''}}">
                            <label>Name</label>
                            <input type="text" rows="3" class="form-control" id="dependant_name" name="dependant_name" value="{{ Request::old('dependant_name') ?: '' }}"> 
                           @if ($errors->has('dependant_name'))
                          <span class="help-block">{{ $errors->first('dependant_name') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Relationship</label> 
                            <div class="form-group{{ $errors->has('dependant_relationship') ? ' has-error' : ''}}">
                             <select id="dependant_relationship" name="dependant_relationship" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                          @foreach($relationships as $relationship)
                            <option value="{{ $relationship->type }}">{{ $relationship->type }}</option>
                          @endforeach
                        </select>            
                           @if ($errors->has('dependant_relationship'))
                          <span class="help-block">{{ $errors->first('dependant_relationship') }}</span>
                           @endif    
                          </div>
                          </div>
                          </div>

                      
                         <div class="form-group pull-in clearfix">
                           <div class="col-sm-6">
                       <div class="form-group @if($errors->has('dependant_dob')) has-error @endif">
                        <label for="dependant_dob">Date of Birth</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="dependant_dob" id="dependant_dob" placeholder="Select your time" value="{{ old('dependant_dob') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('dependant_dob'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('dependant_dob') }}
                       </p>
                        @endif
                      </div>
                      </div>
                    

                    <div class="col-sm-6">
                            <label>Nationality</label> 
                            <div class="form-group{{ $errors->has('dependant_nationality') ? ' has-error' : ''}}">
                             <select id="dependant_nationality" name="dependant_nationality" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="Ghanaian">Ghanaian</option>
                            @foreach($nationalities as $nationality)
                        <option value="{{ $nationality->nationality }}">{{ $nationality->nationality }}</option>
                          @endforeach 
                        </select>            
                           @if ($errors->has('dependant_nationality'))
                          <span class="help-block">{{ $errors->first('dependant_nationality') }}</span>
                           @endif    
                          </div>
                          </div>


                        </div>

    
                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveDependantDetails()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>