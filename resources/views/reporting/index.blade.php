@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Reports</li>
                
              </ul>
            
              <div class="row">

               <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-warning portlet-item">
                <header class="panel-heading">
                 On-boarding
                </header>
                <div class="list-group bg-white">
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Event Progress Report
                  </a>
                   <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Participant Progress
                  </a>
                </div>
              </section>
              </div>

               <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-info portlet-item">
                <header class="panel-heading">
                 Employee 
                </header>
                <div class="list-group bg-white">
                  <a href="/birth-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Date of Birth of Employees
                  </a>
                  <a href="/date-joined-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Employees greater than 5 years
                  </a>
                 
                  <a href="/emergency-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i>Employee emergency contacts & dependents
                  </a>
                  <a href="/location-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Employees hired for each location
                  </a>

                   <a href="/department-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Employees hired for each department
                  </a>
                    <a href="/status-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Employment Status of Employees
                  </a>
                    <a href="/date-joined-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i>Employment by Joined Date
                  </a>

                </div>
              </section>
              </div>

               <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-success portlet-item">
                <header class="panel-heading">
                 Employee
                </header>
                <div class="list-group bg-white">
                  <a href="/marital-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Marital Status of Employees
                  </a>
                  <a href="/branch-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Branches of Employees
                  </a>
                  <a href="/qualification-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Qualifications of Employees
                  </a>
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> PIM Sample Report
                  </a>
                
                </div>
              </section>
              </div>

              <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-danger portlet-item">
                <header class="panel-heading">
                 Employee
                </header>
                <div class="list-group bg-white">
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Supervisor Subordinate Details
                  </a>
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i>  Employee Turnover - Hiring Report
                  </a>
                 
                  <a href="/status-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Employee Turnover - Termination Report
                  </a>
                  
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i>  Head Count Report
                  </a>
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> License Expiry Report
                  </a>
                
                </div>
              </section>
              </div>
    
              </div>
              

              <div class="row">

              <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-danger portlet-item">
                <header class="panel-heading">
               Leave
                </header>
                <div class="list-group bg-white">
                  <a href="/leave-report" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Leave Usage
                  </a>
               
                  
                
                </div>
              </section>
              </div>


              <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-warning portlet-item">
                <header class="panel-heading">
                 
               Disciplinary
                </header>
                <div class="list-group bg-white">
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Disciplinary Cases & Actions
                  </a>
                 
                </div>
              </section>
              </div>

                <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-default portlet-item">
                <header class="panel-heading">
                 
               Training
                </header>
                <div class="list-group bg-white">
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Course List
                  </a>
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Participating Session Information
                  </a>
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Training Session Information
                  </a>  
                </div>
              </section>
              </div>
               

                <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-info portlet-item">
                <header class="panel-heading">
                 
               Audit
                </header>
                <div class="list-group bg-white">
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Trails
                  </a>
                </div>
              </section>
              </div>

               <div class="col-sm-3 portlet ui-sortable">
              <section class="panel panel-warning portlet-item">
                <header class="panel-heading">
                 
               Canned Reports
                </header>
                <div class="list-group bg-white">
                  <a href="#" class="list-group-item">
                    <i class="fa fa-fw fa-file"></i> Job Salary Reports
                  </a>
                </div>
              </section>
              </div>
               
               

              </div>
     
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop