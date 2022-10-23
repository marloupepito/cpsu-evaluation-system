<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Hash;
class FacultyController extends Controller
{
     public function get_faculty(Request $request){
    	 $request->validate([
            'status'=>['required'],
            'campusid'=>['required'],
            'campus'=>['required'],
        ]);
        $users = Faculty::where([['status', '=' ,$request->status],['campusid', '=' ,$request->campusid],['campus', '=' ,$request->campus]])
        ->get();
        return response()->json([
            'status' => $users
        ]);
    }
     public function get_all_faculty(){
        $users = Faculty::all();
        return response()->json([
            'status' => $users
        ]);
    }
     public function add_faculty(Request $request){
        
        
         $request->validate([
            'idNumber'=>['required'],
            'campusid'=>['required'],
            'campus'=>['required'],
            'name'=>['required'],
            'department'=>['required'],
            'rank'=>['required'],
            'status'=>['required'],
        ]);
         $user = new Faculty;
        $user->id_number = $request->idNumber;
        $user->password = Hash::make($request->idNumber.$request->campusid.$request->campus.$request->name);
        $user->campusid = $request->campusid;
        $user->campus = $request->campus;
        $user->name = $request->name;
        $user->department = $request->department;
        $user->academic_rank = $request->rank;
        $user->status = $request->status;
        $user->save();

        

        if($request->status === 'Faculty'){
            $users = Faculty::where([['status','=',$request->status],['campus','=',$request->campus],['campusid','=',$request->campusid]])->get();
                     return response()->json([
                    'status' => $users
                ]);
        }else{
                $users = Faculty::where([['status','=',$request->status],['campus','=',$request->campus],['campusid','=',$request->campusid]])->get();
                             return response()->json([
                        'status' => $users
                    ]);
        }
       
    }
}
