@extends('layouts.default')
@section('content')


            <header class="header b-b b-light hidden-print">
              <button href="#" class="btn btn-sm btn-info pull-right" onClick="javascript:window.print();">Print</button>
              
              <p>Payroll</p>
            </header>
            <section class="scrollable wrapper">
              <i class="fa fa-power-off fa fa-3x"></i>
              <div class="row">
                <div class="col-xs-6">
                  <h4>McPersona : PAYSLIP</h4>
                  <p><a href="#">www.McOttley.com</a></p>
                  Name : <p><a href="#">{{ $employee->fullname }}</a></p>
                    Grade : <p><a href="#">{{ $job->job_title }}</a></p>
                    Month : <p><a href="#">{{ $bills[0]->payperiod }}</a></p>
                     SSF No : <p><a href="#">{{ $employee->ssn }}</a></p>
                     Bank : <p><a href="#">{{ $bank->bank_name }}</a></p>
                     Bank Account : <p><a href="#">{{ $bank->bank_account_number }}</a></p>
                
                </div>
                <div class="col-xs-6 text-right">
                  <p class="h4"># {{ $bills[0]->trasactionid }}</p>
                  <h5>{{ date('Y-m-d') }}</h5>   
               <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(date('MY'), 'QRCODE')}}" alt="barcode" />   
                </div>
              </div>          
          
              <div class="line"></div>
              <table class="table">
                <thead>
                  <tr>
                    <th width="20"></th>
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


                  </tr>
                </thead>
                <tbody>
                @if($employee->email =  Auth::user()->getNameOrUsername() )
                  @foreach($bills as $keys => $payroll)
                  <tr>
                 
                    <td>{{ ++$keys }}</td>
                
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

                  </tr>
                 @endforeach
                @endif
                </tbody>


              </table>
             <p><a href="#">Printed By :</a> {{ Auth::user()->getNameOrUsername() }} </p>
            </section>
       
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop