<?php

namespace OrionMedical\Http\Controllers;

use Illuminate\Http\Request;

use OrionMedical\Http\Requests;
use OrionMedical\Http\Controllers\Controller;
use OrionMedical\Models\Employee;
use OrionMedical\Models\EmployeeJob;
use OrionMedical\Models\LeaveSchedule;
use OrionMedical\Models\LeaveType;
use OrionMedical\Models\Subsidiary;
use Input;
use Image;
use Carbon\Carbon;
use Cache;

use Response;
use Activity;
use Auth;
use DateTime;


class LeaveController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y', $date);
        return $time->format('Y-m-d');
    }

   
    public function index()
    {
        
        $employees = Employee::get();
        $schedules = LeaveSchedule::paginate(30);
        $leavetypes = LeaveType::get();
       return view('leave.index',compact('schedules','employees','leavetypes'));
    }

    public function loadLeaveRequest()
    {
        try
        {
                $employees = Employee::get();
                $schedules = LeaveSchedule::paginate(30);
                return view('leave.index',compact('schedules','employees'));
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

    public function assignLeave()
    {

         try
        {   
            $id   = Input::get('staff_id');
            $mystaff = Employee::where('staff_id',$id)->first();
            $myjob  = EmployeeJob::where('staff_id',$id)->first();

           $employee = new LeaveSchedule;
           $employee->employee          = Input::get('staff_id');
           $employee->leave_type        = Input::get('leave_type');
           $employee->leave_from        = $this->change_date_format(Input::get('leave_from'));
           $employee->leave_to          = $this->change_date_format(Input::get('leave_to'));
           $employee->leave_balance     = 0;
           $employee->number_of_days    = 0;
           $employee->comment           = Input::get('comment');
           $employee->status            = 'Pending Approval';
           $employee->name              = $mystaff->fullname;
           $employee->department        = $myjob->department ;
           $employee->subsidiary        = $myjob->subsidiary ;
           $employee->created_on        = Carbon::now();
           $employee->created_by        = Auth::user()->getNameOrUsername();

           if($employee->save())
          {

        
            $added_response = array('OK'=>'OK');
            return  Response::json($added_response);

            }
            else
            {
                
            $added_response = array('No Data'=>'No Data');
            return  Response::json($added_response);
            
            }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }

    }

    public function rejectLeave()
    {
       
         
            $leaveid = Input::get("ID");

            $affectedRows = LeaveSchedule::where('id', $leaveid)->update(array('status' => 'Rejected'));

            if($affectedRows > 0)
            {
               
                $ini = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini = array('No Data'=>'No Data');
                return  Response::json($ini);
            }
    }

    public function approveLeave()
    {
       
         
            $leaveid = Input::get("ID");

            $affectedRows = LeaveSchedule::where('id', $leaveid)->update(array('status' => 'Approved'));

            if($affectedRows > 0)
            {
               
                $ini = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini = array('No Data'=>'No Data');
                return  Response::json($ini);
            }
    }

    public function calendar()
    {
       $subsidiaries = Subsidiary::get();
       $employees   = Employee::get();
       $leavetypes  = LeaveType::get();
       $events      = LeaveSchedule::orderBy('leave_from')->paginate(30);
       return view('leave/calendar', compact('events','employees','leavetypes','subsidiaries'));
    }


    public function searchLeave(Request $request)
    {
      

        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = $request->get('search');

        $employees = Employee::get();
        $leavetypes = LeaveType::get();
        $schedules = LeaveSchedule::where('name', 'like', "%$search%")
            ->orWhere('leave_type', 'like', "%$search%")
            ->orWhere('department', 'like', "%$search%")
            ->orWhere('subsidiary', 'like', "%$search%")
            ->orderBy('name')
            ->paginate(30)
            ->appends(['search' => $search]);

        return view('leave.index',compact('schedules','employees','leavetypes'));
  
    }



}
