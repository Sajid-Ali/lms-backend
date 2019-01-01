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

/* Getting Authenticated User */
Route::get('/getAuthUser/{token}','AuthController@me');

Route::post('login', 'AuthController@login');
Route::post('login/password/reset','PasswordResetController@resetPassword');
Route::post('login/newpassword','NewPasswordController@setNewPassword');
Route::post('register', 'AuthController@register');
Route::post('logout','AuthController@logout');
Route::get('user/account/{id}','UserAccountController@getBalance');
Route::get('course/user/{id}','AuthController@getCourseUser');

/* Get Categories and send to Front End */

Route::get('categories','CategoryController@index');

/*
 * Get Course of Category category_id
 */

Route::get('course/category/{category_id}','MyCourseController@getCourseOfCategory');

/*
Create course in mycourse
*/
Route::post('course/create','MyCourseController@createCourse');

Route::post('course/create/info','CourseInfoController@createCourseInfo');

Route::get('course/courseInfo/{courseId}','CourseInfoController@getCourseInfo');

Route::get('course/all','MyCourseController@getAllCourses');
/*
get course in mycourse
*/
Route::get('course/mycourse/{userId}','MyCourseController@getMyCourses');
Route::get('course/{id}/modules','CourseModuleController@index');
/*
upload course videos in mycourse
*/
Route::post('course/video/upload','MyCourseController@uploadCourseVideo');

/*
get course videos in mycourse
*/
Route::get('course/videos/{courseId}','MyCourseController@getCourseVideos');
Route::get('course/get/{id}','MyCourseController@getThisCourse');

Route::get('course/getEnrolled/{courseId}/{userId}','EnrolledCourseController@isUserEnrolled');
Route::get('course/enroll/{userId}','EnrolledCourseController@getEnrolledCourses');


Route::post('course/buyCourse','EnrolledCourseController@buyCourse');
/*Enroll in Course */

Route::post('course/enroll','EnrolledCourseController@enrollInCourse');

/*
 * Live Course Routes
 */

Route::get('course/live/{userId}','LiveCourseController@index');
/* Gig Section */

/*
 *
 * Create Gig
 */
Route::get('gig/mygig/{id}','GigController@getUserGig');

Route::post('gig/create','GigController@create');

Route::post('gig/update','GigController@update');

Route::get('gig/delete/{id}','GigController@deleteGig');

/*
 *
 * Get All Gigs
 */

Route::get('gig/all','GigController@getAllGigs');

Route::get('gig/category/{category_id}','GigController@getGigOfCategory');

Route::get('gig/get/{id}','GigController@getThisGig');

/*
 *
 * Gig Orders
 */

Route::post('gig/order','GigOrderController@orderNow');
Route::get('user/orders/yourorders/{id}','GigOrderController@getYourOrders');
Route::get('user/orders/orderFromYou/{id}','GigOrderController@getOrdersFromYou');