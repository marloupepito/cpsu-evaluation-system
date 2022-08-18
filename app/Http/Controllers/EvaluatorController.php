<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluator;
class EvaluatorController extends Controller
{
    public function get_evaluators(Request $request){
    	 $request->validate([
            'evaluator'=>['required'],
        ]);
        $users = Evaluator::where('evaluator_rank', '=' ,$request->evaluator)
        ->get();
        return response()->json([
            'status' => $users
        ]);
    }
}
