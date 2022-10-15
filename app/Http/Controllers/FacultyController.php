<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
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
}
