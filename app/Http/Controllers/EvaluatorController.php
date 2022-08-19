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
    public function scan_qrcode(Request $request){
         $request->validate([
            'username'=>['required'],
            'password'=>['required'],
        ]);
        $users = Evaluator::where([['id_number', '=' ,$request->username],['password','=',$request->password]])
        ->get();
        if(count($users) !== 0){
            $request->session()->put('username', $request->username);
            $request->session()->put('password', $request->password);
            return response()->json([
                'status' => 'success'
            ]);
        }else{
             return response()->json([
                'status' => 'error'
            ]);
        }
       
    }

    public function evaluator_session(Request $request){
        $username = $request->session()->get('username');
        $password = $request->session()->get('password');
        $users = Evaluator::where([['id_number', '=' ,$username],['password','=',$password]])
        ->get();
        if(count($users) !== 0){
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
