<?php

namespace OrionMedical\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use OrionMedical\Http\Requests;
use OrionMedical\Http\Controllers\Controller;
use OrionMedical\Models\Customer;
use OrionMedical\Models\Event;
use OrionMedical\Models\Bill;
use OrionMedical\Models\Policy;
use OrionMedical\Models\Employee;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::count();
        return view('pages.dashboard',compact('employees'));
    }


    public function getTotals()
    {


    	

    }




}
