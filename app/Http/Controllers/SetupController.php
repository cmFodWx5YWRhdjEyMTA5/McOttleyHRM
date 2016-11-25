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
use OrionMedical\Models\Licenses;
use OrionMedical\Models\Membership;


class SetupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

     public function showJobCategory()
    {
         $items = JobCategory::paginate();
        return view('settings.job.job_category',compact('items'));
    }

    public function showWorkShift()
    {
         $items = WorkShift::paginate();
        return view('settings.job.work_shift',compact('items'));
    }

    public function showPayGrade()
    {
         $items = PayGrade::paginate();
        return view('settings.job.pay_grades',compact('items'));
    }

    public function showSkills()
    {
         $items = Skill::paginate();
        return view('settings.qualification.skill',compact('items'));
    }

    public function showEducation()
    {
         $items = Education::paginate();
        return view('settings.qualification.education',compact('items'));
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


    public function showMemberships()
    {
         $items = Membership::paginate();
        return view('settings.qualification.memberships',compact('items'));
    }


    public function createJobtitles()
    {

    }

}
