<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li class="active"> Workset </li>   
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none"> Workset </h3>
                 @if(Auth::check())
                <small>Welcome back,  {{ Auth::user()->getNameOrUsername() }}</small>
                 @endif
              </div>
              <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-gavel fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="/active-customer">
                      <span class="h3 block m-t-xs"><strong></strong></span>
                      <small class="text-muted text-uc">Total Employees</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-money fa-stack-1x text-white"></i>
                      </span>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="bugs">799</strong></span>
                      <small class="text-muted text-uc">Total Departments</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">                     
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-fire-extinguisher fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="0" data-line-width="4" data-track-Color="#f5f5f5" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#firers" data-update="5000"></span>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="firers"></strong></span>
                      <small class="text-muted text-uc">Today's task</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x icon-muted"></i>
                      <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong>{{ Carbon\Carbon::now() }}</strong></span>
                      <small class="text-muted text-uc">Left to exit</small>
                    </a>
                  </div>
                </div>
              </section>

              <div class="row">
                <div class="col-md-8">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Employee Distribution by Subunit</header>
                    <div class="panel-body">
                      <div id="flot-1ine" style="height:210px"></div>
                    </div>
                    <footer class="panel-footer bg-white no-padder">
                      <div class="row text-center no-gutter">
                        <div class="col-xs-3 b-r b-light">
                          <span class="h4 font-bold m-t block"></span>
                          <small class="text-muted m-b block">Processed Policies</small>
                        </div>
                        <div class="col-xs-3 b-r b-light">
                          <span class="h4 font-bold m-t block"></span>
                          <small class="text-muted m-b block">Expired Policies</small>
                        </div>
                        <div class="col-xs-3 b-r b-light">
                          <span class="h4 font-bold m-t block">21,230</span>
                          <small class="text-muted m-b block">Invoices</small>
                        </div>
                        <div class="col-xs-3">
                          <span class="h4 font-bold m-t block">7,230</span>
                          <small class="text-muted m-b block">Quote</small>                        
                        </div>
                      </div>
                    </footer>
                  </section>
                </div>
                <div class="col-md-4">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Leave Taken from January by Subunit</header>
                    <div class="bg-light dk wrapper">
                      <span class="pull-right">Friday</span>
                      <span class="h4">GHS540<br>
                        <small class="text-muted">+1.05(2.15%)</small>
                      </span>
                      <div class="text-center m-b-n m-t-sm">
                          <div class="sparkline" data-type="line" data-height="65" data-width="100%" data-line-width="2" data-line-color="#dddddd" data-spot-color="#bbbbbb" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="3" data-resize="true" values="280,320,220,385,450,320,345,250,250,250,400,380"></div>
                          <div class="sparkline inline" data-type="bar" data-height="45" data-bar-width="6" data-bar-spacing="6" data-bar-color="#65bd77">10,9,11,10,11,10,12,10,9,10,11,9,8</div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div>
                        <span class="text-muted">Total:</span>
                        <span class="h3 block">GHS2500.00</span>
                      </div>
                      <div class="line pull-in"></div>
                      <div class="row m-t-sm">
                        <div class="col-xs-4">
                          <small class="text-muted block">Overdue Invoices</small>
                          <span>GHS1500.00</span>
                        </div>
                        <div class="col-xs-4">
                          <small class="text-muted block">Paid</small>
                          <span>GHS600.00</span>
                        </div>
                        <div class="col-xs-4">
                          <small class="text-muted block">Outstanding</small>
                          <span>GHS400.00</span>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8"> 

                     <header class="panel-heading bg-dark dker no-border"><strong>Documents</strong></header>
                        <div class="table-responsive">
                      <table cellpadding="1" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                            
                           
                          </tr>
                        </thead>
                        <tbody>
                      
                        </tbody>
 
                      </table>
                    </div>

                    <br>
                    <br>
                    <br>

                     <header class="panel-heading bg-dark dker no-border"><strong>News</strong></header>
                    <div class="table-responsive">
                      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                        
                          
                          </tr>
                        </thead>
                        <tbody>
                       
                        </tbody>
 
                      </table>
                    </div>           
                </div>

                
              <div class="col-md-4">
                <section class="panel b-light">
                    <header class="panel-heading bg-dark dker no-border"><strong>Awards</strong></header>
                    <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                    <div class="list-group">
                    
                    </div>
                  </section> 
            

              <section class="panel b-light">
                    <header class="panel-heading bg-dark dker no-border"><strong>Goals</strong></header>
                    <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                    <div class="list-group">
                      
                    </div>
                  </section> 
            
                  

                     <section class="panel b-light">
                    <header class="panel-heading bg-dark dker no-border"><strong>{{ date("F") }} Birthdays</strong></header>
                    <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                    <div class="list-group">
                   
                    </div>
                  </section> 
            
                  </div>
                    {{--  <section class="panel panel-default">
                    <header class="panel-heading">                    
                      <span class="label bg-dark">15</span> Inbox
                    </header>

                     <section class="panel-body slim-scroll" data-height="230px">
                     @foreach( $patients as $patient )
                      <article class="media">
                        <span class="pull-left thumb-sm"><img src="/images/{{ $patient->image }}" class="img-circle"></span>
                        <div class="media-body">
                          <div class="pull-right media-xs text-center text-muted">
                            <strong class="h4">{{ $patient->created_at }}</strong><br>
                            
                          </div>
                          <a href="#" class="h4">{{ $patient->fullname }}</a>
                          <small class="block"><a href="#" class=""></a></small>
                         
                        </div>
                      </article>
                      
                        <div class="line pull-in"></div>
                         @endforeach 
                      </section>
                      </section>
 --}}
                </div>

              </div>
     {{--  <a><i class="fa fa-long-arrow-up"><iframe src="http://www.bloomberg.com/markets/components/data-drawer" width="1700" height="100px" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" vspace="0" hspace="0">
         </iframe></i></a> --}}
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>

