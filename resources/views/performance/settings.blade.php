@extends('layouts.default')
@section('content')
<section class="scrollable">
        <section id="content">
          <section class="hbox stretch">
              <section class="panel panel-default">
                    <header class="panel-heading text-right bg-light">
                      <ul class="nav nav-tabs pull-left">
<li><a href="#cycle-tab" data-toggle="tab"><i class="fa  fa-inbox text-default"></i> Appraisal Cycle </a></li>
<li><a href="#kpa" data-toggle="tab"><i class="fa fa-suitcase text-default"></i> KPA </a></li>
<li><a href="#potential-tab" data-toggle="tab"><i class="fa fa-shopping-cart text-default"></i> Potential </a></li>
<li><a href="#summary-tab" data-toggle="tab"><i class="fa fa-users text-default"></i> Summary</a></li>
<li><a href="#" data-toggle="tab"><i class="fa fa-users text-default"></i> Performance Modules </a></li>
 </ul>
                      <span class="hidden-sm">.</span>
                    </header>
                    <div class="panel-body">
                      <div class="tab-content">

                       <div class="tab-pane active" id="cycle-tab">
                       <section class="panel panel-info">
                                 <header class="panel-heading font-bold">.
                                 <a href="#new-appraisal" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                       <table  cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            <th></th>
                            <th>Appraisal Name</th>
                            <th>Period</th>
                             <th>Employee</th>
                            <th>Business</th>
                            <th>Department</th>
                            <th>Job Title</th>
                             <th>Status</th>
                           <th></th>
                          
                            </tr>
                          </thead>
                          <tbody>
                        @foreach($cycles as $keys => $cycle)
                          <tr></tr>
                          <td>{{ ++$keys }}</td>
                          <td>{{ $cycle->title }}</td>
                          <td>{{ $cycle->cycle_start->format('l, jS F') }} - {{ $cycle->cycle_end->format('l, jS F')  }} </td>
                           <td>{{ $cycle->employee }}</td>
                          <td>{{ $cycle->business }}</td>
                          <td>{{ $cycle->department }}</td>
                          <td>{{ $cycle->role }}</td>
                          <td><span class="badge bg-info">{{ $cycle->status }}</span></td>
                          <td><a href="#" onclick="deleteDetails('{{ $cycle->id }}','{{ $cycle->title }}')" id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a></td> 
                          @endforeach 
                          </tbody>
                        </table>
                    </div>           
                  </div>
                </section>
                        
                   </div>



              
                        <div class="tab-pane fade" id="potential-tab">
                              <section class="panel panel-info">
                                  <header class="panel-heading font-bold">Potential</header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                       <table  cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            
                            <th>Potential</th>
                            <th>Range</th>
                           <th></th>
                          
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($pontentials as $potential)
                          <tr></tr>
                          <td>{{ $potential->level }}</td>
                           <td>
                        <input type="text" style="width: 500px;" class="slider form-control" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[{{ $potential->min }},{{ $potential->max }}]" id="sl2" > 
                      </td>
                      <td>|- {{ $potential->min /10 }} - {{ $potential->max/10 }} %</td>
                          @endforeach
                          </tbody>
                        </table>
                    </div>           
                  </div>
                </section>
                   </div>


                        <div class="tab-pane fade" id="summary-tab">
                              <section class="panel panel-info">
                                  <header class="panel-heading font-bold">Summary</header>
                                <div class="panel-body">
                                      <div class="table-responsive">
                       <table id="summaryTable" cellpadding="0" cellspacing="0" border="0" class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                            <tr>
                            
                            <th>Question</th>
                            <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                           @foreach($summaries as $summary)
                          <tr></tr>
                          <td>{{ $summary->question }}</td>
                           <td><label class="switch"><input type="checkbox"><span></span></label>
                      </td>
                     
                          @endforeach
                          </tbody>
                        </table>
                    </div>           
                  </div>
                </section>
                   </div>

                        <div class="tab-pane fade" id="kpa">
                               <div class="col-sm-12">
                              <div class="tab-pane" >
                            <section class="panel panel-default">
                                <header class="panel-heading font-bold">Key Performance Area (KPA)
                                 <a href="#new-kpa" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                                <div class="panel-body">
                                      <div class="table-responsive">
             
                                          <section class="scrollable wrapper">
                                <div class="">
                                  
                                  <ul class="list-group gutter list-group-lg list-group-sp sortable">
                                  @foreach($kpa as $kpa)
                                    <li class="list-group-item">
                                      <span class="pull-right" >
                                        <a href="#"><i class="fa fa-pencil fa-fw m-r-xs"></i></a>
                                        <a href="#"><i class="fa fa-plus fa-fw m-r-xs"></i></a>
                                        <a href="#"><i class="fa fa-times fa-fw"></i></a>                  
                                      </span>
                                      <span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> {{ $kpa->weightage }}</span>
                                      <div class="clear">
                                        {{ $kpa->question }}
                                      </div>
                                    </li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    </section>
                                  </div>
                                  </section>
                                  </div>
                            </div>
                        </div>


              
                      </div>
                    </div>
                  </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        </section>
@stop

 <div class="modal fade" id="new-appraisal" style="height:700px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Appraisal Cycle</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" data-validate="parsley" action="/create-performance" class="panel-body wrapper-lg">
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


 <div class="modal fade" id="new-kpa" style="height:900px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Key Performance Area</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" action="/create-performance" class="panel-body wrapper-lg">
                           @include('performance/kpa')
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
       $('#employee').select2();



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
  function loadSummary()
   {
         //alert($('#get_staff_id').val());
        
        $.get('/load-summary',
          {
            
          },
          function(data)
          { 

            $('#summaryTable tbody').empty();
            $.each(data, function (key, value) 
            {           
            $('#summaryTable tbody').append('<tr><td>'+ value['question'] +'</td><td><div class="col-sm-10"><label class="switch"><input type="checkbox"><span></span></label></div></td><td><a a href="#"><i onclick="deleteJob(\''+value['id']+'\',\''+value['job_title']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


function deleteDetails(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+ name +" from goal list?",   
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
          $.get('/delete-review-cycle',
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

 



