<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\JobRoleController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\EmployeeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     // return view('welcome');
// });

// register

Auth::routes();
Route::get('/', [LoginController::class, 'index'])->name('admin-login-page');
Route::get('/registration', [RegisterController::class, 'index'])->name('admin-register-page');
Route::post('/registration/admin', [RegisterController::class, 'storeAdmin'])->name('admin.register');
Route::post('/login/admin', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/refresh_captcha', [LoginController::class, 'refreshCaptcha'])->name('refresh_captcha');
Route::get('/password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/admin-password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.emails');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showresetConfirmForm'])->name('password.reset');
Route::post('check-email-unique', [UserController::class, 'check_email_unique'])->name('check-email-unique');

// Route::get('admin-login', [LoginController::class,'index'])->name('admin-login-page');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('clear_filter_session', [DashboardController::class, 'clear_filter_session']);

    Route::post('check-role-name', [RoleController::class, 'check_role_unique'])->name('check-role-unique');

    Route::post('check-maincat-code', [MainCategoryController::class, 'check_maincat_code'])->name('check-maincat-code');
    Route::post('check-maincat-name', [MainCategoryController::class, 'check_maincat_name'])->name('check-maincat-name');
    Route::post('category/details', [MainCategoryController::class, 'getcategoryDetails'])->name('category.details');
    Route::post('clear_filter/{value}', [DashboardController::class, 'clear_filter'])->name('clear_filter');
    Route::post('check-subcat-code', [SubCategoryController::class, 'check_subcat_code'])->name('check-subcat-code');
    Route::post('check-subcat-name', [SubCategoryController::class, 'check_subcat_name'])->name('check-subcat-name');

    Route::post('check-technology-name', [TechnologyController::class, 'check_technology_name'])->name('check-technology-name');
    Route::post('check-job_role-name', [JobRoleController::class, 'check_job_role_name'])->name('check-job_role-name');
    Route::post('check-skill-name', [SkillController::class, 'check_skill_name'])->name('check-skill-name');

    Route::post('check-designation-name', [DesignationController::class, 'check_designation_name'])->name('check-designation-name');
    Route::post('check-designation-code', [DesignationController::class, 'check_designation_code'])->name('check-designation-code');

    Route::post('check-department-name', [DepartmentController::class, 'check_department_name'])->name('check-department-name');
    Route::post('check-department-code', [DepartmentController::class, 'check_department_code'])->name('check-department-code');

    Route::post('check-leave_type-name', [LeaveTypeController::class, 'check_leave_type_name'])->name('check-leave_type-name');
    Route::post('check-leave_type-code', [LeaveTypeController::class, 'check_leave_type_code'])->name('check-leave_type-code');

    Route::post('check-parent-category', [SubCategoryController::class, 'checkparentCategory'])->name('check-parent-category');
    Route::post('recipient-data', [NotificationController::class, 'recipientDetails'])->name('recipient.details');

});

// Route::middleware(['auth','permission'])->prefix('admin')->group(function () {

// });
Route::middleware(['auth', 'permission'])->group(function () {

    Route::get('role', [RoleController::class, 'index'])->name('role');
    Route::get('role/list', [RoleController::class, 'get_roles'])->name('role.list');
    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('role/create', [RoleController::class, 'store'])->name('role.store');
    Route::post('role/edit', [RoleController::class, 'update'])->name('role.update');
    Route::post('role/delete', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::post('role/details', [RoleController::class, 'getroleDetails'])->name('role.details');

    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::post('user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('user/list/{is_list}', [UserController::class, 'get_user_list'])->name('user.list');
    Route::post('user/edit', [UserController::class, 'update'])->name('user.update');
    Route::post('user/delete', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('user/details', [UserController::class, 'getuserDetails'])->name('user.details');
    Route::post('user/changepassword', [UserController::class, 'changeuserPassword'])->name('user.changepassword');
    Route::get('users/report', [UserController::class, 'userReport'])->name('users.report');
    Route::post('users/report/list', [UserController::class, 'getuserReport'])->name('user.report.export');

    //Main Categories

    Route::get('employee-categories', [MainCategoryController::class, 'index'])->name('employee-categories');
    Route::post('employee-categories/create', [MainCategoryController::class, 'store'])->name('employee-category.store');
    Route::get('employee-categories/list/{is_list}', [MainCategoryController::class, 'get_main_categories'])->name('employee-category.list');
    Route::post('employee-categories/edit', [MainCategoryController::class, 'update'])->name('employee-category.update');
    Route::post('employee-categories/delete', [MainCategoryController::class, 'destroy'])->name('employee-category.destroy');
    Route::get('employee-category/report', [MainCategoryController::class, 'maincategoryReport'])->name('employee-category.report');
    Route::post('employee-category/report/list', [MainCategoryController::class, 'getmaincategorReport'])->name('employee-category.export');

    //Sub Categories

    Route::get('sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories');
    Route::post('sub-categories/create', [SubCategoryController::class, 'store'])->name('sub-category.store');
    Route::get('sub-categories/list/{is_list}', [SubCategoryController::class, 'get_sub_categories'])->name('sub-category.list');
    Route::post('sub-categories/edit', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::post('sub-categories/delete', [SubCategoryController::class, 'destroy'])->name('sub-category.destroy');
    Route::get('sub-category/report', [SubCategoryController::class, 'maincategoryReport'])->name('sub-category.report');
    Route::post('sub-category/report/list', [SubCategoryController::class, 'getsubcategorReport'])->name('sub-category.export');

    //Notification

    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('notification/create', [NotificationController::class, 'store'])->name('notification.store');
    Route::get('notification/list', [NotificationController::class, 'get_notifications'])->name('notification.list');
    Route::post('notification/edit', [NotificationController::class, 'update'])->name('notification.update');
    Route::post('notification/delete', [NotificationController::class, 'destroy'])->name('notification.destroy');

    //Technology
    Route::get('technology', [TechnologyController::class, 'index'])->name('technology');
    Route::post('technology/create', [TechnologyController::class, 'store'])->name('technology.store');
    Route::get('technology/list/{is_list}', [TechnologyController::class, 'get_technologies'])->name('technology.list');
    Route::post('technology/edit', [TechnologyController::class, 'update'])->name('technology.update');
    Route::post('technology/delete', [TechnologyController::class, 'destroy'])->name('technology.destroy');
    Route::get('technology/report', [TechnologyController::class, 'technologyReport'])->name('technology.report');
    Route::post('technology/details', [TechnologyController::class, 'gettechnologyDetails'])->name('technology.details');

    //JobRole
    Route::get('job_role', [JobRoleController::class, 'index'])->name('job_role');
    Route::post('job_role/create', [JobRoleController::class, 'store'])->name('job_role.store');
    Route::get('job_role/list/{is_list}', [JobRoleController::class, 'get_technologies'])->name('job_role.list');
    Route::post('job_role/edit', [JobRoleController::class, 'update'])->name('job_role.update');
    Route::post('job_role/delete', [JobRoleController::class, 'destroy'])->name('job_role.destroy');
    Route::get('job_role/report', [JobRoleController::class, 'job_roleReport'])->name('job_role.report');
    Route::post('job_role/details', [JobRoleController::class, 'getjob_roleDetails'])->name('job_role.details');

    //Skill
    Route::get('skill', [SkillController::class, 'index'])->name('skill');
    Route::post('skill/create', [SkillController::class, 'store'])->name('skill.store');
    Route::get('skill/list/{is_list}', [SkillController::class, 'get_skills'])->name('skill.list');
    Route::post('skill/edit', [SkillController::class, 'update'])->name('skill.update');
    Route::post('skill/delete', [SkillController::class, 'destroy'])->name('skill.destroy');
    Route::get('skill/report', [SkillController::class, 'skillReport'])->name('skill.report');
    Route::post('skill/details', [SkillController::class, 'getskillDetails'])->name('skill.details');

    //Designation
    Route::get('designation', [DesignationController::class, 'index'])->name('designation');
    Route::post('designation/create', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('designation/list/{is_list}', [DesignationController::class, 'get_designations'])->name('designation.list');
    Route::post('designation/edit', [DesignationController::class, 'update'])->name('designation.update');
    Route::post('designation/delete', [DesignationController::class, 'destroy'])->name('designation.destroy');
    Route::get('designation/report', [DesignationController::class, 'designationReport'])->name('designation.report');
    Route::post('designation/details', [DesignationController::class, 'getdesignationDetails'])->name('designation.details');

    //Department
    Route::get('department', [DepartmentController::class, 'index'])->name('department');
    Route::post('department/create', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('department/list/{is_list}', [DepartmentController::class, 'get_departments'])->name('department.list');
    Route::post('department/edit', [DepartmentController::class, 'update'])->name('department.update');
    Route::post('department/delete', [DepartmentController::class, 'destroy'])->name('department.destroy');
    Route::get('department/report', [DepartmentController::class, 'departmentReport'])->name('department.report');
    Route::post('department/details', [DepartmentController::class, 'getdepartmentDetails'])->name('department.details');

    //LeaveType
    Route::get('leave_type', [LeaveTypeController::class, 'index'])->name('leave_type');
    Route::post('leave_type/create', [LeaveTypeController::class, 'store'])->name('leave_type.store');
    Route::get('leave_type/list/{is_list}', [LeaveTypeController::class, 'get_leave_types'])->name('leave_type.list');
    Route::post('leave_type/edit', [LeaveTypeController::class, 'update'])->name('leave_type.update');
    Route::post('leave_type/delete', [LeaveTypeController::class, 'destroy'])->name('leave_type.destroy');
    Route::get('leave_type/report', [LeaveTypeController::class, 'leave_typeReport'])->name('leave_type.report');
    Route::post('leave_type/details', [LeaveTypeController::class, 'getleave_typeDetails'])->name('leave_type.details');

    //Policy
    Route::get('policy', [PolicyController::class, 'index'])->name('policy');
    Route::post('policy/create', [PolicyController::class, 'store'])->name('policy.store');
    Route::get('policy/list/{is_list}', [PolicyController::class, 'get_policys'])->name('policy.list');
    Route::post('policy/edit', [PolicyController::class, 'update'])->name('policy.update');
    Route::post('policy/delete', [PolicyController::class, 'destroy'])->name('policy.destroy');
    Route::get('policy/report', [PolicyController::class, 'policyReport'])->name('policy.report');
    Route::post('policy/details', [PolicyController::class, 'getpolicyDetails'])->name('policy.details');


    //Site Settings


    Route::get('site-settings', [SiteSettingsController::class, 'index'])->name('site-settings');

   

});
 //employee
 Route::get('emp-dashboard-hr', [HRController::class, 'index'])->name('emp-dashboard-hr');
 Route::get('emp-attandance', [HRController::class, 'index'])->name('emp-attandance');
 Route::get('emp-leave', [HRController::class, 'index'])->name('emp-leave');
 Route::get('emp-profile', [EmployeeController::class, 'index'])->name('emp-profile');
 Route::get('add-employee', [EmployeeController::class, 'addEmployee'])->name('add-employee');
 Route::get('edit-employee/{id}', [EmployeeController::class, 'editEmployee'])->name('edit-employee');
 Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.store');
 Route::get('employee-list', [EmployeeController::class, 'view_list'])->name('employee.view_list');
 Route::get('employee/list', [EmployeeController::class, 'get_employees'])->name('employee.list');
 Route::get('employee/report', [EmployeeController::class, 'employeeReport'])->name('employee.report');
 Route::post('employee/delete', [EmployeeController::class, 'destroy'])->name('employee.destroy');
