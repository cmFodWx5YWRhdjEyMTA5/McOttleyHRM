@extends('layouts.default')
@section('content')
        <section id="content">
          <section class="hbox stretch">
          <aside class="aside-md bg-white b-r" id="subNav">
              <div class="wrapper b-b header">Jobs Manager</div>
              <ul class="nav">
                <li class="b-b b-light"><a href="/job-title"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Job Titles</a></li>
                <li class="b-b b-light"><a href="/salary-component"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Salary Components</a></li>
                <li class="b-b b-light"><a href="/employment-status"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Employment Status</a></li>
                <li class="b-b b-light"><a href="/job-category"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Job Categories</a></li>
                <li class="b-b b-light"><a href="/work-shift"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Work Shifts</a></li>
                <li class="b-b b-light"><a href="/department"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Departments</a></li>
                <li class="b-b b-light"><a href="/location"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Branch</a></li>
                <li class="b-b b-light"><a href="/subsidiary"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Business Entities</a></li>
                <li class="b-b b-light"><a href="/pay-grade"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Job Grades</a></li>
              </ul>
            </aside>
            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                    <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print List</a>
                     <span class="badge badge-info">Record(s) Found :  {{ $jobtitles->total() }} {{ str_plural('Title', $jobtitles->total()) }}</span>
                    </div>

                  <form action="/#" method="GET">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search here...">
                        <span class="input-group-btn">
                          <button class="btn btn-sm btn-default" type="submit">Go!</button>
                        </span>
                      </div>
                    </div>
                     </form>
                    </div>
                  </div>
                </header>
                <section class="scrollable wrapper w-f">
                  <section class="panel panel-default">
                  <header class="panel-heading font-bold">Job Titles
                                 <a href="#new-job-title" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                    <div class="table-responsive">
                      <table class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                           <th>#</th>
                            <th>Job Title </th>
                            <th>Job Description</th>
                            <th width="20"></th>
                            <th width="30"></th>
                          </tr>
                        </thead>
                         <tbody>
                        @foreach( $jobtitles as $key => $jobtitle )
                          <tr>
                            
                           <td>{{ ++$key }}</td>
                            <td>{{ $jobtitle->type }}</td>
                            <td>{{ $jobtitle->description }}</td>
                             <td><a href="#modal_check_in" class="bootstrap-modal-form-open" onclick="getDetails('{{ $jobtitle->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-pencil"></i></a>
                             </td>
                             <td><a href="#modal_check_in" class="bootstrap-modal-form-open" onclick="deleteJobtitles('{{ $jobtitle->id }}','{{ $jobtitle->type }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a>
                             </td>
                            
                          </tr>
                         @endforeach 
                        </tbody>
 
                      </table>
                    </div>
                  </section>
                </section>
                <footer class="footer bg-white b-t">
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t">
                      </p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right text-center-xs">                
                     
                        {!!$jobtitles->render()!!}
                        
                    </div>
                  </div>
                </footer>
              </section>
            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop



    <div class="modal fade" id="new-job-title" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Job Title</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/add-job-title" class="panel-body wrapper-lg">
                           @include('settings/job/new_job_title')
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                      </form>
                        </div>
                  
                  
                        </div>
                        </section>
                        </section>
                      </div>
                    
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->




<script>
  function deleteJobtitles(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+ name +" from list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-job-title',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Job title was removed from list.", "success"); 
               location.reload(true);
             }
            else
            { 
              swal("Cancelled","Failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled","Failed to be removed from list.", "error");   
        } });

    
   }
</script>
