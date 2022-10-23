<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Evaluator;
use App\Models\Faculty;
use App\Models\Questionaire;
use App\Models\Results;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Main Administrator';
        $user->username = 'admin';
        $user->campus = 'CPSU Kabangkalan Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Main Administrator Campus';
        $user->save();

        $user = new User;
        $user->name = 'ABELLO, Mark Anthony G.';
        $user->username = 'admin1';
        $user->campus = 'CPSU Hinoba-an Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Campus Administrator';
        $user->save();

        $user = new User;
        $user->name = 'FERARIS, Erwin P., PhD';
        $user->username = 'admin2';
        $user->campus = 'CPSU Sipalay Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Campus Administrator';
        $user->save();


        $user = new User;
        $user->name = 'BORRES, Germa T., PhD';
        $user->username = 'admin3';
        $user->campus = 'CPSU Cauayan Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Campus Administrator';
        $user->save();

        $user = new User;
        $user->name = 'CORPUZ Filipina G.';
        $user->username = 'admin4';
        $user->campus = 'CPSU Ilog Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Campus Administrator';
        $user->save();


        $user = new User;
        $user->name = 'MISAJON, Chim C., PhD';
        $user->username = 'admin5';
        $user->campus = 'CPSU Candoni Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Campus Administrator';
        $user->save();

        $user = new User;
        $user->name = 'PREDO, Gregorio D.';
        $user->username = 'admin6';
        $user->campus = 'CPSU Hinigaran Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Campus Administrator';
        $user->save();


        $user = new User;
        $user->name = 'GONZALES, Patrocenio L.';
        $user->username = 'admin7';
        $user->campus = 'CPSU Moises Padilla Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Campus Administrator';
        $user->save();


        $user = new User;
        $user->name = 'FORDENTE, Noel B.';
        $user->username = 'admin8';
        $user->campus = 'CPSU Victorias Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Campus Administrator';
        $user->save();


        $user = new User;
        $user->name = 'BALOGO, Ken M';
        $user->username = 'admin9';
        $user->campus = 'CPSU San Carlos Campus';
 		$user->password = Hash::make('admin');
 		$user->academic_rank = 'Campus Administrator';
        $user->save();

        


        $user = new Schedule;
        $user->campusid = 2;
	    $user->campus = 'CPSU Hinoba-an Campus';
        $user->start = date("Y"."-"."m"."-"."d");
        $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
 		$user->semester = '1st Semester';
        $user->save();

        $user = new Schedule;
        $user->campusid = 3;
	    $user->campus = 'CPSU Sipalay Campus';
        $user->start = date("Y"."-"."m"."-"."d");
        $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
 		$user->semester = '1st Semester';
        $user->save();

        $user = new Schedule;
        $user->campusid = 4;
	    $user->campus = 'CPSU Cauayan Campus';
        $user->start = date("Y"."-"."m"."-"."d");
        $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
 		$user->semester = '1st Semester';
        $user->save();

        $user = new Schedule;
        $user->campusid = 5;
	    $user->campus = 'CPSU Ilog Campus';
        $user->start = date("Y"."-"."m"."-"."d");
        $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
 		$user->semester = '1st Semester';
        $user->save();

        $user = new Schedule;
        $user->campusid = 6;
	    $user->campus = 'CPSU Candoni Campus';
        $user->start = date("Y"."-"."m"."-"."d");
        $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
 		$user->semester = '1st Semester';
        $user->save();


        $user = new Schedule;
        $user->campusid = 7;
	    $user->campus = 'CPSU Hinigaran Campus';
        $user->start = date("Y"."-"."m"."-"."d");
        $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
 		$user->semester = '1st Semester';
        $user->save();

        $user = new Schedule;
        $user->campusid = 8;
	    $user->campus = 'CPSU Moises Padilla Campus';
        $user->start = date("Y"."-"."m"."-"."d");
        $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
 		$user->semester = '1st Semester';
        $user->save();

        $user = new Schedule;
        $user->campusid = 9;
	    $user->campus = 'CPSU Victorias Campus';
        $user->start = date("Y"."-"."m"."-"."d");
        $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
 		$user->semester = '1st Semester';
        $user->save();


        $user = new Schedule;
        $user->campusid = 10;
	    $user->campus = 'CPSU San Carlos Campus';
        $user->start = date("Y"."-"."m"."-"."d");
        $user->end = date("Y"."-"."m"."-"."d", strtotime('+ 2 days'));
 		$user->semester = '1st Semester';
        $user->save();


         for ($i=0; $i < 10; $i++) { 
        	$user = new Evaluator;
	        $user->id_number = 'Student CPSU'.$i;
	        $user->campusid = 2;
	        $user->campus = 'CPSU Hinoba-an Campus';
	        $user->password = Hash::make('admin');
	 		$user->course = 'College of Computer Study';
	 		$user->evaluator_rank = 'Student';
	 		$user->academic_rank = 'Student';
	 		$user->school_year = '3rd Year';
	 		$user->section = 'A';
	 		$user->class_status = 'Irregular';
	        $user->save();
        }
        for ($i=0; $i < 10; $i++) { 
        	$user = new Evaluator;
	        $user->id_number = 'Student CPSU A'.$i;
	        $user->campusid = 2;
	        $user->campus = 'CPSU Hinoba-an Campus';
	        $user->password = Hash::make('admin');
	 		$user->course = 'College of Computer Study';
	 		$user->evaluator_rank = 'Student';
	 		$user->academic_rank = 'Student';
	 		$user->school_year = '3rd Year';
	 		$user->section = 'A';
	 		$user->class_status = 'Regular';
	        $user->save();
        }


        for ($i=0; $i < 10; $i++) { 
        	$user = new Faculty;
	        $user->id_number = 'Faculty #'.$i;
	        $user->campusid = 2;
	        $user->campus = 'CPSU Hinoba-an Campus';
	        $user->photos = 'sample.jpg';
	 		$user->name = 'name'.$i;
	 		$user->department = 'Bachelor of Science Information Technology';
	 		$user->academic_rank = 'PSI II';
	 		$user->status = 'Faculty';
	        $user->save();
        }
         for ($i=0; $i < 10; $i++) { 
        	$user = new Faculty;
	        $user->id_number = 'staff #'.$i;
	        $user->campusid = 2;
	        $user->campus = 'CPSU Hinoba-an Campus';
	        $user->photos = 'sample.jpg';
	 		$user->name = 'name'.$i;
	 		$user->department = 'Bachelor of Science Information Technology';
	 		$user->academic_rank = 'PSI II';
	 		$user->status = 'Staff';
	        $user->save();
        }

       	    $user = new Questionaire;
	        $user->q1 = "Demonstrates sensitivity to students' ability to attend and absorb content information.";
	        $user->q2 = 'Integrates sensitively his/her learning objectives with those of the students in a collaborative process.';
	        $user->q3 = 'Makes self-available to students beyond official time.';
	        $user->q4 = 'Regularly comes to class on time, well-groomed and well-prepared to complete assigned responsibilities.';
	        $user->q5 = "Keeps accurate records of students' performance and prompt submission of the same.";
	        $user->q6 = 'Demonstrates mastery of the subject matter (explain the subject matter without relying solely on the prescribed textbook).';
	        $user->q7 = 'Draws and share information on the state on the art of theory and practice in his/her discipline.';
	        $user->q8 = 'Integrates subject to practical circumstances and learning intents/purposes of students.';
	        $user->q9 = 'Explains the relevance of present topics to the previous lessons, and relates the subject matter to relevant current issues and/or daily life activities.';
	        $user->q10 = 'Demonstrates up-to-date knowledge and/or awareness on current trends and issues of the subject.';
	        $user->q11 = 'Creates teaching strategies that allow students to practice using concepts they need to understand (interactive discussion).';
	        $user->q12 = "Enhances student self-esteem and/or gives due recognition to students' performance/potentials.";
	        $user->q13 = 'Allows students to create their own course with objectives and realistically defined student-professor rules and make them accountable for their performance.';
	        $user->q14 = 'Allows students to think independently and make their own decisions and holding them accountable for their performance based largely on their success in executing decisions.';
	        $user->q15 = 'Encourages students to learn beyond what is required and help/guide the students how to apply the concepts learned.';
	        $user->q16 = 'Creates opportunities for intensive and/or extensive contribution of students in the class activities (e.g. breaks class into dyads, triads or buzz/task groups).';
	        $user->q17 = 'Assumes roles as facilitator, resource person, coach, inquisitor, integrator, referee in drawing students to contribute to knowledge and understanding of the concepts at hands.';
	        $user->q18 = 'Designs and implements learning conditions and experience that promotes healthy exchange and/or confrontations.';
	        $user->q19 = 'Structures/re-structures learning and teaching-learning context to enhance attainment of collective learning objectives.';
	        $user->q20 = 'Use of Instructional Materials (audio/video materials: fieldtrips, film showing, computer aided instruction and etc.) to reinforces learning processes.';
	        $user->save();

        
    }
}
