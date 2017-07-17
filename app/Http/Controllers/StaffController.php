<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;
use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;

use McPersona\Models\JobTitle;
use McPersona\Models\SalaryComponent;
use McPersona\Models\EmploymentStatus;
use McPersona\Models\LeaveSchedule;
use McPersona\Models\JobCategory;
use McPersona\Models\WorkShift;
use McPersona\Models\PayGrade;
use McPersona\Models\Skill;
use McPersona\Models\Education;
use McPersona\Models\Language;
use McPersona\Models\LanguageSkill;
use McPersona\Models\LanguageFluency;
use McPersona\Models\Payroll;
use McPersona\Models\Licenses;
use McPersona\Models\Currency;
use McPersona\Models\Membership;
use McPersona\Models\Gender;
use McPersona\Models\MaritalStatus;
use McPersona\Models\IdentificationType;
use McPersona\Models\Nationality;
use McPersona\Models\Department;
use McPersona\Models\Subsidiary;
use McPersona\Models\Employee;
use McPersona\Models\AssetType;
use McPersona\Models\YesNo;
use McPersona\Models\Serials;
use McPersona\Models\Bank;
use McPersona\Models\Location;
use McPersona\Models\EmployeeJob;
use McPersona\Models\EmployeeWorkExperience;
use McPersona\Models\EmployeeEducation;
use McPersona\Models\EmployeeSkills;
use McPersona\Models\EmployeeBank;
use McPersona\Models\EmployeeLanguage;
use McPersona\Models\EmployeeLicenses;
use McPersona\Models\EmployeeSalary;
use McPersona\Models\EmployeeEmergency;
use McPersona\Models\EmployeeBeneficiary;
use McPersona\Models\EmployeeDependent;
use McPersona\Models\EmployeeMemberships;
use McPersona\Models\EmployeeGuarantor;
use McPersona\Models\EmployeeImmigration;
use McPersona\Models\EmployeeReportto;
use McPersona\Models\SalaryEvent;
use McPersona\Models\Beneficiary;
use McPersona\Models\Terminate;
use McPersona\Models\Country;
use McPersona\Models\ReportToMethods;
use McPersona\Models\ReviewDocuments;
use McPersona\Models\EmployeeDocument;
use McPersona\Models\Role; 
use McPersona\Models\User;
use McPersona\Models\LeaveType;
use Input;
use Image;
use Carbon\Carbon;
use Cache;

use Response;
use Activity;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:HR Officer|HR Manager|Staff');
        
    } 
 

 public function setLower()
 {
      $employees     = Employee::get();
      $jobtitles     = JobTitle::get();
      $jobcategories = JobCategory::get();
      $departments   = Department::get();

       $banks   = EmployeeBank::get();
       $job   = EmployeeJob::get();
       $education   = EmployeeEducation::get();
       $skills   = EmployeeSkills::get();
       $beneficiary   = EmployeeBeneficiary::get();
       $emergency   = EmployeeEmergency::get();
       $guarantor   = EmployeeGuarantor::get();
       $experience   = EmployeeWorkExperience::get();

      foreach ($employees as $key => $employee) 
      {
       Employee::where('staff_id', '=', $employee->staff_id)
       ->update(array('fullname' => ucwords(strtolower($employee->fullname)),'subsidiary' => ucwords(strtolower($employee->subsidiary)),'postal_address' => ucwords(strtolower($employee->postal_address)),'place_of_birth' => ucwords(strtolower($employee->place_of_birth)),'job_title' => ucwords(strtolower($employee->job_title)),'residential_address' => ucwords(strtolower($employee->residential_address)), 'email'=> strtolower($employee->email)));
      }

      foreach ($jobtitles as $key => $jobtitle) {
        JobTitle::where('id', '=', $jobtitle->id)
       ->update(array( 'type'=> ucwords(strtolower($jobtitle->type))));
     
      }

      foreach ($jobcategories as $key => $jobcategory) {
      JobCategory::where('id', '=', $jobcategory->id)
       ->update(array( 'type'=> ucwords(strtolower($jobcategory->type))));
      }

      foreach ($departments as $key => $department) {
        Department::where('id', '=', $department->id)
       ->update(array( 'name'=> ucwords(strtolower($department->name))));
      }

      //////////


       foreach ($banks as $key => $bank) {
        EmployeeBank::where('id', '=', $bank->id)
       ->update(array( 'bank_name'=> ucwords(strtolower($bank->bank_name)),'bank_location'=> ucwords(strtolower($bank->bank_location)),'account_holder_name'=> ucwords(strtolower($bank->account_holder_name))));
      }

       foreach ($job as $key => $job) {
        EmployeeJob::where('id', '=', $job->id)
       ->update(array( 'job_title'=> ucwords(strtolower($job->job_title)),'job_category'=> ucwords(strtolower($job->job_category)),'department'=> ucwords(strtolower($job->department)),'subsidiary'=> ucwords(strtolower($job->subsidiary))));
      }

       foreach ($education as $key => $education) {
        EmployeeEducation::where('id', '=', $education->id)
       ->update(array( 'school'=> ucwords(strtolower($education->school)),'major_specialization'=> ucwords(strtolower($education->major_specialization))));
      }

       foreach ($skills as $key => $skill) {
        EmployeeSkills::where('id', '=', $skill->id)
       ->update(array( 'special_skill'=> ucwords(strtolower($skill->special_skill))));
      }

       foreach ($beneficiary as $key => $beneficiary) {
        EmployeeBeneficiary::where('id', '=', $beneficiary->id)
       ->update(array( 'beneficiary_name'=> ucwords(strtolower($beneficiary->beneficiary_name)),'beneficiary_postal_address'=> ucwords(strtolower($beneficiary->beneficiary_postal_address)),'beneficiary_residential_address'=> ucwords(strtolower($beneficiary->beneficiary_residential_address))));
      }

       foreach ($emergency as $key => $emergency) {
        EmployeeEmergency::where('id', '=', $emergency->id)
       ->update(array( 'kin_name'=> ucwords(strtolower($emergency->kin_name))));
      }

       foreach ($guarantor as $key => $guarantor) {
        EmployeeGuarantor::where('id', '=', $guarantor->id)
       ->update(array( 'guarantor_name'=> ucwords(strtolower($guarantor->guarantor_name)), 'guarantor_postal_address'=> ucwords(strtolower($guarantor->guarantor_postal_address)),'guarantor_residential_address'=> ucwords(strtolower($guarantor->guarantor_residential_address))));
      }

      foreach ($experience as $key => $experience) {
        EmployeeWorkExperience::where('id', '=', $experience->id)
       ->update(array( 'company'=> ucwords(strtolower($experience->company)), 'job_title'=> ucwords(strtolower($experience->job_title))));
      }

 }


   public function autoGenSerial($staff)
{
       
       
        $words = explode(" ",$staff);
        //dd($words);
        $acronym = "";
        foreach ($words as $w) 
        {
          $acronym .= $w[0];
          

        }
       //
        return $acronym;
}



     public function showStaff()
    {

        $activestaff = Employee::where('status','Active')->count();
        $pendingstaff = Employee::where('status','Pending')->count();
        $inactivestaff = Employee::where('status','Deactive')->count();
        $resignedretiredstaff = Employee::where('status','like','Re%')->count();

        $employeestatus =       EmploymentStatus::get();
        $locations =            Location::get();
        $employees = Employee::where('status','Active')->orderby('fullname','asc')->paginate(30);
                
        return view('staff.index',compact('employees','locations','employeestatus','activestaff','pendingstaff','inactivestaff','resignedretiredstaff'));
    }


    public function doGenerateBulkID()
    {

       $employees = Employee::get()->pluck('fullname')->toArray();           //Employee::where('status','Active')->orderby('fullname','asc')->paginate(30);

        foreach( $employees as $employee)
        {
        $initials = $this->autoGenSerial($employee);

        $staffid = Employee::where('fullname',$employee)->pluck('staff_id');
        $staffid = substr($staffid, -4);

        Employee::where('fullname', '=', $employee)->update(array('master_id' => $initials.date('mY').$staffid));
      }

    }

    public function findStaff(Request $request)
    {
        $activestaff = Employee::where('status','Active')->count();
        $pendingstaff = Employee::where('status','Pending')->count();
        $inactivestaff = Employee::where('status','Deactive')->count();
        $resignedretiredstaff = Employee::where('status','like','Re%')->count();

        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = $request->get('search');

       $employeestatus =       EmploymentStatus::get();
        $locations =            Location::get();
        $employees =            Employee::where('fullname', 'like', "%$search%")
            ->orWhere('staff_id', 'like', "%$search%")
            ->orWhere('department', 'like', "%$search%")
            ->orWhere('subsidiary', 'like', "%$search%")
            ->orWhere('location', 'like', "%$search%")
            ->orWhere('staff_type', 'like', "%$search%")
            ->orWhere('created_by', 'like', "%$search%")
            ->orderBy('fullname')
            ->paginate(30)
            ->appends(['search' => $search])
        ;


     return view('staff.index',compact('employees','locations','employeestatus','activestaff','pendingstaff','inactivestaff','resignedretiredstaff'));
  
    }

     public function inactiveStaff()
    {
        $activestaff = Employee::where('status','Active')->count();
        $pendingstaff = Employee::where('status','Pending')->count();
        $inactivestaff = Employee::where('status','Deactive')->count();
        $resignedretiredstaff = Employee::where('status','like','Re%')->orwhere('status','')->count();

        $employeestatus =       EmploymentStatus::get();
        $locations =            Location::get();
        $employees =            Employee::where('status','Deactive')->paginate(30);
                
        return view('staff.index',compact('employees','locations','employeestatus','activestaff','pendingstaff','inactivestaff','resignedretiredstaff'));
    }

    public function pendingStaff()
    {
        $activestaff = Employee::where('status','Active')->count();
        $pendingstaff = Employee::where('status','Pending')->count();
        $inactivestaff = Employee::where('status','Deactive')->count();
        $resignedretiredstaff = Employee::where('status','like','Re%')->count();

        $employeestatus =       EmploymentStatus::get();
        $locations =            Location::get();
        $employees =            Employee::where('status','Pending')->paginate(30);
                
        return view('staff.index',compact('employees','locations','employeestatus','activestaff','pendingstaff','inactivestaff','resignedretiredstaff'));
    }

     public function RetiredStaff()
    {
        $activestaff = Employee::where('status','Active')->count();
        $pendingstaff = Employee::where('status','Pending')->count();
        $inactivestaff = Employee::where('status','Deactive')->count();
        $resignedretiredstaff = Employee::where('status','like','Re%')->count();

        $employeestatus =       EmploymentStatus::get();
        $locations =            Location::get();
        $employees =            Employee::where('status', 'like', "retired%")->paginate(30);
                
        return view('staff.index',compact('employees','locations','employeestatus','activestaff','pendingstaff','inactivestaff','resignedretiredstaff'));
    }

    public function ResignedStaff()
    {
        $activestaff = Employee::where('status','Active')->count();
        $pendingstaff = Employee::where('status','Pending')->count();
        $inactivestaff = Employee::where('status','Deactive')->count();
        $resignedretiredstaff = Employee::where('status','like','Re%')->count();

        $employeestatus =       EmploymentStatus::get();
        $locations =            Location::get();
        $employees =            Employee::where('status', 'like', "resign%")->paginate(30);
                
        return view('staff.index',compact('employees','locations','employeestatus','activestaff','pendingstaff','inactivestaff','resignedretiredstaff'));
    }
   
    public function newStaff($id)
    {
        $subsidiaries =         Subsidiary::get();
        $departments =          Department::get();
        $identifications =      IdentificationType::get();
        $nationalities =        Nationality::get();
        $maritalstatus =        MaritalStatus::get();
        $genders =              Gender::get();
        $currency =             Currency::get();
        $jobtitles =            JobTitle::get();
        $salarycomponents =     SalaryComponent::get();
        $jobcategories =        JobCategory::get();
        $employeestatuses =     EmploymentStatus::get();
        $workshifts =           WorkShift::get();
        $paygrades =            PayGrade::get();
        $banks  =               Bank::get();
        $skills =               Skill::get();
        $educations =           Education::get();
        $languages =            Language::get();
        $languageskills =       LanguageSkill::get();
        $languagefluency =      LanguageFluency::get();
        $licenses =             Licenses::get();
        $memberships =          Membership::get();
        $locations =            Location::get();
        $salaryevents =         SalaryEvent::get();
        $relationships =        Beneficiary::get();
        $countries =            Country::get();
        $reporttotypes =        ReportToMethods::get();
        $terminate_reasons =    Terminate::get();
        $reportto =             Employee::get();
        $assetstypes =          AssetType::get();
        $flags =                YesNo::get();
        $employees   =          Employee::where('staff_id' ,'=', $id)->get()->first();


        return view('staff.new',compact('genders','flags','assetstypes','reportto','banks','salaryevents','terminate_reasons','reporttotypes','countries','relationships','languageskills','languagefluency','employees','locations','subsidiaries','currency','departments','nationalities','identifications','maritalstatus','jobtitles','salarycomponents','jobcategories','employeestatuses','workshifts','paygrades','skills','educations','languages','licenses','memberships'));
    }

     public function getProfile($id)
   {
    $leavetypes = LeaveType::get();
    $reviews  =  ReviewDocuments::where('staff_id',$id)->orwhere('supervisor_id',$id)->orwhere('director_id',$id)->orderby('created_on','desc')->get();
    $leaves  =  LeaveSchedule::where('employee',$id)->orwhere('supervisor_id',$id)->orwhere('director_id',$id)->get();
    $employee =  Employee::where('staff_id' ,'=', $id)->first();
    $payrolls = Payroll::where('staffid' ,'=', $id)->get();
    $supervisors = Employee::get();
    $directors = Employee::get();
    $employees = Employee::get();
    $birthdays = Employee::whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(date_of_birth) AND DAYOFYEAR(curdate()) + 7 >=  dayofyear(date_of_birth)' )->get();
    return view('staff.profile', compact('employee','birthdays','payrolls','reviews','employees','leavetypes','leaves','supervisors','directors'));

   }

public function generateStaffID($staffname)
{

    $words = explode(" ",$staffname);
        $acronym = "";

        foreach ($words as $w) 
        {
          $acronym .= $w[0];
        }


    $number = Serials::where('name','=','staff')->first();
    $number = $number->counter;
    $account = str_pad($number,4, '0', STR_PAD_LEFT);
    $myaccount=  $acronym.date('my').$account;
    Serials::where('name','=','staff')->increment('counter',1);

    return  $myaccount;

}





 public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y', $date);
        return $time->format('Y-m-d');
    }


public function setupEmployee(Request $request)
{

   //dd($request->file('image'));


            $genstaffid = $this->generateStaffID(Input::get('fullname'));
            
            $filename=null;
          if($request->hasFile('image'))
           {

           $image = Input::file('image');
           $profile= $genstaffid;
           $filename = $profile. '.jpg';
           $path = public_path('images/' . $filename);
           Image::make($image->getRealPath())->resize(200, 200)->save($path);

            }

            else
            {

              $filename  = 'avatar_default.jpg';

            }


           $employee = new Employee;
           $employee->staff_id  = $genstaffid;
           $employee->staff_type = Input::get('staff_type');
           $employee->fullname = ucwords(strtolower(Input::get('fullname')));
           $employee->location = ucwords(strtolower(Input::get('location')));
           $employee->email = strtolower(Input::get('email'));
           $employee->obsid = uniqid();
           $employee->image = $filename;
           $employee->created_on=Carbon::now();
           $employee->last_updated_on=Carbon::now();
           $employee->created_by=Auth::user()->getNameOrUsername();
           $employee->master_id = $genstaffid;


          $user = new User;
          $user->email    = strtolower(Input::get('email'));
          $user->username = strtolower(Input::get('username'));
          $user->password = bcrypt(Input::get('password'));
          $user->fullname = ucwords(strtolower(Input::get('fullname')));
          $user->location = ucwords(strtolower(Input::get('location')));
          $user->ref_code = $genstaffid;
          $user->usertype = 'Staff';
        

            if($employee->save())
          {

             Activity::log([
          'contentId'   =>  $genstaffid,
          'contentType' => 'User',
          'action'      => 'Update',
          'description' => 'Employee details of '.Input::get('fullname').' created',
          'details'     =>  Auth::user()->getNameOrUsername(). ' created '.Input::get('fullname'),
          ]);

            if($user->save())
            
            {

              $role = Role::where('name','=', 'Staff')->first();
              $user->attachRole($role);


              $data = array(
              'fullname' => $request->input('fullname'),
              'email' => $request->input('email'),
           );


            Mail::queue('emails.welcome', $data, function($message)
            {
              //dd($data);
                $message->to('echo.jasonkerr7@gmail.com', 'Jason')->subject('Welcome to McPersona!');
            });

            return redirect()
            ->route('new-employee', ['id' => $genstaffid])
            ->with('success','Employee has successfully been created!');

            }
          
          }

          else
          {

             return redirect()
            ->route('employees')
            ->with('error','Employee failed to create!');
          }


}

    public function createEmployee()
    {


         try
        {

          // if(Input::hasFile('image'))
          //   {
          //  $image = Input::file('image');
          //  $profile= Input::get("staff_id");
          //  $filename = $profile. '.jpg';
          //  $path = public_path('images/' . $filename);
          //  Image::make($image->getRealPath())->resize(200, 200)->save($path); 
          //   }
          //   else
          //   {
          //     $filename  = 'avatar_default.jpg';
          //   }

            //dd($filename);

            $affectedRows = Employee::where('staff_id', '=', Input::get('staff_id'))
            ->update(array(
                           
                           'staff_type' =>      Input::get('staff_type'),
                           'fullname' =>        ucwords(strtolower(Input::get('fullname'))),
                           'date_of_birth' =>   $this->change_date_format(Input::get('date_of_birth')), 
                           'gender' =>          Input::get('gender'), 
                           'postal_address' =>  ucwords(strtolower(Input::get('postal_address'))), 
                           'residential_address' =>   ucwords(strtolower(Input::get('residential_address'))), 
                           'email'=>            strtolower(Input::get('email')),
                           'mobile_number'=>    Input::get('mobile_number'),
                           'place_of_birth' =>  ucwords(strtolower(Input::get('place_of_birth'))),
                           'id_type' =>         Input::get('id_type'),
                           'id_number'=>        Input::get('id_number'),
                           'marital_status'=>   Input::get('marital_status'),
                           'nationality'=>      Input::get('nationality'),
                           'ssn'=>              Input::get('ssn'),
                          'last_updated_on'=>   Carbon::now()));

           if($affectedRows > 0)
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

    

    public function loadJob()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeJob::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

    public function loadExperience()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeWorkExperience::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

     public function loadBank()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeBank::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

     public function loadSkill()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeSkills::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

    public function loadEducation()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeEducation::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

    public function loadLanguage()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeLanguage::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

     public function loadLicense()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeLicenses::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

     public function loadMemberships()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeMemberships::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

      public function loadGuarantor()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeGuarantor::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

       public function loadSalary()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeSalary::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }


       public function loadEmergency()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeEmergency::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

      public function loadDependent()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeDependent::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }


      public function loadBeneficiary()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeBeneficiary::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }



      public function loadImmigration()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeImmigration::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }


       public function loadReportto()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeReportto::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

       public function loadDocuments()
    {
        try
        {
                $staff_id = Input::get("staff_id");
                $jobs = EmployeeDocument::where('staff_id','=',$staff_id)->get();
                return  Response::json($jobs);        
        }

        catch (\Exception $e) 
        {
               echo $e->getMessage();
            
        }
    }

    public function createJob()
    {

         try
        {


           $employee = new EmployeeJob;
           $employee->staff_id              = Input::get('staff_id');
           $employee->date_join             = $this->change_date_format(Input::get('date_join'));
           $employee->probation_end_date    = $this->change_date_format(Input::get('probation_end_date'));
           $employee->permanency_date       = $this->change_date_format(Input::get('permanency_date'));
           $employee->job_title             = ucwords(strtolower(Input::get('job_title')));
           $employee->employment_status     = ucwords(strtolower(Input::get('employment_status')));
           $employee->job_specification     = ucwords(strtolower(Input::get('job_specification')));
           $employee->job_category          = ucwords(strtolower(Input::get('job_category')));
           $employee->department            = ucwords(strtolower(Input::get('department')));
           $employee->location              = ucwords(strtolower(Input::get('location')));
           $employee->work_shift            = Input::get('work_shift');
           $employee->comment               = Input::get('comment');
           $employee->subsidiary            = ucwords(strtolower(Input::get('subsidiary')));
           $employee->contract_start        = Carbon::now();
           $employee->contract_end          = Carbon::now();
           $employee->created_on            = Carbon::now();
           $employee->last_updated_on       = Carbon::now();
           $employee->created_by            = Auth::user()->getNameOrUsername();
           

           $affectedRows = Employee::where('staff_id', '=', Input::get('staff_id'))
            ->update(array(
                           
                           'department' =>      ucwords(strtolower(Input::get('department'))),
                           'staff_type' =>      ucwords(strtolower(Input::get('employment_status'))),
                           'subsidiary' =>      ucwords(strtolower(Input::get('subsidiary'))), 
                           'job_title' =>       ucwords(strtolower(Input::get('job_title')))
                           ));


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





    public function createExperience()
    {
         try
        {
           $employee = new EmployeeWorkExperience;
           $employee->staff_id              = Input::get('staff_id');
           $employee->date_from             = $this->change_date_format(Input::get('qualification_end_date'));
           $employee->date_to               = $this->change_date_format(Input::get('qualification_start_date'));
           $employee->company               = ucwords(strtolower(Input::get('job_experience_company')));
           $employee->job_title             = ucwords(strtolower(Input::get('job_experience_title')));
           $employee->created_on            = Carbon::now();
           $employee->created_by            = Auth::user()->getNameOrUsername();
           


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




    public function createEducation()
    {

         try
        {


           $employee = new EmployeeEducation;
           $employee->staff_id              = Input::get('staff_id');
           $employee->level                 = ucwords(strtolower(Input::get('level')));
           $employee->school                = ucwords(strtolower(Input::get('school')));
           $employee->major_specialization  = ucwords(strtolower(Input::get('major_specialization')));
           $employee->complete_year         = Input::get('complete_year');
           $employee->gpa                   = Input::get('gpa');
           $employee->school_start_date     = $this->change_date_format(Input::get('school_start_date'));
           $employee->school_end_date       = $this->change_date_format(Input::get('school_end_date'));
           $employee->created_on            = Carbon::now();
           $employee->created_by            = Auth::user()->getNameOrUsername();
           


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

   



    public function createSkill()
    {

         try
        {


           $employee = new EmployeeSkills;
           $employee->staff_id              = Input::get('staff_id');
           $employee->special_skill         = ucwords(strtolower(Input::get('special_skill')));
           $employee->year_of_experience    = Input::get('year_of_experience');
           $employee->comment               = ucwords(strtolower(Input::get('comment')));
           $employee->created_on            = Carbon::now();
           $employee->created_by            = Auth::user()->getNameOrUsername();
           


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



    public function createLanguage()
    {

         try
        {


           $employee = new EmployeeLanguage;
           $employee->staff_id              = Input::get('staff_id');
           $employee->language              = ucwords(strtolower(Input::get('language')));
           $employee->skill                 = ucwords(strtolower(Input::get('language_skill')));
           $employee->fluency               = ucwords(strtolower(Input::get('fluency')));
           $employee->comment               = ucwords(strtolower(Input::get('comment')));
           $employee->created_on            = Carbon::now();
           $employee->created_by            = Auth::user()->getNameOrUsername();
           


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


    public function createLicense()
    {

         try
        {


           $employee = new EmployeeLicenses;
           $employee->staff_id              = Input::get('staff_id');
           $employee->license_type          = ucwords(strtolower(Input::get('license_type')));
           $employee->license_number        = ucwords(strtolower(Input::get('license_number')));
           $employee->issued_date           = $this->change_date_format(Input::get('license_start_date'));
           $employee->expiry_date           = $this->change_date_format(Input::get('license_end_date'));
           $employee->created_on            = Carbon::now();
           $employee->created_by            = Auth::user()->getNameOrUsername();
           


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



    public function createSalary()
    {

         try
        {

           $employee = new EmployeeSalary;
           $employee->staff_id                 = Input::get('staff_id');
           $employee->pay_grade                = Input::get('pay_grade');
           $employee->currency                 = Input::get('currency');
           $employee->basic_annual             = Input::get('basic_annual');
           $employee->car_allowance            = Input::get('car_allowance');
           $employee->living_allowance         = Input::get('living_allowance');
           $employee->housing_allowance        = Input::get('housing_allowance');
           $employee->clothing_allowance       = Input::get('clothing_allowance');
           $employee->transport_allowance      = Input::get('transport_allowance');
      
           $employee->employee_ssf             = Input::get('epf_deducation_percent');
           $employee->pension_fund_percent     = Input::get('pension_fund_percent');
           $employee->loan_repayment           = Input::get('loan_repayment');
           $employee->mcfund_plus              = Input::get('mcfund_plus');
           $employee->mcfund                   = Input::get('mcfund');
           $employee->mctrust                  = Input::get('mctrust');

           $employee->event                 = Input::get('salary_event');
           $employee->effective_from        = $this->change_date_format(Input::get('salary_start_date'));
           $employee->created_on            = Carbon::now();
           $employee->created_by            = Auth::user()->getNameOrUsername();
           


           if($employee->save())
          {

             Activity::log([
          'contentId'   =>  Input::get('staff_id'),
          'contentType' => 'User',
          'action'      => 'Create',
          'description' => 'Created salary of '.Input::get('staff_id').' - '.Input::get('basic_annual').' - '.Input::get('salary_event'),
          'details'     => 'Username: '.Auth::user()->getNameOrUsername(),
          ]); 
            
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

     public function createEmergencyContact()
    {

         try
        {

           $employee = new EmployeeEmergency;
           $employee->staff_id              = Input::get('staff_id');
           $employee->kin_name              = ucwords(strtolower(Input::get('kin_name')));
           $employee->kin_relationship      = ucwords(strtolower(Input::get('kin_relationship')));
           $employee->kin_mobile            = Input::get('kin_mobile');
            $employee->emergency_dob            = $this->change_date_format(Input::get('emergency_dob'));
           $employee->kin_office_phone      = Input::get('kin_office_phone');
           $employee->kin_home_phone        = Input::get('kin_home_phone');
           $employee->kin_residential       = ucwords(strtolower(Input::get('kin_residential')));
           $employee->kin_postal            = ucwords(strtolower(Input::get('kin_postal')));
           $employee->created_on            = Carbon::now();
           $employee->created_by            = Auth::user()->getNameOrUsername();

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


    public function createGuarantor()
    {

         try
        {

           $employee = new EmployeeGuarantor;
           $employee->staff_id                      = Input::get('staff_id');
           $employee->guarantor_name                = ucwords(strtolower(Input::get('guarantor_name')));
           $employee->guarantor_office_phone        = Input::get('guarantor_office_phone');
           $employee->guarantor_mobile              = Input::get('guarantor_mobile');
           $employee->guarantor_postal_address      = ucwords(strtolower(Input::get('guarantor_postal_address')));
           $employee->guarantor_residential_address = ucwords(strtolower(Input::get('guarantor_residential_address')));
           $employee->created_on                    = Carbon::now();
           $employee->created_by                    = Auth::user()->getNameOrUsername();

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

    public function createBeneficiary()
    {

         try
        {

           $employee = new EmployeeBeneficiary;
           $employee->staff_id                      = Input::get('staff_id');
           $employee->beneficiary_name              = ucwords(strtolower(Input::get('beneficiary_name')));
           $employee->beneficiary_relationship      = ucwords(strtolower(Input::get('beneficiary_relationship')));
           $employee->beneficiary_dob               = $this->change_date_format(Input::get('beneficiary_dob'));
           $employee->beneficiary_postal_address    = ucwords(strtolower(Input::get('beneficiary_postal_address')));
           $employee->beneficiary_residential_address = ucwords(strtolower(Input::get('beneficiary_residential_address')));
           $employee->beneficiary_home_phone        = Input::get('beneficiary_home_phone');
           $employee->beneficiary_mobile            = Input::get('beneficiary_mobile');
           $employee->created_on                    = Carbon::now();
           $employee->created_by                    = Auth::user()->getNameOrUsername();

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


      public function createMembership()
    {

         try
        {

           $employee = new EmployeeMemberships;
           $employee->staff_id              = Input::get('staff_id');
           $employee->sub_type              = ucwords(strtolower(Input::get('sub_type')));
           $employee->sub_paid_by           = Input::get('sub_paid_by');
           $employee->sub_amount            = Input::get('sub_amount');
           $employee->sub_currency          = Input::get('sub_currency');
           $employee->sub_commencement_date = $this->change_date_format(Input::get('sub_commencement_date'));
           $employee->sub_renewal_date      = $this->change_date_format(Input::get('sub_renewal_date'));
           $employee->created_on            = Carbon::now();
           $employee->created_by            = Auth::user()->getNameOrUsername();

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



    public function createDependent()
    {

         try
        {

           $employee = new EmployeeDependent;
           $employee->staff_id          = Input::get('staff_id');
           $employee->name              = ucwords(strtolower(Input::get('dependant_name')));
           $employee->relationship      = ucwords(strtolower(Input::get('dependant_relationship')));
           $employee->gender            = Input::get('dependant_gender');
           $employee->nationality       = Input::get('dependant_nationality');
           $employee->dob               = $this->change_date_format(Input::get('dependant_dob'));
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



    public function createImmigration()
    {

         try
        {

           $employee = new EmployeeImmigration;
           $employee->staff_id          = Input::get('staff_id');
           $employee->document          = Input::get('document');
           $employee->document_id       = Input::get('document_id');
           $employee->issued_at         = ucwords(strtolower(Input::get('issued_at')));
           $employee->issue_date        = $this->change_date_format(Input::get('issue_date'));
           $employee->expiry_date       = $this->change_date_format(Input::get('expiry_date'));
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


public function createReportTo()
    {

         try
        {

           $employee = new EmployeeReportto;
           $employee->staff_id          = Input::get('staff_id');
           $employee->name              = ucwords(strtolower(Input::get('name')));
           $employee->type              = ucwords(strtolower(Input::get('type')));
           $employee->reporting_mode    = Input::get('reporting_mode');
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


    public function createBank()
    {

         try
        {

           $employee = new EmployeeBank;
           $employee->staff_id               = Input::get('staff_id');
           $employee->bank_account_number    = Input::get('bank_account_number');
           $employee->bank_name              = ucwords(strtolower(Input::get('bank_name')));
           $employee->account_holder_name    = ucwords(strtolower(Input::get('account_holder_name')));
           $employee->bank_account_type      = ucwords(strtolower(Input::get('bank_account_type')));
           $employee->bank_location          = ucwords(strtolower(Input::get('bank_location')));
           $employee->created_on             = Carbon::now();
           $employee->created_by             = Auth::user()->getNameOrUsername();

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

    

    public function activateStaff()
    {
       
         
            $userid = Input::get("ID");

            $affectedRows = Employee::where('id', '=', $userid)->update(array('status' => 'Active'));

            if($affectedRows > 0)
            {
                //SEND EMAIL 
                //SEND SMS
               Activity::log([
          'contentId'   =>  $userid,
          'contentType' => 'User',
          'action'      => 'Update',
          'description' => 'Employee details of '.Input::get('fullname').' activated',
          'details'     =>  Auth::user()->getNameOrUsername(). ' activated '.Input::get('fullname'),
          ]);

                $ini = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini = array('No Data'=>'No Data');
                return  Response::json($ini);
            }
    }



    public function deactivateStaff()
    {
       
         
            $userid = Input::get("ID");

            $affectedRows = Employee::where('id', '=', $userid)->update(array('status' => 'Deactive'));

            if($affectedRows > 0)
            {
                //SEND EMAIL 
                //SEND SMS
                 Activity::log([
          'contentId'   =>  $userid,
          'contentType' => 'User',
          'action'      => 'Update',
          'description' => 'Employee details of '.Input::get('fullname').' deactivated',
          'details'     =>  Auth::user()->getNameOrUsername(). ' deactivated '.Input::get('fullname'),
          ]);

                $ini = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini = array('No Data'=>'No Data');
                return  Response::json($ini);
            }
    }


     public function deleteJob()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeJob::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            { 
          
          Activity::log([
          'contentId'   =>  $ID,
          'contentType' => 'User',
          'action'      => 'Delete',
          'description' => 'Job details of '.Input::get('fullname').' deleted',
          'details'     =>  Auth::user()->getNameOrUsername(). ' deleted '.Input::get('fullname').' Job id '.$ID,
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


    public function deleteStaff()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Employee::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
               Activity::log([
          'contentId'   =>  $ID,
          'contentType' => 'User',
          'action'      => 'Delete',
          'description' => 'Employee details of '.Input::get('fullname').' deleted',
          'details'     =>  Auth::user()->getNameOrUsername(). ' deleted '.Input::get('fullname'),
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

    public function deleteExperience()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeWorkExperience::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {

              Activity::log([
              'contentId'   =>  $ID,
              'contentType' => 'User',
              'action'      => 'Delete',
              'description' => 'Experience details of '.Input::get('fullname').' deleted',
              'details'     =>  Auth::user()->getNameOrUsername(). ' deleted experience of '.Input::get('fullname'),
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

     public function deleteEducation()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeEducation::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
               Activity::log([
              'contentId'   =>  $ID,
              'contentType' => 'User',
              'action'      => 'Delete',
              'description' => 'Education details of '.Input::get('fullname').' deleted',
              'details'     =>  Auth::user()->getNameOrUsername(). ' deleted education of '.Input::get('fullname'),
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


     public function deleteSkill()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeSkills::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {

                 Activity::log([
              'contentId'   =>  $ID,
              'contentType' => 'User',
              'action'      => 'Delete',
              'description' => 'Skill details of '.Input::get('fullname').' deleted',
              'details'     =>  Auth::user()->getNameOrUsername(). ' deleted skill of '.Input::get('fullname'),
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


     public function deleteLanguage()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeLanguage::where('id', '=', $ID)->delete();

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


      public function deleteLicense()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeLicenses::where('id', '=', $ID)->delete();

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


      public function deleteBank()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeBank::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
                Activity::log([
              'contentId'   =>  $ID,
              'contentType' => 'User',
              'action'      => 'Delete',
              'description' => 'Bank details of '.Input::get('fullname').' deleted',
              'details'     =>  Auth::user()->getNameOrUsername(). ' deleted bank of '.Input::get('fullname'),
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

     public function deleteReportTo()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeReportto::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
                Activity::log([
              'contentId'   =>  $ID,
              'contentType' => 'User',
              'action'      => 'Delete',
              'description' => 'Line management details of '.Input::get('fullname').' deleted',
              'details'     =>  Auth::user()->getNameOrUsername(). ' deleted line of '.Input::get('fullname'),
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


 public function deleteImmigration()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeImmigration::where('id', '=', $ID)->delete();

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

     public function deleteDependent()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeDependent::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
              Activity::log([
              'contentId'   =>  $ID,
              'contentType' => 'User',
              'action'      => 'Delete',
              'description' => 'Depedent details of '.Input::get('fullname').' deleted',
              'details'     =>  Auth::user()->getNameOrUsername(). ' deleted dependent of '.Input::get('fullname'),
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


      public function deleteBeneficiary()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeBeneficiary::where('id', '=', $ID)->delete();

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

      public function deleteGuarantor()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeGuarantor::where('id', '=', $ID)->delete();

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

     public function deleteEmergency()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeEmergency::where('id', '=', $ID)->delete();

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

public function deleteSalary()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeSalary::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
              Activity::log([
              'contentId'   =>  $ID,
              'contentType' => 'User',
              'action'      => 'Update',
              'description' => 'Salary details of '.Input::get('fullname').' deleted',
              'details'     =>  Auth::user()->getNameOrUsername(). ' deleted salary of '.Input::get('fullname'),
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

    public function deleteMembership()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeMemberships::where('id', '=', $ID)->delete();

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

     public function deleteDocument()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmployeeDocument::where('id', '=', $ID)->delete();

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


    public function terminateJob()
    {
            $affectedRows = Employee::where('staff_id', '=', Input::get('staff_id'))
            ->update(array(
                           
                           'status' =>      Input::get('terminate_reason'),
                           'last_updated_on' =>  $this->change_date_format(Input::get('terminate_date'))));


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


    public function fetchBank()
    {

    $id = Input::get('id');
    $user = EmployeeBank::find($id);
    $data = Array(
        'id'=>$user->id,
        'bank_account_number'=>$user->bank_account_number,
        'bank_name'=>$user->bank_name,
        'account_holder_name'=>$user->account_holder_name,
        'bank_account_type'=>$user->bank_account_type,
        'bank_location'=>$user->bank_location
    );
    return Response::json($data);
  }

    public function fetchExperience()
    {

    $id = Input::get('id');
    $user = EmployeeWorkExperience::find($id);
    $data = Array(
        'id'=>$user->id,
        'job_experience_company'=>$user->company,
        'job_experience_title'=>$user->job_title,
        'qualification_start_date'=>$user->date_from->format('d/m/Y'),
        'qualification_end_date'=>$user->date_to->format('d/m/Y'),
        'experience_comment'=>$user->comment
    );
    return Response::json($data);
    }


    public function fetchBeneficiary()
    {
    $id = Input::get('id');
    $user = EmployeeBeneficiary::find($id);
    $data = Array(
        'id'=>$user->id,
        'beneficiary_name'=>$user->beneficiary_name,
        'beneficiary_relationship'=>$user->beneficiary_relationship,
        'beneficiary_dob'=>$user->beneficiary_dob->format('d/m/Y'),
        'beneficiary_postal_address'=>$user->beneficiary_postal_address,
        'beneficiary_residential_address'=>$user->beneficiary_residential_address,
        'beneficiary_home_phone'=>$user->beneficiary_home_phone,
        'beneficiary_mobile'=>$user->beneficiary_mobile
    );
    return Response::json($data);
    }


    public function fetchJob()
    {
    $id = Input::get('id');
    $user = EmployeeJob::find($id);
    $data = Array(
        'id'=>$user->id,
        'beneficiary_name'=>$user->beneficiary_name,
        'beneficiary_relationship'=>$user->beneficiary_relationship,

        'date_join'=>$user->date_join->format('d/m/Y'),
        'probation_end_date'=>$user->probation_end_date->format('d/m/Y'),
        'permanency_date'=>$user->permanency_date->format('d/m/Y'),

        'beneficiary_postal_address'=>$user->beneficiary_postal_address,
        'beneficiary_residential_address'=>$user->beneficiary_residential_address,
        'beneficiary_home_phone'=>$user->beneficiary_home_phone,
        'beneficiary_mobile'=>$user->beneficiary_mobile
    );
    return Response::json($data);
    }

     public function fetchEducation()
    {
    $id = Input::get('id');
    $user = EmployeeEducation::find($id);
    $data = Array(
        'id'=>$user->id,
        'level'=>$user->level,
        'school'=>$user->school,
        'major_specialization'=>$user->major_specialization,
        'school_start_date'=>$user->school_start_date->format('d/m/Y'),
        'school_end_date'=>$user->school_end_date->format('d/m/Y'),
        'complete_year'=>$user->complete_year,
        'gpa'=>$user->gpa
    );
    return Response::json($data);
    }

    public function fetchSkill()
    {
    $id = Input::get('id');
    $user = EmployeeSkills::find($id);
    $data = Array(
        'id'=>$user->id,
        'special_skill'=>$user->special_skill,
        'year_of_experience'=>$user->year_of_experience,
        'comment'=>$user->comment
    );
    return Response::json($data);
    }


      public function fetchLanguage()
    {
    $id = Input::get('id');
    $user = EmployeeLanguage::find($id);
    $data = Array(
        'id'=>$user->id,
        'language'=>$user->language,
        'skill'=>$user->skill,
        'fluency'=>$user->fluency,
        'comment'=>$user->comment
    );
    return Response::json($data);
    }


      public function fetchLicense()
    {
    $id = Input::get('id');
    $user = EmployeeLicenses::find($id);
    $data = Array(
        'id'=>$user->id,
        'license_type'=>$user->license_type,
        'license_number'=>$user->license_number,
        'issued_date'=>$user->issued_date->format('d/m/Y'),
        'expiry_date'=>$user->expiry_date->format('d/m/Y')
    );
    return Response::json($data);
    }

    public function fetchMemberships()
    {
    $id = Input::get('id');
    $user = EmployeeMemberships::find($id);
    $data = Array(
        'id'=>$user->id,
        'sub_type'=>$user->sub_type,
        'sub_paid_by'=>$user->sub_paid_by,
        'sub_amount'=>$user->sub_amount,
        'sub_currency'=>$user->sub_currency,
        'sub_commencement_date'=>$user->sub_commencement_date->format('d/m/Y'),
        'sub_renewal_date'=>$user->sub_renewal_date->format('d/m/Y')
    );
    return Response::json($data);
    }

    public function fetchEmergency()
    {
    $id = Input::get('id');
    $user = EmployeeEmergency::find($id);
    $data = Array(
        'id'=>$user->id,
        'kin_name'=>$user->kin_name,
        'kin_relationship'=>$user->kin_relationship,
        'kin_home_phone'=>$user->kin_home_phone,
        'kin_office_phone'=>$user->kin_office_phone,
        'kin_mobile'=>$user->kin_mobile,
        'kin_postal'=>$user->kin_postal,
        'emergency_dob'=>$user->emergency_dob->format('d/m/Y'),
        'kin_residential'=>$user->kin_residential
    );
    return Response::json($data);
    }

    public function fetchGuarantor()
    {
    $id = Input::get('id');
    $user = EmployeeGuarantor::find($id);
    $data = Array(
        'id'=>$user->id,
        'guarantor_name'=>$user->guarantor_name,
        'guarantor_office_phone'=>$user->guarantor_office_phone,
        'guarantor_mobile'=>$user->guarantor_mobile,
        'guarantor_postal_address'=>$user->guarantor_postal_address,
        'guarantor_residential_address'=>$user->guarantor_residential_address
    );
    return Response::json($data);
    }

    public function fetchDependent()
    {
    $id = Input::get('id');
    $user = EmployeeDependent::find($id);
    $data = Array(
        'id'=>$user->id,
        'name'=>$user->name,
        'relationship'=>$user->relationship,
        'gender'=>$user->gender,
        'dob'=>$user->dob->format('d/m/Y'),
        'nationality'=>$user->nationality
    );
    return Response::json($data);
    }

     public function fetchImmigration()
    {
    $id = Input::get('id');
    $user = EmployeeImmigration::find($id);
    $data = Array(
        'id'=>$user->id,
        'document'=>$user->document,
        'document_id'=>$user->document_id,
        'issued_at'=>$user->issued_at,
        'issue_date'=>$user->issue_date->format('d/m/Y'),
        'expiry_date'=>$user->expiry_date->format('d/m/Y'),
        'eligibility_status'=>$user->eligibility_status,
        'comment'=>$user->comment
        
    );
    return Response::json($data);
    }

     public function fetchReportto()
    {
    $id = Input::get('id');
    $user = EmployeeReportto::find($id);
    $data = Array(
        'id'=>$user->id,
        'name'=>$user->name,
        'type'=>$user->type,
        'reporting_mode'=>$user->reporting_mode
        
        
    );
    return Response::json($data);
    }










    public function updateBank()
    {

         try
        {
             $id = Input::get('id');
             $affectedRows = EmployeeBank::where('id', $id )
            ->update(array(
                           
                           'bank_account_number'    =>  Input::get('bank_account_number'),
                           'bank_name'              =>  ucwords(strtolower(Input::get('bank_name'))),
                           'account_holder_name'    =>  ucwords(strtolower(Input::get('account_holder_name'))), 
                           'bank_account_type'      =>  ucwords(strtolower(Input::get('bank_account_type'))), 
                           'bank_location'          =>  ucwords(strtolower(Input::get('bank_location')))));

           if($affectedRows > 0)
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

        }

}

 public function updateBeneficiary()
    {

         try
        {
             $id = Input::get('id');
             $affectedRows = EmployeeBeneficiary::where('id', $id )
            ->update(array(
                           
                           'beneficiary_name'                 =>  ucwords(strtolower(Input::get('beneficiary_name'))),
                           'beneficiary_relationship'         =>  ucwords(strtolower(Input::get('beneficiary_relationship'))),
                           'beneficiary_dob'                  =>  $this->change_date_format(Input::get('beneficiary_dob')), 
                           'beneficiary_postal_address'       =>  ucwords(strtolower(Input::get('beneficiary_postal_address'))), 
                           'beneficiary_residential_address'  =>  ucwords(strtolower(Input::get('beneficiary_residential_address'))), 
                           'beneficiary_home_phone'           =>  Input::get('beneficiary_home_phone'), 
                           'beneficiary_mobile'               =>  Input::get('beneficiary_mobile'))); 


           if($affectedRows > 0)
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

        }

}


     public function updateExperience()
    {
         try
        {

             $affectedRows = EmployeeWorkExperience::where('id', Input::get('id'))
            ->update(array(
                           
                           'company'    =>  ucwords(strtolower(Input::get('job_experience_company'))),
                           'job_title'  =>  ucwords(strtolower(Input::get('job_experience_title'))),
                           'date_from'  =>   $this->change_date_format(Input::get('qualification_start_date')), 
                           'date_to'    =>   $this->change_date_format(Input::get('qualification_end_date')), 
                           'comment'    =>  ucwords(strtolower(Input::get('experience_comment')))));

           if($affectedRows > 0)
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

        }

}


public function updateEducation()
    {
         try
        {

             $affectedRows = EmployeeEducation::where('id', Input::get('id'))
            ->update(array(
                           
                           'level'    =>  ucwords(strtolower(Input::get('level'))),
                           'school'  =>  ucwords(strtolower(Input::get('school'))),
                           'major_specialization'  =>  ucwords(strtolower(Input::get('major_specialization'))),
                           'complete_year'  =>  Input::get('complete_year'),
                            'school_start_date'  =>   $this->change_date_format(Input::get('school_start_date')), 
                            'school_end_date'    =>   $this->change_date_format(Input::get('school_end_date'))));

           if($affectedRows > 0)
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

        }

}


public function updateSkill()
    {
         try
        {

             $affectedRows = EmployeeSkills::where('id', Input::get('id'))
            ->update(array(
                           
                           'special_skill'    =>  ucwords(strtolower(Input::get('special_skill'))),
                           'year_of_experience'  =>  Input::get('year_of_experience'),
                           'comment'  =>  Input::get('comment')));

           if($affectedRows > 0)
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

        }

}


public function updateLanguage()
    {
         try
        {

             $affectedRows = EmployeeLanguage::where('id', Input::get('id'))
            ->update(array(
                           
                           'language'    =>  ucwords(strtolower(Input::get('language'))),
                           'skill'  =>  ucwords(strtolower(Input::get('language_skill'))),
                          'fluency'  =>  ucwords(strtolower(Input::get('fluency'))),
                           'comment'  =>  Input::get('comment')));

           if($affectedRows > 0)
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

        }

}


public function updateLicense()
    {
         try
        {

             $affectedRows = EmployeeLicenses::where('id', Input::get('id'))
            ->update(array(
                           
                           'license_type'    =>  Input::get('license_type'),
                           'license_number'  =>  Input::get('license_number'),
                          'issued_date'  =>  $this->change_date_format(Input::get('license_start_date')),
                           'expiry_date'  =>  $this->change_date_format(Input::get('license_end_date'))));

           if($affectedRows > 0)
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

        }

}


public function updateMembership()
    {
         try
        {

             $affectedRows = EmployeeMemberships::where('id', Input::get('id'))
            ->update(array(
                           
                           'sub_type'    =>  ucwords(strtolower(Input::get('sub_type'))),
                           'sub_paid_by'  =>  Input::get('sub_paid_by'),
                           'sub_amount'    =>  Input::get('sub_amount'),
                           'sub_currency'  =>  Input::get('sub_currency'),

                           'sub_commencement_date'  =>  $this->change_date_format(Input::get('sub_commencement_date')),
                            'sub_renewal_date'  =>  $this->change_date_format(Input::get('sub_renewal_date'))
                           ));

           if($affectedRows > 0)
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

        }

}


public function updateEmergencyContact()
    {
         try
        {

             $affectedRows = EmployeeEmergency::where('id', Input::get('id'))
            ->update(array(
                           
                           'kin_name'    =>  ucwords(strtolower(Input::get('kin_name'))),
                           'kin_relationship'  =>  Input::get('kin_relationship'),
                           'kin_home_phone'    =>  Input::get('kin_home_phone'),
                           'kin_office_phone'  =>  Input::get('kin_office_phone'),
                           'kin_mobile'  =>  Input::get('kin_mobile'),
                           'kin_postal'  =>  Input::get('kin_postal'),
                           'kin_residential'  =>  Input::get('kin_residential'),
                           'emergency_dob'  =>  $this->change_date_format(Input::get('emergency_dob'))
                           
                           ));

           if($affectedRows > 0)
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

        }

}


public function updateGuarantor()
    {
         try
        {

             $affectedRows = EmployeeGuarantor::where('id', Input::get('id'))
            ->update(array(
                           
                           'guarantor_name'    =>  ucwords(strtolower(Input::get('guarantor_name'))),
                           'guarantor_office_phone'  =>  Input::get('guarantor_office_phone'),
                           'guarantor_mobile'    =>  Input::get('guarantor_mobile'),
                           'guarantor_postal_address'  =>  ucwords(strtolower(Input::get('guarantor_postal_address'))),
                           'guarantor_residential_address'  =>  ucwords(strtolower(Input::get('guarantor_residential_address')))
                           ));

           if($affectedRows > 0)
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

        }

}


public function updateDependant()
    {
         try
        {

             $affectedRows = EmployeeDependent::where('id', Input::get('id'))
            ->update(array(
                           
                           'name'    =>  ucwords(strtolower(Input::get('dependant_name'))),
                           'relationship'  =>  Input::get('dependant_relationship'),
                           'dob'    =>  $this->change_date_format(Input::get('dependant_dob')),
                           'nationality'  =>  Input::get('dependant_nationality'),
                           'gender'  =>  Input::get('dependant_gender')
                           ));

           if($affectedRows > 0)
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

        }

}





// public function generatefunky()
// {

//   $adjs = [
//     "autumn", "hidden", "bitter", "misty", "silent", "empty", "dry", "dark",
//     "summer", "icy", "delicate", "quiet", "white", "cool", "spring", "winter",
//     "patient", "twilight", "dawn", "crimson", "wispy", "weathered", "blue",
//     "billowing", "broken", "cold", "damp", "falling", "frosty", "green",
//     "long", "late", "lingering", "bold", "little", "morning", "muddy", "old",
//     "red", "rough", "still", "small", "sparkling", "throbbing", "shy",
//     "wandering", "withered", "wild", "black", "young", "holy", "solitary",
//     "fragrant", "aged", "snowy", "proud", "floral", "restless", "divine",
//     "polished", "ancient", "purple", "lively", "nameless"
//  ];

// $nouns = [
//     "waterfall", "river", "breeze", "moon", "rain", "wind", "sea", "morning",
//     "snow", "lake", "sunset", "pine", "shadow", "leaf", "dawn", "glitter",
//     "forest", "hill", "cloud", "meadow", "sun", "glade", "bird", "brook",
//     "butterfly", "bush", "dew", "dust", "field", "fire", "flower", "firefly",
//     "feather", "grass", "haze", "mountain", "night", "pond", "darkness",
//     "snowflake", "silence", "sound", "sky", "shape", "surf", "thunder",
//     "violet", "water", "wildflower", "wave", "water", "resonance", "sun",
//     "wood", "dream", "cherry", "tree", "fog", "frost", "voice", "paper",
//     "frog", "smoke", "star"
// ];

// function generate_name($adjs, $nouns, $separator='-') 
// {
//     $num  = intval(rand(2,3)*pow(5,5));
//     $adj  = $adjs[array_rand($adjs, 1)];
//     $noun = $nouns[array_rand($nouns, 1)];
//     return $adj.$separator.$noun.$separator.$num;
// }

// echo generate_name($adjs, $nouns);
// }







}
