@extends('layouts.default')
@section('content')
        <section id="content">
          <section class="hbox stretch">
          {{-- <aside class="aside-md bg-white b-r" id="subNav">
              <div class="wrapper b-b header">Payroll Manager</div>
              <ul class="nav">
                <li class="b-b b-light"><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Payroll Master</a></li>
                <li class="b-b b-light"><a href="payroll-slips"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Payslips</a></li>
              </ul>
            </aside>  --}}
            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                      <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default active"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
                     
                      <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-file"></i> File</a>
                    <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print List</a>
                     <span class="badge badge-info">Record(s) Found : {{ $payrolls->total() }} {{ str_plural('Employee', $payrolls->total()) }} </span>
                    </div>

                  <form action="/find-payroll" method="GET">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search for an employee or pay month">
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
                    <div class="table-responsive">
                      <table class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                            <th width="20"><input type="checkbox"></th>
                            <th></th>
                            <th>Staff #</th>
                            <th>Employee</th>
                            <th>Job Grade</th>
                            <th>Currency</th>
                            <th>Gross Salary</th>
                            <th>Allowances</th>
                            <th>Provident Fund %</th>
                            <th>Pension Fund %</th>
                          </tr>
                        </thead>
                        <tbody>
                        <form  method="post" action="/process-payroll-bulk" >
                        @foreach( $payrolls as $key => $payroll )
                          <tr>
                           
                             <td><input type="checkbox" name="staff[{{ $payroll->staff_id }}]" id="{{ $payroll->staff_id }}" value="{{ $payroll->staff_id }}"></td>
                             <td>{{ ++$key }}</td>
                            <td>{{ $payroll->staff_id }}</td>
                            <td>{{ $payroll->fullname }}</td>
                            <td>{{ $payroll->pay_grade }}</td>
                             <td>{{ $payroll->currency }}</td>
                              @permission('process-salary')
                            <td>{{ $payroll->basic_annual }}</td>
                            <td>{{ $payroll->car_allowance + $payroll->living_allowance + $payroll->housing_allowance+ $payroll->clothing_allowance}}</td>
                            <td>{{ $payroll->employee_ssf}}</td>
                            <td>{{  $payroll->pension_fund_percent }}</td>
                            @endpermission

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
                     
                        {!!$payrolls->render()!!}
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        @permission('process-salary')
                 <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-add"></i> Generate Bulk Payroll</button>
                        @endpermission
                    </div>
                    
                  </div>
                   
                </form>
                </footer>
              </section>
            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop

 <div class="modal fade" id="new-payroll" style="height:900px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">New Payroll</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/process-payroll" class="panel-body wrapper-lg">
                           @include('payroll/new')
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
function getSalaryDetails()
{ 

   $("input[type=text], textarea").val("");

  $.get("/get-salary-details",
          {"id":$('#staff_id').val()},
          function(json)
          {
                $('#new-payroll input[name="basic_annual"]').val(json.basic_annual);
                $('#new-payroll input[name="epf_deducation_percent"]').val(json.epf_deducation_percent);
                $('#new-payroll input[name="living_allowance"]').val(json.living_allowance);
                $('#new-payroll input[name="car_allowance"]').val(json.car_allowance);
                $('#new-payroll input[name="pension_fund_percent"]').val(json.pension_fund_percent);
                $('#new-payroll select[name="currency"]').val(json.currency);
                $('#new-payroll select[name="pay_grade"]').val(json.pay_grade);
                computeEmployeeSSF();
                computeEmployerSSF();
                incomeTax();
              //}
          },'json').fail(function(msg) {
          //alert(msg.status + " " + msg.statusText);
        });

}
</script>

<script>
function computeEmployeeSSF()
{

  if($('#basic_annual').val()=="")
  {sweetAlert("Please select staff ",'Fill all fields', "error");}
  else
  {
    $.get('/employee-ssf',
        {

          "id": $('#staff_id').val(),
          "salary": $('#basic_annual').val()

        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
          //sweetAlert("Employee SSF : ", data["employeessf"], "info");
           $('#employee_ssf').val(data.employeessf);
       
      });
                                        
        },'json');
  }
}
  
function computeEmployerSSF()
{

  if($('#basic_annual').val()=="")
  {sweetAlert("Please select staff ",'Fill all fields', "error");}
  else
  {
    $.get('/employer-ssf',
        {

          "id": $('#staff_id').val(),
          "salary": $('#basic_annual').val()

        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
          //sweetAlert("Employee SSF : ", data["employeessf"], "info");
           $('#employer_ssf').val(data.employerssf);
       
      });
                                        
        },'json');
  }
}

function incomeTax()
{

  if($('#basic_annual').val()=="")
  {sweetAlert("Please select staff ",'Fill all fields', "error");}
  else
  {
    $.get('/income-tax',
        {

          "id": $('#staff_id').val(),
          "salary": $('#basic_annual').val(),
          "allowances": $('#car_allowance').val(),
          "deductions": 0

        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
          //sweetAlert("Employee SSF : ", data["employeessf"], "info");
           $('#income_tax').val(data.income_tax);
           $('#pension_fund_percent').val(data.employeePF);
           $('#epf_deducation_percent').val(data.employerPF);
      });
                                        
        },'json');
  }
}
  
</script>



<script src="{{ asset('/event_components/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function () {
  $('#salary_start_date').daterangepicker({
     "minDate": moment('2010-06-14'),
     "maxDate": moment(),
    "singleDatePicker":true,
    "autoApply": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});
</script>


<script type="text/javascript">
$(document).ready(function () {
   
    $('#staff_id').select2();
    

  });
</script>





