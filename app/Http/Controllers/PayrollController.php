<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;
use McPersona\Models\Payroll;
use McPersona\Models\PayrollList;
use McPersona\Models\Employee;
use McPersona\Models\EmployeeSalary;
use McPersona\Models\Currency;
use McPersona\Models\PayGrade;
use McPersona\Models\EmployeeBank;
use McPersona\Models\SalaryEvent;
use McPersona\Models\EmployeeJob;
use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;
use Input;
use Response;
use Datetime;
use Carbon\Carbon;
use Auth;
use Exception;

class PayrollController extends Controller
{

   public function __construct()
    {
        $this->middleware('role:HR Manager');
        $this->middleware('auth');

    }


    public function findSlip(Request $request)
    {
      

        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = $request->get('search');

    $employees = Employee::where('status','Active')->get();
    $paygrades = PayGrade::get();
    $currency  = Currency::get();
    //$salaryevents = SalaryEvent::get();
    $payrolls  = Payroll::where('name', 'like', "%$search%")
            ->orWhere('staffid', 'like', "%$search%")
            ->orWhere('bank', 'like', "%$search%")
            ->orWhere('accountnumber', 'like', "%$search%")
            ->orderBy('name')
            ->paginate(30)
            ->appends(['search' => $search]);

    return view('payroll.index', compact('payrolls','employees','paygrades','currency','salaryevents'));
  
    }


    public function findPayroll(Request $request)
    {
      

        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = $request->get('search');

    $employees = Employee::where('status','Active')->get();
    $paygrades = PayGrade::get();
    $currency  = Currency::get();
    //$salaryevents = SalaryEvent::get();
    $payrolls  = PayrollList::where('fullname', 'like', "%$search%")
            ->orWhere('staff_id', 'like', "%$search%")
            ->orderBy('fullname')
            ->paginate(30)
            ->appends(['search' => $search]);

    return view('payroll.master', compact('payrolls','employees','paygrades','currency','salaryevents'));
  
    }


   public function index()
    {
   
    $employees = Employee::where('status','Active')->get();
    $paygrades = PayGrade::get();
    $currency  = Currency::get();
    //$salaryevents = SalaryEvent::get();
    $payrolls  = Payroll::orderBy('createdon', 'DESC')->paginate(30);
    return view('payroll.index', compact('payrolls','employees','paygrades','currency','salaryevents'));
     
    }

    public function masterfile()
    {
   
    $employees = Employee::where('status','Active')->get();
    $paygrades = PayGrade::get();
    $currency  = Currency::get();
    $payrolls  = PayrollList::orderBy('fullname', 'DESC')->paginate(30);
    return view('payroll.master', compact('payrolls','employees','paygrades','currency','salaryevents'));
     
    }

    public function getSalaryDetails()
    {
    
    $user_id = Input::get('id');
    $salary = EmployeeSalary::where('staff_id',$user_id)->orderBy('created_on', 'desc')->first(); 
    $data = Array(
        'pay_grade'=>$salary->pay_grade,
        'currency'=>$salary->currency,
        'basic_annual'=>$salary->basic_annual,
        'car_allowance'=>$salary->car_allowance,
        'living_allowance'=>$salary->living_allowance,
        'housing_allowance'=>$salary->housing_allowance,
        'clothing_allowance'=>$salary->clothing_allowance,

        'employee_ssf'=>$salary->employee_ssf,
        'pension_fund_percent'=>$salary->pension_fund_percent,
        'loan_repayment'=>$salary->loan_repayment,
        'mcfund_plus'=>$salary->mcfund_plus,
        'mcfund'=>$salary->mcfund,
        'mctrust'=>$salary->mctrust,

    );
    return Response::json($data);


    }

     public function printpayroll($id)
    {
        

        $bills=Payroll::where('trasactionid' ,'=', $id)->get();
        $job     = EmployeeJob::where('staff_id',$bills[0]->staffid)->first();
        $bank     = EmployeeBank::where('staff_id',$bills[0]->staffid)->first();
        $employee = Employee::where('staff_id',$bills[0]->staffid)->first();
        return view('payroll.slip', compact('bills','job','bank','employee'));
    }


    public function getStaffAge()
    {
       $user_id  = Input::get('id');
       $employee = Employee::where('staff_id',$user_id)->first();
       return $employee->date_of_birth->age;
    }

     public function computeSSNIT_employee()
     {
          $age= $this->getStaffAge();
          $salary = Input::get('salary');

         if($age < 60)
      {
          $employee =$salary * 5.5/100 ; // some integer 
      }
      else
      {
           $employee = 0 ; // some integer
      }
      
      //return $employee;
      $added_response = array('employeessf'=>$employee);
      return  Response::json($added_response);

     }

     public function computeSSNIT_employer()
     {

      $age= $this->getStaffAge();
      $salary = Input::get('salary');

         if($age < 60)
      {
          $employer =$salary * 13/100 ; // some integer 
      }
      else
      {
           $employer = 0 ; // some integer
      }
      
      //return $employee;
      $added_response = array('employerssf'=>$employer);
      return  Response::json($added_response);

     }


     public function quickCompute()
    {


      $salary =Input::get('salary');
      $employee_ssf = Input::get('employee_ssf');
      $pension_fund_percent = Input::get('pension_fund_percent');
      $car_allowance = Input::get('car_allowance');
      $living_allowance = Input::get('living_allowance');
      $clothing_allowance = Input::get('clothing_allowance');
      $housing_allowance = Input::get('housing_allowance');
      $allowances  = $car_allowance + $living_allowance + $housing_allowance+$clothing_allowance;
      $deductions = Input::get('deductions');

      //
      $loan_repayment = Input::get('loan_repayment');
      $mcfund_plus = Input::get('mcfund_plus');
      $mcfund = Input::get('mcfund');
      $mctrust = Input::get('mctrust');





      $employeePfval = $pension_fund_percent;
      $employerPfval = 0;

      
        $ssf_employee = $employee_ssf/100 ;
        $ssf_employer = 13/100 ;
      

     $tax = 0 ; 
     $income = $salary ;
     $allowance = $allowances ;
     $deduction = $deductions ;
     $employeePf = $salary * ($employeePfval/100);
     $employerPf = $salary * ($employerPfval/100);

    
     $employee_SSNIT = $income * $ssf_employee ;
     $employer_SSNIT = $income * $ssf_employer ;
     $taxable_income = ($income - $employee_SSNIT - $employeePf) + $allowance - $deduction;
     
  if($taxable_income<=216)
    {
      $tax = 0.0;
    }
    else if($taxable_income>=217&&$taxable_income<=324)
    {
     $tax = ($taxable_income-216)*(5/100);
    }
    else if($taxable_income>=325&&$taxable_income<=475)
    {
      $tax = 5.4+(($taxable_income-324)*(10/100));
    }
    else if($taxable_income>=475&&$taxable_income<=3240)
    {
     $tax = 20.5+(($taxable_income-475)*(17.5/100));
    }
    else
    {
      $tax = 504.38+(($taxable_income-3240)*(25/100));
    }
    
    $netsalary = (($salary + $living_allowance + $car_allowance + $housing_allowance + $clothing_allowance)-($employee_SSNIT +  $employeePf + $tax + $loan_repayment + $mcfund_plus + $mcfund + $mctrust));
   // return $tax;

    $added_response = array('netsalary'=>$netsalary);
    return  Response::json($added_response);

  }




    public function computePAYE()
    {
  
      $salary_start_date = Input::get('salary_start_date');
      $inclusion_date = Carbon::createFromFormat('d/m/Y',$this->change_date_format_rate($salary_start_date))->day;
      $days_of_month  = Carbon::createFromFormat('d/m/Y',$this->change_date_format_rate($salary_start_date))->daysInMonth;
      $workdays       = $days_of_month-$inclusion_date;
      $rate_payable   = ($workdays/$days_of_month);  


      $age= $this->getStaffAge();
      $salary = Input::get('salary');
      $employee_ssf = Input::get('employee_ssf');
      $pension_fund_percent = Input::get('pension_fund_percent');
      $car_allowance = Input::get('car_allowance');
      $living_allowance = Input::get('living_allowance');
      $clothing_allowance = Input::get('clothing_allowance');
      $housing_allowance = Input::get('housing_allowance');
      $allowances  = $car_allowance + $living_allowance + $housing_allowance+$clothing_allowance;
      $deductions = Input::get('deductions');

      $loan_repayment = Input::get('loan_repayment');
      $mcfund_plus = Input::get('mcfund_plus');
      $mcfund = Input::get('mcfund');
      $mctrust = Input::get('mctrust');


      $employeePfval = $pension_fund_percent;
      $employerPfval = 0;

      if($age < 60)
      {
        $ssf_employee = $employee_ssf/100 ;
        $ssf_employer = 13/100 ;
      }
      else
      {
        $ssf_employee = 0 ;
        $ssf_employer = 0 ;
      }


     $tax = 0 ; 
     $income = $salary ;
     $allowance = $allowances ;
     $deduction = $deductions ;
     $employeePf = $salary * ($employeePfval/100);
     $employerPf = $salary * ($employerPfval/100);

    
     $employee_SSNIT = $income * $ssf_employee ;
     $employer_SSNIT = $income * $ssf_employer ;
     $taxable_income = ($income - $employee_SSNIT - $employeePf) + $allowance - $deduction;
     
  if($taxable_income<=216)
    {
      $tax = 0.0;
    }
    else if($taxable_income>=217&&$taxable_income<=324)
    {
     $tax = ($taxable_income-216)*(5/100);
    }
    else if($taxable_income>=325&&$taxable_income<=475)
    {
      $tax = 5.4+(($taxable_income-324)*(10/100));
    }
    else if($taxable_income>=475&&$taxable_income<=3240)
    {
     $tax = 20.5+(($taxable_income-475)*(17.5/100));
    }
    else
    {
      $tax = 504.38+(($taxable_income-3240)*(25/100));
    }
    
    $salary_payable = ($salary +  $allowances)-($employeePf +  $employerPf + $tax + $loan_repayment + $mcfund_plus + $mcfund + $mctrust);

    $take_home = ($salary_payable*$rate_payable);

     $added_response = array('income_tax'=>$tax, 'employeePF'=>$employeePf, 'employerPF'=>$employerPf, 'salary_payable'=>$salary_payable,'workdays'=>$take_home);
     return  Response::json($added_response);

  }

     public function change_date_format_rate($date)
    {
        $time = DateTime::createFromFormat('d/m/Y', $date);
        return $time->format('d/m/Y');
    }

    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y', $date);
        return $time->format('MY');
    }

  private function dobulkPayroll()
  {
    

    
  }  

  public function doPayroll(Request $request)
  {


      try
      {


       $bankdetail = EmployeeBank::where('staff_id','=',$request->input('staff_id'))->orderBy('created_on', 'desc')->first(); 
       $bank = $bankdetail->bank_name;
       $accountnumber = $bankdetail->bank_account_number;

       $staffname = Employee::where('staff_id','=',$request->input('staff_id'))->orderBy('created_on', 'desc')->first(); 
       $payid = uniqid();

       $payroll                 = new Payroll;
       $payroll->trasactionid   = $payid;
       $payroll->staffid        = $request->input('staff_id');
       $payroll->name           = $staffname->fullname;
       $payroll->basic_annual          = $request->input('basic_annual');
       $payroll->car_allowance      = $request->input('car_allowance');
       $payroll->living_allowance   = $request->input('living_allowance');
       $payroll->housing_allowance  = $request->input('housing_allowance');
       $payroll->clothing_allowance = $request->input('clothing_allowance');
       $payroll->employee_ssf   = $request->input('employee_ssf');
       $payroll->income_tax     = $request->input('income_tax');
       $payroll->loan_repayment = $request->input('loan_repayment');
       $payroll->mcfund_plus    = $request->input('mcfund_plus');
       $payroll->mcfund         = $request->input('mcfund');
       $payroll->mctrust        = $request->input('mctrust');
       $payroll->pension_fund_percent        = $request->input('pension_fund_percent');
       $payroll->bank           = $bank;
       $payroll->accountnumber  = $accountnumber;
       $payroll->payperiod      = $this->change_date_format($request->input('salary_start_date'));
       $payroll->employer_ssf   = $request->input('employer_ssf');
       $payroll->createdon     = Carbon::now();
       $payroll->createdby     = Auth::user()->getNameOrUsername();
      

        if($payroll->save())
            
            {

            return redirect()
            ->route('payroll-slips')
            ->with('success','Employee payroll has been generated!');

            }


          else
          {

             return redirect()
            ->route('payroll-slips')
            ->with('error','Employee payroll failed to create!');
          }

        }


        catch(Exception $e)
        {
             echo $e->getMessage();
           // return redirect()
           //  ->route('payroll-slips')
           //  ->with('error','Unable to generate payroll, duplicate entry found!');

        }

  }

  public function computePAYEBulk($staff)
    {
     
      $pay_details = EmployeeSalary::where('staff_id',$staff)->orderBy('created_on', 'desc')->first(); 
      $age= 60;
      $salary = $pay_details->basic_annual;
      $employee_ssf = $pay_details->employee_ssf;
      $pension_fund_percent = $pay_details->pension_fund_percent;
      $car_allowance = $pay_details->car_allowance;
      $living_allowance = $pay_details->living_allowance;
      $clothing_allowance = $pay_details->clothing_allowance;
      $housing_allowance = $pay_details->housing_allowance;
      $allowances  = $car_allowance + $living_allowance + $housing_allowance+$clothing_allowance;
      $employeePfval = $pension_fund_percent;
      $employerPfval = 0;

      
        $ssf_employee = $employee_ssf/100;
        $ssf_employer = 13/100 ;
      


      $tax = 0 ; 
     $income = $salary ;
     $allowance = $allowances ;
     $deduction = 0;
     $employeePf = $salary * ($employeePfval/100);
     $employerPf = $salary * ($employerPfval/100);

    
     $employee_SSNIT = $income * $ssf_employee ;
     $employer_SSNIT = $income * $ssf_employer ;

     $taxable_income = ($income - $employee_SSNIT - $employeePf) + $allowance - $deduction;
     
  if($taxable_income<=216)
    {
      $tax = 0.0;
    }
    else if($taxable_income>=217&&$taxable_income<=324)
    {
     $tax = ($taxable_income-216)*(5/100);
    }
    else if($taxable_income>=325&&$taxable_income<=475)
    {
      $tax = 5.4+(($taxable_income-324)*(10/100));
    }
    else if($taxable_income>=475&&$taxable_income<=3240)
    {
     $tax = 20.5+(($taxable_income-475)*(17.5/100));
    }
    else
    {
      $tax = 504.38+(($taxable_income-3240)*(25/100));
    }
       return $tax;

  }

  public function doPayrollBulk(Request $request)
  {
    $salary_checked = $request->input('staff');
    //dd($salary_checked);
      
    if(is_array($salary_checked))
    {
      foreach($salary_checked as $salary_checked)
      {

        
      $bankdetail = EmployeeBank::where('staff_id','=',$salary_checked)->orderBy('created_on', 'desc')->first();
       $bank = $bankdetail->bank_name;
       $accountnumber = $bankdetail->bank_account_number;

       $staffname = Employee::where('staff_id','=',$salary_checked)->first();

      $pay_details = EmployeeSalary::where('staff_id',$salary_checked)->orderBy('created_on', 'desc')->first(); 
      $age= 60;
      $salary = $pay_details->salary;
      $employee_ssf = $pay_details->employer_ssf;
      $pension_fund_percent = $pay_details->pension_fund_percent;
      $car_allowance = $pay_details->car_allowance;
      $living_allowance = $pay_details->living_allowance;
      $clothing_allowance = $pay_details->clothing_allowance;
      $housing_allowance = $pay_details->housing_allowance;
      $allowances  = $car_allowance + $living_allowance + $housing_allowance+$clothing_allowance;
       $payid = uniqid();

       $payroll                 = new Payroll;
       $payroll->trasactionid   = $payid;
       $payroll->staffid        = $salary_checked;
       $payroll->name           = $staffname->fullname;
       $payroll->basic_annual       = $pay_details->basic_annual;
       $payroll->car_allowance      = $pay_details->car_allowance;
       $payroll->living_allowance   = $pay_details->living_allowance;
       $payroll->housing_allowance  = $pay_details->housing_allowance;
       $payroll->clothing_allowance = $pay_details->clothing_allowance;
       $payroll->employee_ssf   = $pay_details->basic_annual * $pay_details->employee_ssf/100;
       $payroll->income_tax     = $this->computePAYEBulk($salary_checked);
       $payroll->loan_repayment = $pay_details->loan_repayment;
       $payroll->mcfund_plus    = $pay_details->mcfund_plus;
       $payroll->mcfund         = $pay_details->mcfund;
       $payroll->mctrust        = $pay_details->mctrust;
       $payroll->pension_fund_percent  = $pay_details->basic_annual  * ($pension_fund_percent/100);
       $payroll->bank           = $bank;
       $payroll->accountnumber  = $accountnumber;
       $payroll->payperiod      = date('MY');;
       $payroll->employer_ssf   = $pay_details->basic_annual * 13/100; 
       $payroll->createdon     = Carbon::now();
       $payroll->createdby     = Auth::user()->getNameOrUsername();
       $payroll->save();
     }

    }

     return redirect()
            ->route('payroll-slips')
            ->with('success','Employee payroll has been generated!');
  }


 public function deletePayroll()
{

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Payroll::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
                $ini   = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini   = array('No Data'=>$ID);
                return  Response::json($ini);
            }
        }
        else
        {
           $ini   = array('No Data'=>'No Data');
           return  Response::json($ini);
        }

}


}
