<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Evaluator;
use App\Models\FacultySubjectLoading;
use App\Models\StudentSubjectLoading;
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
     public function get_all_faculty(Request $request){
        $username = $request->session()->get('username');
        $password = $request->session()->get('password');
         $users = Evaluator::where([['id_number', '=' ,$username],['password','=',$password]])
        ->first();

        if($request->session()->get('evaluator_type') === 'student'){

            $loading = FacultySubjectLoading::where([['department','=',$users->course],['year','=',$users->school_year],['semester','=',$users->semester]])->get();

                
                $aaa = StudentSubjectLoading::where([['program', '=' ,null],['evaluator_id', '=' ,$users->id]])
                ->orWhere([['program', '<>' ,'active'],['evaluator_id', '=' ,$users->id]])
                ->get();

                $subjectLoadingStudent = StudentSubjectLoading::where([['program', '=' ,null],['evaluator_id', '=' ,$users->id]])
                ->orWhere([['program', '=' ,'active'],['evaluator_id', '=' ,$users->id]])
                ->get();

                if(count($subjectLoadingStudent) === 0){
                     foreach ($loading as $load) {
                        StudentSubjectLoading::create([
                            'evaluator_id' => $users->id,
                            'id_number' => $load->id_number,
                            'campusid' => $load->campusid,
                            'subject' => $load->subject,
                            'semester' => $load->semester,
                            'department' => $load->department,
                            'section' => $load->section,
                            'year' => $load->year,
                        ]);
                    }

                   
                }else{

                }

                 $faculty = Faculty::where('id', '=',$subjectLoadingStudent[0]->id_number)->first();
                    return response()->json([
                        'status' => $aaa,
                        'faculty' =>$faculty
                    ]);

         

        }
        
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
