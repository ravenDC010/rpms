<?php

namespace App\Http\Controllers;
use App\Project;
use App\Work;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function view()
    {
        // $works= DB::table('works')
        // ->join('users', function($join){
        //     $join->on('works.teacher_id', '=', 'users.id');
        // })
        // ->join('projects', function($join){
        //     $join->on('works.project_id', '=', 'projects.id');
        // })
        // ->get();
        $projects= DB::table('projects')
        ->get();

        return view('projects.view_projects',['projects'=>$projects]);
    }

    public function viewProject($id)
    {
        $work= DB::table('works')
        ->where('works.project_id', '=', $id)
        ->join('users', function($join){
            $join->on('works.teacher_id', '=', 'users.id');
        })
        ->join('projects', function($join){
            $join->on('projects.id', '=', 'works.project_id');
        })
        ->first();

        return view('projects.view_projects_solo',['work'=>$work]);
    }

    public function add()
    {
        return view('projects.add_projects');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'project_name' => ['required', 'string',  'max:255'],   //left side is the name of the input fields
            'description' => ['required', 'string', 'max:255'],
        ]);

        $project = Project::create([
            'project_name' => request('project_name'),        //left side is the name of the column names of the database.Right side is the name
            'description' => request('description'),    //of the input fields.
        ]);

        Work::create([
            'project_id' => $project->id,        //left side is the name of the column names of the database.Right side is the name
            'teacher_id' => Auth::user()->id,    //of the input fields.
            'status' => 'ongoing',
        ]);

        // return redirect()->route('course.view');
        return back()->with('success', 'Successfully added a new project!');

    }

}
