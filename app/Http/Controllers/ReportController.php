<?php

namespace OrionMedical\Http\Controllers;

use Illuminate\Http\Request;
use JasperPHP\JasperPHP;
use OrionMedical\Http\Requests;
use OrionMedical\Http\Controllers\Controller;

class ReportController extends Controller
{
   
    public function medicalreports()
    {
        return view('reporting.medical.medical');
    }
 

    public function patientreports()
    {
        return view('reporting.patient.patient');
    }

    public function financialreports()
    {
        return view('reporting.financial.financial');
    }
 

    public function billingreports()
    {
        return view('reporting.billing.billing');
    }
 

    public function purchasesreports()
    {
        return view('reporting.purchases.purchases');
    }

    public function companyreports()
    {
        return view('reporting.company.company');
    }
 
 

 
 
    
}
