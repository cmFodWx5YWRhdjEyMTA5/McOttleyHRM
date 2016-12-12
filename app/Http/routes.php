<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['XSS']], function () {

Route::get('/',
	['uses' => '\OrionMedical\Http\Controllers\AuthController@getSignin',
	 'as' => 'auth.signin',  
	 ]);

Route::get('/auth/login',
	['uses' => '\OrionMedical\Http\Controllers\AuthController@getSignin',
	 'as' => '/auth/login',  
	 ]);


Route::get('/dashboard',
	['uses' => '\OrionMedical\Http\Controllers\HomeController@index',
	 'as' => 'dashboard',
	  ]);

Route::get('/business.summary',
	['uses' => '\OrionMedical\Http\Controllers\HomeController@getTotals',
	 'as' => 'business.summary',
	  ]);

Route::post('/uploadfiles', ['uses' =>'\OrionMedical\Http\Controllers\ImageController@postUpload',
	'as' => 'upload-files',
 ]);

//Authentication
Route::get('/signup',
	['uses' => '\OrionMedical\Http\Controllers\AuthController@getSignup',
	 'as' => 'auth.signup', ]);

Route::get('/manage-users',
	['uses' => '\OrionMedical\Http\Controllers\AuthController@getUsers',
	 'as' => 'manage-users', ]);

Route::post('/signup',
	['uses' => '\OrionMedical\Http\Controllers\AuthController@postSignup',]);

Route::get('/signin',
	['uses' => '\OrionMedical\Http\Controllers\AuthController@getSignin',
	 'as' => 'auth.signin', ]);

Route::post('/signin',
	['uses' => '\OrionMedical\Http\Controllers\AuthController@postSignin',
	
	 ]);

Route::get('auth/logout', '\OrionMedical\Http\Controllers\AuthController@getSignOut');


Route::get('/signout', function(){
  Auth::logout(); //logout the current user
  Session::flush(); //delete the session
  return Redirect::to('login'); //redirect to login page
});


// Staff Details
Route::get('/new-employee/{id}', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@newStaff', 
	'as' => 'new-employee', ]);

Route::get('/employee-profile/{id}', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@getProfile',
	'as' => 'employee-profile',]);

Route::get('/employees', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@showStaff', 
	'as' => 'employees', ]);

Route::post('/create-employee',
	['uses' => '\OrionMedical\Http\Controllers\StaffController@setupEmployee',]);

Route::get('/save-staff-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createEmployee',
	'as' => 'save-staff-details',]);

Route::get('/save-job-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createJob',
	'as' => 'save-staff-details',]);

Route::get('/save-experience-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createExperience',
	'as' => 'save-experience-details',]);

Route::get('/save-education-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createEducation',
	'as' => 'save-education-details',]);

Route::get('/save-skill-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createSkill',
	'as' => 'save-skill-details',]);

Route::get('/save-language-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createLanguage',
	'as' => 'save-language-details',]);

Route::get('/save-license-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createLicense',
	'as' => 'save-license-details',]);

Route::get('/save-salary-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createSalary',
	'as' => 'save-salary-details',]);

Route::get('/save-emergency-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createEmergencyContact',
	'as' => 'save-emergency-details',]);

Route::get('/save-dependent-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createDependent',
	'as' => 'save-dependent-details',]);

Route::get('/save-immigration-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createImmigration',
	'as' => 'save-immigration-details',]);

Route::get('/save-reportto-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@createReportTo',
	'as' => 'save-reportto-details',]);


Route::get('/load-job-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadJob',
	'as' => 'load-job-details',]);

Route::get('/load-experience-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadExperience',
	'as' => 'load-experience-details',]);

Route::get('/load-education-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadEducation',
	'as' => 'load-education-details',]);

Route::get('/load-skill-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadSkill',
	'as' => 'load-skill-details',]);

Route::get('/load-language-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadLanguage',
	'as' => 'load-language-details',]);

Route::get('/load-license-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadLicense',
	'as' => 'load-license-details',]);

Route::get('/load-salary-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadSalary',
	'as' => 'load-salary-details',]);

Route::get('/load-emergency-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadEmergency',
	'as' => 'load-emergency-details',]);

Route::get('/load-dependent-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadDependent',
	'as' => 'load-dependent-details',]);

Route::get('/load-immigration-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadImmigration',
	'as' => 'load-immigration-details',]);

Route::get('/load-reportto-details', 
	['uses' => '\OrionMedical\Http\Controllers\StaffController@loadReportto',
	'as' => 'load-reportto-details',]);
//Admin



Route::get('/job-title', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showJobtitles', 
	'as' => 'job-title', ]);

Route::get('/salary-component', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showSalaryComponent', 
	'as' => 'salary-component', ]);

Route::get('/employment-status', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showEmploymentStatus', 
	'as' => 'employment-status', ]);

Route::get('/job-category', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showJobCategory', 
	'as' => 'job-category', ]);

Route::get('/work-shift', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showWorkShift', 
	'as' => 'work-shift', ]);

Route::get('/pay-grade', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showPayGrade', 
	'as' => 'pay-grade', ]);

Route::get('/manage-skills', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showSkills', 
	'as' => 'manage-skills', ]);

Route::get('/manage-education', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showEducation', 
	'as' => 'manage-education', ]);

Route::get('/manage-languages', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showLanguage', 
	'as' => 'manage-languages', ]);

Route::get('/manage-licenses', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showLicenses', 
	'as' => 'manage-licenses', ]);

Route::get('/manage-memberships', 
	['uses' => '\OrionMedical\Http\Controllers\SetupController@showMemberships', 
	'as' => 'manage-memberships', ]);


//leaves
Route::get('/manage-leave', 
	['uses' => '\OrionMedical\Http\Controllers\LeaveController@index', 
	'as' => 'manage-leave', ]);

Route::get('/save-leave-request', 
	['uses' => '\OrionMedical\Http\Controllers\LeaveController@assignLeave',
	'as' => 'save-leave-request',]);

Route::get('/load-pending-leave', 
	['uses' => '\OrionMedical\Http\Controllers\LeaveController@loadLeaveRequest',
	'as' => 'load-pending-leave',]);

Route::get('/approve-leave', 
	['uses' => '\OrionMedical\Http\Controllers\LeaveController@approveLeave',
	'as' => 'approve-leave',]);

Route::get('/reject-leave', 
	['uses' => '\OrionMedical\Http\Controllers\LeaveController@rejectLeave',
	'as' => 'reject-leave',]);

Route::get('/leave-calendar',
	['uses' => '\OrionMedical\Http\Controllers\LeaveController@calendar',
	 'as' => 'leave-calendar', ]);

Route::get('/find-leave', 
	['uses' => '\OrionMedical\Http\Controllers\LeaveController@searchLeave', 
	'as' => 'find-leave', ]);

Route::get('/event/api', function () {
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
});

//Discipline
Route::get('/disciplinary-cases',
	['uses' => '\OrionMedical\Http\Controllers\DisciplineController@casesPending',
	 'as' => 'disciplinary-cases', ]);


//Review
Route::get('/performance-review',
	['uses' => '\OrionMedical\Http\Controllers\PerformanceController@index',
	 'as' => 'performance-review', ]);






Route::get('/delete-appointment', 
	['uses' => '\OrionMedical\Http\Controllers\EventController@deleteappointmentfromevent',
	'as' => 'delete-appointment',]);
//route group end


});