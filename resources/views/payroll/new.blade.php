  <div class="tab-pane" id="accountinformation">
                       
                      <section class="panel panel-default">
                         <header class="panel-heading font-bold">Employee Info</header>
                          <div class="panel-body">
                           <div class="form-group pull-in clearfix">
                          <div class="col-sm-12">
                          <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : ''}}">
                            <label>Employee Name</label>
                            <select id="staff_id" name="staff_id" data-required="true" onchange="getSalaryDetails()" rows="3" tabindex="1" data-placeholder="Select here.." style="width:100%">
                         <option value="">-- Select an employee --</option>
                              @foreach($employees as $employee)
                        <option value="{{ $employee->staff_id }}">{{ $employee->fullname }}</option>
                          @endforeach  
                         </select>         
                           @if ($errors->has('staff_id'))
                          <span class="help-block">{{ $errors->first('staff_id') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>

                          </div>

                      </section>

                       <section class="panel panel-default">
                                <header class="panel-heading font-bold">Pay</header>
                                <div class="panel-body">
                          <div class="form-group pull-in clearfix">
                          <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('pay_grade') ? ' has-error' : ''}}">
                            <label>Pay Grade</label>
                            <select id="pay_grade" name="pay_grade" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                         <option value="">-- Not set --</option>
                             @foreach($paygrades as $paygrade)
                        <option value="{{ $paygrade->grade }}">{{ $paygrade->grade }}</option>
                          @endforeach  
                         </select>         
                           @if ($errors->has('pay_grade'))
                          <span class="help-block">{{ $errors->first('pay_grade') }}</span>
                           @endif    
                          </div>   
                        </div>

                         <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('currency') ? ' has-error' : ''}}">
                            <label>Currency</label>
                            <select id="currency" name="currency" data-required="true" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                           @foreach($currency as $currency)
                        <option value="{{ $currency->type }}">{{ $currency->type }}</option>
                          @endforeach  
                        </select>         
                           @if ($errors->has('currency'))
                          <span class="help-block">{{ $errors->first('currency') }}</span>
                           @endif    
                          </div>   
                        </div>


                        {{-- <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('salary_event') ? ' has-error' : ''}}">
                            <label>Event</label>
                            <select id="salary_event" name="salary_event" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                             <option value="">-- Not set --</option>
                           @foreach($salaryevents as $salaryevent)
                        <option value="{{ $salaryevent->type }}">{{ $salaryevent->type }}</option>
                          @endforeach  
                        </select>         
                           @if ($errors->has('salary_event'))
                          <span class="help-block">{{ $errors->first('salary_event') }}</span>
                           @endif    
                          </div>   
                        </div> --}}


                        <div class="col-sm-6">
                       <div class="form-group @if($errors->has('salary_start_date')) has-error @endif">
                        <label for="salary_start_date">Pay Period</label>
                        <div class="input-group">
                        <input type="text" class="form-control" data-required="true" onchange="getSalaryDetails()"  name="salary_start_date" id="salary_start_date" placeholder="Select your time" value="{{ old('salary_start_date') }}">
                         <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                      </span>
                      </div>
                        @if ($errors->has('salary_start_date'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
                        {{ $errors->first('salary_start_date') }}
                       </p>
                        @endif
                      </div>
                      </div>

                         {{-- <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('account_type') ? ' has-error' : ''}}">
                            <label>Minimum</label>
                            <select id="account_type" name="account_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select an account --</option>
                          
                        </select>         
                           @if ($errors->has('account_type'))
                          <span class="help-block">{{ $errors->first('account_type') }}</span>
                           @endif    
                          </div>   
                        </div>
                         <div class="col-sm-3">
                          <div class="form-group{{ $errors->has('account_type') ? ' has-error' : ''}}">
                            <label>Maximum</label>
                            <select id="account_type" name="account_type" rows="3" tabindex="1" data-placeholder="Select here.." class="form-control m-b">
                          <option value="">-- Select an account --</option>
                          
                        </select>         
                           @if ($errors->has('account_type'))
                          <span class="help-block">{{ $errors->first('account_type') }}</span>
                           @endif    
                          </div>   
                        </div> --}}
                        </div>
                        </div>
                        </section>

                        
                          <div class="row">
                          <div class="col-md-6">
                         <section class="panel panel-default">
                                <header class="panel-heading font-bold">Earnings</header>
                                <div class="panel-body">
                       <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">    
                        <div class="form-group">
                          <label>Basic Pay</label>
                          <div class="form-group{{ $errors->has('basic_annual') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="basic_annual" readonly="true" data-required="true" name="basic_annual" value="{{ Request::old('basic_annual') ?: '' }}">   
                          @if ($errors->has('basic_annual'))
                          <span class="help-block">{{ $errors->first('basic_annual') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Car Maintenance Allowance</label>
                          <div class="form-group{{ $errors->has('car_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="car_allowance" readonly="true" name="car_allowance" value="{{ Request::old('car_allowance') ?: '' }}">   
                          @if ($errors->has('car_allowance'))
                          <span class="help-block">{{ $errors->first('car_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Utility Allowance</label>
                          <div class="form-group{{ $errors->has('living_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="living_allowance" readonly="true"  name="living_allowance" value="{{ Request::old('living_allowance') ?: '' }}">   
                          @if ($errors->has('living_allowance'))
                          <span class="help-block">{{ $errors->first('living_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Housing Allowance</label>
                          <div class="form-group{{ $errors->has('housing_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="housing_allowance" readonly="true"  name="housing_allowance" value="{{ Request::old('housing_allowance') ?: '' }}">   
                          @if ($errors->has('housing_allowance'))
                          <span class="help-block">{{ $errors->first('housing_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                         <div class="form-group">
                          <label>Clothing Allowance</label>
                          <div class="form-group{{ $errors->has('clothing_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="clothing_allowance" readonly="true" name="clothing_allowance" value="{{ Request::old('clothing_allowance') ?: '' }}">   
                          @if ($errors->has('clothing_allowance'))
                          <span class="help-block">{{ $errors->first('clothing_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                        <div class="form-group">
                          <label>Transport Allowance</label>
                          <div class="form-group{{ $errors->has('transport_allowance') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" id="transport_allowance" readonly="true" name="transport_allowance" value="{{ Request::old('transport_allowance') ?: '' }}">   
                          @if ($errors->has('transport_allowance'))
                          <span class="help-block">{{ $errors->first('transport_allowance') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </section>
                        </div>

                        <div class="col-md-6">
                         <section class="panel panel-default">
                                <header class="panel-heading font-bold">Deductions</header>
                                <div class="panel-body">

                      <div class="form-group pull-in clearfix">
                          <div class="col-sm-6">
                            <label>Employee SSF</label> 
                            <div class="form-group{{ $errors->has('employee_ssf') ? ' has-error' : ''}}">
                            <input type="text" rows="3" readonly="true" class="form-control" id="employee_ssf" name="employee_ssf" value="{{ Request::old('employee_ssf') ?: '' }}">   
                           @if ($errors->has('employee_ssf'))
                          <span class="help-block">{{ $errors->first('employee_ssf') }}</span>
                           @endif    
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('employer_ssf') ? ' has-error' : ''}}">
                            <label>Employer SSF</label>
                           <input type="text" rows="3" readonly="true" class="form-control" id="employer_ssf" name="employer_ssf" value="{{ Request::old('employer_ssf') ?: '' }}"> 
                           @if ($errors->has('employer_ssf'))
                          <span class="help-block">{{ $errors->first('employer_ssf') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">


                          <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('pension_fund_percent_val') ? ' has-error' : ''}}">
                            <label>Provident Fund Contr.</label>
                           <input type="text" rows="3" readonly="true" class="form-control" id="pension_fund_percent" name="pension_fund_percent" value="{{ Request::old('pension_fund_percent') ?: '' }}"> 
                           @if ($errors->has('pension_fund_percent'))
                          <span class="help-block">{{ $errors->first('pension_fund_percent') }}</span>
                           @endif    
                          </div>   
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group{{ $errors->has('loan_repayment') ? ' has-error' : ''}}">
                            <label>Loan Repayment</label>
                           <input type="text" rows="3" readonly="true" class="form-control" id="loan_repayment" name="loan_repayment" value="{{ Request::old('loan_repayment') ?: '' }}"> 
                           @if ($errors->has('loan_repayment'))
                          <span class="help-block">{{ $errors->first('loan_repayment') }}</span>
                           @endif    
                          </div>   
                        </div>
                        </div>


                        <div class="form-group pull-in clearfix">
                        <div class="col-sm-4">    
                        <div class="form-group">
                          <label>McFund Plus</label>
                          <div class="form-group{{ $errors->has('mcfund_plus') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" readonly="true" id="mcfund_plus" name="mcfund_plus" value="{{ Request::old('mcfund_plus') ?: '' }}">   
                          @if ($errors->has('mcfund_plus'))
                          <span class="help-block">{{ $errors->first('mcfund_plus') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-4">    
                        <div class="form-group">
                          <label>McTrust</label>
                          <div class="form-group{{ $errors->has('mctrust') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" readonly="true" id="mctrust" name="mctrust" value="{{ Request::old('mctrust') ?: '' }}">   
                          @if ($errors->has('mctrust'))
                          <span class="help-block">{{ $errors->first('mctrust') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-4">    
                        <div class="form-group">
                          <label>McFund</label>
                          <div class="form-group{{ $errors->has('mcfund') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" readonly="true" id="mcfund" name="mcfund" value="{{ Request::old('mcfund') ?: '' }}">   
                          @if ($errors->has('mcfund'))
                          <span class="help-block">{{ $errors->first('mcfund') }}</span>
                           @endif                           
                        </div>
                        </div>
                        </div>
                        </div>

                       <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">   
                         <div class="form-group">
                          <label>Income Tax</label>
                          <div class="form-group{{ $errors->has('income_tax') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" readonly="true" data-required="true" id="income_tax" name="income_tax" value="{{ Request::old('income_tax') ?: '' }}">   
                          @if ($errors->has('income_tax'))
                          <span class="help-block">{{ $errors->first('income_tax') }}</span>
                           @endif                           
                        </div>
                        </div> 
                        </div>

                        <div class="col-sm-6">   
                         <div class="form-group">
                          <label>Net Salary</label>
                          <div class="form-group{{ $errors->has('salary_payable') ? ' has-error' : ''}}">
                          <input type="text" class="form-control" readonly="true" data-required="true" id="salary_payable" name="salary_payable" value="{{ Request::old('salary_payable') ?: '' }}">   
                          @if ($errors->has('salary_payable'))
                          <span class="help-block">{{ $errors->first('salary_payable') }}</span>
                           @endif                           
                        </div>
                        </div> 
                        </div>
                        </div>
                        </div>
                        </section>
                        </div>

                        </div>

                  <footer class="panel-footer text-right bg-light lter">
                   @permission('process-salary')
                        <button type="submit" class="btn btn-success btn-s-xs">Add</button>
                        @endpermission
                      </footer>


                        </div>