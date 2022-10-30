<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectLoading;
use App\Models\SubjectList;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;
class SubjectLoadingController extends Controller
{
     public function get_subject_loading(Request $request){
        
        $users = DB::table('faculty_subject_loading')
        ->join('faculty', 'faculty.id', '=', 'faculty_subject_loading.id')
        ->where('faculty.id', $request->id)
        ->first();

        $loading = SubjectLoading::where('id_number', '=',$request->id)->get();
        $faculty = Faculty::where('id', '=',$request->id)->first();
        return response()->json([
            'status' => $users,
            'loading' =>$loading,
            'faculty' => $faculty
        ]);
    }

    public function add_subject_loaded(Request $request){
           $request->validate([
            'id'=>['required'],
            'subject'=>['required'],
            'sem'=>['required'],
            'section'=>['required'],
            'department'=>['required'],
            'year'=>['required'],
        ]);


        $exist = SubjectLoading::where([['year','=',$request->year],['semester','=',$request->sem],['subject','=',$request->subject],['section','=',$request->section]])->get();

        if(count($exist) === 0){
             $loaded = new SubjectLoading;
            $loaded->id_number = $request->id;
            $loaded->campusid = $request->campusid;
            $loaded->subject = $request->subject;
            $loaded->semester = $request->sem;
            $loaded->school_year = $request->sy;
            $loaded->section = $request->section;
            $loaded->year = $request->year;
            $loaded->department = $request->department;
            $loaded->save();

             $loading = SubjectLoading::where('id_number', '=',$request->id)->get();
            return response()->json([
                'status' => 'success',
                'loading' =>$loading
            ]);
        }else{
             $loading = SubjectLoading::where('id_number', '=',$request->id)->get();
            return response()->json([
                'status' => 'error',
                'loading' =>$loading
            ]);
        }
       


    }


    public function select_course_year(Request $request){


        $list = SubjectList::where([['department','=',$request->department],['semester','=',$request->semester],['year','=',$request->year]])->get();

        return response()->json([
            'status' => $list
        ]);
    }
    
}
