<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;

use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;
use McPersona\Models\Employee;
use McPersona\Models\EmployeeJob;
use McPersona\Models\LeaveSchedule;
use McPersona\Models\Department;
use McPersona\Models\LeaveType;
use McPersona\Models\Subsidiary;
use McPersona\Models\Holiday;
use McPersona\Models\User;
use Input;
use Image;
use Carbon\Carbon;
use Cache;
use DB;

use Redirect;
use Response;
use Activity;
use Auth;
use DateTime;
use Mail;


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


     public function loadLeaveJson()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = LeaveSchedule::where('employee','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }
   
    public function index()
    {
        $pending = LeaveSchedule::where('status','Pending Approval')->count();
        $rejected = LeaveSchedule::where('status','Rejected')->count();
        $cancelled = LeaveSchedule::where('status','Cancelled')->count();
        $approved = LeaveSchedule::where('status','Approved')->count();


        $employees = Employee::get();
        $schedules = LeaveSchedule::where('status','Pending Approval')->orderby('created_on','desc')->paginate(30);
        $leavetypes = LeaveType::get();
        $relievers = Employee::get();
        $supervisors = Employee::get();
        $directors = Employee::get();
        return view('leave.index',compact('schedules','employees','leavetypes','relievers','supervisors','directors','pending','rejected','cancelled','approved'));
    }

      public function rejectedLeave()
    {
         $pending = LeaveSchedule::where('status','Pending Approval')->count();
        $rejected = LeaveSchedule::where('status','Rejected')->count();
        $cancelled = LeaveSchedule::where('status','Cancelled')->count();
        $approved = LeaveSchedule::where('status','Approved')->count();
        
        $employees = Employee::get();
        $schedules = LeaveSchedule::where('status','Rejected')->orderby('created_on','desc')->paginate(30);
        $leavetypes = LeaveType::get();
        $relievers = Employee::get();
        $supervisors = Employee::get();
        $directors = Employee::get();
        return view('leave.index',compact('schedules','employees','relievers','leavetypes','supervisors','directors','pending','rejected','cancelled','approved'));
    }

      public function approvedLeave()
    {
         $pending = LeaveSchedule::where('status','Pending Approval')->count();
        $rejected = LeaveSchedule::where('status','Rejected')->count();
        $cancelled = LeaveSchedule::where('status','Cancelled')->count();
        $approved = LeaveSchedule::where('status','Approved')->count();
        
        $employees = Employee::get();
        $schedules = LeaveSchedule::where('status','Approved')->orderby('created_on','desc')->paginate(30);
        $leavetypes = LeaveType::get();
         $relievers = Employee::get();
        $supervisors = Employee::get();
        $directors = Employee::get();
        return view('leave.index',compact('schedules','employees','leavetypes','relievers','supervisors','directors','pending','rejected','cancelled','approved'));
    }

      public function cancelledLeave()
    {
         $pending = LeaveSchedule::where('status','Pending Approval')->count();
        $rejected = LeaveSchedule::where('status','Rejected')->count();
        $cancelled = LeaveSchedule::where('status','Cancelled')->count();
        $approved = LeaveSchedule::where('status','Approved')->count();
        
        $employees = Employee::get();
        $schedules = LeaveSchedule::where('status','Cancelled')->orderby('created_on','desc')->paginate(30);
        $leavetypes = LeaveType::get();
         $relievers = Employee::get();
        $supervisors = Employee::get();
        $directors = Employee::get();
        return view('leave.index',compact('schedules','employees','relievers','leavetypes','supervisors','directors','pending','rejected','cancelled','approved'));
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


     public function getdaystaken()
    {
       
        $leave_balance = LeaveSchedule::where('employee', Input::get('staff_id'))->where('leave_type',Input::get('leave_type'))->get();
        $daystaken = $leave_balance->sum('number_of_days');
        $data = array('daystaken'=>$daystaken,'entitlement'=>19);
        return  Response::json($data);
    }



    public function leave_balance()
    {

        if(Input::get('leave_type')=="Annual Leave")
        {
            $leave_balance = LeaveSchedule::where('employee', Input::get('staff_id'))->where('leave_type','Annual Leave')->get();
            return 19 - $leave_balance->sum('number_of_days');
        }

        else
        {

            return 0;
        }
       

    }

    public function assignLeave()
    {
         try
        {   

        //      if(Input::hasFile('image')) 
        // {
        //     $file = Input::file('image');

        //     //getting timestamp
        //     $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
           
        //     $name = $timestamp. '-' .$file->getClientOriginalName();
        
        //    $file = $file->move(public_path().'/uploads/images', $name);
        //     //Image::make($image->getRealPath())->resize(200, 200)->save($name); 
        // }


            $vals     = $this->leave_balance();


            if(Input::get('leave_type')=="Annual Leave")
            {
                $vals - $this->computeBusinessdays(); 

            } 
            else 
            {
                $val = 0;
            }
            //dd($vals);
            $id       = Input::get('staff_id');
            $mystaff  = Employee::where('staff_id',$id)->first();
            $myjob    = EmployeeJob::where('staff_id',$id)->first();

            if(Input::get("reliever")){$supervisor =  implode('|', Input::get("reliever"));} else {$supervisor = 'echo.jasonkerr7@gmail.com';}

            $employee = new LeaveSchedule;
            $employee->employee          = Input::get('staff_id');
            $employee->leave_type        = Input::get('leave_type');
            $employee->leave_from        = $this->change_date_format(Input::get('leave_from'));
            $employee->leave_to          = $this->change_date_format(Input::get('leave_to'));
            $employee->leave_balance     = $vals;
            $employee->number_of_days    = $this->computeBusinessdays();
            $employee->comment           = Input::get('comment');
            $employee->status            = 'Pending Approval';
            $employee->name              = $mystaff->fullname;
            $employee->department        = $myjob->department ;
            $employee->subsidiary        = $myjob->subsidiary ;
             $employee->document         = 'Leave.pdf';
           $employee->supervisor_id       = $supervisor;
           $employee->director_id         = $supervisor;
           $employee->reliever            = $supervisor;
            $employee->created_on         = Carbon::now();
            $employee->created_by         = Auth::user()->getNameOrUsername();


            $approvers         = implode('|', Input::get("reliever"));


            if($employee->save())
            {

           // $staff = Employee::where('staff_id',Input::get('staff_id'))->first();
            
            //dd( $approvers );
            $email_id = Input::get("reliever"); 

            //dd($email_id);
            
            Mail::send('emails.leaveapproval', array('user' => $email_id, 'name' =>  $mystaff->fullname)  , function ($message) use ($email_id) 
                    { 
                        $message->from('hr@mcpersona.com', 'McPersona');
                        
                        $message->to($email_id)->subject('Pending Leave Approval '); 
                
                    }); 


            return Redirect::back()->with('success','Leave request has been forwarded!');


            }
            else
            {

                return Redirect::back()->with('error','Leave request failed to create!');
                
          
            
            }

}

    catch (\Exception $e) {
           
           echo $e;
           
          
        }

    }


     public function editLeave()
    {
      //dd(Input::get('patient_id'));
    $id = Input::get('id');
    $leave = LeaveSchedule::find($id);
    $data = Array(
        
        'employee'            =>$leave->employee,
        'leave_type'          =>$leave->leave_type,
        'comment'             =>$leave->comment,
        'leave_from'           =>$leave->leave_from->format('d/m/Y'),
        'leave_to'               =>$leave->leave_to->format('d/m/Y'),
        'approval_1'          =>$leave->supervisor_id,
        'approval_2'       =>$leave->director_id,
        'reliever'         =>$leave->reliever
         

    );
    return Response::json($data);
    } 


    public function ApprovalReminder(Request $request)
    {

    }



    public function deleteLeave()
    {

        if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = LeaveSchedule::where('id', '=', $ID)->delete();

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

    public function rejectLeave()
    {
                
            try
            {
            $leaveid = Input::get("ID");

            $affectedRows = LeaveSchedule::where('id', $leaveid)->update(array('status' => 'Rejected'));


             $leavedetails = LeaveSchedule::where('id', $leaveid)->first();
             $employee = Employee::where('staff_id',$leavedetails->employee)->first(); 
             $email_id =$employee->email;

                 Mail::send('emails.rejectedleave', array('days_taken'=>$leavedetails->number_of_days, 'days_left'=>$leavedetails->leave_balance,'leave_type'=>$leavedetails->leave_type, 'startdate'=>$leavedetails->leave_from->toFormattedDateString(), 'fullname'=>$leavedetails->name ,'status'=>'Approved' ) , function ($message) use ($email_id) 
                    { 
                        $message->from('hr@mcpersona.com', 'McPersona');
                        $message->to($email_id)->subject('Leave Request Rejected'); 
                
                    });


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

        catch (Exception $e) 

            {
                   echo 'Leave rejected but email connection error, please go back and refresh!';
            }  
    }

    public function approveLeave()
    {
              
            $leaveid = Input::get("ID");

            $affectedRows = LeaveSchedule::where('id', $leaveid)->update(array('status' => 'Approved','approved_on'=>Carbon::now(),'approved_by'=>Auth::user()->getNameOrUsername()));

             $leavedetails = LeaveSchedule::where('id', $leaveid)->first();
             $employee = Employee::where('staff_id',$leavedetails->employee)->first(); 
             $email_id =$employee->email;
             
           
              Mail::send('emails.leaveletter', array('days_taken'=>$leavedetails->number_of_days, 'days_left'=>'N/A','leave_type'=>$leavedetails->leave_type, 'startdate'=>$leavedetails->leave_from->toFormattedDateString(), 'fullname'=>$leavedetails->name ,'status'=>'Approved' ) , function ($message) use ($email_id) 
                    { 
                        $message->from('hr@mcpersona.com', 'McPersona');
                        $message->to($email_id)->subject('Leave Request Approved'); 
                
            });

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


      public function approveLeaveHod()
    {
       
         
            $leaveid = Input::get("ID");

            $affectedRows = LeaveSchedule::where('id', $leaveid)->update(array('hod_approval_status' => 'Approved','hod_approval_date'=>Carbon::now()));


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


    public function cancelLeave()
    {
       
         
            $leaveid = Input::get("ID");

            $affectedRows = LeaveSchedule::where('id', $leaveid)->update(array('status' => 'Cancelled'));

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
       $departments = Department::get();
       $subsidiaries = Subsidiary::get();
       $employees   = Employee::get();
       $leavetypes  = LeaveType::get();
       $relievers = Employee::get();
        $supervisors = Employee::get();
        $directors = Employee::get();
       $events      = LeaveSchedule::orderBy('leave_from')->paginate(30);
       return view('leave/calendar', compact('events','employees','relievers','supervisors','directors','leavetypes','subsidiaries','departments'));
    }

     public function proposedcalendar()
    {
       $departments = Department::get();
       $subsidiaries = Subsidiary::get();
       $employees   = Employee::get();
       $leavetypes  = LeaveType::get();
       $relievers = Employee::get();
        $supervisors = Employee::get();
        $directors = Employee::get();
       $events      = LeaveSchedule::orderBy('leave_from')->paginate(30);
       return view('leave/proposed', compact('events','employees','relievers','supervisors','directors','leavetypes','subsidiaries','departments'));
    }

     public function department($id)
    {

        $result = $id;
       $departments = Department::get();
       $subsidiaries = Subsidiary::get();
       $employees   = Employee::get();
       $leavetypes  = LeaveType::get();
       $relievers = Employee::get();
        $supervisors = Employee::get();
        $directors = Employee::get();
       $events      = LeaveSchedule::orderBy('leave_from')->paginate(30);
       return view('leave/department', compact('events','employees','relievers','supervisors','directors','leavetypes','subsidiaries','departments'))->with('result',$result);
    }

     public function subsidiary($id)
    {
       $result = $id;
       $departments = Department::get();
       $subsidiaries = Subsidiary::get();
       $employees   = Employee::get();
       $leavetypes  = LeaveType::get();
       $relievers = Employee::get();
        $supervisors = Employee::get();
        $directors = Employee::get();
       $events      = LeaveSchedule::orderBy('leave_from')->paginate(30);
       return view('leave/subsidiary', compact('events','employees','relievers','supervisors','directors','leavetypes','subsidiaries','departments'))->with('result',$result);
    }







    public function searchLeave(Request $request)
    {
      $pending = LeaveSchedule::where('status','Pending Approval')->count();
        $rejected = LeaveSchedule::where('status','Rejected')->count();
        $cancelled = LeaveSchedule::where('status','Cancelled')->count();
        $approved = LeaveSchedule::where('status','Approved')->count();

        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = $request->get('search');

        $employees = Employee::get();
        $leavetypes = LeaveType::get();
        $relievers = Employee::get();
        $supervisors = Employee::get();
        $directors = Employee::get();
        $schedules = LeaveSchedule::where('name', 'like', "%$search%")
            ->orWhere('leave_type', 'like', "%$search%")
            ->orWhere('department', 'like', "%$search%")
            ->orWhere('subsidiary', 'like', "%$search%")
            ->orderBy('name')
            ->paginate(30)
            ->appends(['search' => $search]);

        return view('leave.index',compact('schedules','employees','relievers','supervisors','directors','leavetypes','pending','rejected','cancelled','approved'));
  
    }

    public function LeaveSchedule()
    {

        $events = DB::table('leave_schedule')->select('id', 'employee', 'leave_type','subsidiary','department', 'name' ,'leave_from as start', 'leave_to as end')->where('status','Approved')->get();
    foreach($events as $event)
    {
        $event->title = $event->name . ' ('.$event->department .', '.$event->subsidiary.') - '  .$event->leave_type;
        if($event->leave_type == 'Annual Leave')
        {
            $event->color = '#4cc0c1';
        }
        elseif ($event->leave_type == 'Study Leave') 
        {
            $event->color = '#65bd77';
        }
        elseif ($event->leave_type == 'Sick Leave') 
        {
            $event->color = '#fb6b5b';
        }
        elseif ($event->leave_type == 'Maternity Leave') 
        {
            $event->color = '#ffc333';
        }

        elseif ($event->leave_type == 'Paternity Leave') 
        {
            $event->color = '#2e3e4e';
        }
        
        else
        {
            $event->color = 'green';
        }   

        $event->url = url('events/' . $event->id);
    }
    return $events;
    }

    public function proposedLeaveSchedule()
    {

        $events = DB::table('leave_schedule')->select('id', 'employee', 'leave_type','subsidiary','department', 'name' ,'leave_from as start', 'leave_to as end')->get();
    foreach($events as $event)
    {
        $event->title = $event->name . ' ('.$event->department .', '.$event->subsidiary.') - '  .$event->leave_type;
        if($event->leave_type == 'Annual Leave')
        {
            $event->color = '#4cc0c1';
        }
        elseif ($event->leave_type == 'Study Leave') 
        {
            $event->color = '#65bd77';
        }
        elseif ($event->leave_type == 'Sick Leave') 
        {
            $event->color = '#fb6b5b';
        }
        elseif ($event->leave_type == 'Maternity Leave') 
        {
            $event->color = '#ffc333';
        }

        elseif ($event->leave_type == 'Paternity Leave') 
        {
            $event->color = '#2e3e4e';
        }
        
        else
        {
            $event->color = 'green';
        }   

        $event->url = url('events/' . $event->id);
    }
    return $events;
    }

    public function proposedSubsidiaryCalendar($id)
    {

        $events = DB::table('leave_schedule')->select('id', 'employee', 'leave_type','subsidiary','department', 'name' ,'leave_from as start', 'leave_to as end')->where('subsidiary',$id)->get();
    foreach($events as $event)
    {
        $event->title = $event->name . ' ('.$event->department .', '.$event->subsidiary.') - '  .$event->leave_type;
        if($event->leave_type == 'Annual Leave')
        {
            $event->color = '#4cc0c1';
        }
        elseif ($event->leave_type == 'Study Leave') 
        {
            $event->color = '#65bd77';
        }
        elseif ($event->leave_type == 'Sick Leave') 
        {
            $event->color = '#fb6b5b';
        }
        elseif ($event->leave_type == 'Maternity Leave') 
        {
            $event->color = '#ffc333';
        }

        elseif ($event->leave_type == 'Paternity Leave') 
        {
            $event->color = '#2e3e4e';
        }
        
        else
        {
            $event->color = 'green';
        }   

        $event->url = url('events/' . $event->id);
    }
    return $events;
    }


    public function proposedDepartmentCalendar($id)
    {

        $events = DB::table('leave_schedule')->select('id', 'employee', 'leave_type','subsidiary','department', 'name' ,'leave_from as start', 'leave_to as end')->where('department',$id)->get();
    foreach($events as $event)
    {
        $event->title = $event->name . ' ('.$event->department .', '.$event->subsidiary.') - '  .$event->leave_type;
        if($event->leave_type == 'Annual Leave')
        {
            $event->color = '#4cc0c1';
        }
        elseif ($event->leave_type == 'Study Leave') 
        {
            $event->color = '#65bd77';
        }
        elseif ($event->leave_type == 'Sick Leave') 
        {
            $event->color = '#fb6b5b';
        }
        elseif ($event->leave_type == 'Maternity Leave') 
        {
            $event->color = '#ffc333';
        }

        elseif ($event->leave_type == 'Paternity Leave') 
        {
            $event->color = '#2e3e4e';
        }
        
        else
        {
            $event->color = 'green';
        }   

        $event->url = url('events/' . $event->id);
    }
    return $events;
    }


     function getWorkingDays($startDate,$endDate,$holidays) {
    // do strtotime calculations just once
    $endDate = strtotime($endDate);
    $startDate = strtotime($startDate);
    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
    //We add one to inlude both dates in the interval.
    $days = ($endDate - $startDate) / 86400 + 1;
    $no_full_weeks = floor($days / 7);
    $no_remaining_days = fmod($days, 7);
    //It will return 1 if it's Monday,.. ,7 for Sunday
    $the_first_day_of_week = date("N", $startDate);
    $the_last_day_of_week = date("N", $endDate);
    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
    if ($the_first_day_of_week <= $the_last_day_of_week) {
        if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
    }
    else {
        // (edit by Tokes to fix an edge case where the start day was a Sunday
        // and the end day was NOT a Saturday)
        // the day of the week for start is later than the day of the week for end
        if ($the_first_day_of_week == 7) {
            // if the start date is a Sunday, then we definitely subtract 1 day
            $no_remaining_days--;
            if ($the_last_day_of_week == 6) {
                // if the end date is a Saturday, then we subtract another day
                $no_remaining_days--;
            }
        }
        else {
            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
            // so we skip an entire weekend and subtract 2 days
            $no_remaining_days -= 2;
        }
    }
    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
   $workingDays = $no_full_weeks * 5;
    if ($no_remaining_days > 0 )
    {
      $workingDays += $no_remaining_days;
    }
    //We subtract the holidays
    foreach($holidays as $holiday){
        $time_stamp=strtotime($holiday);
        //If the holiday doesn't fall in weekend
        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
            $workingDays--;
    }
    return $workingDays;
}


public function computeBusinessdays()
{

     //Example:
$datefrom = $this->change_date_format(Input::get('leave_from'));
$dateto   = $this->change_date_format(Input::get('leave_to'));

$holidays= Holiday::get()->pluck('full_date'); //array("2008-12-25","2008-12-26","2009-01-01");
//dd($holidays);


$workingdays = $this->getWorkingDays($datefrom,$dateto,$holidays);
// // => will return 7
return $workingdays;
//dd($workingdays);
}




}
