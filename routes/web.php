<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\EvaluatorController;
use App\http\Controllers\FacultyController;
use App\http\Controllers\QuestionaireController;
use App\http\Controllers\ResultsController;
use App\http\Controllers\ScheduleController;
use App\http\Controllers\UsersController;
use App\http\Controllers\SubjectLoadingController;
use App\http\Controllers\StudentSubjectLoadingController;
use Illuminate\Http\Request;
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/start-evaluation', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});

Route::get('/how-to-evaluate', function () {
    return view('welcome');
});

Route::get('/evaluation-form', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

Route::get('/scan_qr', function () {
    return view('welcome');
});

Route::post('/logout','UsersController@logout');
Route::post('/get_admin','UsersController@get_admin');
Route::post('/get_evaluators','EvaluatorController@get_evaluators');
Route::post('/logout_evaluator','EvaluatorController@logout_evaluator');

Route::post('/get_faculty','FacultyController@get_faculty');
Route::post('/get_all_faculty','FacultyController@get_all_faculty');
Route::post('/add_faculty','FacultyController@add_faculty');

Route::post('/scan_qrcode','EvaluatorController@scan_qrcode');
Route::post('/evaluator_session','EvaluatorController@evaluator_session');
Route::post('/add_student','EvaluatorController@add_student');

Route::post('/get_questionaire','QuestionaireController@get_questionaire');
Route::put('/edit_questionaire1','QuestionaireController@edit_questionaire1');
Route::put('/edit_questionaire2','QuestionaireController@edit_questionaire2');
Route::put('/edit_questionaire3','QuestionaireController@edit_questionaire3');
Route::put('/edit_questionaire4','QuestionaireController@edit_questionaire4');

Route::post('/submit_form','ResultsController@submit_form');
Route::post('/verify_evaluate','ResultsController@verify_evaluate');
Route::post('/get_all_results','ResultsController@get_all_results');
Route::post('/get_all_results2','ResultsController@get_all_results2');
Route::post('/goto_overall','ResultsController@goto_overall');
Route::post('/get_all_overall','ResultsController@get_all_overall');
Route::post('/counting_data','ResultsController@counting_data');

Route::post('/get_schedule','ScheduleController@get_schedule');
Route::put('/update_schedule','ScheduleController@update_schedule');
Route::put('/change_sem','ScheduleController@change_sem');

Route::post('/user_login','UsersController@user_login');
Route::post('/get_all_users','UsersController@get_all_users');
Route::post('/get_all_users2','UsersController@get_all_users2');
Route::post('/add_campus','UsersController@add_campus');

Route::post('/get_subject_loading','SubjectLoadingController@get_subject_loading');
Route::post('/add_subject_loaded','SubjectLoadingController@add_subject_loaded');
Route::post('/select_course_year','SubjectLoadingController@select_course_year');

Route::post('/get_student_subject_loading','StudentSubjectLoadingController@get_student_subject_loading');


Route::get('/{vue?}',function(){
    return view('welcome');
})->where('vue','[\/\w\.-]*');

