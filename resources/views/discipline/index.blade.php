@extends('layouts.default')
@section('content')

        <section id="content">
          <section class="hbox stretch">
            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                     
                      <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
                      <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-upload"></i> Upload</a>
                      <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-file"></i> Discipline Template</a>
                      <a href="#new-disciplinary-case"  data-toggle="modal" class="btn btn-sm btn-info bootstrap-modal-form-open"><i class="fa fa-group"></i> Create New Case</a>
                    <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print List</a>
                     <span class="badge badge-info">Record(s) Found : {{ $cases->total() }} {{ str_plural('Disciplinary Case', $cases->total()) }}</span>
                    </div>

                  <form action="/find-leave" method="GET">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search ...">
                        <span class="input-group-btn">
                          <button class="btn btn-sm btn-default" type="submit">Go!</button>
                        </span>
                      </div>
                    </div>
                     </form>
                  </div>
                </header>
                <section class="scrollable wrapper w-f">
                  <section class="panel panel-default">
                    <div class="table-responsive">
                      <table class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                          <th>#</th>
                            <th>Employee</th>
                            <th>Case Name</th>
                            <th>Description</th>
                            <th>Created By</th>
                            <th>Created On</th>
                            <th>Disciplanary Action</th>
                            <th>Comment</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                       @foreach( $cases as $key => $case )
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $case->staff_id }}</td>
                            <td>{{ $case->case }}</td>
                            <td>{{ $case->description }}</td>
                            <td>{{ $case->created_by }}</td>
                            <td>{{ $case->created_on }}</td>
                            <td>
                           <div class="input-group-btn">
                           
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">@if($case->action==null) Waiting for action @else{{ $case->action }} @endif <span class="caret"></span></button>

                            <ul class="dropdown-menu pull-right">
                            @foreach($actions as $action)
                            <li><a onclick="process('{{$case->id}}','{{$case->case}}','{{ $action->action }}')">{{ $action->action }}</a></li>
                            @endforeach
                            </ul>
                            </div>
                            </td>
                           <td>{{ $case->status }}</td>
                            <td><a href="/'{{ $action->route }}'" data-toggle="modal" ><i class="fa fa-print"></i></a></td>
                            <td><a href="#" onclick="saveComment('{{$case->id}}')" ><i class="fa fa-comment"></i></a></td>
                            <td><a href="#" onclick="deleteCase('{{$case->id}}')"><i class="fa fa-trash"></i></a></td>
                             <td><a href="#new-document"  data-toggle="modal" class="bootstrap-modal-form-open"><i class="fa fa-plus"></i></a></td>
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
                     
                     {!!$cases->render()!!} 
                        
                    </div>
                  </div>
                </footer>
              </section>

            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

 <div class="modal fade" id="new-document" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Attach Document</h4>
        </div>

        <div class="modal-body">
         <div class="fallback">
          <form method="post"  enctype="multipart/form-data" action="/create-document">
          <input type="text" class="form-control" width="1000px" height="40px" name="filename" id="filename" placeholder="Enter file name" /><br>
          <input type="file" class="form-control dropbox" width="500px" height="40px" name="image" /><br>
          <input type="submit" name="submit"  class="btn btn-success btn-s-xs" value="upload" />
          <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
        </div>
          <br>
          <br>
          <br>
              <div class="jumbotron how-to-create">
                <ul>
                    <li>Documents/Images are uploaded as soon as you drop them</li>
                    <li>Maximum allowed size of image is 8MB</li>
                </ul>

            </div>

      </div>
      </div>
      </div>
      </div>

 <div class="modal fade" id="new-disciplinary-case" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Disciplinary Case</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form"  method="post" data-validate="parsley" action="/add-case" class="panel-body wrapper-lg">
                           @include('discipline/new')
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


 <script src="{{ asset('/event_components/jquery.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#staff_id').select2();

  });
</script>


<script type="text/javascript">
  function process(id,name,action)
  {

        //alert(id,name);
      swal({   
        title: "Are you sure",   
        text: "You want to "+action+" for "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, action it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/action-case',
          {
             "ID": id, 
             "action":action
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Actioned!", name +" has been actioned.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" operation error.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" operation error.", "error");   
        } });

  }

</script>


<script type="text/javascript">
  
  function saveComment(id,name)
  {

  swal({
  title: "Comment on case status!",
  text: "Enter disciplinary comment:",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Enter comment"
},
function(inputValue){
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("You need to enter comment!");
    return false
  }
  
  else
  {
    $.get('/add-case-comment',
          {
             "ID": id,
             "comment": inputValue  
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Saved!", name +" was successfully processed.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Failed", name +" failed to process.", "error");
              
            }
           
        });
                                          
          },'json');    
  }
});

}


 function deleteCase(id)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove this case from list?",   
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
          $.get('/delete-case',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", "Case was removed from list.", "success"); 
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









