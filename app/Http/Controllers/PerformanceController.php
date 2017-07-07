<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;

use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;

use McPersona\Models\Questions;
use McPersona\Models\Employee;
use McPersona\Models\ReviewDocuments;
use McPersona\Models\PublishedDocuments;
use McPersona\Models\AppraisalSummary;
use McPersona\Models\AppraisalPotential;
use McPersona\Models\Notifications;
use McPersona\Models\Location;
use McPersona\Models\Department;
use McPersona\Models\JobTitle;
use McPersona\Models\Subsidiary;
use McPersona\Models\ReviewCycle;
use McPersona\Models\ReviewRatings;
use McPersona\Models\PerformanceGoals;
use McPersona\Models\ReviewRatingsPerformance;
use McPersona\Models\EmployeeReportto;;
use Carbon\Carbon;
use Auth;
use Input;
use Response;
use Datetime;
use Mail;
use Session;
use Activity;

class PerformanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function start()
    {
              
               return view('performance.start');
    }

     public function settings()
    {
            $summaries   = AppraisalSummary::get();
            $pontentials = AppraisalPotential::get();


            $jobtitles = JobTitle::get();
            $departments = Department::get();
            $subsidiaries = Subsidiary::get();
            $kpa            = Questions::get();
            $cycles         = ReviewCycle::get();
            return view('performance.settings',compact('pontentials','cycles','kpa','summaries','jobtitles','departments','subsidiaries'));
    }


    public function probationaryManager()
    {
        $employees = Employee::where('status','Active')->get();
        $documents = PublishedDocuments::where('id','19')->first();
        return view('performance.review', compact('employees','documents'));
    }

    public function PeriodicReview()
    {
        $employees = Employee::where('status','Active')->get();
        $documents = PublishedDocuments::where('id','19')->first();
        return view('performance.periodic', compact('employees','documents'));
    }

    public function JobAudit()
    {
          $employees = Employee::where('status','Active')->get();
        $documents = PublishedDocuments::where('id','20')->first();
        return view('performance.job', compact('employees','documents'));
    }

    public function index()
    {

        $jobtitles = JobTitle::get();
        $departments = Department::get();
        $subsidiaries = Subsidiary::get();
        $kpa            = Questions::get();
        $cycles         = ReviewCycle::get();
        $departments = Department::get();
        $locations   = Location::get();
        $reviews     = ReviewDocuments::groupby('content')->orderby('created_on','desc')->paginate(20);
        $employees   = Employee::get();
        return view('performance.index', compact('reviews','employees','departments','locations','jobtitles','subsidiaries','departments'));
    }

     public function appraisalprofile($id,$review)
   {
    
    //$kpa            = Questions::get();
    //dd($id);
    $token          = $review;
    $active_token    = $token; 
    //dd($token);
    

    $rating         = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->count();
    $kpas           = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->get();

    $probation      = Questions::get();
    $goals          = PerformanceGoals::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->get();
    $tasks          = PerformanceGoals::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->get();


    
     if (!$token) 
     {
      $employeerating = 0;
      $managerscore = 0;
      $employeescore =0;
      $managerfinal = 0;
      $employeefinal = 0;
     }

     else
     {
      $employeerating = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->get();
      $totalweightgoal = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->sum('weightage');

    $managerscore = 0;
    $employeescore =0;
    foreach ($employeerating as $key => $rate) 
    {

      if($rate->weightage == 0)
      {
        $managerscore =0;
        $employeescore =0;
      }
      else
      {
        $managerscore += (($rate->manager / $rate->scale)* $rate->weightage)/$totalweightgoal;
        $employeescore += (($rate->employee / $rate->scale)* $rate->weightage)/$totalweightgoal;
      }
     
    }
     $managerfinal = ($managerscore * 100);
     $employeefinal = ($employeescore * 100);
   }

    $cycles         = ReviewCycle::get();
    $employee =  Employee::where('obsid' ,'=', $id)->first();
    $supervisors =  Employee::where('job_title','like','%Manager%')->orwhere('job_title','like','%Head%')->orwhere('job_title','like','%Managing%')->where('status','Active')->orderby('fullname','asc')->get();
   
    return view('performance.profile', compact('employee','supervisors','kpas','probation','employeerating','managerfinal','employeefinal','managerrating','cycles','goals','active_token','tasks','rating'));
   }

    public function appraisalManager($id,$review)
   {

    $token          = $review;
    $active_token    = $token;

    $employee_id    = $id;
    $kpa            = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->get();
    $cycles         = ReviewCycle::get();
    $employee       = Employee::where('obsid' ,'=', $employee_id)->first();
    $supervisors =  Employee::where('job_title','like','%Manager%')->orwhere('job_title','like','%Head%')->orwhere('job_title','like','%Managing%')->where('status','Active')->orderby('fullname','asc')->get();

    if (!$token) 
     {
      $employeerating = 0;
      $managerscore = 0;
      $employeescore =0;
      $managerfinal = 0;
      $employeefinal = 0;
     }

     else
     {
      $employeerating = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->get();
      $totalweightgoal = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->sum('weightage');

    $managerscore = 0;
    $employeescore =0;
    foreach ($employeerating as $key => $rate) 
    {

      if($rate->weightage == 0)
      {
        $managerscore =0;
        $employeescore =0;
      }
      else
      {
        $managerscore += (($rate->manager / $rate->scale)* $rate->weightage)/$totalweightgoal;
        $employeescore += (($rate->employee / $rate->scale)* $rate->weightage)/$totalweightgoal;
      }
     
    }
     $managerfinal = ($managerscore * 100);
     $employeefinal = ($employeescore * 100);
   }

    return view('performance.manager', compact('employee','supervisors','kpa','cycles','managerrating','employeerating','managerfinal','employeefinal'));
   }


   public function appraisalView($id,$review)
   {
     $token          = $review;
    $active_token    = $token;

    $employee_id    = $id;
    $kpa            = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->get();
    $cycles         = ReviewCycle::get();
    $employee       = Employee::where('obsid' ,'=', $employee_id)->first();
    $supervisors =  Employee::where('status','Active')->orderby('fullname','asc')->get();

    if (!$token) 
     {
      $employeerating = 0;
      $managerscore = 0;
      $employeescore =0;
      $managerfinal = 0;
      $employeefinal = 0;
     }

     else
     {
      $employeerating = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->get();
      $totalweightgoal = ReviewRatings::where('review_token' ,'=',$token )->where('staff_id' ,'=',$id)->where('reviewtype','goal')->sum('weightage');

    $managerscore = 0;
    $employeescore =0;
    foreach ($employeerating as $key => $rate) 
    {

      if($rate->weightage == 0)
      {
        $managerscore =0;
        $employeescore =0;
      }
      else
      {
        $managerscore += (($rate->manager / $rate->scale)* $rate->weightage)/$totalweightgoal;
        $employeescore += (($rate->employee / $rate->scale)* $rate->weightage)/$totalweightgoal;
      }
     
    }
     $managerfinal = ($managerscore * 100);
     $employeefinal = ($employeescore * 100);
   }

    return view('performance.view', compact('employee','kpa','cycles','managerrating','employeerating','managerfinal','employeefinal'));
   }



    public function loadSummary()
    {
        try
        {
                
                $items = AppraisalSummary::get();
                return  Response::json($items);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }


    public function myreview($id)
    {

    $reviews        = ReviewDocuments::where('staff_id',$id)->orwhere('supervisor_id',$id)->orwhere('director_id',$id)->orderby('created_on','desc')->get();
    $employee       = Employee::where('staff_id' ,'=', $id)->first();
    $supervisors    = Employee::get();
    $directors      = Employee::get();
    $employees      = Employee::get();
    return view('performance.myreview', compact('reviews','employees','employee','supervisors','directors'));
    
    }


    public function addPerformanceGoal()
    {


           $goals = new ReviewRatings;
           $goals->staff_id              = Input::get('staff_id');
           $goals->kra                   = Input::get('performancegoal');
           $goals->weightage             = 0;
           $goals->manager               = 0;
           $goals->employee              = 0;
           $goals->scale                 = 5;
           $goals->reviewtype            = Input::get('reviewtype');
           $goals->review_token          = Input::get('reviewid');
           $goals->created_on            = Carbon::now();
           $goals->created_by            = Auth::user()->getNameOrUsername();
           


         if($goals->save())
          {

             Activity::log([
          'contentId'   =>  Input::get('staff_id'),
          'contentType' => 'User',
          'action'      => 'Insert',
          'description' => Auth::user()->getNameOrUsername().' added ' .Input::get('performancegoal') .' as a goal',
          'details'     =>  Auth::user()->getNameOrUsername().' added ' .Input::get('performancegoal') .' as a goal',
          ]);

            return redirect()
            ->back()
            ->with('info','Goal saved!');
          }

          else
          {

              return redirect()
            ->back()
            ->with('info','Fail to save!');
          }


    }

 public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y', $date);
        return $time->format('Y-m-d');
    }

    public function addCycle(Request $request)
    {
            //dd($request->all());
                
          $time1 = explode(" - ", Input::get('appraisal_period')); 
          $time2 = explode(" - ", Input::get('review_period')); 
          $time3 = explode(" - ", Input::get('self_period')); 


          if(Input::get("department")){$department =  implode('|', Input::get("department"));} else {$department = 'All';}
          if(Input::get("subsidiary")){$business =  implode('|', Input::get("subsidiary"));} else {$business = 'All';}
          if(Input::get("jobtitle")){$role =  implode('|', Input::get("jobtitle"));} else {$role = 'All';}
         
            

           $cycle = new ReviewCycle;
           $cycle->title            = Input::get('title');
           $cycle->description      = Input::get('description');
           $cycle->cycle_start      = $this->change_date_format($time1[0]);
           $cycle->cycle_end        = $this->change_date_format($time1[1]);
           $cycle->review_start     = $this->change_date_format($time2[0]);
           $cycle->review_end       = $this->change_date_format($time2[1]);
           $cycle->self_start       = $this->change_date_format($time3[0]);
           $cycle->self_end         = $this->change_date_format($time3[1]);
           $cycle->department       = $department;
           $cycle->business         = $business;
           $cycle->role             = $role;
                                      
                                      
                                       
           $cycle->review_token     = Input::get("_token");
           $cycle->created_on       = Carbon::now();
           $cycle->create_by        = Auth::user()->getNameOrUsername();
           




         if($cycle->save())
          {

            return redirect()
            ->back()
            ->with('info','Appraisal Cycle saved!');
          }

          else
          {

              return redirect()
            ->back()
            ->with('info','Fail to save!');
          }


    }


    public function loadPerformanceGoal()
    {

       try
        {
                $review_token = Input::get("review_token");
                $jobs = PerformanceGoals::where('review_token','=',$review_token)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }

    }

    public function deleteGoal()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = ReviewRatings::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
                  Activity::log([
          'contentId'   =>  Input::get('staff_id'),
          'contentType' => 'User',
          'action'      => 'Insert',
          'description' => Auth::user()->getNameOrUsername().' deleted ' .Input::get("ID") .' as a goal',
          'details'     =>  Auth::user()->getNameOrUsername().' deleted ' .Input::get("ID") .' as a goal',
          ]);

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


public function deleteCycle()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = ReviewCycle::where('id', '=', $ID)->delete();

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


public function deleteSubmission()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = ReviewDocuments::where('id', '=', $ID)->delete();

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





     public function ratingSave(Request $request)
    {

           // dd($request->all());

            $count = ReviewRatings::where('review_token',$request->input('reviewid'))->count();

            if($count > 0)
            {
              ReviewRatings::where('review_token', '=', $request->input('reviewid'))->delete();
              
            }
           
           

            $input = $request->all();
            for($i=0; $i<= count($input['question']); $i++) {

            if(empty($input['question'][$i])) continue;
            $data = [ 
            'review_token' => $request->input('reviewid'),
            'reviewtype' => $request->input('reviewtype'),
            'kra' => $input['question'][$i],
            'weightage' => $input['weight'][$i],
            'scale' => 5,
            'manager' => $input['managerscrore'][$i],
            'employee' => $input['userscore'][$i],
            'comment' => $input['comment'][$i],
            'staff_id' => $request->input('staff_id'),
            'employee_reason' => $request->input('employee_reason'),
            'sup_comment_reason' => $request->input('sup_comment_reason'),
            'challenges' => $request->input('challenges'),
            'failures' => $request->input('failures'),
            'strategy' => $request->input('strategy'),
            'manager_feedback'  => $request->input('manager_feedback'),
            'director_feedback' => $request->input('director_feedback'),
            'hr_feedback' => $request->input('hr_feedback'),
            'created_on' => Carbon::now(),
            'created_by' => Auth::user()->getNameOrUsername()
          ];

          ReviewRatings::create($data);
        }   


           $reviewee = Employee::where('staff_id',$request->input('staff_id_raw'))->first();
           $reviewname = ReviewCycle::where('review_token',$request->input('reviewid'))->first();
           if(Input::get("supervisor")){$supervisor =  implode('|', Input::get("supervisor"));} else {$supervisor = 'echo.jasonkerr7@gmail.com';}


           $count = ReviewDocuments::where('content',$request->input('reviewid'))->where('staff_id',Input::get("staff_id"))->count();

            if($count > 0)
            {
              ReviewDocuments::where('content',$request->input('reviewid'))->where('staff_id',Input::get("staff_id"))->delete();
              
            }

           $cycle = new ReviewDocuments;
           //dd($request->all());
           $cycle->review_type      = $reviewname->title;
           $cycle->content          = $request->input('reviewid');
           $cycle->staff_id         = Input::get("staff_id");
           $cycle->fullname         = $reviewee->fullname;
           $cycle->employee_mark    = $request->input('employee_mark');
           $cycle->manager_mark    =  $request->input('manager_mark');
           $cycle->created_on       = Carbon::now();
           $cycle->created_by       = Auth::user()->getNameOrUsername();
           $cycle->supervisor_status = $supervisor;
           $cycle->save();
           $email      =   Input::get("supervisor");
            //dd($email);

            if($email)
            {
            Mail::send('emails.reviewlevel2', array('token' =>Input::get("staff_id").'/'.$request->input('reviewid'), 'fullname' => $reviewee->fullname   )  , function ($message) use ($email) 
                    { 
                        $message->from('hr@mcpersona.com', 'McPersona');
                        
                        $message->to($email)->subject('Submission of Self Appraisal Form'); 
                
                    }); 

           return redirect()
            ->back()
            ->with('success','Review has been saved!');
          }

           return redirect()
            ->back()
            ->with('success','Review has been saved, but no supervisor available to send to!');



    }

    public function forwardToHR($id)
    {

            $data   =   ReviewRatings::where('review_token',$id)->orderBy('created_on', 'desc')->first(); 
            $email  =   'jasonkerr2006@live.com';


            Mail::send('emails.completereview', array('token' => $data->review_token, 'fullname' =>  $data->created_by   )  , function ($message) use ($email) 
                    { 
                        $message->from('hr@mcpersona.com', 'McPersona');
                        
                        $message->to($email)->subject('Completion Of The Appraisal Review Process'); 
                
                    }); 

    }


    



    public function viewReview($id)
    {
        
        $documents = ReviewDocuments::where('id',$id)->first();
        $employees = Employee::where('staff_id',$documents->staff_id)->get();
        return view('performance.updateperiodic', compact('employees','documents'));
    
    }

    public function printReview($id)
    {

        $documents = ReviewDocuments::where('id',$id)->first();
        $employees = Employee::where('staff_id',$documents->staff_id)->get();
        return view('performance.print', compact('employees','documents'));

    }

    

    public function updateReview(Request $request)
    {

         try
        {

         //dd($request->input('report'));
            $id = $request->input('reviewid');
            $report = $request->input('report');
            $affectedRows = ReviewDocuments::where('id',$id )
            ->update(array('content' => $report ));

           if($affectedRows > 0)
          {

        
           return redirect()
            ->route('view-review',$id )
            ->with('info','Review successfully saved!');
            }
            else
            {
         return redirect()
            ->route('view-review',$id )
            ->with('error','Review failed to save!');
            
            }

    }
     catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }

    }



    public function savePeriodReview(Request $request)
    {

          $this->validate($request, [
          'staff_id' => 'required'
        ]);

        
        $docs               = new ReviewDocuments;
        $docs->review_type  = 'Periodic Performance Review';
        $docs->staff_id     = $request->input('staff_id');
        $docs->supervisor_id = $request->input('supervisor_id');
        $docs->director_id  = $request->input('director_id');
        $docs->review_date  = Carbon::now();
        $docs->content      = $request->input('report');
        $docs->created_on   = Carbon::now();
        $docs->created_by   = Auth::user()->getNameOrUsername();
        $docs->save();

        
        return redirect()
            ->route('employee-profile',$request->input('staff_id'))
            ->with('info','Review successfully saved!');


    }


      public function saveJobAudit(Request $request)
    {

          $this->validate($request, [
          'staff_id' => 'required'
        ]);

        
        $docs               = new ReviewDocuments;
        $docs->review_type  = 'Job Audit Review';
        $docs->staff_id     = $request->input('staff_id');
        $docs->supervisor_id = $request->input('supervisor_id');
        $docs->director_id  = $request->input('director_id');
        $docs->review_date  = Carbon::now();
        $docs->content      = $request->input('report');
        $docs->created_on   = Carbon::now();
        $docs->created_by   = Auth::user()->getNameOrUsername();
        $docs->save();
        
         return redirect()
             ->route('employee-profile',$request->input('staff_id'))
            ->with('info','Review successfully saved!');


    }

     public function addStaffComment()
    {       
        
        $id = Input::get("ID");
        $comment = Input::get("comment");


            $affectedRows = ReviewDocuments::where('id', '=', $id)->update(array('staff_comment' => $comment,'comment' => $comment ));

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


    public function setReviewState()
    {       
        
        $id = Input::get("ID");
        $status = Input::get("status");


            $affectedRows = ReviewDocuments::where('id', '=', $id)->update(array('status' => $status ));

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

   
}
