<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\EvaluatorController;
use App\http\Controllers\FacultyController;
use App\http\Controllers\QuestionaireController;
use App\http\Controllers\ResultsController;
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
Route::get('/start-evaluation', function () {
    return view('welcome');
});

Route::get('/evaluation-form', function () {
    return view('welcome');
});

Route::post('/get_evaluators','EvaluatorController@get_evaluators');
Route::post('/logout_evaluator','EvaluatorController@logout_evaluator');

Route::post('/get_faculty','FacultyController@get_faculty');
Route::post('/get_all_faculty','FacultyController@get_all_faculty');

Route::post('/scan_qrcode','EvaluatorController@scan_qrcode');
Route::post('/evaluator_session','EvaluatorController@evaluator_session');

Route::post('/get_questionaire','QuestionaireController@get_questionaire');

Route::post('/submit_form','ResultsController@submit_form');
Route::post('/verify_evaluate','ResultsController@verify_evaluate');

Route::get('/{vue?}',function(){
    return view('welcome');
})->where('vue','[\/\w\.-]*');

