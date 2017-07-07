 <section class="panel panel-default">
   <header class="panel-heading font-bold">KPA</header>
     <div class="panel-body">
                                  <form role="form" method="post" data-validate="parsley" action="/add-insurer">
                                    <div class="form-group">
                                      <label>KPA</label>
                                      <input type="text" id="insurer" name="insurer" class="form-control" placeholder="">
                                    </div>
                                     <div class="form-group">
                                      <label>Department</label>
                                      <input type="text" id="insurer_type" name="insurer_type" class="form-control" placeholder="">
                                    </div>
                                     <div class="form-group">
                                      <label>Weightage</label>
                                      <input type="text" id="insurer_type" name="insurer_type" class="form-control" placeholder="">
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-default pull-right">Submit</button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                  </form>
                                </div>
                              </section>