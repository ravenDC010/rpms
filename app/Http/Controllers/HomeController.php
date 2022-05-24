<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        if (Auth::user()->role == 'teacher'){
            // $works= DB::table('works')
            // ->where('works.teacher_id', Auth::user()->id)
            // ->get();

            $works= DB::table('works')
            ->where('works.teacher_id', '=', Auth::user()->id)
            ->join('users', function($join){
                $join->on('works.teacher_id', '=', 'users.id');
            })
            ->join('projects', function($join){
                $join->on('projects.id', '=', 'works.project_id');
            })
            ->get();



            return view('profile', ['works' => $works]);
        }
        elseif (Auth::user()->role == 'admin'){

            return view('profile');
        }

    }


}
