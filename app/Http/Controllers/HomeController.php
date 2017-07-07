<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;
use McPersona\Models\PublishedDocuments;
use McPersona\Models\Event;
use McPersona\Models\Employee;
use McPersona\Models\Department;
use McPersona\Models\Notifications;
use McPersona\Models\LeaveSchedule;
use McPersona\Models\Subsidiary;
use Carbon\Carbon;

class HomeController extends Controller
{

    public $notifications;
    public function __construct()
    {
        $this->middleware('role:HR Officer|HR Manager');
        $this->middleware('auth');
    }

    public function index()
    {
        
        $employees = Employee::where('status','Active')->count();
        $departments = Department::count();
        $subsidiary = Subsidiary::count();
        $documents = PublishedDocuments::get();
        $birthdays = Employee::whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(date_of_birth) AND DAYOFYEAR(curdate()) + 7 >=  dayofyear(date_of_birth)' )->get();
        


        //Gender Chart Start

        $male       = Employee::where('gender', 'Male')->where('status','Active')->count();
        $female     = Employee::where('gender', 'Female')->where('status','Active')->count();
        $total      = Employee::where('status','Active')->count();


        $maternity       = LeaveSchedule::where('leave_type', 'Maternity Leave')->count();
        $paternity       = LeaveSchedule::where('leave_type', 'Paternity Leave')->count();
        $sick            = LeaveSchedule::where('leave_type', 'Sick Leave')->count();
        $study           = LeaveSchedule::where('leave_type', 'Study Leave')->count();
        $annual          = LeaveSchedule::where('leave_type', 'Annual Leave')->count();
        $compassionate   = LeaveSchedule::where('leave_type', 'Compassionate Leave')->count();


       
         //dd($pharmacy);
        $male = $male/$total * 100;
         $female = $female/$total * 100;


       $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('doughnut')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Male', 'Female'])
        ->datasets([
            [
                'backgroundColor' => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                'hoverBackgroundColor' => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                'data' => [ $male , $female ]
                
            ]
        ])
        ->options([]);

        // Gender Chart End

        

        return view('pages.dashboard',compact('employees','documents','birthdays','departments','chartjs','subsidiary'));
    }


    public function getTotals()
    {


    	

    }



        public function gender()
    {
        $male       = Employee::where('gender', 'Male')->where('status','Active')->count();
        $female     = Employee::where('gender', 'Female')->where('status','Active')->count();
        $total      = Employee::where('status','Active')->count();
       
         //dd($pharmacy);
        $male = $male/$total * 100;
         $female = $female/$total * 100;


       $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('doughnut')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Male', 'Female'])
        ->datasets([
            [
                'backgroundColor' => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                'hoverBackgroundColor' => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                'data' => [ $male , $female ]
                
            ]
        ])
        ->options([]);

        return view('charts.gender', compact('chartjs'));
    }
    




    

        public function department()
        {

            $views = DB::table('employee')
             ->select(DB::raw("department"), DB::raw("count(*) as no_of_staff"))
             ->groupBy('department')
             ->get();
        
        //dd($views);
        $departments = array();
        $staff = array();

        foreach ($views as $view) {

            array_push($departments, $view->department);
            array_push($staff, $view->no_of_staff);
        }
        
        $departmentjs = app()->chartjs
        ->name('lineChartTest')
        ->type('bar')
        ->size(['width' => 200, 'height' => 100])
        ->labels($departments)
        ->datasets([
            [
                "label" => "Staff Per Department",
                 //fill => false,
                'beginAtZero' => "true",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                'strokeColor' => "#f56954",
                'pointColor' => "#A62121",
                'pointStrokeColor' => "#741F1F",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $staff,
            ]
            
        ])
        ->options([]);

      
         return view('charts.department', compact('departmentjs'));
        }



        public function subsidiary()
        {

            $views = DB::table('employee')
             ->select(DB::raw("subsidiary"), DB::raw("count(*) as no_of_staff"))
             ->groupBy('subsidiary')
             ->get();
        
        //dd($views);
        $departments = array();
        $staff = array();

        foreach ($views as $view) {

            array_push($departments, $view->subsidiary);
            array_push($staff, $view->no_of_staff);
        }
        
        $subsidiaryjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 200, 'height' => 100])
        ->labels($departments)
        ->datasets([
            [
                "label" => "Number of Staff in Business Entity",
                 //fill => false,
                'beginAtZero' => "true",
                'backgroundColor' => "rgba(38, 220, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                'strokeColor' => "#f56954",
                'pointColor' => "#A62121",
                'pointStrokeColor' => "#741F1F",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $staff,
            ]
            
        ])
        ->options([]);

      
         return view('charts.subsidiary', compact('subsidiaryjs'));
        }


        public function location()
        {

            $views = DB::table('employee')
             ->select(DB::raw("location"), DB::raw("count(*) as no_of_staff"))
             ->groupBy('location')
             ->get();
        
        //dd($views);
        $departments = array();
        $staff = array();

        foreach ($views as $view) {

            array_push($departments, $view->location);
            array_push($staff, $view->no_of_staff);
        }
        
        $locationjs = app()->chartjs
        ->name('lineChartTest')
        ->type('horizontalBar')
        ->size(['width' => 200, 'height' => 100])
        ->labels($departments)
        ->datasets([
            [
                "label" => "Number of Staff in Location",
                 //fill => false,
                'beginAtZero' => "true",
                'backgroundColor' => "rgba(38, 220, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                'strokeColor' => "#f56954",
                'pointColor' => "#A62121",
                'pointStrokeColor' => "#741F1F",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $staff,
            ]
            
        ])
        ->options([]);

      
         return view('charts.location', compact('locationjs'));
        }






        



    




}
