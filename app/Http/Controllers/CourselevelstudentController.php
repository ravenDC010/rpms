<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Courselevelstudent;
use App\Course;
use App\Level;
use App\Target;
use App\Certificate;
use Illuminate\Support\Facades\DB;

class CourselevelstudentController extends Controller
{
    public function index($id1, $id2){

        $course= Course::query()
        ->join('levels', function($join) use($id2){
            $join->on('courses.id', '=', 'levels.course_id')
            ->where('levels.id', '=', $id2);
        })
        ->where('courses.id', '=', $id1)
        ->first();

        // dd($course);

        $students= Courselevelstudent::query()
        ->join('users', function($join) use($id2){
            $join->on('courselevelstudents.student_id', '=', 'users.id');
        })
        ->where('level_id', $id2)
        ->get();

        return view('levels.view_level_students', ['course' => $course, 'students' => $students]);
    }

    public function add($id1, $id2){
        $students= User::query()
        ->where('role','student')
        ->whereNotIn('id', function($query) use($id1){
            $query->select('courselevelstudents.student_id')
            ->from('courselevelstudents')
            ->whereIn('courselevelstudents.level_id', function($query2) use($id1){
                $query2->select('levels.id')
                ->from('levels')
                ->where('levels.course_id','=',$id1);
            });
            // ->whereIn('courselevelstudents.student_id', function($query3) use($id1){
            //     $query3->select('certificates.student_id')
            //     ->from('certificates')
            //     ->where('certificates.course_id','=',$id1);
            // });
        })
        ->whereNotIn('id', function($query3) use($id1){
            $query3->select('certificates.student_id')
            ->from('certificates')
            ->where('certificates.course_id','=',$id1);
        })
        ->get();
        // ->whereNotIn('id', function($query) use($id2){
        //     $query->select('courselevelstudents.student_id')
        //     ->from('courselevelstudents')
        //     ->where('courselevelstudents.level_id', '=', $id2);
        // })->get();

        $course= Course::query()
        ->join('levels', function($join) use($id2){
            $join->on('courses.id', '=', 'levels.course_id')
            ->where('levels.id', '=', $id2);
        })->where('courses.id', $id1)
        ->first();
        
        return view('levels.add_level_students',['students'=>$students, 'course'=>$course]);
    }

    public function store(Request $request, $id1, $id2){

        $input = $request->all();
        $input['student'] = $request->input('student');
        foreach($input['student'] as $student) {
            DB::table('courselevelstudents')->insert([
                'level_id' => $id2,
                'student_id' => $student
            ]);
        }
        return back()->with('success', 'Successfully added students to course!');

    }

    public function performance($id1, $id2, $id3){
        $course= Course::query()
        ->join('levels', function($join) use($id2){
            $join->on('courses.id', '=', 'levels.course_id')
            ->where('levels.id', '=', $id2);
        })
        ->where('courses.id', $id1)
        ->first();

        // $student= User::query()
        // ->where('users.id', $id3)
        // ->leftJoin('evaluations', function($join){
        //     $join->on('users.id', '=', 'evaluations.student_id');
        // })
        // ->leftJoin('milestones', function($join2){
        //     $join2->on('evaluations.milestone_id', '=', 'milestones.id');
        // })
        // ->leftJoin('targets', function($join3){
        //     $join3->on('milestones.target_id', '=', 'targets.id');
        // })
        // ->leftJoin('levels', function($join4) use($id2){
        //     $join4->on('targets.level_id', '=', 'levels.id');
        // })
        // ->where('targets.level_id','=', $id2)
        // ->get();

        //2nd try
        // $student= User::query()
        // ->where('users.id', $id3)
        // ->leftJoin('courselevelstudents', function($join4) use($id2){
        //     $join4->on('users.id', '=', 'courselevelstudents.student_id');
        // })
        // ->leftJoin('levels', function($join4) use($id2){
        //     $join4->on('courselevelstudents.level_id', '=', 'levels.id');
        // })
        // ->leftJoin('evaluations', function($join){
        //     $join->on('users.id', '=', 'evaluations.student_id');
        // })
        // ->leftJoin('milestones', function($join2){
        //     $join2->on('evaluations.milestone_id', '=', 'milestones.id');
        // })
        // ->leftJoin('targets', function($join3) use($id2){
        //     $join3->on('milestones.target_id', '=', 'targets.id')
        //     ->where('targets.level_id','=', $id2);
        // })
        // ->select('users.*','evaluations.*', 'milestones.*', 'targets.*', 'levels.*', 'targets.level_id as lid')
        // ->get();


        $student= User::query()
        ->where('users.id', $id3)
        ->leftJoin('courselevelstudents', function($join4) use($id2){
            $join4->on('users.id', '=', 'courselevelstudents.student_id');
        })
        ->leftJoin('levels', function($join4) use($id2){
            $join4->on('courselevelstudents.level_id', '=', 'levels.id')
            ->where('levels.id', '=', $id2);
        })
        ->leftJoin('targets', function($join3){
            $join3->on('levels.id', '=', 'targets.level_id');
        })
        ->leftJoin('milestones', function($join2){
            $join2->on('targets.id', '=', 'milestones.target_id');
        })
        ->leftJoin('evaluations', function($join) use($id3){
            $join->on('milestones.id', '=', 'evaluations.milestone_id')
            ->where('evaluations.student_id', '=', $id3);
        })
        // ->leftJoin('milestones', function($join2){
        //     $join2->on('evaluations.milestone_id', '=', 'milestones.id');
        // })
        // ->leftJoin('targets', function($join3) use($id2){
        //     $join3->on('milestones.target_id', '=', 'targets.id')
        //     ->where('targets.level_id','=', $id2);
        // })
        // ->select('users.*','evaluations.*', 'milestones.*', 'targets.*', 'levels.*', 'users.id as sid')
        ->get();


        // dd($student);
        return view('levels.performance', ['course' => $course, 'students' => $student]);
    }

    public function levelUp($id1, $id2, $id3){

        // foreach($input['student'] as $student) {
        //     DB::table('courselevelstudents')->insert([
        //         'level_id' => $id2,
        //         'student_id' => $student
        //     ]);
        // }

        $level = Level::query()
        ->where('levels.course_id', $id1)
        ->where('levels.id', '>', $id2)
        ->first();

        if($level){    // levelup student
            DB::table('courselevelstudents')
            ->where('courselevelstudents.student_id', $id3)
            ->where('courselevelstudents.level_id', $id2)
            ->update(['courselevelstudents.level_id' => $level->id]);
        }
        else{   // no more levels left. remove student from course
            $certificate= Certificate::create([
                'course_id' => $id1,
                'student_id' => $id3,
            ]);


            DB::table('courselevelstudents')
            ->where('courselevelstudents.student_id', $id3)
            ->where('courselevelstudents.level_id', $id2)
            ->delete();
        }

        return redirect()->action([CourselevelstudentController::class, 'index'], ['id1' => $id1,'id2' => $id2]);

    }

    public function completed($id){
        $students= DB::table('users')
        ->join('certificates', function($join) use($id){
            $join-> on('certificates.student_id', 'users.id')
            ->where('certificates.course_id', $id);
        })
        ->get();

        $course= Course::query()
        ->where('courses.id', '=', $id)
        ->first();

        return view('courses.view_completed_students', ['course' => $course, 'students' => $students]);
    }

    public function grade($id1, $id2){

        $certificate= DB::table('users')
        ->where('users.id', $id2)
        ->join('certificates', function($join) use($id2){
            $join-> on('certificates.student_id', 'users.id')
            ->where('users.id', $id2);
        })
        ->join('courses', function($join) use($id1){
            $join-> on('certificates.course_id', 'courses.id')
            ->where('certificates.course_id', $id1);
        })
        ->join('levels', function($join){
            $join-> on('courses.id', 'levels.course_id');
        })
        ->join('targets', function($join){
            $join-> on('levels.id', 'targets.level_id');
        })
        ->join('milestones', function($join){
            $join-> on('targets.id', 'milestones.target_id');
        })
        ->join('evaluations', function($join) use($id2){
            $join-> on('milestones.id', 'evaluations.milestone_id')
            ->where('evaluations.student_id', '=', $id2);
        })
        ->select('users.name',  DB::raw('sum(milestones.max_grade) as total'),DB::raw('sum(evaluations.grade) as marks'))
        ->groupBy('certificates.id')
        ->first();

        $course= Course::query()
        ->where('courses.id', '=', $id1)
        ->first();


        // dd($course);

        return view('courses.grade', ['course' => $course, 'certificate' => $certificate]);
    }

}
