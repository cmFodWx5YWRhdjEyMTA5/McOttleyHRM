<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;

use McPersona\Models\LeaveType;
use McPersona\Models\ReviewDocuments;
use McPersona\Models\LeaveSchedule;
use McPersona\Models\Employee;
use McPersona\Models\Payroll;
use McPersona\Models\ReviewCycle;

use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:HR Officer|HR Manager|Staff');
        
    }


   public function setProfileObstrute()
   {
        $staff = Employee::get()->pluck('staff_id');

        //dd($staff)
        foreach ($staff as $key => $value) {
            # code...
            Employee::where('staff_id', $value)->update(array('obsid' => uniqid()));
        }
        
   }


   public function getProfile($id)
   {

    
    $id = Employee::where('obsid',$id)->first();

     //dd($id);
    $department = $id->department;
    
    $id = $id->staff_id;
    

    $leavetypes = LeaveType::get();
    $reviews  =  ReviewDocuments::where('staff_id',$id)->orwhere('supervisor_id',$id)->orwhere('director_id',$id)->orderby('created_on','desc')->get();
    

    $leaves  =  LeaveSchedule::where('employee',$id)->where('status','Pending Approval')->get();
    $employee =  Employee::where('staff_id' ,'=', $id)->first();


    //dd($employee );
    $reviewcycles = ReviewCycle::where('department','like', "%$employee->department%" )->orwhere('employee','like', "%$employee->email%" )->orwhere('business','like', "%$employee->subsidiary%" )->orwhere('role','like',"%$employee->job_title%")->orwhere('role','All')->orwhere('employee','All')->orwhere('department','All')->orwhere('business','All')->orderby('created_on','desc')->get();



    $payrolls = Payroll::where('staffid' ,'=', $id)->get();
    
    //dd($payrolls);

    $relievers = Employee::get();
    $supervisors = Employee::get();
    $directors = Employee::get();
    $employees = Employee::where('staff_id' ,'=', $id)->get();
    $teams     = Employee::where('department' ,'=', $department)->get();
    //dd($teams);
    $birthdays = Employee::whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(date_of_birth) AND DAYOFYEAR(curdate()) + 7 >=  dayofyear(date_of_birth)' )->get();
    return view('staff.profile', compact('employee','teams','birthdays','payrolls','reviews','relievers','employees','leavetypes','leaves','supervisors','directors','reviewcycles'));

   }
}
