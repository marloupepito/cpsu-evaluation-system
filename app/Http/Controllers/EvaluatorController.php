<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluator;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class EvaluatorController extends Controller
{
    public function get_evaluators(Request $request){
    	 $request->validate([
            'status'=>['required'],
            'campus'=>['required'],
            'campusid'=>['required'],
        ]);
        $users = Evaluator::where([['class_status', '=' ,$request->status],['campus', '=' ,$request->campus],['campusid', '=' ,$request->campusid]])
        ->get();
        return response()->json([
            'status' => $users
        ]);
    }
    public function scan_qrcode(Request $request){
         $request->validate([
            'username'=>['required'],
            'password'=>['required'],
            'campus'=>['required'],
            'campusid'=>['required'],
            'type'=>['required'],
        ]);

         if($request->type === 'student'){
              $users = Evaluator::where([['campusid', '=' ,$request->campusid],['campus', '=' ,$request->campus],['id_number', '=' ,$request->username],['password','=',$request->password]])
                ->get();
                if(count($users) !== 0){
                    $request->session()->put('evaluator_type', 'student');
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
         }else if($request->type === 'peer'){
               $users = Faculty::where([['campusid', '=' ,$request->campusid],['campus', '=' ,$request->campus],['id_number', '=' ,$request->username],['password','=',$request->password]])
                ->get();
                if(count($users) !== 0){
                    $request->session()->put('evaluator_type', 'peer');
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
         }else if($request->type === 'self'){
               $users = Faculty::where([['campusid', '=' ,$request->campusid],['campus', '=' ,$request->campus],['id_number', '=' ,$request->username],['password','=',$request->password]])
                ->get();
                if(count($users) !== 0){
                    $request->session()->put('evaluator_type', 'self');
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
         }else if($request->type === 'supervisor'){
            $users = User::where([['id', '=' ,$request->campusid],['campus', '=' ,$request->campus],['id_number', '=' ,$request->username],['password','=',$request->password]])
                ->get();
                if(count($users) !== 0){
                    $request->session()->put('evaluator_type', 'supervisor');
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

      
       
    }

    public function evaluator_session(Request $request){
        $username = $request->session()->get('username');
        $password = $request->session()->get('password');
        $users = Evaluator::where([['id_number', '=' ,$username],['password','=',$password]])
        ->get();
        if(count($users) !== 0){
            return response()->json([
                'status' => 'success',
                'id' => $users[0]->id_number,
                'info' => $users
            ]);
        }else{
             return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function logout_evaluator(Request $request){

        $request->session()->forget('username');
        $request->session()->forget('password');

        if($request->session()->get('username') === null && $request->session()->get('password') === null){
          return response()->json([
                    'status' => 'success'
          ]);
        }else{
          return response()->json([
                    'status' => 'error'
          ]);
        }
        

    }

    public function add_student(Request $request){
        
        $request->validate([
            'campus'=>['required'],
            'campusid'=>['required'],
            'name'=>['required'],
            'studentid'=>['required'],
            'course'=>['required'],
            'year'=>['required'],
            'section'=>['required'],
            'sem'=>['required'],
            'status'=>['required'],
        ]);

          $user = new Evaluator;
        $user->id_number = $request->studentid;
        $user->campusid = $request->campusid;
        $user->campus = $request->campus;
        $user->name = $request->name;
        $user->password = Hash::make($request->studentid.$request->campusid.$request->campus.$request->name);
        $user->course = $request->course;
        $user->school_year = $request->year;
        $user->section = $request->section;
        $user->class_status = $request->status;
        $user->save();

        $users = Evaluator::where([['class_status', '=' ,$request->status],['campus', '=' ,$request->campus],['campusid', '=' ,$request->campusid]])
        ->get();
        return response()->json([
            'status' => $users
        ]);

    }
    
}
