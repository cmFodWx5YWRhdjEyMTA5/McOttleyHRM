@extends('layouts.default')
@section('content')
<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li class="active"> Manage Payroll </li>
              </ul>

             
             <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-money fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="/payroll-master"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open">
                      <span class="h3 block m-t-xs"><strong>0</strong></span>
                      <small class="text-muted text-uc">Generate Bulk Payroll</small>
                    </a>
                  </div>
                    <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-tags fa-stack-1x text-white"></i>
                      </span>
                    </span>
                    <a class="clear" href="/payroll-slips">
                      <span class="h3 block m-t-xs"><strong id="bugs">0</strong></span>
                      <small class="text-muted text-uc">Payslips</small>
                    </a>
                  </div>
                    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-dark"></i>
                      <i class="fa fa-plus-circle fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#new-payroll" data-toggle="modal">
                      <span class="h3 block m-t-xs"><strong>0</strong></span>
                      <small class="text-muted text-uc">Generate Single Payroll</small>
                    </a>
                  </div>
                   <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa  fa-calendar fa-stack-1x text-white"></i>
                      </span>
                    </span>
                    <a class="clear" href="/payroll-master">
                      <span class="h3 block m-t-xs"><strong id="bugs">0</strong></span>
                      <small class="text-muted text-uc">Reports</small>
                    </a>
                  </div>

                 
                </div>
              </section>


              <div class="row">

                <div class="col-md-12">
 
                  <section class="panel panel-default">
                  <header class="panel-heading">
                    <form action="/find-slips" method="GET">
                      <div class="input-group text-ms">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search by employee, department, bank">
                        <div class="input-group-btn">
                           <button class="btn btn-sm btn-success" type="submit">Search!</button>
                        </div>
                      </div>
                      </form>
                    </header>
                    <div class="table-responsive">
                     @permission('process-salary')
                      <table class="table table-striped m-b-none text-sm" width="100%">
                        <thead>
                          <tr>
                           <th></th>
                            <th>Employee</th>
                            <th>Basic Salary</th>
                            <th>Allowances</th>
                            <th>Gross Earning</th>
                            <th> SSF - 5.5% </th>
                            <th> PF-5% </th>
                            <th>Income Tax</th> 
                            <th>Loan Repayment</th>
                            <th>Deductions</th>
                            <th>Net Salary</th>
                            <th>Pay Period</th>
                            <th>Created On</th>
                            <th width="20"></th>
                            <th width="20"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach( $payrolls as $key => $payroll )
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $payroll->name }}</td>
                            <td>{{ $payroll->basic_annual}}</td>
                            <td>{{ $payroll->living_allowance + $payroll->car_allowance + $payroll->housing_allowance + $payroll->clothing_allowance }}</td>
                            <td>{{ $payroll->basic_annual +  $payroll->living_allowance + $payroll->car_allowance + $payroll->housing_allowance + $payroll->clothing_allowance }}</td>
                            <td>{{ $payroll->employee_ssf }}</td>
                            <td>{{ $payroll->pension_fund_percent}}</td>
                            <td>{{ $payroll->income_tax}}</td>
                            <td>{{ $payroll->loan_repayment }}</td>
                            <td>{{ $payroll->mcfund_plus + $payroll->mcfund + $payroll->mctrust  }}</td>
                            <td>{{  ($payroll->basic_annual +  $payroll->living_allowance + $payroll->car_allowance + $payroll->housing_allowance + $payroll->clothing_allowance)-($payroll->employee_ssf+  $payroll->pension_fund_percent + $payroll->income_tax + $payroll->loan_repayment + $payroll->mcfund_plus + $payroll->mcfund + $payroll->mctrust)  }}</td>
                            
                            <td>{{ $payroll->payperiod }}</td>
                            <td>{{ $payroll->createdon }}</td>
                            <td><a class="bootstrap-modal-form-open" href="/print-payroll/{{ $payroll->trasactionid  }}" data-toggle="modal" ><i class="fa fa-print"></i></a></td>
                                <td><a class="bootstrap-modal-form-open" href="#" data-toggle="modal" ><i onclick="deleteSlip('{{$payroll->id}}','{{$payroll->name}}')" class="fa fa-trash"></i></a></td>
                          </tr>
                         @endforeach
                        </tbody>
                      </table>
                      @endpermission
                    </div>
                  </section>
         
                </div>
              </div>

            </section>
             <footer class="footer bg-white b-t">
                  
                  <a href="#new-payroll" class="bootstrap-modal-form-open float" data-toggle="modal">
<i class="fa fa-plus my-float">  </i><i class="fa fa-money my-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add New Payroll"></i>
</a>
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t pull-center">
                      <span class="badge badge-info">Record(s) Found : {{ $payrolls->total() }} {{ str_plural('Employee', $payrolls->total()) }}</span>
                      </p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right text-center-xs">                
                     
                         {!!$payrolls->render()!!}
                        
                    </div>
                  </div>


                </footer>
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


  $.get("/get-salary-details",
          {"id":$('#staff_id').val()},
          function(json)
          {

                $('#new-payroll input[name="basic_annual"]').val(json.basic_annual);
                $('#new-payroll input[name="employee_ssf"]').val(json.employee_ssf);
                $('#new-payroll input[name="living_allowance"]').val(json.living_allowance);
                $('#new-payroll input[name="car_allowance"]').val(json.car_allowance);
                $('#new-payroll input[name="clothing_allowance"]').val(json.clothing_allowance);
                $('#new-payroll input[name="housing_allowance"]').val(json.housing_allowance);
                $('#new-payroll input[name="loan_repayment"]').val(json.loan_repayment);
                $('#new-payroll input[name="mcfund_plus"]').val(json.mcfund_plus);
                $('#new-payroll input[name="mcfund"]').val(json.mcfund);
                $('#new-payroll input[name="mctrust"]').val(json.mctrust);
                $('#new-payroll input[name="pension_fund_percent"]').val(json.pension_fund_percent);
                $('#new-payroll select[name="currency"]').val(json.currency);
                $('#new-payroll select[name="pay_grade"]').val(json.pay_grade);
                computeEmployeeSSF();
                computeEmployerSSF();
                incomeTax();
              //}
          },'json').fail(function(msg) {
         // alert(msg.status + " " + msg.statusText);
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
          "car_allowance": $('#car_allowance').val(),
          "living_allowance": $('#living_allowance').val(),
          "clothing_allowance": $('#clothing_allowance').val(),
          "housing_allowance": $('#housing_allowance').val(),
          "pension_fund_percent" : $('#pension_fund_percent').val(),
          "employee_ssf" : $('#employee_ssf').val(),
          "loan_repayment" : $('#loan_repayment').val(),
          "mcfund_plus" : $('#mcfund_plus').val(),
          "mcfund" : $('#mcfund').val(),
          "mctrust" : $('#mctrust').val(),
          "salary_start_date" : $('#salary_start_date').val(),
          "deductions": 0



        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
           
           $('#income_tax').val(data.income_tax);
           $('#pension_fund_percent').val(data.employeePF);
           $('#epf_deducation_percent').val(data.employerPF);
           $('#salary_payable').val(data.salary_payable);
          // sweetAlert("Work Days : ", data["workdays"], "info");
      });
                                        
        },'json');
  }
}


function deleteSlip(id,name)
  {

         
      swal({   
        title: "Are you sure?",   
        text: "Do you want to delete "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-payroll',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was successfully deleted.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to delete.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to delete.", "error");   
        } });

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





