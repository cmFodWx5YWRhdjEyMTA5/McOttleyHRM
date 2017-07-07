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
   
                  
                     <span class="badge badge-info">Record(s) Found : {{ $reviews->total() }} {{ str_plural('Review Submission', $reviews->total()) }}</span>
                    </div>

                  <form action="#" method="GET">
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
                            <th>Review Type</th>
                            <th>Staff</th>
                           <th>Review Link</th>
                           <th>Date Submitted</th>
                           <th>Reviewer</th>
                           <th>Manager Grade</th>
                           <th>Employee Grade</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                       @foreach( $reviews as $key => $review )
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $review->review_type }}</td>
                            <td>{{ $review->fullname }}</td>
                            <td><a href="/view-appraisal/{{$review->staff_id }}/{{ $review->content}}" >{{ $review->content }}</td>
                             <td>{{ $review->created_on }}</td>
                             <td>{{ $review->supervisor_status }}</td>
                               <td>{{ $review->manager_mark }}</td>
                                 <td>{{ $review->employee_mark }}</td>
                            <td><a href="#" onclick="deletereview('{{$review->id}}','{{$review->staff_id}}')"><i class="fa fa-trash"></i></a></td>
                          </tr>
                         @endforeach 
                        </tbody>
 
                      </table>
                    </div>
                  </section>
                </section>

                <footer class="footer bg-white b-t">

                                  <a href="#new-appraisal" class="bootstrap-modal-form-open float" data-toggle="modal">
<i class="fa fa-plus my-float"></i><i class="fa fa-user my-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Appraisal Cycle"></i>
</a>

                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t">
                      </p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right text-center-xs">                
                     
                     {!!$reviews->render()!!} 
                        
                    </div>
                  </div>
                </footer>
              </section>

            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

<div class="modal fade" id="new-appraisal" style="height:900px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Create Appraisal Cycle</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form"  data-validate="parsley" method="post" action="/create-performance" class="panel-body wrapper-lg" enctype="multipart/form-data">
                           @include('performance/new')
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
  $(document).ready(function() {

    $('#subsidiary').select2();
     $('#department').select2();
      $('#jobtitle').select2();



  });
</script>


<script type="text/javascript">
$(function () {
  $('#appraisal_period').daterangepicker({
     "minDate": moment('1930-06-14'),
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 15,
    "showDropdowns": true,
    "autoApply": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});
</script>



<script type="text/javascript">
$(function () {
  $('#review_period').daterangepicker({
     "minDate": moment('1930-06-14'),
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 15,
    "showDropdowns": true,
    "autoApply": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});
</script>


<script type="text/javascript">
$(function () {
  $('#self_period').daterangepicker({
     "minDate": moment('1930-06-14'),
   "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 15,
    "showDropdowns": true,
    "autoApply": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});
</script>

<script type="text/javascript">

  function deletereview(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+ name +" from review list?",   
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
          $.get('/delete-performance-submitted',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
             
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
 