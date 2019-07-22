<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([

    'middleware' => 'api',

], function ($router) {
    // ------------------------Student------------------------------
    Route::post('/student/login', 'Api\AuthController@studentLogin');
    Route::post('/student/register', 'Api\AuthController@studentRegister');
    Route::get('/student/results', 'Api\StudentController@getStudentResults');
    Route::get('/student/levels', 'Api\StudentController@getStudentLevels');
    Route::get('/student/levels/{level}/results', 'Api\StudentController@getStudentLevelResults');
    Route::get('/student/logout', 'Api\AuthController@studentLogout');
    // ------------------------Teacher--------------------------
    Route::post('/teacher/login', 'Api\AuthController@teacherLogin');
    Route::get('/teacher/logout', 'Api\AuthController@teacherLogout');

   

});

