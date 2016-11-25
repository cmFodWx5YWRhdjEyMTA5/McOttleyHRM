                    <section class="panel panel-default">
                      <div class="panel-body">
                 
                        <div class="form-group pull-in clearfix">
                           <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('language') ? ' has-error' : ''}}">
                            <label>Language</label>
                            <select id="language" name="language" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Not set --</option>
                          @foreach($languages as $language)
                          <option value="{{ $language->type }}">{{ $language->type }}</option>
                          @endforeach
                        </select>         
                           @if ($errors->has('language'))
                          <span class="help-block">{{ $errors->first('language') }}</span>
                           @endif    
                          </div>   
                        </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('language_skill') ? ' has-error' : ''}}">
                            <label>Skill</label>
                            <select id="language_skill" name="language_skill" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                         <option value="">-- Select skill --</option>
                          @foreach($languageskills as $languageskill)
                          <option value="{{ $languageskill->type }}">{{ $languageskill->type }}</option>
                          @endforeach
                        </select>         
                           @if ($errors->has('language_skill'))
                          <span class="help-block">{{ $errors->first('language_skill') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                      
                         <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('fluency') ? ' has-error' : ''}}">
                            <label>Fleuncy Language</label>
                            <select id="fluency" name="fluency" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                         <option value="">-- Not set --</option>
                          @foreach($languagefluency as $languagefluency)
                          <option value="{{ $languagefluency->type }}">{{ $languagefluency->type }}</option>
                          @endforeach
                        </select>         
                           @if ($errors->has('fluency'))
                          <span class="help-block">{{ $errors->first('fluency') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>
    
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                            <label>Comments</label> 
                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : ''}}">
                            <textarea type="text" rows="3" class="form-control" id="comment" name="comment" value="{{ Request::old('comment') ?: '' }}"></textarea>   
                           @if ($errors->has('comment'))
                          <span class="help-block">{{ $errors->first('comment') }}</span>
                           @endif    
                          </div>
                          </div>
                        </div>

                      </div>
                     
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="button" onclick="saveLanguageDetails()" class="btn btn-success btn-s-xs">Save</button>
                      </footer>
                    </section>