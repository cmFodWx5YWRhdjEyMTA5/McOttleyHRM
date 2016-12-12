<?php

namespace OrionMedical\Http\Controllers;

use Illuminate\Http\Request;
use OrionMedical\Http\Requests;
use OrionMedical\Http\Controllers\Controller;

use OrionMedical\Models\JobTitle;
use OrionMedical\Models\SalaryComponent;
use OrionMedical\Models\EmploymentStatus;
use OrionMedical\Models\JobCategory;
use OrionMedical\Models\WorkShift;
use OrionMedical\Models\PayGrade;
use OrionMedical\Models\Skill;
use OrionMedical\Models\Education;
use OrionMedical\Models\Language;
use OrionMedical\Models\LanguageSkill;
use OrionMedical\Models\LanguageFluency;
use OrionMedical\Models\Licenses;
use OrionMedical\Models\Currency;
use OrionMedical\Models\Membership;
use OrionMedical\Models\Gender;
use OrionMedical\Models\MaritalStatus;
use OrionMedical\Models\IdentificationType;
use OrionMedical\Models\Nationality;
use OrionMedical\Models\Department;
use OrionMedical\Models\Subsidiary;
use OrionMedical\Models\Employee;
use OrionMedical\Models\Serials;
use OrionMedical\Models\Location;
use OrionMedical\Models\EmployeeJob;
use OrionMedical\Models\EmployeeWorkExperience;
use OrionMedical\Models\EmployeeEducation;
use OrionMedical\Models\EmployeeSkills;
use OrionMedical\Models\EmployeeLanguage;
use OrionMedical\Models\EmployeeLicenses;
use OrionMedical\Models\EmployeeSalary;
use OrionMedical\Models\EmployeeEmergency;
use OrionMedical\Models\EmployeeDependent;
use OrionMedical\Models\EmployeeImmigration;
use OrionMedical\Models\EmployeeReportto;
use OrionMedical\Models\SalaryEvent;
use OrionMedical\Models\Beneficiary;
use OrionMedical\Models\Country;
use OrionMedical\Models\ReportToMethods;
use Input;
use Image;
use Carbon\Carbon;
use Cache;

use Response;
use Activity;
use Auth;
use DateTime;

class StaffController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
 

     public function showStaff()
    {
        $locations =            Location::get();
        $employees =            Employee::paginate();
        return view('staff.index',compact('employees','locations'));
    }
   
    public function newStaff($id)
    {
        $subsidiaries =         Subsidiary::get();
        $departments =          Department::get();
        $identifications =      IdentificationType::get();
        $nationalities =          Nationality::get();
        $maritalstatus =        MaritalStatus::get();
        $genders =               Gender::get();
        $currency =             Currency::get();
        $jobtitles =            JobTitle::get();
        $salarycomponents =     SalaryComponent::get();
        $jobcategories =        JobCategory::get();
        $employeestatus =       EmploymentStatus::get();
        $workshifts =           WorkShift::get();
        $paygrades =            PayGrade::get();
        $skills =               Skill::get();
        $educations =           Education::get();
        $languages =            Language::get();
        $languageskills =       LanguageSkill::get();
        $languagefluency =      LanguageFluency::get();
        $licenses =             Licenses::get();
        $memberships =          Membership::get();
        $locations =            Location::get();
        $salaryevents =         SalaryEvent::get();
        $relationships =         Beneficiary::get();
        $countries =            Country::get();
        $reporttotypes =        ReportToMethods::get();
        
        $employees   =          Employee::where('staff_id' ,'=', $id)->get()->first();


        return view('staff.new',compact('genders','salaryevents','reporttotypes','countries','relationships','languageskills','languagefluency','employees','locations','subsidiaries','currency','departments','nationalities','identifications','maritalstatus','jobtitles','salarycomponents','jobcategories','employeestatus','workshifts','paygrades','skills','educations','languages','licenses','memberships'));
    }

     public function getProfile($id)
   {

  
    $employee =  Employee::where('staff_id' ,'=', $id)->first();
    return view('staff.profile', compact('employee'));

   }

public function generateStaffID()
{
    $number = Serials::where('name','=','staff')->first();
    $number = $number->counter;
    $account = str_pad($number,5, '0', STR_PAD_LEFT);
    $myaccount= 'C'.$account;
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

   //dd(Input::file('image'));


            $genstaffid = $this->generateStaffID(10);
            
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
           $employee->fullname = Input::get('fullname');
           $employee->location = Input::get('location');
           $employee->image = $filename;
           $employee->created_on=Carbon::now();
           $employee->last_updated_on=Carbon::now();
           $employee->created_by=Auth::user()->getNameOrUsername();
            if($employee->save())
          {

            return redirect()
            ->route('new-employee', ['id' => $genstaffid])
            ->with('success','Employee has successfully been created!');
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

            $affectedRows = Employee::where('staff_id', '=', Input::get('staff_id'))
            ->update(array(
                           
                           'staff_type' =>      Input::get('staff_type'),
                           'fullname' =>        Input::get('fullname'),
                           'date_of_birth' =>   $this->change_date_format(Input::get('date_of_birth')), 
                           'gender' =>          Input::get('gender'), 
                           'postal_address' =>  Input::get('postal_address'), 
                           'residential_address' =>   Input::get('residential_address'), 
                           'email'=>            Input::get('email'),
                           'mobile_number'=>    Input::get('mobile_number'),
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

    public function createJob()
    {

         try
        {


           $employee = new EmployeeJob;
           $employee->staff_id              = Input::get('staff_id');
           $employee->date_join             = $this->change_date_format(Input::get('date_join'));
           $employee->probation_end_date    = $this->change_date_format(Input::get('probation_end_date'));
           $employee->permanency_date       = $this->change_date_format(Input::get('permanency_date'));
           $employee->job_title             = Input::get('job_title');
           $employee->employment_status     = Input::get('employment_status');
           $employee->job_specification     = Input::get('job_specification');
           $employee->job_category          = Input::get('job_category');
           $employee->department            = Input::get('department');
           $employee->location              = Input::get('location');
           $employee->work_shift            = Input::get('work_shift');
           $employee->comment               = Input::get('comment');
           $employee->subsidiary            = Input::get('subsidiary');
           $employee->contract_start        = Carbon::now();
           $employee->contract_end          = Carbon::now();
           $employee->created_on            = Carbon::now();
           $employee->last_updated_on       = Carbon::now();
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


    public function createExperience()
    {

         try
        {


           $employee = new EmployeeWorkExperience;
           $employee->staff_id              = Input::get('staff_id');
           $employee->date_from             = $this->change_date_format(Input::get('qualification_end_date'));
           $employee->date_to               = $this->change_date_format(Input::get('qualification_start_date'));
           $employee->company             = Input::get('job_experience_company');
           $employee->job_title             = Input::get('job_experience_title');
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
           $employee->level                 = Input::get('level');
           $employee->school                = Input::get('school');
           $employee->major_specialization  = Input::get('major_specialization');
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
           $employee->special_skill         = Input::get('special_skill');
           $employee->year_of_experience    = Input::get('year_of_experience');
           $employee->comment               = Input::get('comment');
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
           $employee->language              = Input::get('language');
           $employee->skill                 = Input::get('language_skill');
           $employee->fluency               = Input::get('fluency');
           $employee->comment               = Input::get('comment');
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
           $employee->license_type          = Input::get('license_type');
           $employee->license_number        = Input::get('license_number');
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
           $employee->staff_id              = Input::get('staff_id');
           $employee->pay_grade          = Input::get('pay_grade');
           $employee->currency        = Input::get('currency');
           $employee->basic_annual              = Input::get('basic_annual');
           $employee->car_allowance          = Input::get('car_allowance');
           $employee->living_allowance        = Input::get('living_allowance');
           $employee->epf_deducation_percent          = Input::get('epf_deducation_percent');
           $employee->pension_fund_percent        = Input::get('pension_fund_percent');
           $employee->event                 = Input::get('salary_event');
           $employee->effective_from        = $this->change_date_format(Input::get('salary_start_date'));
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

     public function createEmergencyContact()
    {

         try
        {

           $employee = new EmployeeEmergency;
           $employee->staff_id              = Input::get('staff_id');
           $employee->kin_name              = Input::get('kin_name');
           $employee->kin_relationship      = Input::get('kin_relationship');
           $employee->kin_mobile            = Input::get('kin_mobile');
           $employee->kin_office_phone      = Input::get('kin_office_phone');
           $employee->kin_home_phone        = Input::get('kin_home_phone');
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
           $employee->name              = Input::get('dependant_name');
           $employee->relationship      = Input::get('dependant_relationship');
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
           $employee->issued_at         = Input::get('issued_at');
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
           $employee->name              = Input::get('name');
           $employee->type              = Input::get('type');
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
