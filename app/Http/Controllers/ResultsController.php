<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Results;
use App\Models\Evaluator;
class ResultsController extends Controller
{
     public function submit_form(Request $request){
         $request->validate([
            'comment'=>['required'],
            'evaluator'=>['required'],
            'evaluatee'=>['required'],
            'commitment'=>['required'],
            'kos'=>['required'],
            'til'=>['required'],
            'mol'=>['required'],
        ]);
        $total = ($request->commitment+$request->kos+$request->til+$request->mol) / 4;
        $aa = Evaluator::where('id_number', '=' ,$request->evaluator)
        ->first();
        $user = new Results;
        $user->evaluatee_id = $request->evaluatee;
        $user->evaluator_id = $request->evaluator;
        $user->commitment = $request->commitment;
        $user->kos = $request->kos;
        $user->til = $request->til;
        $user->mol = $request->mol;
        $user->total = $total;
        $user->comment = $request->comment;
        $user->school_year = $aa->school_year;
        $user->section = $aa->section;
        $user->semester = $aa->semester;
        $user->department = $aa->course;
        $user->academic_rank = $aa->academic_rank;
        $user->year = date('Y');
        $user->save();
        if($user){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function verify_evaluate(Request $request){
         $request->validate([
            'evaluator'=>['required'],
            'evaluatee'=>['required'],
        ]);
         $user = Results::where([['evaluatee_id', '=' ,$request->evaluatee],['evaluator_id','=',$request->evaluator]])
        ->first();
        if($user === null){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
         
    }
}
