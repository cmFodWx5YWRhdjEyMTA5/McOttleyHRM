<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;
use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;
use Input;
use Response;
use Auth;
use Validator;
use Activity;
use Redirect;
use Excel;
use JasperPHP\JasperPHP;
use Carbon\Carbon;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function statsreports()
    {
        return view('reporting.overview');
    }

     public function reportsmain()
    {
        return view('reporting.index');
    }

    //Policy

     public function getdatejoined()
    {
        return view('reporting.employee.date_joined');
    }

        public function getdepartment()
    {
        return view('reporting.employee.department');
    }

      public function getlocation()
    {
        return view('reporting.employee.location');
    }

     public function getstatus()
    {
        return view('reporting.employee.status');
    }

     public function getleave()
    {
        return view('reporting.employee.leave');
    }

    public function getqualification()
    {
        return view('reporting.employee.qualification');
    }

    public function getbranch()
    {
        return view('reporting.employee.branch');
    }

     public function getbirth()
    {
        return view('reporting.employee.birth');
    }


      public function getbankadvice()
    {
        return view('reporting.employee.bankadvice');
    }

     public function getpayroll()
    {
        return view('reporting.employee.payroll');
    }



    public function getmarital()
    {
      $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
        ->datasets([
            [
                "label" => "My First dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [65, 59, 80, 81, 56, 55, 40],
            ],
            [
                "label" => "My Second dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [12, 33, 44, 44, 55, 23, 40],
            ]
        ])
        ->options([]);

        return view('reporting.employee.marital', compact('chartjs'));
    }

    // public function getmarital()
    // {
    //     return view('reporting.employee.marital');
    // }

     public function getemergency()
    {
        return view('reporting.employee.emergency');
    }




    public function printsalesCommission(Request $request)
    {

       
    }
 
 

 
    
}
