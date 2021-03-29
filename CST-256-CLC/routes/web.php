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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'UserController@getUserProfile')->middleware('auth');

Route::post('/update_profile', 'UserController@updateUserProfile')->middleware('auth');

Route::get('/get_profiles', 'UserController@getAllProfiles')->middleware('auth');

Route::post('/edit_profile_admin', 'UserController@editSelectedProfile')->middleware('auth');

Route::post('/update_profile_admin', 'UserController@adminUpdateSelectedProfile')->middleware('auth');

Route::post('/suspend_profile_admin', 'UserController@adminSuspendProfile')->middleware('auth');

Route::post('/delete_profile_admin', 'UserController@adminDeleteProfile')->middleware('auth');

Route::get('/get_portfolio', 'UserController@getPortfolio')->middleware('auth');

Route::post('/update_portfolio', 'UserController@updatePortfolio')->middleware('auth');

Route::post('/edit_portfolio_admin', 'UserController@adminEditPortfolio')->middleware('auth');

Route::post('/update_portfolio_admin', 'UserController@adminUpdatePortfolio')->middleware('auth');

Route::get('/get_jobs', 'UserController@getAllJobs')->middleware('auth');

Route::post('/delete_portfolio', 'UserController@deletePortfolio')->middleware('auth');

Route::get('/get_groups', 'UserController@getAllGroups')->middleware('auth');

Route::post('/delete_group', 'UserController@deleteGroup')->middleware('auth');

Route::post('/edit_group', 'UserController@editGroup')->middleware('auth');

Route::post('/update_group', 'UserController@updateGroup')->middleware('auth');

Route::post('/create_group', 'UserController@createGroup')->middleware('auth');

Route::get('/get_create_group', 'UserController@getCreateGroup')->middleware('auth');

Route::post('/join_group', 'UserController@joinGroup')->middleware('auth');

Route::post('/leave_group', 'UserController@leaveGroup')->middleware('auth');

Route::post('/get_jobs_search', 'UserController@getJobsBySearch')->middleware('auth');

Route::post('/view_job', 'UserController@viewJob')->middleware('auth');

//Rest API
    
    //User's Rest API
    Route::get('/usersrest', 'UsersRestController@index');
    Route::get('/usersrest/{id}', 'UsersRestController@show');
    
    //Job's Rest API
    Route::get('/jobsrest', 'JobsRestController@index');
    Route::get('/jobsrest/{search}', 'JobsRestController@show');
    
    //Group's Rest API
    Route::get('/groupsrest', 'GroupsRestController@index');







