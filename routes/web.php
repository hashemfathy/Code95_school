<?php

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
// ----------------------- Public Routes ----------------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/admin','UserController@adminLogin')->name('get.AdminLogin');
Route::post('/login/admin','UserController@postAdminLogin')->name('post.AdminLogin');
Route::get('/admin/logout','UserController@getAdminlogout')->name('admin.getlogout');

Route::get('/login/student','UserController@studentLogin')->name('get.StudentLogin');
Route::post('/register/student','UserController@studentRegister')->name('student.register');
Route::post('/login/student','UserController@postStudentLogin')->name('post.StudentLogin');
Route::get('/student/logout','UserController@getStudentlogout')->name('student.getlogout');

Route::get('/login/teacher','UserController@teacherLogin')->name('get.TeacherLogin');
Route::post('/login/teacher','UserController@postTeacherLogin')->name('post.TeacherLogin');
Route::get('/teacher/logout','UserController@getTeacherlogout')->name('teacher.getlogout');





// -----------------------------admin Page Routes------------------------------
Route::group(['middleware'=>['checkAdmin']],function(){
    // ---------admin setting part -----
    Route::get('/admin/dashboard','UserController@getAdminDashboard')->name('get.AdminDashboard');
    Route::get('/admin/settings','UserController@adminSettings')->name('get.adminSettings');
    Route::get('/admin/check-pwd','UserController@checkAdminPassword')->name('check.adminPassword');
    Route::post('/admin/update-password','UserController@updateAdminPassword')->name('update.adminPassword');
    // ---------admin student part -----
    Route::get('admin/students','AdminController@getAdminStudents')->name('get.AdminStudents');
    Route::get('admin/students/add-student','AdminController@getAddStudent')->name('get.AddStudent');
    Route::post('/admin/students/add-student','AdminController@addStudent')->name('add.student');
    Route::get('/admin/students/edit-student/{id}','AdminController@getEditStudent')->name('get.editAdminStudent');
    Route::post('/admin/students/edit-student/{id}','AdminController@updateStudent')->name('updateAdminStudent');
    Route::get('/admin/students/delete-student/{id}','AdminController@deleteAdminStudent')->name('delete.adminStudent');
    Route::get('/admin/students/view-student/{id}','AdminController@viewAdminStudent')->name('view.adminStudent');
    // ---------admin teacher part -----
    Route::get('admin/teachers','AdminController@getAdminTeachers')->name('get.AdminTeachers');
    Route::get('admin/teachers/add-teacher','AdminController@getAddTeacher')->name('get.AddTeacher');
    Route::post('/admin/teachers/add-teacher','AdminController@addTeacher')->name('add.teacher');
    Route::get('/admin/teachers/edit-teacher/{id}','AdminController@getEditTeacher')->name('get.editAdminTeacher');
    Route::post('/admin/teachers/edit-teacher/{id}','AdminController@updateTeacher')->name('updateAdminTeacher');
    Route::get('/admin/teachers/delete-teacher/{id}','AdminController@deleteAdminTeacher')->name('delete.adminTeacher');
    Route::get('/admin/teachers/view-teacher/{id}','AdminController@viewAdminTeacher')->name('view.adminTeacher');
    // ---------admin subject part -----
    Route::get('admin/subjects','AdminController@getAdminSubjects')->name('get.AdminSubjects');
    Route::get('admin/subjects/add-subject','AdminController@getAddSubject')->name('get.AddSubject');
    Route::post('/admin/subjects/add-subject','AdminController@addSubject')->name('add.subject');
    Route::get('/admin/subjects/edit-subject/{id}','AdminController@getEditSubject')->name('get.editAdminSubject');
    Route::post('/admin/subjects/edit-subject/{id}','AdminController@updateSubject')->name('updateAdminSubject');
    Route::get('/admin/subjects/delete-subject/{id}','AdminController@deleteAdminSubject')->name('delete.adminSubject');


});
// -----------------------------teacher Page Routes------------------------------
Route::group(['middleware'=>['checkTeacher']],function(){
    Route::get('/teacher/dashboard','UserController@getTeacherDashboard')->name('get.TeacherDashboard');
    Route::get('/teacher/settings','UserController@teacherSettings')->name('get.teacherSettings');
    Route::get('/teacher/check-pwd','UserController@checkTeacherPassword')->name('check.teacherPassword');
    Route::post('/teacher/update-password','UserController@updateTeacherPassword')->name('update.teacherPassword');
});
// -----------------------------student Page Routes------------------------------
Route::group(['middleware'=>['checkStudent']],function(){
    Route::get('/student/index','UserController@getIndex')->name('get.Index');
    Route::get('/student/settings','UserController@studentSettings')->name('get.studentSettings');
    Route::get('/student/check-pwd','UserController@checkStudentPassword')->name('check.studentPassword');
    Route::post('/student/update-password','UserController@updateStudentPassword')->name('update.studentPassword');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
