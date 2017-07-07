
@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li class="active"> Review Administration </li>   
              </ul>
             
               <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-bar-chart-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="/periodic-performance-review">
                      <span class="h3 block m-t-xs"><strong>0</strong></span>
                      <small class="text-muted text-uc">Period Performance Reviews</small>
                    </a>
                  </div>
                    <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-signal fa-stack-1x text-white"></i>
                      </span>
                    </span>
                    <a class="clear" href="/job-audit-review">
                      <span class="h3 block m-t-xs"><strong id="bugs">0</strong></span>
                      <small class="text-muted text-uc">Job Audit Questionnaire</small>
                    </a>
                  </div>
                    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-dark"></i>
                      <i class="fa fa-filter fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong>0</strong></span>
                      <small class="text-muted text-uc">Probationary Performance Review</small>
                    </a>
                  </div>
                   <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa  fa-thumbs-o-down fa-stack-1x text-white"></i>
                      </span>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="bugs">0</strong></span>
                      <small class="text-muted text-uc">EXIT INTERVIEW</small>
                    </a>
                  </div>

                 
                </div>
              </section>

         <div class="row">
                <div class="col-md-12">
                <section class="scrollable wrapper w-f">
                    <section class="vbox">
                <form method="post" action="/save-periodic-performance-review">
                      <textarea id="report" name="report" >{!! $documents->content !!}</textarea>
                       <footer class="panel-footer text-right bg-light lter">
                      <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                       <select id="staff_id" name="staff_id" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                         <option value="">-- Select an employee --</option>
                           @foreach($employees as $employee)
                        <option value="{{ $employee->staff_id }}">{{ $employee->fullname }}</option>
                          @endforeach  
                         </select>
                         </div>
                         </div>
                        
                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                          <select id="supervisor_id" name="supervisor_id"  rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                         <option value="">-- Select Supervisor --</option>
                           @foreach($employees as $employee)
                        <option value="{{ $employee->staff_id }}">{{ $employee->fullname }}</option>
                          @endforeach  
                         </select> 
                         </div>
                         </div>

                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                         <select id="director_id" name="director_id" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                         <option value="">-- Select Director --</option>
                           @foreach($employees as $employee)
                        <option value="{{ $employee->staff_id }}">{{ $employee->fullname }}</option>
                          @endforeach  
                         </select> 
                         </div>
                         </div>
                        @if ($errors->has('file_name'))
                          <span class="help-block">{{ $errors->first('file_name') }}</span>
                           @endif             
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
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
  <script>tinymce.init({ selector:'#report' ,menubar: false,
  browser_spellcheck: true,height: 700 });</script>

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>






<script type="text/javascript">
$(function () {
  $('#loss_date').daterangepicker({
    "minDate": moment('2010-06-14 0'),
     "maxDate": moment(),
    "singleDatePicker":true,
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 1,
    "autoApply": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY HH:mm:ss",
      "separator": " - ",
    }
  });
});
</script>

<script type="text/javascript">
$(function () {
  $('#submit_broker_date').daterangepicker({
     "minDate": moment('2010-06-14 0'),
    "maxDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY HH:mm:ss",
      "separator": " - ",
    }
  });
});
</script>
<script type="text/javascript">
$(function () {
  $('#submit_insurer_date').daterangepicker({
     "minDate": moment('2010-06-14 0'),
    "maxDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY HH:mm:ss",
      "separator": " - ",
    }
  });
});
</script>
<script type="text/javascript">
$(function () {
  $('#settlement_date').daterangepicker({
    "minDate": moment('2010-06-14 0'),
    "maxDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY HH:mm:ss",
      "separator": " - ",
    }
  });
});
</script>
<script>
function  getclaimsform() 
{
    //alert($('#claimant_insured_status'));
  //alert($('#product').val());
   if( $('#claimant_insured_status').val() == "No")
    {

         $('#claimantdetails').show();
         
   }
  else if( $('#claimant_insured_status').val() == "Yes")
    {
        $('#claimantdetails').hide();
   }

   else
   {
     $('#claimantdetails').hide();
    }
}
</script>


<script type="text/javascript">
$(document).ready(function () {
     $('#staff_id').select2();
      $('#supervisor_id').select2();
      $('#director_id').select2();
  });
</script>
