<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;

use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;

use McPersona\Models\JobTitle;
use McPersona\Models\SalaryComponent;
use McPersona\Models\EmploymentStatus;
use McPersona\Models\JobCategory;
use McPersona\Models\WorkShift;
use McPersona\Models\PayGrade;
use McPersona\Models\Skill;
use McPersona\Models\Education;
use McPersona\Models\Language;
use McPersona\Models\Currency;
use McPersona\Models\Licenses;
use McPersona\Models\Membership;
use McPersona\Models\Department;
use McPersona\Models\Subsidiary;
use McPersona\Models\Country;
use McPersona\Models\Location;
use McPersona\Models\Holiday;
use McPersona\Models\Terminate;
use McPersona\Models\Beneficiary;
use McPersona\Models\Role;
use Input;
use Response;
use Datetime;

class SetupController extends Controller
{


    public function __construct()
    {
      $this->middleware('role:HR Officer|HR Manager|System Admin');
      $this->middleware('auth');
    }

        public function getSignup()
    {
         $roles=Role::get();
         return view('auth.signup',compact('roles'));
    }
    
     public function indexJob()
    {
       
        return view('settings.job.index');
    }


    public function showJobtitles()
    {
         $jobtitles = JobTitle::paginate();
        return view('settings.job.job_title',compact('jobtitles'));
    }

    public function createJobtitles(Request $request)
    {

         try
        {
           $employee = new JobTitle;
           $employee->type              = ucwords(strtolower($request->input('type')));
           $employee->description       = ucwords(strtolower($request->input('description')));
            if($employee->save())
          {

            return redirect()
            ->route('job-title')
            ->with('success','Job title has successfully been created!');
          }

          else
          {

             return redirect()
            ->route('job-title')
            ->with('error','Job title failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function deleteJobtitles()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = JobTitle::where('id', '=', $ID)->delete();

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

     public function showSalaryComponent()
    {
         $components = SalaryComponent::paginate();
        return view('settings.job.salary',compact('components'));
    }

      public function showEmploymentStatus()
    {
         $items = EmploymentStatus::paginate();
        return view('settings.job.employment_status',compact('items'));
    }

      public function showHoliday()
    {
         $items = Holiday::paginate();
        return view('settings.misc.holidays',compact('items'));
    }

     public function showRelationship()
    {
         $items = Beneficiary::paginate();
        return view('settings.misc.relationships',compact('items'));
    }

    public function showTerminateReason()
    {
         $items = Terminate::paginate();
        return view('settings.misc.terminate',compact('items'));
    }

 public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y', $date);
        return $time->format('Y-m-d');
    }

public function createHoliday(Request $request)
    {

         try
        {
           $employee = new Holiday;
           $employee->description              = ucwords(strtolower($request->input('holiday')));
           $employee->full_date              = $this->change_date_format(Input::get('holiday_date'));
            if($employee->save())
          {

            return redirect()
            ->route('manage-holidays')
            ->with('success','Holiday has successfully been created!');
          }

          else
          {

             return redirect()
            ->route('manage-holidays')
            ->with('error','Holiday failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

public function createRelationship(Request $request)
    {

         try
        {
           $employee = new Beneficiary;
           $employee->type              = ucwords(strtolower($request->input('type')));
            if($employee->save())
          {

            return redirect()
            ->route('manage-relationships')
            ->with('success','Relationship has successfully been created!');
          }

          else
          {

             return redirect()
            ->route('manage-relationships')
            ->with('error','Relationship failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function createTerminateReason(Request $request)
    {

         try
        {
           $employee = new Terminate;
           $employee->type              = ucwords(strtolower($request->input('type')));
            if($employee->save())
          {

            return redirect()
            ->route('manage-terminate-reasons')
            ->with('success','Reason has successfully been created!');
          }

          else
          {

             return redirect()
            ->route('manage-terminate-reasons')
            ->with('error','Reason failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }



     public function createEmploymentStatus(Request $request)
    {

         try
        {
           $employee = new EmploymentStatus;
           $employee->type              = ucwords(strtolower($request->input('type')));
           $employee->description       = ucwords(strtolower($request->input('description')));
            if($employee->save())
          {

            return redirect()
            ->route('employment-status')
            ->with('success','Employment status has successfully been created!');
          }

          else
          {

             return redirect()
            ->route('employment-status')
            ->with('error','Employment status failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }


     public function createLanguage(Request $request)
    {

         try
        {
           $employee = new Language;
           $employee->type              = ucwords(strtolower($request->input('type')));
            if($employee->save())
          {

            return redirect()
            ->route('manage-languages')
            ->with('success','Language has successfully been created!');
          }

          else
          {

             return redirect()
            ->route('manage-languages')
            ->with('error','Language failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

    public function deleteEmploymentStatus()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = EmploymentStatus::where('id', '=', $ID)->delete();

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

     public function showJobCategory()
    {
         $items = JobCategory::paginate();
        return view('settings.job.job_category',compact('items'));
    }

     public function createJobCategory(Request $request)
    {

         try
        {
           $employee = new JobCategory;
           $employee->type              = ucwords(strtolower($request->input('type')));
           $employee->description       = ucwords(strtolower($request->input('description')));
            if($employee->save())
          {

            return redirect()
            ->route('job-category')
            ->with('success','Successfully been created!');
          }

          else
          {

             return redirect()
            ->route('job-category')
            ->with('error','Failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

    public function deleteJobCategory()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = JobCategory::where('id', '=', $ID)->delete();

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


    public function showWorkShift()
    {
         $items = WorkShift::paginate();
        return view('settings.job.work_shift',compact('items'));
    }

    public function showPayGrade()
    {
        $currency = Currency::get();
         $items = PayGrade::paginate();
        return view('settings.job.pay_grades',compact('items','currency'));
    }

    public function createPayGrade(Request $request)
    {

         try
        {
           $employee = new PayGrade;
           $employee->grade              = $request->input('grade');
           $employee->currency           = $request->input('currency');
           $employee->minimum_wage       = $request->input('minimum_wage');
           $employee->maximum_wage       = $request->input('maximum_wage');

            if($employee->save())

          {

            return redirect()
            ->route('pay-grade')
            ->with('success','Successfully been created!');
          }

          else
          {

             return redirect()
            ->route('pay-grade')
            ->with('error','Failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function deletePayGrade()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = PayGrade::where('id', '=', $ID)->delete();

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

     public function deleteHoliday()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Holiday::where('id', '=', $ID)->delete();

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

     public function deleteTerminateReason()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Terminate::where('id', '=', $ID)->delete();

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

    public function deleteRelationship()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Beneficiary::where('id', '=', $ID)->delete();

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

    //Department Code
    public function showDepartment()
    {
        
         $items = Department::paginate();
        return view('settings.job.department',compact('items'));
    }

    public function createDepartment(Request $request)
    {

         try
        {
           $employee = new Department;
           $employee->name              = ucwords(strtolower($request->input('name')));
           $employee->description           = $request->input('description');
         

            if($employee->save())

          {

            return redirect()
            ->route('department')
            ->with('success','Successfully been created!');
          }

          else
          {

             return redirect()
            ->route('department')
            ->with('error','Failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function deleteDepartment()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Department::where('id', '=', $ID)->delete();

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

    //Subsidiary Code
    public function showSubsidiary()
    {
        
         $items = Subsidiary::paginate();
        return view('settings.job.subsidiary',compact('items'));
    }

    public function createSubsidiary(Request $request)
    {

         try
        {
           $employee = new Subsidiary;
           $employee->name              = ucwords(strtolower($request->input('name')));
           $employee->description           = $request->input('description');
         

            if($employee->save())

          {

            return redirect()
            ->route('subsidiary')
            ->with('success','Successfully been created!');
          }

          else
          {

             return redirect()
            ->route('subsidiary')
            ->with('error','Failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function deleteSubsidiary()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Subsidiary::where('id', '=', $ID)->delete();

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

      //Location Code
    public function showLocation()
    {
        $countries = Country::get();
         $items = Location::paginate();
        return view('settings.job.location',compact('items','countries'));
    }

    public function createLocation(Request $request)
    {

         try
        {
           $employee = new Location;
           $employee->name = ucwords(strtolower( $request->input('name')));
           $employee->city = ucwords(strtolower($request->input('city')));
           $employee->country = ucwords(strtolower($request->input('country')));
           $employee->phone = $request->input('phone');

            if($employee->save())

          {

            return redirect()
            ->route('location')
            ->with('success','Successfully been created!');
          }

          else
          {
             return redirect()
            ->route('location')
            ->with('error','Failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function deleteLocation()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Location::where('id', '=', $ID)->delete();

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

    public function showSkills()
    {
         $items = Skill::paginate();
        return view('settings.qualification.skill',compact('items'));
    }

    public function createSkills(Request $request)
    {

         try
        {
           $employee = new Skill;
           $employee->type              = ucwords(strtolower($request->input('type')));
           $employee->description           = ucwords(strtolower($request->input('description')));
         

            if($employee->save())

          {

            return redirect()
            ->route('manage-skills')
            ->with('success','Successfully been created!');
          }

          else
          {

             return redirect()
            ->route('manage-skills')
            ->with('error','Failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function deleteSkills()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Skill::where('id', '=', $ID)->delete();

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


    public function showEducation()
    {
         $items = Education::paginate();
        return view('settings.qualification.education',compact('items'));
    }

     public function createEducation(Request $request)
    {

         try
        {
           $employee = new Education;
           $employee->level              = ucwords(strtolower($request->input('type')));
           $employee->description           = ucwords(strtolower($request->input('description')));
         

            if($employee->save())

          {

            return redirect()
            ->route('manage-education')
            ->with('success','Successfully been created!');
          }

          else
          {

             return redirect()
            ->route('manage-education')
            ->with('error','Failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function deleteEducation()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Education::where('id', '=', $ID)->delete();

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

     public function deleteLanguage()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Language::where('id', '=', $ID)->delete();

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


     public function showLanguage()
    {
         $items = Language::paginate();
        return view('settings.qualification.languages',compact('items'));
    }

     public function showLicenses()
    {
         $items = Licenses::paginate();
        return view('settings.qualification.licenses',compact('items'));
    }

    public function createLicenses(Request $request)
    {

         try
        {
           $employee = new Licenses;
           $employee->type         = ucwords(strtolower($request->input('type')));
           $employee->description   = ucwords(strtolower($request->input('description')));
         

            if($employee->save())

          {

            return redirect()
            ->route('manage-licenses')
            ->with('success','Successfully been created!');
          }

          else
          {

             return redirect()
            ->route('manage-licenses')
            ->with('error','Failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function deleteLicenses()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Licenses::where('id', '=', $ID)->delete();

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




    public function showMemberships()
    {
         $items = Membership::paginate();
        return view('settings.qualification.memberships',compact('items'));
    }

    public function createMemberships(Request $request)
    {

         try
        {
           $employee = new Membership;
           $employee->type         = ucwords(strtolower($request->input('type')));
           $employee->description   = ucwords(strtolower($request->input('description')));
         

            if($employee->save())

          {

            return redirect()
            ->route('manage-memberships')
            ->with('success','Successfully been created!');
          }

          else
          {

             return redirect()
            ->route('manage-memberships')
            ->with('error','Failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }

     public function deleteMemberships()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Membership::where('id', '=', $ID)->delete();

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

}
