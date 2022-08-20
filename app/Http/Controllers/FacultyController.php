<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
class FacultyController extends Controller
{
     public function get_faculty(Request $request){
    	 $request->validate([
            'status'=>['required'],
        ]);
        $users = Faculty::where('status', '=' ,$request->status)
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
