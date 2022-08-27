<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Results;
use App\Models\Evaluator;
use App\Models\Schedule;
class ResultsController extends Controller
{
     public function submit_form(Request $request){
         $request->validate([
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
        Evaluator::where('id_number', $request->evaluator)
      ->update(['status' => 'active']);
        $zz = Schedule::where('id', '=' ,1)->first();
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
        $user->semester = $zz->semester;
        $user->department = $aa->course;
        $user->academic_rank = $aa->academic_rank;
        $user->year = date('Y');
        $user->save();

       

        if($user){
        $a = Results::where('evaluatee_id','=',$request->evaluatee)->sum('commitment');
        $b = Results::where('evaluatee_id','=',$request->evaluatee)->sum('kos');
        $c = Results::where('evaluatee_id','=',$request->evaluatee)->sum('til');
        $d = Results::where('evaluatee_id','=',$request->evaluatee)->sum('mol');
        $e = Results::where('evaluatee_id','=',$request->evaluatee)->sum('total');

        $f = Results::where('evaluatee_id','=',$request->evaluatee)->get();

        Results::where('evaluatee_id','=',$request->evaluatee)
      ->update([
        'a' => $a / count($f),
        'b' => $b / count($f),
        'c' => $c / count($f),
        'd' => $d / count($f),
        'e' => $e / count($f)
        ]);

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

    public function get_all_results(Request $request){
        $request->validate([
            'status'=>['required'],
        ]);

        $users = Results::select('evaluatee_id','a','b','c','d','e','year','semester')->distinct()->get();
        return response()->json([
                'status' => $users
            ]);
    }

     public function goto_overall(Request $request){
        $request->validate([
            'id'=>['required'],
        ]);
        $request->session()->put('evaluateeid', $request->id);
    }
     public function get_all_overall(Request $request){


       $users = Results::where('evaluatee_id', '=' ,$request->session()->get('evaluateeid'))
        ->get();
        $users2 = Results::where('evaluatee_id', '=' ,$request->session()->get('evaluateeid'))
        ->select('evaluatee_id','a','b','c','d','e','year','semester')->distinct()->first();

         return response()->json([
                'status' => $users,
                'status2' => $users2
            ]);
    }
}
