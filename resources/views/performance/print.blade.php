
@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li class="active"> Review Administration </li>   
              </ul>

              <div class="row">
                <div class="col-md-12">
                <section class="scrollable wrapper w-f">
                    <section class="vbox">
                <form method="post" action="/update-review">
                      <textarea id="report" name="report" >{!! $documents->content !!}</textarea>
                      <input type="hidden" id="reviewid" name="reviewid" value="{{ $documents->id }}">
                      <footer class="panel-footer text-center bg-light lter">           
                         <div class="btn-group">
                      <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Add Status <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#" onclick="updateStatus('{{ $documents->id }}','Seen')">Seen</a></li>
                        <li><a href="#" onclick="updateStatus('{{ $documents->id }}','Reject')">Reject</a></li>
                        <li><a href="#" onclick="updateStatus('{{ $documents->id }}','Accepted')">Accepted</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="updateStatus('{{ $documents->id }}','Agree')">Agree</a></li>
                      </ul>
                    </div>

                     <button type="button" onclick="saveComment('{{ $documents->id }}','{{ $documents->id }}')" class="btn btn-success btn-s-xs">Add Comment</button>
                         <input type="hidden" name="_token" value="{{ Session::token() }}">
                      </footer>
                     
                    </form>        
                  </section>
                  </section>
                </div>
              </div>


            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

 <script src="{{ asset('/js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
  <script>tinymce.init({ selector:'#report' ,menubar: false, plugins: "print",
  menubar: "file",
  toolbar: "print",
  readonly : "1",
  browser_spellcheck: true,height: 700 });</script>

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>






<script type="text/javascript">
  
  function updateStatus(id,status)
{
    $.get('/update-staff-review-status',
        {
          "ID":id,
          "status":status
        },

        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
          toastr.success("Status saved!");
         
        }
        else
        {
          toastr.error("status failed to save!");
        }
      });
                                        
        },'json');

}



  function saveComment(id,name)
  {

  swal({
  title: "Comment on review status!",
  text: "Enter review comment:",
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
    $.get('/add-staff-comment',
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
              swal("Added!","Comment added", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Failed", "Comment failed to add.", "error");
              
            }
           
        });
                                          
          },'json');    
  }
});

}


</script>
