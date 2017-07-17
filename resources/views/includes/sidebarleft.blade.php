
 <aside class="bg-dark lter aside-md hidden-print" id="nav">          
          <section class="vbox">
           <header class="header lter text-center clearfix" style="background-color: #FF9E4A">
              {{-- <div class="btn-group">
                <button type="button" class="btn btn-sm btn-dark btn-icon" title="New project"><i class="fa fa-plus"></i></button>
                <div class="btn-group hidden-nav-xs">
                  <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-toggle="dropdown">
                    Add
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu text-left">
                    <li><a href="/online-policies/new">New Policy</a></li>
                    <li><a href="/online-quotation/new">New Quote</a></li>
                    <li><a href="/active-customer">New Customer</a></li>
                    <li><a href="/active-customer">New Claim</a></li>
                  </ul>
                </div>
              </div> --}}
            </header>
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                  @role(['System Admin','HR Officer','HR Manager','Administrator and CEO'])
                    <li  class="active">
                      <a href="{{ route('dashboard') }}"   class="active">
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span>Dashboard</span>
                      </a>
                    </li>
                      
                    <li >
                      <a href="#layout"  >
                        <i class="fa fa-users icon">
                           <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Employee Manage</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="/employees" >  
                          <b class="badge bg-info pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Employee List</span>
                          </a>
                        </li>
                      </ul>
                    </li>

                     <li >
                      <a href="#layout"  >
                        <i class="fa fa-home icon">
                          <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Branch</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="/location" >  
                          <b class="badge bg-gavel pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Branch List</span>
                          </a>
                        </li>
                       
                      </ul>
                    </li>
                     
                    <li >
                      <a href="#layout"  >
                        <i class="fa fa-sitemap icon">
                          <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Department</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="/department" >  
                          <b class="badge bg-gavel pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Department List</span>
                          </a>
                        </li>
                       
                      </ul>
                    </li>
                    <li >
                      <a href="#layout"  >
                        <i class="fa fa-user icon">
                          <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Positions</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="/job-title" >  
                          <b class="badge bg-gavel pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Position List</span>
                          </a>
                        </li>
                       
                      </ul>
                    </li>
                       <li >
                      <a href="#layout"  >
                        <i class="fa fa-file-text icon">
                          <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Task</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="/department" >  
                          <b class="badge bg-gavel pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Department Task</span>
                          </a>
                        </li>
                        <li >
                          <a href="/department" >  
                          <b class="badge bg-gavel pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Company Task</span>
                          </a>
                        </li>
                        <li >
                          <a href="/department" >  
                          <b class="badge bg-gavel pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Employee Task</span>
                          </a>
                        </li>
                        <li >
                          <a href="/department" >  
                          <b class="badge bg-gavel pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Task Manage</span>
                          </a>
                        </li>
                       
                      </ul>
                    </li>
                     @endrole
                      @role(['HR Manager','System Admin','Finance'])
                    <li >
                      <a href="/payroll-slips"  >
                        
                        <i class="fa fa-money icon">
                          <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span>Payroll</span>
                      </a>
                    </li>
                    @endrole
                    @role(['System Admin','HR Officer','HR Manager'])
                    <li >
                      <a href="#layout"  >
                        <i class="fa fa-signal icon">
                           <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Review</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="/review-settings" >  
                          <b class="badge bg-info pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Create a Review</span>
                          </a>
                        </li>
                      </ul>
                      <ul class="nav lt">
                        <li >
                          <a href="/reviews" >  
                          <b class="badge bg-info pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>View Reviews</span>
                          </a>
                        </li>
                      </ul>
                      <ul class="nav lt">
                        <li >
                          <a href="/review-settings" >  
                          <b class="badge bg-info pull-right"></b>                                                           
                            <i class="fa fa-angle-right"></i>
                            <span>Settings</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                      @endrole
                       @role(['HR Manager','System Admin'])
                        <li >
                      <a href="#pages"  >
                        <i class="fa fa-file-text icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Leave</span>
                      </a>
                      <ul class="nav lt">
                        
                        <li >
                          <a href="#" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Entitlement</span>
                          </a>
                        </li>

                        <li >
                          <a href="#" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Reports</span>
                          </a>
                        </li>

                        <li >
                          <a href="/manage-holidays" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Configure</span>
                          </a>
                        </li>

                        <li >
                          <a href="/manage-leave" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Leave List</span>
                          </a>
                        </li>

                        <li >
                          <a href="/leave-calendar" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Leave Calendar</span>
                          </a>
                        </li>
                        </ul>
                    </li>
                    @endrole
                    @role(['HR Manager','System Admin'])
                    <li >
                      <a href="/disciplinary-cases"  >
                        
                        <i class="fa fa-thumbs-down icon">
                          <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span>Discipline</span>
                      </a>
                    </li>
                    @endrole
                       @role(['HR Manager','HR Officer','System Admin'])
                    <li >
                      <a href="#"  >
                        
                        <i class="fa fa-star-o icon">
                          <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span>Benefits</span>
                      </a>
                    </li>
                    @endrole
                       @role(['HR Manager','HR Officer','System Admin'])
                    <li >
                      <a href="/awards"  >
                        
                        <i class="fa fa-trophy icon">
                          <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span>Awards</span>
                      </a>
                    </li>
                    @endrole
                      @role(['HR Manager','HR Officer','System Admin'])
                    <li >
                      <a href="/published-documents"  >
                        
                        <i class="fa fa-folder-open icon">
                          <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span>Documents</span>
                      </a>
                    </li>
                    @endrole
                     @role(['HR Manager','HR Officer','System Admin'])  
                     <li >
                      <a href="#pages"  >
                        <i class="fa fa-file-text icon">
                           <b class="dker" style="background-color: #bc65bd"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Reports</span>
                      </a>
                      <ul class="nav lt">
                        
                        <li >
                          <a href="/report-list" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Employee</span>
                          </a>
                        </li>

                       

                        <li >
                          <a href="/report-list" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Company</span>
                          </a>
                        </li>
                       
                      </ul>
                    </li>
                   @endrole
                  <li >
                      <a href="#pages"  >
                        <i class="fa fa-wrench icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Admin</span>
                      </a>
                      <ul class="nav lt">
                      @role(['HR Manager','HR Officer','Staff','System Admin'])
                        <li >
                          <a href="{{ url('/password/email') }}" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Reset Password</span>
                          </a>
                        </li>
                        <li >
                          <a href="/signout" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Logout</span>
                          </a>
                        </li>
                        @endrole
                         @role(['HR Manager','HR Officer','System Admin'])
                        <li >
                          <a href="/job-title" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Job</span>
                          </a>
                        </li>
                         <li >
                          <a href="/manage-skills" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Qualification</span>
                          </a>
                        </li>
                         <li >
                          <a href="/manage-holidays" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Miscellaneous</span>
                          </a>
                        </li>
                        @endrole
                         @role(['HR Manager','System Admin'])
                        <li >
                          <a href="/manage-users" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>User Management</span>
                          </a>
                        </li>
                        <li >
                          <a href="/audit-trails" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Audit Trail</span>
                          </a>
                        </li>
                        @endrole
                      </ul>
                    </li>
                   
                    <li >
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer lt hidden-xs b-t b-dark">
              <div id="chat" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">Active chats</header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No active chats.</p>
                      <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <div id="invite" class="dropup">                
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">
                      {{ Auth::user()->getNameOrUsername() }} <i class="fa fa-circle text-success"></i>
                    </header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No contacts in your lists.</p>
                      <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
              </a>
              <div class="btn-group hidden-nav-xs">
                <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button>
                <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button>
              </div>
            </footer>
          </section>
        </aside>
