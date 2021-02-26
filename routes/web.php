<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::group(['as'=>'admin.','middleware'=>['auth'],'prefix'=>'admin'],function () {

	Route::get('/dashboard',function (){
		return view('admin.dashboard');
	});
	Route::post('set/campus','AdminController@setCampus')->name('set_campus');


//	Route::get('staff',function(){
//		return view('admin.staff.index');
//	});
//	Route::get('staff/create',function (){
//		return view('admin.staff.create');
//	});
//	Route::get('staff/show',function (){
//		return view('admin.staff.show');
//	});

	Route::get('non-teaching/staff',function(){

		return view('admin.staff.non_teaching');
	});
	Route::get('staff/blue-collar',function(){
		return view('admin.staff.blue-collar');
	});
	Route::get('student',function (){
		return view('admin.students.index');
	});
	Route::get('student/create',function (){
		return view('admin.students.create');
	});
	Route::get('student/show',function (){
		return view('admin.students.show');
	});

	Route::get('setting/admin-panel',function (){
		return view('admin.settings.admin');
	});

	Route::get('setting/website','AdminController@web_settings')->name('setting.website');

	Route::get('fees',function (){
		return view('admin.fees.index');
	});

	Route::get('fees/create',function (){
		return view('admin.fees.create');
	});

	Route::get('student_fee',function (){
		return view('admin.reports.student_fee');
	});
	Route::get('class_fee',function (){
		return view('admin.reports.class_fee');
	});
	Route::get('branch_fee',function (){
		return view('admin.reports.branch_fee');
	});
	Route::get('challan','ChallanController@index');
	Route::get('challan/all','ChallanController@all_fee');
	Route::post('challan/generate','ChallanController@generate')->name('challan.generate');
	Route::post('challan/generate/all','ChallanController@generate_all')->name('challan.generate_all');
	Route::get('challan/fee1',function (){
		return view('admin.challans.fee1');
	});

	Route::get('challan/fee2',function (){
		return view('admin.challans.fee2');
	});

	Route::post('update/image','AdminController@update_image')->name('update.image');
	Route::post('update/email','AdminController@update_email')->name('update.email');
	Route::post('update/password','AdminController@update_password')->name('update.password');

	Route::post('student/update_status','StudentController@update_status')->name('student.update_status');

	Route::get('student/struck_off','StudentController@struck_off')->name('student.struck_off');

	Route::get('student/struck_off/{id}','StudentController@struck_off_create')->name('student.struck_off.create');
	Route::post('student/struck_off/store','StudentController@struck_off_store')->name('student.struck_off.store');

	Route::get('student/left','StudentController@left')->name('student.left');
	Route::get('student/left/{id}','StudentController@left_create')->name('student.left.create');
	Route::post('student/left/store','StudentController@left_store')->name('student.left.store');


	Route::get('student/readmission/{id}','StudentController@readmission_create')->name('student.readmission.create');
	Route::post('student/readmission/store','StudentController@readmission_store')->name('student.readmission.store');

    Route::get('student/filter','StudentController@filter')->name('student.filter');

    Route::get('student/enrollment','ReportController@student_enrollment')->name('student.enrollment');
    Route::get('get/student_enrollment','ReportController@get_student_enrollment')->name('get.student.enrollment');

    Route::resource('expense','ExpenseController');
    Route::resource('permission','PermissionController');
	Route::resource('campus','CampusController');
	Route::resource('staff','TeacherProfileController');
	Route::resource('non-teaching','NonTeachingController');
	Route::resource('blueCollar','BlueCollarStaffController');
	Route::resource('classes','ClassesController');
	Route::resource('group','GroupController');
	Route::resource('section','SectionController');
	Route::resource('student','StudentController');
	Route::resource('fee','FeeController');
	Route::resource('project','ProjectController');
	Route::resource('fee_group','FeeGroupController');
	Route::resource('attendance','AttendanceController');
	Route::resource('subject','SubjectController');
	Route::resource('exam','ExamController');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
