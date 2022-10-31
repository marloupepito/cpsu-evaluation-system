<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    
     public function add_campus(Request $request){
         $request->validate([
            'campusname'=>['required'],
            'campusadmin'=>['required'],
            'campusrank'=>['required'],
            'campususername'=>['required'],
            'campuspassword'=>['required'],
        ]);

        $user = new User;
        $user->name = $request->campusadmin;
        $user->username = $request->campususername;
        $user->password = Hash::make($request->campuspassword);
        $user->campus = $request->campusname;
        $user->academic_rank = $request->campusrank;
        $user->save();

        if($user){
             $aaa = User::where([['campus','=',$request->campusname],['name','=',$request->campusadmin]])->first();
            $user = new Schedule;
            $user->start = date("Y"."-"."m"."-"."d");
            $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
            $user->semester = '1st Semester';
            $user->campus = $request->campusname;
            $user->campusid = $aaa->id;
            $user->save();

            $show = User::where('academic_rank','<>','Main Administrator Campus')->get();
            return response()->json([
                    'status' => $show
                ]);
        }
       
     }
   public function user_login(Request $request){
        $request->validate([
            'username'=>['required'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($request->only('username','password'))){
            return response()->json([
                'status' => Auth::user()
            ]);
        }else{
            return response()->json([
                'status' => 'Incorrect username or password!'
            ]);
        }
        throw ValidationException::withMessages([
            'username' => ['Incorrect username or password!'],
        ]);
        
    }
    public function get_all_users(Request $request){
        $users = DB::table('users')
        ->where('academic_rank', '<>' ,'Main Administrator Campus')
        ->join('schedule', 'schedule.campusid', '=', 'users.id')
        ->get();
        return response()->json([
            'status' => $users
        ]);
    }
    public function logout(){
      Auth::logout();
    }
     public function get_all_users2(Request $request){
        $users = DB::table('users')
        ->where('academic_rank', '<>' ,'Main Administrator Campus')
        ->get();
        return response()->json([
            'status' => $users
        ]);
    }


     public function get_admin(Request $request){


        $users = DB::table('users')
        ->where([['campus', '=' ,$request->campus],['id', '=' ,$request->campusid],['academic_rank', '=' ,$request->academic_rank]])
        ->first();
        return response()->json([
            'status' => $users
        ]);
    }
}
