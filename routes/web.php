<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::get('/system/user/account/verification/{id?}', function () {
	$param['msg'] = "";
    $param['pageName'] = "User Verification";

    return view('system.users.verify', $param);
});

Route::get('/system/organization/chart', function () {
    return view('orgChart');
});
Route::get('/2login', function () {
    return view('auth.2login');
});

Route::get('/help/faqs', function () {
    return view('help');
});

Route::get('/email/sample', function () {
    return view('emailsample');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/sms', 'HomeController@SMS');
Route::get('/exampleChart', 'ReportController@index');

Auth::routes();



// Route::get('/home', 'HomeController@index');
// State Distributions
Route::get('/pim/distribution/states/{id?}', ['uses'=>'HomeController@states', 'as'=>'states', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|hr-admin|senior-management']);
Route::get('/state/data/{id?}', ['uses'=>'HomeController@oneState', 'as'=>'o_states', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|hr-admin|senior-management']);

Route::get('/pim/distribution/geo_pol_zones/{id?}', ['uses'=>'HomeController@geopolzones', 'as'=>'geozones', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|hr-admin|senior-management']);
Route::get('/pim/distribution/geo_pol_zones/data/{id?}', ['uses'=>'HomeController@oneZone', 'as'=>'onezone', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|hr-admin|senior-management']);
// Route::get('/pim/employees', array('uses' => 'PersonnelController@personnel', 'as'=>'personnel'));
Route::get('/pim/employees/{id?}', ['uses'=>'PersonnelController@personnel', 'as'=>'personnel', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|hr-admin|senior-management|center-cordinator|report-only']);

Route::get('/pim/employees/data/{id?}', ['uses'=>'PersonnelController@viewOne', 'as'=>'onePersonnel', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|hr-admin|senior-management|center-cordinator|report-only']);
// Route::get('/pim/employees/data/{id?}', array('uses'=>'PersonnelController@viewOne', 'as'=>'onePerson' ));

Route::get('/pim/employees/register/{id?}', ['uses'=>'PersonnelController@register', 'as'=>'nregister', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);

Route::post('/pim/employees/register/new', array('uses'=>'PersonnelController@doRegister', 'as'=>'dregister' ));

Route::get('/pim/employees/leaves/{id?}', ['uses'=>'PersonnelController@leaves', 'as'=>'pLeaves', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);
Route::get('/pim/employees/leaves/data/{id}', ['uses'=>'PersonnelController@oneLeave', 'as'=>'oLeaves', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);
Route::post('/pim/employees/data/editLGA', array('uses'=>'PersonnelController@editLGA', 'as'=>'eLGA' ));
Route::post('/pim/employees/data/editBranch', array('uses'=>'PersonnelController@editSCenter', 'as'=>'eBranch' ));
Route::post('/pim/employees/data/deactivate/{id?}', array('uses'=>'PersonnelController@deactivate', 'as'=>'dPerson' ));

Route::post('/pim/employees/data/nok_update/{id?}', array('uses'=>'PersonnelController@upadteNOK', 'as'=>'upadteNOK' ));

Route::get('/pim/employees/appraisals/{id?}', ['uses'=>'PersonnelController@appraisalIndex', 'as'=>'aIndex', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);

Route::post('/pim/employees/data/documents/upload', array('uses'=>'PersonnelController@uploadDocument', 'as'=>'uploadDoc' ));

Route::post('/pim/employees/data/uploadImage', array('uses'=>'PersonnelController@uploadImage', 'as'=>'uploadImg' ));
Route::post('/pim/employees/data/editSalaryScale', array('uses'=>'PersonnelController@editSalaryScale', 'as'=>'editSalaryScale' ));

Route::get('/pim/employees/documentCenter/{id?}', ['uses'=>'DocumentController@docCenter', 'as'=>'docCenter', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);
Route::get('/pim/employees/document/upload', array('uses'=>'DocumentController@docUpload', 'as'=>'docUpload' ));
Route::get('/pim/employees/document/one/{id?}', ['uses'=>'DocumentController@oneDoc', 'as'=>'onedoc', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);

// Leave Management
Route::post('/pim/employees/leave/new', array('uses'=>'PersonnelController@newLeave', 'as'=>'nLeave' ));


// Employees Reports
Route::get('/pim/reports/doPDF', ['uses'=>'PersonnelController@doPDF', 'as'=>'dopdf', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);

// Branches/Departments/Units
Route::get('/branches/{id?}', ['uses'=>'BranchController@branches', 'as'=>'branches', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);

Route::get('/branches/data/{id?}', ['uses'=>'BranchController@oneBranch', 'as'=>'onebranch', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);
Route::post('/branches/data/{id?}', array('uses'=>'BranchController@editBranch', 'as'=>'editbranch' ));
Route::post('/branches', array('uses'=>'BranchController@newBranch', 'as'=>'nbranch' ));
Route::get('/branches/departments/{id?}', ['uses'=>'BranchController@departments', 'as'=>'departments', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);
Route::post('/branches/departments', array('uses'=>'BranchController@newDepartment', 'as'=>'nDepartment' ));
Route::get('/branches/departments/units/{id?}', ['uses'=>'BranchController@units', 'as'=>'units' , 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);
Route::get('/branches/departments/units/data/{id?}',['uses'=>'BranchController@oneUnit', 'as'=>'oneunit', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|center-cordinator|front-end-user|hr-admin|report-only|senior-management']);
Route::post('/branches/departments/units', array('uses'=>'BranchController@newUnit', 'as'=>'nunit' ));
Route::post('/branches/data/deactivate/{id?}', array('uses'=>'BranchController@deactivate', 'as'=>'Dbranch' ));


// Branch Reports
Route::get('/branches/reports/doPDF', array('uses'=>'BranchController@doReportPDF', 'as'=>'doReportPDF' ));

// System Preference/Roles/Permissions
Route::get('/system/users/{id?}', ['uses'=>'SystemController@users', 'as'=>'users', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|hr-admin|senior-management|maintenance-admin']);
Route::post('/system/users', array('uses'=>'SystemController@newUser', 'as'=>'nuser' ));
Route::get('/system/users/profile/{id?}', ['uses'=>'SystemController@viewOne', 'as'=>'Oneuser', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|hr-admin|senior-management|maintenance-admin']);
Route::post('/system/users/attach_role', array('uses'=>'SystemController@viewOne', 'as'=>'Oneuser' ));

// User verification

Route::post('/system/user/account/verification/{id?}', array('uses'=>'SystemController@verifyUser', 'as'=>'usVerify' ));
Route::post('/sendCode/', array('uses'=>'SystemController@resendCode','as'=>'sCode'));


Route::get('/system/rbac/roles/{id?}', array('uses'=>'SystemController@roles', 'as'=>'roles' ));
Route::get('/system/rbac/role/data/{id?}', array('uses'=>'SystemController@viewOneR', 'as'=>'Proles' ));
Route::post('/system/rbac/roles', array('uses'=>'SystemController@newRole', 'as'=>'nrole' ));

Route::get('/system/salary-structures/categories/{id?}', array('uses'=>'SystemController@salaryCats', 'as'=>'sCat' ));
Route::get('/system/salary-structures/scales/{id?}', array('uses'=>'SystemController@salaryScales', 'as'=>'sScale' ));
Route::get('/system/salary-structures/categories/data/{id?}', array('uses'=>'SystemController@oneSalaryCat', 'as'=>'oneCat' ));
Route::get('/system/salary-structures/scales/data/{id?}', array('uses'=>'SystemController@oneSalaryScale', 'as'=>'oneScale' ));
Route::post('/system/salary-structures/categories', array('uses'=>'SystemController@newSalaryCategory', 'as'=>'nsCat' ));
Route::post('/system/salary-structures/NewScales', array('uses'=>'SystemController@NewScale', 'as'=>'nScale' ));

// System Reports
Route::get('/system/reports/pim/{id?}', array('uses'=>'PersonnelController@reportIndex', 'as'=>'rIndex' ));
// Route::get('/system/organization/chart', array('uses'=>'PersonnelController@reportIndex', 'as'=>'rIndex' ));

// System Preference - Settings.
Route::get('/system/preference/{id?}', array('uses'=>'SystemController@systemPreference', 'as'=>'prefIndex' ));
Route::get('/system/db-backup', array('uses'=>'SystemController@dBbackup', 'as'=>'backup' ));


// Ticketing System
Route::get('/system/tickets/{id?}', ['uses'=>'SystemController@tickets', 'as'=>'prefIndex', 'middleware' => ['auth', 'acl'], 'is' => 'maintenance-admin|hr-admin|administrator']);
Route::get('/system/tickets/view/{id?}', array('uses'=>'SystemController@oneTicket', 'as'=>'viewticket' ));
Route::post('/system/tickets/{id?}/assign', array('uses'=>'SystemController@assignTicket', 'as'=>'assignTicket' ));
Route::post('/system/tickets/{id?}/add-stakeholder', array('uses'=>'SystemController@newTicketStakeholder', 'as'=>'newTicketStakeholder' ));
Route::post('/system/tickets/{id?}/process', array('uses'=>'SystemController@processTicket', 'as'=>'processticket' ));
Route::post('/system/tickets/{id?}/close', array('uses'=>'SystemController@closeTicket', 'as'=>'closeTicket' ));
// Route::post('/system/tickets/edit/{id?}', array('uses'=>'SystemController@editTicket', 'as'=>'editticket' ));
Route::get('/system/ticket/new', array('uses'=>'SystemController@newticket', 'as'=>'nticket' ));
Route::post('/system/tickets/new', array('uses'=>'SystemController@createticket', 'as'=>'createticket' ));



// Route::get('/sendmail', array('uses'=>'HomeController@domail', 'as'=>'mail' ));