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
	['uses' => '\McPersona\Http\Controllers\AuthController@getSignin',
	 'as' => 'auth.signin',  
	 ]);

Route::get('/auth/login',
	['uses' => '\McPersona\Http\Controllers\AuthController@getSignin',
	 'as' => '/auth/login',  
	 ]);


Route::get('/dashboard',
	['uses' => '\McPersona\Http\Controllers\HomeController@index',
	 'as' => 'dashboard',
	  ]);


Route::get('/audit-trails',
	['uses' => '\McPersona\Http\Controllers\AuthController@getAudit',
	 'as' => 'audit-trails',
	  ]);

Route::get('/business.summary',
	['uses' => '\McPersona\Http\Controllers\HomeController@getTotals',
	 'as' => 'business.summary',
	  ]);

Route::get('/do-profile-hashing',
	['uses' => '\McPersona\Http\Controllers\ProfileController@setProfileObstrute',
	 'as' => 'do-profile-hashing',
	  ]);

Route::get('/do-lower',
	['uses' => '\McPersona\Http\Controllers\StaffController@setLower',
	 'as' => 'do-lower',
	  ]);

Route::get('/do-staff-generate',
	['uses' => '\McPersona\Http\Controllers\StaffController@doGenerateBulkID',
	 'as' => 'do-staff-generate',
	  ]);

Route::post('/create-document', ['uses' =>'\McPersona\Http\Controllers\ImageController@postUpload',
	'as' => 'create-document',
 ]);

Route::post('/update-picture', ['uses' =>'\McPersona\Http\Controllers\ImageController@updatePicture',
	'as' => 'update-picture',
 ]);

Route::get('/chart-gender',
	['uses' => '\McPersona\Http\Controllers\HomeController@gender',
	 'as' => 'chart-gender',
	  ]);

Route::get('/chart-department',
	['uses' => '\McPersona\Http\Controllers\HomeController@department',
	 'as' => 'chart-department',
	  ]);

Route::get('/chart-location',
	['uses' => '\McPersona\Http\Controllers\HomeController@location',
	 'as' => 'chart-location',
	  ]);


Route::get('/chart-subsidiary',
	['uses' => '\McPersona\Http\Controllers\HomeController@subsidiary',
	 'as' => 'chart-subsidiary',
	  ]);



//Authentication
Route::get('/signup',
	['uses' => '\McPersona\Http\Controllers\SetupController@getSignup',
	 'as' => 'auth.signup', ]);

Route::get('/delete-user',
	['uses' => '\McPersona\Http\Controllers\AuthController@deleteUser',
	 'as' => 'delete-user', ]);

Route::get('/delete-payroll',
	['uses' => '\McPersona\Http\Controllers\PayrollController@deletePayroll',
	 'as' => 'delete-payroll', ]);

Route::get('/manage-users',
	[
	'before' => 'auth',
	'uses' => '\McPersona\Http\Controllers\AuthController@getUsers',
	 'as' => 'manage-users', ]);


Route::post('/signup',
	['uses' => '\McPersona\Http\Controllers\AuthController@postSignup',]);

Route::get('/signin',
	['uses' => '\McPersona\Http\Controllers\AuthController@getSignin',
	 'as' => 'auth.signin', ]);


Route::get('/reset-password-notice',
	['uses' => '\McPersona\Http\Controllers\AuthController@resetnotice',
	 'as' => 'reset-password-notice', ]);

Route::post('/signin',
	['uses' => '\McPersona\Http\Controllers\AuthController@postSignin',
	 ]);

Route::get('/send-email',
	['uses' => '\McPersona\Http\Controllers\LeaveController@ApprovalReminder',
	 'as' => 'send-email', ]);



// Password reset link request routes...
Route::get('password/email', '\McPersona\Http\Controllers\PasswordController@getEmail');
Route::post('password/email', '\McPersona\Http\Controllers\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', '\McPersona\Http\Controllers\PasswordController@getReset');
Route::post('password/reset', '\McPersona\Http\Controllers\PasswordController@postReset');



Route::get('/signout', function(){
  Auth::logout(); //logout the current user
  Session::flush(); //delete the session
  return Redirect::to('/auth/login'); //redirect to login page
});


// Staff Details
Route::get('/deactivate-staff', array(
	'uses' => '\McPersona\Http\Controllers\StaffController@deactivateStaff',
	'as' => 'deactivate-staff',
	));

Route::get('/find-staff', 
	['uses' => '\McPersona\Http\Controllers\StaffController@findStaff', 
	'as' => 'find-staff', ]);

Route::get('/find-user', 
	['uses' => '\McPersona\Http\Controllers\AuthController@findUser', 
	'as' => 'find-user', ]);

Route::get('/find-slips', 
	['uses' => '\McPersona\Http\Controllers\PayrollController@findSlip', 
	'as' => 'find-slips', ]);

Route::get('/find-payroll', 
	['uses' => '\McPersona\Http\Controllers\PayrollController@findPayroll', 
	'as' => 'find-payroll', ]);

Route::get('/delete-staff', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteStaff', 
	'as' => 'delete-staff', ]);

Route::get('/activate-staff', array(
	'uses' => '\McPersona\Http\Controllers\StaffController@activateStaff',
	'as' => 'activate-staff',));

Route::get('/inactive-staff', array(
	'uses' => '\McPersona\Http\Controllers\StaffController@inactiveStaff',
	'as' => 'inactive-staff',));

Route::get('/pending-approval-staff', array(
	'uses' => '\McPersona\Http\Controllers\StaffController@pendingStaff',
	'as' => 'pending-approval-staff',));

Route::get('/new-employee/{id}', 
	['uses' => '\McPersona\Http\Controllers\StaffController@newStaff', 
	'as' => 'new-employee', ]);

Route::get('/employee-profile/{id}', 
	['uses' => '\McPersona\Http\Controllers\ProfileController@getProfile',
	'as' => 'employee-profile',]);


Route::get('/employee-appraisal/{id}/{review}', 
	['uses' => '\McPersona\Http\Controllers\PerformanceController@appraisalprofile',
	'as' => 'employee-appraisal',]);

Route::get('/manager-appraisal/{id}/{review}', 
	['uses' => '\McPersona\Http\Controllers\PerformanceController@appraisalManager',
	'as' => 'manager-appraisal',]);

Route::get('/view-appraisal/{id}/{review}', 
	['uses' => '\McPersona\Http\Controllers\PerformanceController@appraisalView',
	'as' => 'view-appraisal',]);

Route::get('/employees', 
	['uses' => '\McPersona\Http\Controllers\StaffController@showStaff', 
	'as' => 'employees', ]);

Route::get('/retired-staff', 
	['uses' => '\McPersona\Http\Controllers\StaffController@RetiredStaff', 
	'as' => 'retired-staff', ]);

Route::get('/resigned-staff', 
	['uses' => '\McPersona\Http\Controllers\StaffController@ResignedStaff', 
	'as' => 'resigned-staff', ]);

Route::post('/create-employee',
	['uses' => '\McPersona\Http\Controllers\StaffController@setupEmployee',]);

Route::get('/save-staff-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createEmployee',
	'as' => 'save-staff-details',]);


Route::get('/save-job-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createJob',
	'as' => 'save-job-details',]);

Route::get('/delete-performance-goal', 
	['uses' => '\McPersona\Http\Controllers\PerformanceController@deleteGoal',
	'as' => 'delete-performance-goal',]);

Route::get('/delete-review-cycle', 
	['uses' => '\McPersona\Http\Controllers\PerformanceController@deleteCycle',
	'as' => 'delete-review-cycle',]);


Route::get('/delete-performance-submitted', 
	['uses' => '\McPersona\Http\Controllers\PerformanceController@deleteSubmission',
	'as' => 'delete-performance-submitted',]);


Route::get('/update-job-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateJob',
	'as' => 'update-job-details',]);

Route::get('/delete-job-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteJob',
	'as' => 'delete-staff-details',]);

Route::get('/save-experience-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createExperience',
	'as' => 'save-experience-details',]);

Route::get('/update-experience-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateExperience',
	'as' => 'update-experience-details',]);

Route::get('/delete-experience-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteExperience',
	'as' => 'delete-experience-details',]);

Route::get('/save-education-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createEducation',
	'as' => 'save-education-details',]);

Route::get('/update-education-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateEducation',
	'as' => 'update-education-details',]);

Route::get('/delete-education-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteEducation',
	'as' => 'delete-education-details',]);

Route::get('/save-skill-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createSkill',
	'as' => 'save-skill-details',]);

Route::get('/update-skill-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateSkill',
	'as' => 'update-skill-details',]);

Route::get('/delete-skill-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteSkill',
	'as' => 'delete-skill-details',]);

Route::get('/save-language-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createLanguage',
	'as' => 'save-language-details',]);

Route::get('/update-language-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateLanguage',
	'as' => 'update-language-details',]);

Route::get('/delete-language-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteLanguage',
	'as' => 'delete-language-details',]);

Route::get('/save-license-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createLicense',
	'as' => 'save-license-details',]);

Route::get('/update-license-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateLicense',
	'as' => 'update-license-details',]);

Route::get('/delete-license-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteLicense',
	'as' => 'delete-license-details',]);

Route::get('/save-salary-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createSalary',
	'as' => 'save-salary-details',]);

Route::get('/update-salary-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateSalary',
	'as' => 'update-salary-details',]);

Route::get('/delete-salary-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteSalary',
	'as' => 'delete-salary-details',]);


Route::get('/save-membership-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createMembership',
	'as' => 'save-membership-details',]);

Route::get('/update-membership-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateMembership',
	'as' => 'update-membership-details',]);

Route::get('/delete-membership-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteMembership',
	'as' => 'delete-membership-details',]);


Route::get('/save-guarantor-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createGuarantor',
	'as' => 'save-guarantor-details',]);


Route::get('/update-guarantor-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateGuarantor',
	'as' => 'update-guarantor-details',]);

Route::get('/delete-guarantor-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteGuarantor',
	'as' => 'delete-guarantor-details',]);

Route::get('/save-beneficiary-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createBeneficiary',
	'as' => 'save-beneficiary-details',]);

Route::get('/update-beneficiary-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateBeneficiary',
	'as' => 'update-beneficiary-details',]);

Route::get('/delete-beneficiary-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteBeneficiary',
	'as' => 'delete-beneficiary-details',]);

Route::get('/save-emergency-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createEmergencyContact',
	'as' => 'save-emergency-details',]);

Route::get('/update-emergency-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateEmergencyContact',
	'as' => 'update-emergency-details',]);

Route::get('/delete-emergency-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteEmergency',
	'as' => 'delete-emergency-details',]);

Route::get('/save-dependent-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createDependent',
	'as' => 'save-dependent-details',]);

Route::get('/update-dependent-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateDependant',
	'as' => 'update-dependent-details',]);

Route::get('/delete-dependent-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteDependent',
	'as' => 'delete-dependent-details',]);

Route::get('/save-immigration-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createImmigration',
	'as' => 'save-immigration-details',]);

Route::get('/update-immigration-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateImmigration',
	'as' => 'update-immigration-details',]);

Route::get('/delete-immigration-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteImmigration',
	'as' => 'delete-immigration-details',]);


Route::get('/save-reportto-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createReportTo',
	'as' => 'save-reportto-details',]);

Route::get('/update-reportto-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createReportTo',
	'as' => 'update-reportto-details',]);

Route::get('/delete-reportto-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteReportTo',
	'as' => 'delete-reportto-details',]);

Route::get('/save-bank-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@createBank',
	'as' => 'save-bank-details',]);

Route::get('/update-bank-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@updateBank',
	'as' => 'update-bank-details',]);

Route::get('/delete-bank-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteBank',
	'as' => 'delete-bank-details',]);

Route::get('/delete-document-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@deleteDocument',
	'as' => 'delete-document-details',]);












Route::get('/load-job-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadJob',
	'as' => 'load-job-details',]);

Route::get('/fetch-job', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchJob',
	'as' => 'fetch-job',]);


Route::get('/load-experience-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadExperience',
	'as' => 'load-experience-details',]);

Route::get('/fetch-experience', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchExperience',
	'as' => 'fetch-experience',]);


Route::get('/load-education-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadEducation',
	'as' => 'load-education-details',]);

Route::get('/fetch-education-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchEducation',
	'as' => 'fetch-education-details',]);



Route::get('/load-memberships-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadMemberships',
	'as' => 'load-memberships-details',]);

Route::get('/fetch-memberships-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchMemberships',
	'as' => 'fetch-memberships-details',]);


Route::get('/load-beneficairy-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadBeneficiary',
	'as' => 'load-beneficairy-details',]);

Route::get('/fetch-beneficiary', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchBeneficiary',
	'as' => 'fetch-beneficiary',]);


Route::get('/load-bank-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadBank',
	'as' => 'load-bank-details',]);

Route::get('/fetch-bank', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchBank',
	'as' => 'fetch-bank',]);



Route::get('/load-skill-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadSkill',
	'as' => 'load-skill-details',]);

Route::get('/fetch-skill-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchSkill',
	'as' => 'fetch-skill-details',]);


Route::get('/load-language-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadLanguage',
	'as' => 'load-language-details',]);

Route::get('/fetch-language-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchLanguage',
	'as' => 'fetch-language-details',]);

Route::get('/load-license-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadLicense',
	'as' => 'load-license-details',]);

Route::get('/fetch-license-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchLicense',
	'as' => 'fetch-license-details',]);

Route::get('/load-salary-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadSalary',
	'as' => 'load-salary-details',]);

Route::get('/fetch-salary-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchSalary',
	'as' => 'fetch-salary-details',]);

Route::get('/load-emergency-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadEmergency',
	'as' => 'load-emergency-details',]);

Route::get('/fetch-emergency-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchEmergency',
	'as' => 'fetch-emergency-details',]);

Route::get('/load-guarantor-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadGuarantor',
	'as' => 'load-guarantor-details',]);

Route::get('/fetch-guarantor-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchGuarantor',
	'as' => 'fetch-guarantor-details',]);


Route::get('/load-dependent-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadDependent',
	'as' => 'load-dependent-details',]);

Route::get('/fetch-dependent-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchDependent',
	'as' => 'fetch-dependent-details',]);

Route::get('/load-immigration-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadImmigration',
	'as' => 'load-immigration-details',]);

Route::get('/fetch-immigration-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchImmigration',
	'as' => 'fetch-immigration-details',]);

Route::get('/load-reportto-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadReportto',
	'as' => 'load-reportto-details',]);

Route::get('/fetch-reportto-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@fetchReportto',
	'as' => 'fetch-reportto-details',]);

Route::get('/load-document-details', 
	['uses' => '\McPersona\Http\Controllers\StaffController@loadDocuments',
	'as' => 'load-document-details',]);
//Admin


Route::get('/job-title', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showJobtitles', 
	'as' => 'job-title', ]);

Route::post('/add-job-title', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createJobtitles', 
	'as' => 'add-job-title', ]);

Route::get('/delete-job-title', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteJobtitles', 
	'as' => 'delete-job-title', ]);


Route::get('/salary-component', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showSalaryComponent', 
	'as' => 'salary-component', ]);

Route::get('/employment-status', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showEmploymentStatus', 
	'as' => 'employment-status', ]);

Route::post('/add-employment-status', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createEmploymentStatus', 
	'as' => 'add-employment-status', ]);

Route::get('/delete-employment-status', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteEmploymentStatus', 
	'as' => 'delete-employment-status', ]);



Route::get('/job-category', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showJobCategory', 
	'as' => 'job-category', ]);

Route::post('/add-job-category', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createJobCategory', 
	'as' => 'add-job-category', ]);

Route::get('/delete-job-category', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteJobCategory', 
	'as' => 'delete-job-category', ]);




Route::get('/work-shift', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showWorkShift', 
	'as' => 'work-shift', ]);


Route::get('/pay-grade', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showPayGrade', 
	'as' => 'pay-grade', ]);

Route::post('/add-pay-grade', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createPayGrade', 
	'as' => 'add-pay-grade', ]);

Route::get('/delete-pay-grade', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deletePayGrade', 
	'as' => 'delete-pay-grade', ]);

Route::get('/department', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showDepartment', 
	'as' => 'department', ]);

Route::post('/add-department', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createDepartment', 
	'as' => 'add-department', ]);

Route::get('/delete-department', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteDepartment', 
	'as' => 'delete-department', ]);

Route::get('/subsidiary', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showSubsidiary', 
	'as' => 'subsidiary', ]);

Route::post('/add-subsidiary', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createSubsidiary', 
	'as' => 'add-subsidiary', ]);

Route::get('/delete-subsidiary', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteSubsidiary', 
	'as' => 'delete-subsidiary', ]);

Route::get('/location', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showLocation', 
	'as' => 'location', ]);

Route::post('/add-new-location', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createLocation', 
	'as' => 'add-location', ]);

Route::get('/delete-location', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteLocation', 
	'as' => 'delete-location', ]);


Route::get('/manage-holidays', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showHoliday', 
	'as' => 'manage-holidays', ]);

Route::get('/manage-relationships', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showRelationship', 
	'as' => 'manage-relationships', ]);

Route::get('/manage-terminate-reasons', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showTerminateReason', 
	'as' => 'manage-terminate-reasons', ]);

Route::get('/manage-skills', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showSkills', 
	'as' => 'manage-skills', ]);

Route::post('/add-skill', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createSkills', 
	'as' => 'add-skill', ]);

Route::get('/delete-skill', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteSkills', 
	'as' => 'delete-skill', ]);

Route::get('/delete-holiday', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteHoliday', 
	'as' => 'delete-holiday', ]);

Route::get('/delete-terminate-reason', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteTerminateReason', 
	'as' => 'delete-terminate-reason', ]);

Route::get('/delete-relationship', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteRelationship', 
	'as' => 'delete-relationship', ]);

Route::post('/add-holiday', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createHoliday', 
	'as' => 'add-holiday', ]);

Route::post('/add-relationship', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createRelationship', 
	'as' => 'add-relationship', ]);

Route::post('/add-terminate-reason', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createTerminateReason', 
	'as' => 'add-terminate-reason', ]);


Route::get('/manage-education', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showEducation', 
	'as' => 'manage-education', ]);

Route::post('/add-education', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createEducation', 
	'as' => 'add-education', ]);

Route::get('/delete-education', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteEducation', 
	'as' => 'delete-education', ]);



Route::get('/manage-languages', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showLanguage', 
	'as' => 'manage-languages', ]);

Route::post('/add-languages', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createLanguage', 
	'as' => 'add-languages', ]);

Route::get('/delete-language', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteLanguage', 
	'as' => 'delete-language', ]);


Route::get('/manage-licenses', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showLicenses', 
	'as' => 'manage-licenses', ]);

Route::post('/add-license', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createLicenses', 
	'as' => 'add-license', ]);

Route::get('/delete-license', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteLicenses', 
	'as' => 'delete-license', ]);



Route::get('/manage-memberships', 
	['uses' => '\McPersona\Http\Controllers\SetupController@showMemberships', 
	'as' => 'manage-memberships', ]);

Route::post('/add-memberships', 
	['uses' => '\McPersona\Http\Controllers\SetupController@createMemberships', 
	'as' => 'add-memberships', ]);

Route::get('/delete-memberships', 
	['uses' => '\McPersona\Http\Controllers\SetupController@deleteMemberships', 
	'as' => 'delete-memberships', ]);





//leaves
Route::get('/manage-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@index', 
	'as' => 'manage-leave', ]);

Route::get('/rejected-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@rejectedLeave', 
	'as' => 'rejected-leave', ]);

Route::get('/approved-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@approvedLeave', 
	'as' => 'approved-leave', ]);

Route::get('/cancelled-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@cancelledLeave', 
	'as' => 'cancelled-leave', ]);

Route::get('/load-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@loadLeaveJson', 
	'as' => 'load-leave', ]);


Route::get('/get-leave-days-left', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@getdaystaken', 
	'as' => 'get-leave-days-left', ]);



Route::get('/load-pending-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@loadLeaveRequest',
	'as' => 'load-pending-leave',]);

Route::get('/approve-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@approveLeave',
	'as' => 'approve-leave',]);

Route::get('/approve-leave-hod', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@approveLeaveHod',
	'as' => 'approve-leave-hod',]);

Route::get('/reject-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@rejectLeave',
	'as' => 'reject-leave',]);


Route::get('/fetch-leave-details', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@editLeave',
	'as' => 'fetch-leave-details',]);

Route::get('/cancel-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@cancelLeave',
	'as' => 'cancel-leave',]);

Route::get('/leave-calendar',
	['uses' => '\McPersona\Http\Controllers\LeaveController@calendar',
	 'as' => 'leave-calendar', ]);

Route::get('/proposed-calendar',
	['uses' => '\McPersona\Http\Controllers\LeaveController@proposedcalendar',
	 'as' => 'proposed-calendar', ]);

Route::get('/find-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@searchLeave', 
	'as' => 'find-leave', ]);

Route::get('/delete-leave', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@deleteLeave', 
	'as' => 'delete-leave', ]);

Route::get('/leave-schedule',
	['uses' => '\McPersona\Http\Controllers\LeaveController@LeaveSchedule',
	 'as' => 'leave-schedule', ]);

Route::get('/proposed-leave-schedule',
	['uses' => '\McPersona\Http\Controllers\LeaveController@proposedLeaveSchedule',
	 'as' => 'proposed-leave-schedule', ]);

Route::get('/proposed-leave-schedule',
	['uses' => '\McPersona\Http\Controllers\LeaveController@proposedLeaveSchedule',
	 'as' => 'proposed-leave-schedule', ]);


Route::get('/subsidiary-calendar/{id}',
	['uses' => '\McPersona\Http\Controllers\LeaveController@subsidiary',
	 'as' => 'subsidiary-calendar', ]);

Route::get('/department-calendar/{id}',
	['uses' => '\McPersona\Http\Controllers\LeaveController@department',
	 'as' => 'department-calendar', ]);


Route::get('/subsidiary-leave-calendar/{id}',
	['uses' => '\McPersona\Http\Controllers\LeaveController@proposedSubsidiaryCalendar',
	 'as' => 'subsidiary-leave-calendar', ]);

Route::get('/department-leave-calendar/{id}',
	['uses' => '\McPersona\Http\Controllers\LeaveController@proposedDepartmentCalendar',
	 'as' => 'department-leave-calendar', ]);





//Discipline
Route::get('/disciplinary-cases',
	['uses' => '\McPersona\Http\Controllers\DisciplineController@casesPending',
	 'as' => 'disciplinary-cases', ]);

Route::post('/add-case',
	['uses' => '\McPersona\Http\Controllers\DisciplineController@createCase',
	 'as' => 'add-case', ]);



Route::get('/action-case',
	['uses' => '\McPersona\Http\Controllers\DisciplineController@actionCase',
	 'as' => 'action-case', ]);

Route::get('/delete-case',
	['uses' => '\McPersona\Http\Controllers\DisciplineController@deleteCase',
	 'as' => 'delete-case', ]);

Route::get('/add-case-comment',
	['uses' => '\McPersona\Http\Controllers\DisciplineController@addCaseComment',
	 'as' => 'add-case-comment', ]);



Route::get('/verbal-warning-template',
	['uses' => '\McPersona\Http\Controllers\DisciplineController@templateVerbWarning',
	 'as' => 'verbal-warning-template', ]);




//Review

Route::get('/review-start',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@start',
	 'as' => 'review-start', ]);

Route::get('/reviews',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@index',
	 'as' => 'reviews', ]);

Route::get('/review-settings',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@settings',
	 'as' => 'review-settings', ]);

Route::get('/probationary-performance-review',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@probationaryManager',
	 'as' => 'probationary-performance-review', ]);

Route::get('/periodic-performance-review',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@PeriodicReview',
	 'as' => 'periodic-performance-review', ]);

Route::get('/job-audit-review',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@JobAudit',
	 'as' => 'job-audit-review', ]);

Route::get('/add-staff-comment',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@addStaffComment',
	 'as' => 'add-staff-comment', ]);


Route::post('/add-performance-goals',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@addPerformanceGoal',
	 'as' => 'add-performance-goals', ]);

Route::get('/load-performance-goals',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@loadPerformanceGoal',
	 'as' => 'load-performance-goals', ]);


Route::get('/update-staff-review-status',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@setReviewState',
	 'as' => 'update-staff-review-status', ]);

Route::get('/view-review/{id}',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@viewReview',
	 'as' => 'view-review', ]);

Route::get('/my-review/{id}',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@myreview',
	 'as' => 'my-review', ]);

Route::get('/print-review/{id}',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@printReview',
	 'as' => 'print-review', ]);


Route::post('/save-periodic-performance-review',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@savePeriodReview',
	 'as' => 'save-periodic-performance-review', ]);

Route::post('/create-performance',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@addCycle',
	 'as' => 'create-performance', ]);


Route::post('/save-ratings',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@ratingSave',
	 'as' => 'save-ratings', ]);

Route::post('/save-ratings-performance-review',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@ratingSave',
	 'as' => 'save-ratings-performance-review', ]);



Route::get('/load-summary', 
	['uses' => '\McPersona\Http\Controllers\PerformanceController@loadSummary',
	'as' => 'load-summary',]);



//Reports
Route::get('/date-joined-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getdatejoined',
	 'as' => '/date-joined-report', ]);

Route::get('/department-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getdepartment',
	 'as' => '/department-report', ]);

Route::get('/location-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getlocation',
	 'as' => '/location-report', ]);

Route::get('/location-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getlocation',
	 'as' => '/location-report', ]);

Route::get('/status-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getstatus',
	 'as' => '/status-report', ]);

Route::get('/birth-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getbirth',
	 'as' => '/birth-report', ]);

Route::get('/emergency-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getemergency',
	 'as' => '/emergency-report', ]);

Route::get('/marital-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getmarital',
	 'as' => '/marital-report', ]);

Route::get('/leave-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getleave',
	 'as' => '/leave-report', ]);

Route::get('/qualification-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getqualification',
	 'as' => '/qualification-report', ]);

Route::get('/branch-report',
	['uses' => '\McPersona\Http\Controllers\ReportController@getbranch',
	 'as' => '/branch-report', ]);


Route::get('/report-list',
	['uses' => '\McPersona\Http\Controllers\ReportController@reportsmain',
	 'as' => '/report-list', ]);




//Awards
Route::get('/awards',
	['uses' => '\McPersona\Http\Controllers\AwardController@awardlist',
	 'as' => 'awards', ]);

//Docuemnts
Route::get('/published-documents',
	['uses' => '\McPersona\Http\Controllers\NoteController@documents',
	 'as' => 'published-documents', ]);

Route::get('/new-document',
	['uses' => '\McPersona\Http\Controllers\NoteController@new',
	 'as' => 'new-document', ]);



//Payroll
Route::get('/payroll-slips',
	['uses' => '\McPersona\Http\Controllers\PayrollController@index',
	 'as' => 'payroll-slips', ]);

Route::get('/print-payroll/{id}',
	['uses' => '\McPersona\Http\Controllers\PayrollController@printpayroll',
	 'as' => '/print-payroll', ]);

Route::get('/get-salary-details',
	['uses' => '\McPersona\Http\Controllers\PayrollController@getSalaryDetails',
	 'as' => 'get-salary-details', ]);

Route::get('/employee-ssf',
	['uses' => '\McPersona\Http\Controllers\PayrollController@computeSSNIT_employee',
	 'as' => 'employee-ssf', ]);

Route::get('/employer-ssf',
	['uses' => '\McPersona\Http\Controllers\PayrollController@computeSSNIT_employer',
	 'as' => 'employer-ssf', ]);

Route::get('/income-tax',
	['uses' => '\McPersona\Http\Controllers\PayrollController@computePAYE',
	 'as' => 'income-tax', ]);

Route::post('/process-payroll',
	['uses' => '\McPersona\Http\Controllers\PayrollController@doPayroll',
	 'as' => 'process-payroll', ]);

Route::post('/process-payroll-bulk',
	['uses' => '\McPersona\Http\Controllers\PayrollController@doPayrollBulk',
	 'as' => 'process-payroll-bulk', ]);

Route::get('/payroll-master',
	['uses' => '\McPersona\Http\Controllers\PayrollController@masterfile',
	 'as' => 'payroll-master', ]);

Route::get('/quick-compute',
	['uses' => '\McPersona\Http\Controllers\PayrollController@quickCompute',
	 'as' => 'quick-compute', ]);

Route::get('/quick-compute',
	['uses' => '\McPersona\Http\Controllers\PayrollController@quickCompute',
	 'as' => 'quick-compute', ]);


Route::get('/business-days',
	['uses' => '\McPersona\Http\Controllers\LeaveController@computeBusinessdays',
	 'as' => 'business-days', ]);


Route::get('/terminate-job-offer', 
	['uses' => '\McPersona\Http\Controllers\StaffController@terminateJob',
	'as' => 'terminate-job-offer',]);
//route group end

//  Event::listen('illuminate.query', function($query)
// {
//     var_dump($query);
// });






});
Route::post('/save-periodic-performance-review',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@savePeriodReview',
	 'as' => 'save-periodic-performance-review', ]);

Route::post('/save-job-audit-review',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@saveJobAudit',
	 'as' => 'save-job-audit-review', ]);

Route::post('/update-review',
	['uses' => '\McPersona\Http\Controllers\PerformanceController@updateReview',
	 'as' => 'update-review', ]);


Route::post('/save-leave-request', 
	['uses' => '\McPersona\Http\Controllers\LeaveController@assignLeave',
	'as' => 'save-leave-request',]);


Route::post('/add-new-document', 
	['uses' => '\McPersona\Http\Controllers\NoteController@savedocument',
	'as' => 'add-new-document',]);