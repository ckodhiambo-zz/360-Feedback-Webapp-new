<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('auth.login');
});




Route::group(['middleware' => 'auth'], function () {
    Route::get('/add-employee', [PostController::class, 'addPost']);
    Route::post('/create-post', [PostController::class, 'createPost'])->name('post.create');

//nominations
    Route::get('/display-surveys/set-nominations/{id}', [PostController::class, 'addinfo']);
    Route::post('/list-of-notifications',[PostController::class,'Nominations'])->name('post.nominate');

//summary
    Route::get('/nomination-summary',[PostController::class,'summary']);

    Route::get('/list-of-employees', [PostController::class, 'getPost']);

    Route::get('/create-survey', [App\Http\Controllers\SurveyController::class, 'indexSurvey']);
    Route::post('/create-survey', [App\Http\Controllers\SurveyController::class, 'create'])->name('survey.create');

    Route::get('/list-of-surveys', [App\Http\Controllers\SurveyController::class, 'ShowSurveys']);
    Route::get('/display-surveys', [App\Http\Controllers\SurveyController::class, 'displaySurveys']);

//nomination surveys
//Route::get('/home', [App\Http\Controllers\SurveyController::class, 'surveynomination']);


    Route::get('/question-module/{id}', [App\Http\Controllers\SurveyController::class, 'displayCategories']);

    Route::get('/create-questions', [App\Http\Controllers\SurveyController::class, 'indexQuestions']);
    Route::post('/create-questions', [App\Http\Controllers\SurveyController::class, 'sendQuestions'])->name('question.create');

    Route::get('/category-tab', [App\Http\Controllers\SurveyController::class, 'CategoryTab']);
    Route::get('/feedback-categories/{id}', [App\Http\Controllers\SurveyController::class, 'postFeedback']);

    Route::get('/submit-results', [App\Http\Controllers\SurveyController::class, 'SubmitResults']);
    Route::post('/submit-results', [App\Http\Controllers\SurveyController::class, 'SubmitResults'])->name('results.create');

    Route::get('/graphical-results', [App\Http\Controllers\SurveyController::class, 'graph']);
    Route::get('/majibu', [App\Http\Controllers\SurveyController::class, 'results']);

//List of raters
    Route::get('/list-of-raters/{id}',[PostController::class,'ListRaters']);

//Participant selection
    Route::get('/select-participants',[PostController::class,'Participants']);


//Password
    Route::get('/password/change', 'UserController@getPassword')->name('userGetPassword');
    Route::post('/password/change', 'UserController@postPassword')->name('userPostPassword');

//Excel Imports
    Route::get('/import-form',[PostController::class,'importForm']);
    Route::post('/import',[PostController::class,'importEmployees'])->name('employee.import');

//Nominations list
    Route::get('/nominations-table',[App\Http\Controllers\SurveyController::class,'ListNominations']);
    Route::get('/individual-surveys',[App\Http\Controllers\SurveyController::class,'IndividualSurveyList']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user', 'UserController');

    Route::get('/verify', [RegisterController::class, 'verifyUser'])->name('verify.user');


    //Profile
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');
});

//Route::group(['middleware' => ['auth', 'role_or_permission:admin|create role|create permission']], function () {
    //Permission
    Route::resource('permission', 'PermissionController');

    //Role
    Route::resource('role', 'RoleController');
//});


Auth::routes();

//////////////////////////////// axios request

Route::get('/getAllPermission', 'PermissionController@getAllPermissions');
Route::post("/postRole", "RoleController@store");
Route::get("/getAllUsers", "UserController@getAll");
Route::get("/getAllRoles", "RoleController@getAll");
Route::get("/getAllPermissions", "PermissionController@getAll");

/////////////axios create user
Route::post('/account/create', 'UserController@store');
Route::put('/account/update/{id}', 'UserController@update');
Route::delete('/delete/user/{id}', 'UserController@delete');
Route::get('/search/user', 'UserController@search');



