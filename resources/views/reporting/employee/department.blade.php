@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li >Reports</li>
                <li class="active">Employee By Department  </li>
              </ul>

            
              <div class="col-lg-12">
                  <h2 class="font-thin">Employee By Department</h2>
                </div>
                
             <iframe height="800px" width="100%" allowTransparency="true" frameborder="0" scrolling="yes" style="width:100%;" src="http://127.0.0.1:8080/jasperserver/flow.html?_flowId=viewReportFlow&reportUnit=/mcottleyhrm/employee_department&decorate=no&j_username=jasperadmin&j_password=jasperadmin&viewAsDashboardFrame=false  
" type= "text/javascript"></iframe>

     
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop