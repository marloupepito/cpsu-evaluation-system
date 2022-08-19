<?php

namespace App\Http\Controllers;
use App\Models\Questionaire;
use Illuminate\Http\Request;

class QuestionaireController extends Controller
{
     public function get_questionaire(){
        $users = Questionaire::all();
        return response()->json([
            'status' => $users
        ]);
     }
}
