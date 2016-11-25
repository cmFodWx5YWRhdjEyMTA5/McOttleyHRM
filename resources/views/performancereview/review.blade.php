
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
                 <form method="post" data-validate="parsley" action="/save-claim" class="panel-body wrapper-lg">
                  <section class="panel panel-default">
                    
                    <div class="wizard clearfix">
                      <ul class="steps">
                        <li data-target="#step1" class="active"><span class="badge badge-info">1</span>Review Details</li>
                        <li data-target="#step2"><span class="badge">2</span>Part A</li>
                        <li data-target="#step3"><span class="badge">3</span>Part B</li>
                        <li data-target="#step4"><span class="badge">4</span>Part C</li>
                        <li data-target="#step5"><span class="badge">5</span>Save</li>
                        
                      </ul>
                      <div class="actions">
                        <button type="button" class="btn btn-default btn-xs btn-prev" disabled="disabled">Prev</button>
                        <button type="button" class="btn btn-default btn-xs btn-next" data-last="Finish">Next</button>
                      </div>
                    </div>
                    <div class="step-content">
                    {{-- Step 1 Start --}}
                      <div class="step-pane active" id="step1">
                      
                        <section class="panel panel-default">
                      <div class="panel-body">
                       
                    
                        
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('policy_number') ? ' has-error' : ''}}">
                            <label>Policy</label>
                            <select id="policy_number" data-required="true" name="policy_number" rows="3"  data-trigger="change" tabindex="1" data-placeholder="Select a customer" style="width:100%">
                             <option value="">-- select from here --</option>
                       {{--  @foreach($employees as $employee)
                        <option value="{{ $employee->staff_id }}">{{ $employee->fullname }}</option>
                          @endforeach  --}}
                        </select>         
                           @if ($errors->has('policy_number'))
                          <span class="help-block">{{ $errors->first('policy_number') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                      </div>
                    </section>

                      </div>
                    {{-- Step 1 End --}}  



                    {{-- Step 2 Start --}}
                      <div class="step-pane" id="step2">
                     
                          <section class="panel panel-default">
                             <header class="panel-heading font-bold">                  
                              Part A (Discussion points)
                             </header>
                        <div class="panel-body">
                        @foreach($partA as $partA)
                        <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('loss_description') ? ' has-error' : ''}}">
                            <label>{{ $partA->question_number }}. {{ $partA->question }} </label>
                            <textarea type="text" rows="3" class="form-control" id="loss_description" name="loss_description" value="{{ Request::old('loss_description') ?: '' }}"></textarea> 
                           @if ($errors->has('loss_description'))
                          <span class="help-block">{{ $errors->first('loss_description') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>
                        @endforeach
                      </div>
                    </section>

                      </div>
                    {{-- Step 2 End --}}
                    {{-- Step 3 Start --}}
                    <div class="step-pane" id="step3">
                          <p> <b>Appraiser to complete Parts B & C after appraisee has completed Part A.</b></p>
                          <b>Ratings Definition</b>
                          <ul>
                          <li><p>EXCEPTIONAL (5): Consistently exceeds all relevant performance standards. Provides leadership, fosters teamwork, is highly productive, innovative, responsive and generates top quality work.</p></li>
                          <li><p>EXCEEDS EXPECTATIONS (4): Consistently meets and often exceeds all relevant performance standards. Shows initiative and versatility, works collaboratively, has strong technical & interpersonal skills or has achieved significant improvement in these areas.</p></li>
                          <li><p> MEETS EXPECTATIONS (3): Meets all relevant performance standards. Seldom exceeds or falls short of desired results or objectives.</p></li>
                          <li><p>BELOW EXPECTATIONS (2): Sometimes meets the performance standards. Seldom exceeds and often falls short of desired results. Performance has declined significantly, or employee has not sustained adequate improvement, as required since the last performance review or performance.</p></li>
                          <li><p>NEEDS IMPROVEMENT (1): Consistently falls short of performance standards.</p></li>
                          </ul>
                         <section class="panel panel-default">
                             <header class="panel-heading font-bold">                  
                              Part B (Competency)
                             </header>
                        <div class="panel-body">
                        @foreach($partB as $partB)
                        <div class="line line-dashed line-lg pull-in"></div>
                         <div class="form-group pull-in clearfix">
                   <div class="form-group">
                      <label class="col-sm-4 control-label" data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $partB->tooltip }}">{{ $partB->question }}</label>
                      




                       <div class="col-sm-6">
                            <!-- radio -->
                            <div class="radio-inline">
                              <label class="radio-custom">
                                <input type="radio" name="radio" checked="checked">
                                <i class="fa fa-circle-o"></i>
                                1
                              </label>
                            </div>
                            <div class="radio-inline">
                              <label class="radio-custom">
                                <input type="radio" name="radio">
                                <i class="fa fa-circle-o checked"></i>
                                2
                              </label>
                            </div>
                            <div class="radio-inline">
                              <label class="radio-custom">
                                <input type="radio" name="radio">
                                <i class="fa fa-circle-o checked"></i>
                               3
                              </label>
                            </div>
                           <div class="radio-inline">
                              <label class="radio-custom">
                                <input type="radio" name="radio">
                                <i class="fa fa-circle-o checked"></i>
                                4
                              </label>
                            </div>
                            <div class="radio-inline">
                              <label class="radio-custom">
                                <input type="radio" name="radio">
                                <i class="fa fa-circle-o checked"></i>
                                5
                              </label>
                            </div>
                          </div>
                    </div>
            </div>
@endforeach





                     
                    </section>
                    </div>

                    {{-- Step 3 End --}}
                      <div class="step-pane" id="step4">
                      
                         <section class="panel panel-default">
                             <header class="panel-heading font-bold">                  
                              Part C (Performance Area)
                             </header>
                        <div class="panel-body">
                        @foreach($partC as $partC)
                        <div class="line line-dashed line-lg pull-in"></div>
                         <div class="form-group pull-in clearfix">
                   <div class="form-group">
                      <label class="col-sm-4 control-label" data-toggle="tooltip" data-placement="right" title="" data-original-title="{{ $partC->tooltip }}">{{ $partC->question }}</label>
                      
                      <div class="col-sm-8">
                        <input class="slider slider-horizontal form-control" type="text" value="" data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="1" data-slider-orientation="horizontal" >
                    </div>
                     </div>
                     </div>
                        @endforeach
                     
                    </section>

                      
                      </div>
                      
                       <div class="step-pane" id="step5">

                  


                       <button type="submit" class="btn btn-success btn-s-xs">Save Record</button>
                       </div>

                    </div>
                  </section>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                  </form>
                </section>
                </div>
              </div>


            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

 

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
     $('#claimantdetails').hide();
     $('#policy_number').select2();
  });
</script>
